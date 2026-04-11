<?php

declare(strict_types=1);
include "../public/conexion.php";

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Domain\User\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {


    //Funcion helper para devolver respuestas en JSON y reutilizarla en todos los endpoints
        $respond = function (Response $response, bool $ok, $data = null, $error = null, int $status = 200): Response {
            $payload = ['ok' => $ok];
            if($ok) {
                $payload['data'] = $data;
            } 
            else {
                $payload['error'] = $error;
            }

            $response->getBody()->write(json_encode($payload));
            return $response->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
        };

    //Funcion helper generadora de casilleros
    $generarCasillero = function ($db) {
        for ($i = 0; $i < 10; $i++) {
            $casillero = 'CKE-' . random_int(1000,9999);//4 digitos
            $existe = $db->GetRow(
                "SELECT id_usuario FROM usuarios WHERE casillero = ?",
                [$casillero]
            );
            if (!$existe) {
                return $casillero;
            }
        }
        return null;// Si no pudo generar casillero retorna null
    };



    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });


    //CRUD USUARIOS

    //Crear usuario solo para uso del admin
    $app->post('/crearUsuario', function (Request $request, Response $response) use ($respond, $generarCasillero) {

        //Crear arreglo del registro a insertar
        $datos = $request->getQueryParams();

        //Validar los campos obligatorios
        if (
            empty($datos['nombre_usuario']) ||
            empty($datos['correo']) ||
            empty($datos['password']) ||
            empty($datos['rol_id'])
        ) {
            return $respond($response,false,null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Campos obligatorios faltantes'
            ], 400);
        }

        //Validar formato de email y rol (int)
        if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'El formato del correo es incorrecto'
            ], 400);
        }
        $rolId = (int)$datos['rol_id'];

        //Abrir conexion luego de verificar la entrada de datos
        $db = Conexion();

        //Generar casillero solo si el rol es 3, cliente
        $casillero = null;

        if ($rolId === 3) {
            $casillero = $generarCasillero($db);
            if (!$casillero) {
                $db->Close();
                return $respond($response, false, null, [
                    'codigo' => 'CASILLERO',
                    'mensaje' => 'No se pudo generar el casillero'
                ], 500);
            }
        }

        //Construir el arreglo a insertar
        $reg = [
            'nombre_usuario' => $datos['nombre_usuario'],
            'correo' => $datos['correo'],
            'password' => $datos['password'],
            'rol_id' => $rolId
        ];
        //Se agrega el casillero solo si el rol es cliente, sino no se hace y por defecto la bd lo deja null.
        if ($casillero !== null) {
            $reg['casillero'] = $casillero;
        }

        //Modificar en la base de datos
        $res = $db->autoExecute("usuarios", $reg, "INSERT");

        //Cerrar conexion
        $db->Close();

        //Verifica que la respuesta no este vacia
        if (!$res) {
            return $respond($response, false, null, [
                'codigo' => 'DB_ERROR',
                'mensaje' => 'No se pudo crear el usuario'
            ], 500);
        }

        return $respond($response, true, [
            'mensaje' => 'Usuario creado'
        ], null, 201);
    });


    //Actualizar Datos de Usuario
    $app->put('/actualizarUsuario', function (Request $request, Response $response) use ($respond) {

        $datos = $request->getQueryParams();

        //Definir el identificador obligatorio del usuario
        if (empty($datos['id_usuario'])) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Id de usuario incorrecto'
            ], 400);
        }
        $id = (int)$datos['id_usuario'];


        //Armar el arreglo con campos que vienen
        $reg = [];

        if (!empty($datos['nombre_usuario'])) $reg['nombre_usuario'] = $datos['nombre_usuario'];
        if (!empty($datos['correo'])) $reg['correo'] = $datos['correo'];
        if (!empty($datos['password'])) $reg['password'] = $datos['password'];
        if (!empty($datos['rol_id'])) $reg['rol_id'] = (int)$datos['rol_id'];


        //Validar al menos que haya 1 campo a actualizar
        if (count($reg) === 0) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'No hay ningun campo a actualizar'
            ], 400);
        }

        //Abrir conexion despues de construir y validar reg que es el arreglo de datos a actualizar
        $db = Conexion();

        //Ejecutar la actualizacion en la BD
        $res = $db->autoExecute("usuarios", $reg, "UPDATE", "id_usuario = $id");

        
        //Validar si la respuesta es correcta
        if(!$res) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'DB_ERROR',
                'mensaje' => 'No se pudieron actualizar los datos'
            ], 500);
        }

        //Responder y cerrar conexion
        $db->Close();
        return $respond($response, true, [
            'mensaje' => 'Datos actualizados'
        ], null, 200);
    });


    //Eliminar usuario
    $app->delete('/deleteUsuario/{id}', function (Request $request, Response $response, array $args) use ($respond){
        //Obtener id desde la url
        $id = (int) $args['id'];

        //Validar que el ID sea valido
        if ($id <= 0) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Numero de ID invalido'
            ], 400);
        }

        //Abrir la conexion despues de validar que el id sea valido
        $db = Conexion();

        //Verificar que el registro existe antes de borrar
        $user = $db->GetRow("SELECT id_usuario FROM usuarios WHERE id_usuario = $id");

        if (!$user) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'El usuario a borrar no existe'
            ], 400);
        }
        else {
            $sql = "DELETE FROM usuarios WHERE id_usuario = $id";
            $res = $db->Execute($sql);
        }

        //Validar si la respuesta es correcta
        if(!$res) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'DB_ERROR',
                'mensaje' => 'No se pudo eliminar el usuario'
            ], 500);
        }

        //Responder y cerrar conexion
        $db->Close();
        return $respond($response, true, [
            'mensaje' => 'Usuario borrado'
        ], null, 200);
    });


    //Obtener usuario
    $app->get('/getbyIdUsuario/{id}', function (Request $request, Response $response, array $args) use ($respond) {

        //Obtener id desde la url
        $id = (int) $args['id'];

        //Validar el id
        if($id <= 0) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'ID inválido'
            ], 400);
        }

        //Abrir conexion
        $db = Conexion();

        //Elegir el formato de la respuesta
        $db->SetFetchMode(ADODB_FETCH_ASSOC);

        //---------------------------------------------------------------------------------
        //Consulta dql, pendiente traer el numero de casillero
        $sql = "SELECT id_usuario, nombre_usuario, correo, rol_id, casillero FROM usuarios WHERE id_usuario = $id";

        //Devolver la fila del resultado
        $res = $db->GetRow($sql);

        //guardar la respuesta en response y darle formato json.
        if(!$res) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'NO_ENCONTRADO',
                'mensaje' => 'Usuario no encontrado'
            ], 404);
        }

        //Responder y cerrar conexion
        $db->Close();
        return $respond($response, true, $res, null, 200);
    });


    //Obtener usuarios
    $app->get('/getAllUsuarios', function (Request $request, Response $response) use ($respond) {
        //Abrir conexion con la DB
        $db = Conexion();

        //Elegir el formato de las repuestas devueltas
        $db->SetFetchMode(ADODB_FETCH_ASSOC);//Respuesta en arreglo asociativo
        $sql = "SELECT id_usuario, nombre_usuario, correo, rol_id, casillero FROM usuarios";

        //Obtener toda la tabla
        $res = $db -> GetAll($sql);

        if($res === false) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'DB_ERROR',
                'mensaje' => 'Usuarios no encontrados'
            ],500);
        }

        //Responder y cerrar conexion
        $db->Close();

        //Obtener respuesta en la variable response
        return $respond($response, true, $res, null, 200);
    });

    
    //Login
    $app->post('/login', function (Request $request, Response $response) use ($respond) {

        $data = $request->getQueryParams();

        $correo = $data['correo'];
        $password = $data['password'];

        if (empty($data['correo']) || empty($data['password'])) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Correo y contraseña son obligatorios'
            ], 400);
        }

        //Abrir la conexion luego de validar los datos de entrada
        $db = Conexion();

        //Buscar usuario
        $sql = "SELECT id_usuario, nombre_usuario, correo, rol_id, password, casillero FROM usuarios WHERE correo = ?";
        $usuario = $db->GetRow($sql, [$correo]);

        //Validar que el usuario existe
        if (!$usuario) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Usuario no encontrado'
            ], 400);
        }

        //Validar la contraseña
        if ($usuario['password'] != $password) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Credenciales inválidas'
            ], 400);
        }

        //Login exitoso
        $db->Close();
        return $respond($response, true, [
            "mensaje" => "Login Exitoso",
            "usuario" => [
                "id_usuario" => $usuario['id_usuario'],
                "nombre_usuario" => $usuario['nombre_usuario'],
                "correo" => $usuario['correo'],
                "rol_id" => $usuario['rol_id'],
                'casillero' => $usuario['casillero']
                ]
        ], null, 200); 
    });

    //Registro para los clientes
    $app->post('/registroCliente', function (Request $request, Response $response) use ($respond, $generarCasillero) {
        //Leer datos pendiente pasarlo a JSon (array) $request->getParsedBody();
        $data = $request->getQueryParams();

        //Validar los datos obligatorios
        if (empty($data['nombre_usuario']) || empty($data['correo']) || empty($data['password'])) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Campos obligatorios faltantes'
            ], 400);
        }

        //Validar formato del correo
        if (!filter_var($data['correo'], FILTER_VALIDATE_EMAIL )) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Correo inválido'
            ], 400);
        }

        //Luego de verificiones de datos de entrada abrir conexion
        $db = Conexion();

        //Verificar si el correo que se registra ya existe
        $existe = $db->GetRow("SELECT id_usuario FROM usuarios WHERE correo = ?", [$data['correo']]);

        //Si ya existe da error con codigo de duplicado
        if ($existe) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'DUPLICADO',
                'mensaje' => 'El correo ya está registrado'
            ], 409);
        }

        //Generar y guardar casillero
        $casillero = $generarCasillero($db);
        if (!$casillero) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'CASILLERO',
                'mensaje' => 'No se pudo crear el casillero'
            ], 500);
        }

        //Construir el registro del rol cliente, aun no hay una columna para casillero asi que no se incluye
        $reg = [
            'nombre_usuario' => $data['nombre_usuario'],
            'correo' => $data['correo'],
            'password' => $data['password'],
            'rol_id' => 3,
            'casillero' => $casillero
        ];

        //Insert de los datos a la tabla usuarios
        $res = $db->autoExecute("usuarios",$reg,'INSERT');
        
        //Cerrar conexion
        $db->Close();

        //Verificar si se logra registrar el cliente en la bd
        if (!$res) {
            return $respond($response, false, null, [
                'codigo' => 'DB_ERROR',
                'mensaje' => 'No se pudo registrar el cliente'
            ], 500);
        }

        //Respuesta de registro exitoso
        return $respond($response, true, [
            'mensaje' => 'Cliente registrado',
            'usuario' => $data['nombre_usuario'],
            'casillero' => $casillero
        ], null, 201);
    });

    $app->post('/recuperarPassword', function (Request $request, Response $response) use ($respond) {
        //Leer datos
        $data = $request->getQueryParams();

        //Validar que se introduce un correo
        if (empty($data['correo'])) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'El correo es obligatorio'
            ], 400);
        }

        //Validar formato correcto de correo
        if(!filter_var($data['correo'], FILTER_VALIDATE_EMAIL)) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Formato de correo inválido'
            ], 400);
        }

        //Abrir conexion
        $db = Conexion();

        //Verificar usuario
        $usuario = $db->GetRow("SELECT id_usuario FROM usuarios WHERE correo = ?", [$data['correo']]);

        //Respuesta de la verificacion de usuario
        if (!$usuario) {
            $db->Close();
            //Mensaje afirmativo por seguridad
            return $respond($response, true, [
            'mensaje' => 'Si el correo existe, se enviará una nueva contraseña'
            ], null, 200);
        }

        //Generar contraseña aleatoria de 8 caracteres
        $nuevaPass = substr(bin2hex(random_bytes(4)), 0, 8);

        //Guardar nueva contraseña
        $res = $db->autoExecute("usuarios", ['password' => $nuevaPass], "UPDATE", "id_usuario =" . (int)$usuario['id_usuario']);

        //Si guardar la contraseña falla
        if (!$res) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'DB_ERROR',
                'mensaje' => 'No se pudo actualizar la contraseña'
            ], 500);
        }

        // TODO: enviar correo real con nueva contraseña
        // mail($data['correo'], "Recuperación de contraseña", "Tu nueva contraseña es: $nuevaPass");


        //Respuesta de exito
        $db->Close();
        return $respond($response, true, [
            'mensaje' => 'Si el correo existe, se enviará una nueva contraseña'
        ], null, 200);
    });

    $app->get('/test', function (Request $request, Response $response) {
        $response->getBody()->write('API funcionando');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};

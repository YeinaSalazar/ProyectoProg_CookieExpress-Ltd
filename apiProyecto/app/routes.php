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


    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });


    //CRUD USUARIOS


    //Crear usuario solo para uso del admin
    $app->post('/crearUsuario', function (Request $request, Response $response) use ($respond) {
        //Abrir conexion
        $db = Conexion();

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
                'mensaje' => 'Campos obligatorios restantes'
            ], 400);
        }

        //Validar formato de email y rol (int)
        if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
            return $respond($response, false, null, [
                'codigo' => 'Validacion',
                'mensaje' => 'El formato del correo es incorrecto'
            ], 400);
        }
        $rolId = (int)$datos['rol_id'];

        //Construir el arreglo a insertar
        $reg = [
            'nombre_usuario' => $datos['nombre_usuario'],
            'correo' => $datos['correo'],
            'password' => $datos['password'],
            'rol_id' => $rolId
        ];


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
        $sql = "SELECT id_usuario, nombre_usuario, correo, rol_id FROM usuarios WHERE id_usuario = $id";

        //Devolver la fila del resultado
        $res = $db->GetRow($sql);

        //guardar la respuesta en response y darle formato json.
        if(!$res) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'BD_ERROR',
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
        $sql = "SELECT id_usuario, nombre_usuario, correo, rol_id FROM usuarios";

        //Obtener toda la tabla
        $res = $db -> GetAll($sql);

        if($res === false) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'BD_ERROR',
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

        //Abrir la conexion
        $db = Conexion();

        $data = $request->getQueryParams();

        $correo = $data['correo'];
        $password = $data['password'];

        if (empty($data['correo']) || empty($data['password'])) {
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'Correo y contraseña son obligatorios'
            ], 400);
        }

        $sql = "SELECT * FROM usuarios WHERE correo = ?";
        $usuario = $db->GetRow($sql, [$correo]);

        //Validar que el usuario existe
        if (!$usuario) {
            $db->Close();
            return $respond($response, false, null, [
                'codigo' => 'VALIDACION',
                'mensaje' => 'El usuario no existe'
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
                "rol_id" => $usuario['rol_id']
                ]
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

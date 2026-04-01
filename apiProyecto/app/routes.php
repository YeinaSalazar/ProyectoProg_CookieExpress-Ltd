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
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });


    //CRUD USUARIOS


    //Crear usuario
    $app->post('/crearUsuario', function (Request $request, Response $response) {
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
            $response->getBody()->write('false');
            return $response->withStatus(400);
        }

        //Validar formato de email y rol (int)
        if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
            $response->getBody()->write('false');
            return $response->withStatus(400);
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
        $response->getBody()->write(($res ? 'true' : 'false'));
        return $response;
    });


    //Actualizar Datos de usuario
    $app->put('/actualizarUsuario', function (Request $request, Response $response) {
        $db = Conexion();

        $datos = $request->getQueryParams();

        //Definir el identificador obligatorio del usuario
        if (empty($datos['id_usuario'])) {
            $response->getBody()->write('false');
            return $response->withStatus(400);
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
            $response->getBody()->write('false');
            return $response->withStatus(400);
        }

        //Ejecutar la actualizacion en la BD
        $res = $db->autoExecute("usuarios", $reg, "UPDATE", "id_usuario = $id");

        //Responder y cerrar conexion
        $db->Close();
        $response->getBody()->write($res ? 'true' : 'false');
        return $response;
    });


    //Eliminar usuario
    $app->delete('/deleteUsuario/{id}', function (Request $request, Response $response, array $args) {
        //Obtener id desde la url
        $id = (int) $args['id'];

        $db = Conexion();

        //Validar que el ID sea valido
        if ($id <= 0) {
            $response->getBody()->write('false');
            return $response->withStatus(400);
        }

        //Verificar que el registro existe antes de borrar
        $user = $db->GetRow("SELECT id_usuario FROM usuarios WHERE id_usuario = $id");

        if (!$user) {
            $response->getBody()->write('false');
            return $response->withStatus(400);
        }
        else {
            $sql = "DELETE FROM usuarios WHERE id_usuario = $id";
            $res = $db->Execute($sql);
        }

        $db->Close();

    
        $response->getBody()->write($res ? 'true' : 'false');
        return $response;
    });


    //Obtener usuario
    $app->get('/getbyIdUsuario/{id}', function (Request $request, Response $response, array $args) {

        //Obtener id desde la url
        $id = $args['id'];

        //Abrir conexion
        $db = Conexion();

        //Elegir el formato de la respuesta
        $db->SetFetchMode(ADODB_FETCH_ASSOC);

        //Consulta dql
        $sql = "SELECT nombre_usuario FROM usuarios WHERE id_usuario = $id";

        //Devolver la fila del resultado
        $res = $db->GetRow($sql);

        //Responder y cerrar conexion
        $db->Close();

        //guardar la respuesta en response y darle formato json.
        $response->getBody()->write(json_encode($res));
        return $response;
    });


    //Obtener usuarios
    $app->get('/getAllUsuarios', function (Request $request, Response $response) {
        //Abrir conexion con la DB
        $db = Conexion();

        //Elegir el formato de las repuestas devueltas
        $db->SetFetchMode(ADODB_FETCH_ASSOC);//Respuesta en arreglo asociativo
        $sql = "SELECT nombre_usuario FROM usuarios";

        //Obtener toda la tabla
        $res = $db -> GetAll($sql);

        //Responder y cerrar conexion
        $db->Close();

        //Obtener respuesta en la variable response
        $response->getBody()->write(json_encode($res));//Aqui se formatea la respuesta a json
        return $response;
    });

    
    //Login
    $app->post('/login', function (Request $request, Response $response) {

        $db = Conexion();

        $data = $request->getQueryParams();

        $correo = $data['correo'];
        $password = $data['password'];

        $sql = "SELECT * FROM usuarios WHERE correo = ?";
        $usuario = $db->GetRow($sql, [$correo]);

        //Validar que el usuario existe
        if (!$usuario) {
            $response->getBody()->write('false');
            return $response->withStatus(400);
        }

        //Validar la contraseña
        if ($usuario['password'] != $password) {
            $response->getBody()->write('false');
            return $response->withStatus(400);
        }

        //Login exitoso
        $response->getBody()->write(json_encode([
            "mensaje" => "Login Exitoso",
            "usuario" => [
                "id_usuario" => $usuario['id_usuario'],
                "nombre_usuario" => $usuario['nombre_usuario'],
                "correo" => $usuario['correo'],
                "rol_id" => $usuario['rol_id']
            ]
        ]));

        $db->Close();
        return $response;
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

<?php

declare(strict_types=1);
include "../public/conexion.php";

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
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
        $res = $db -> autoExecute("usuarios", $reg, "INSERT");

        //Cerrar conexion
        $db -> Close();
        $response -> getBody()->write(($res ? 'true' : 'false'));
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

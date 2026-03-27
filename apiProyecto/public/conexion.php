<?php
//Definicion de la funcion php
//que crea y devuelva una conexion a una base MySQL
//Usando la libreria ADOdb

//Cargamos la libreria ADOdb, dado que 
//la clase NewADOConnection esta aqui
include "../vendor/adodb/adodb-php/adodb.inc.php";


//Declaramos la funcion llamada conexion
//que devuelva la conexion
function Conexion()
{
    //Creamos el objeto conector y le pasamos el tipo de DB
    $conector = NewADOConnection("mysql");

    //Indicamos datos para ingresar a la DB

    //$host es donde vive la DB cual de momento es localhost
    $host = "localhost";

    //$user es el nombre del usuario que tiene permiso de entrar
    $user = "root";

    //$pass es la contraseña de usuario que tiene el permiso
    //de entrar, en este caso la DB no tiene pass
    $pass = "";

    //$bd es el nombre de la base de datos,
    //en este caso la DB se llama cookieexpress_ltda
    $bd = "cookieexpress_ltda";

    //Usamos el objeto conector para abrir la conexion
    //y le pasamos todos los datos.
    $conector->Connect($host, $user, $pass, $bd);

    //Finalmente devolvemos return con el conector
    //Siginifica que la funcion entrega la conexion
    //para que otras partes del programa puedan usarla
    return $conector;
}

<?php
require_once '../../model/Conexion.php';

$controller = 'acer';

// Todo esta lógica hará el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "../../controller/adm/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "../../controller/adm/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion (metodo)
    call_user_func( array( $controller, $accion ) );
}
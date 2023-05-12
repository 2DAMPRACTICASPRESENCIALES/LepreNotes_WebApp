<?php
session_start();
define('CONTROLLER_FOLDER', "controller/"); //Directorio donde definimos los controladores
define('DEFAULT_CONTROLLER', "initial"); //Controlador por defecto
define('DEFAULT_ACTION', "startPage"); //Accion por defecto

//Obtenemos el controlador. Si no por defecto
$controller = DEFAULT_CONTROLLER;
if (!empty($_GET['controller']))
  $controller = $_GET['controller'];
//Obtenemos la accion deseada. Si no por defecto
$action = DEFAULT_ACTION;
if (!empty($_GET['action']))
  $action = $_GET['action'];

//Formacion del fichero que contiene el controlador
$controller = CONTROLLER_FOLDER . $controller . '_controller.php';
//Si la variable controller es un fichero, lo requerimos

if (is_file($controller))
  require_once($controller);
else
  die("Error 404 Not found");

//Si action es una función, ejecutamos el script
if (is_callable($action))
  $action();
else
  die("Action do not existing 404 not found");
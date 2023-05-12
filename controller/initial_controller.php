<?php
require_once('./domain/Conecction.php'); //Clase conexion


function startPage()  // Web App start
{
  $conecction = new Conecction(); //Creamos un objeto conexion
  $conecction->getConection(); //Abrimos conexion

}


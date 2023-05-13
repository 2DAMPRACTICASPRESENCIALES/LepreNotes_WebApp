<?php
require_once('./domain/Conecction.php'); //Clase conexion


function startPage()  // Web App start
{
  $conecction = new Conecction(); //Creamos un objeto conexion
  $conecction->getConection(); //Abrimos conexion
  include('./view/header_view.php');
  require_once('./model/login_model.php');
  include('./view/login_view.php');
  include('./view/footer_view.php');
}

function listPage() {
  include('./view/header_view.php');
  require_once('./model/notes_model.php');
  require_once('./model/order_model.php');
  include('./view/listPage_view.php');
  include('./view/footer_view.php');
}


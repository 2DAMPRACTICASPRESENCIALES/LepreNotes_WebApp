<?php
require_once('./domain/Conecction.php'); //Clase conexion

function listUsers() {
  include('./view/header_view.php');
  require_once('./model/user_model.php');
  require_once('./model/notes_model.php');
  include('./view/listUser_view.php');
  include('./view/footer_view.php');
}
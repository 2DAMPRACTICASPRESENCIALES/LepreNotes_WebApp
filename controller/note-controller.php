<?php
require_once('./domain/Conecction.php'); //Clase conexion

function publishNote() {
  include('./view/header_view.php');
  require_once('./model/notes_model.php');
  include('./view/postNote_view.php');
  include('./view/footer_view.php');
}

function deleteMyNote() {
  require_once("./model/notes_model.php");
  $id = $_GET['id'];
  deleteNote($id);
}
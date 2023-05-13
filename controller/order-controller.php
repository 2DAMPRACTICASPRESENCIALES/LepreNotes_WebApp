<?php
require_once('./domain/Conecction.php'); //Clase conexion

function payOrder() {
    session_start();
    $user_id = $_SESSION['id'];
    require_once("./model/order_model.php");
    $id = $_GET['id'];
    addOrder($user_id, $id);
}
<?php
require_once('./domain/Conecction.php'); //Clase conexion

function payOrder() {
    require_once("./model/order_model.php");
    $id = $_REQUEST['id'];
    addOrder(1, $id);
}
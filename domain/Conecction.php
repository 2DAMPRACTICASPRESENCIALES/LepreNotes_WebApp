<?php
class Conecction
{

    function __construct()
    {
    }
    //Funcion para conectar
    function getConection()
    {
        // Con un array de opciones
        try {
            $dbname = "leprenotes"; //Nombre de la Base de Datos
            $user = "root"; // Usuario
            $password = "6dbxxhvzywkgc9z"; // Contraseña
            $server = 'localhost'; // Dirección servidor
            $dbh = "";
            $dsn = "mysql:host=$server;dbname=$dbname;charset=UTF8";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        
        }
        return $dbh;
    }
}
?>
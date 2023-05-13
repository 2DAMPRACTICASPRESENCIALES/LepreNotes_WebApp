<?php
    function getUsers()
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare('SELECT * FROM users');
            
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        
        return $result;
    }

    function addUser($username, $email, $passwrd)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $passwrd, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    
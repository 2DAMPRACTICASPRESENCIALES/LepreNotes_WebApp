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

        $stmt = $dbh->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":passwrd", $passwrd, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        } else {
          $sec = 3; //Segundos aparece mensaje de login no valido
          $message = 'LOGIN INVALIDO';
          include('./view/error_header_view.php');
          session_write_close(); //Borramos sesiones anteriores
          header("Refresh: $sec; url=index.php"); //Despues de los segundos establecidos nos reinicia la página de Login 
        }
      
    }

    
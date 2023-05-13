<?php
    function checkLogin($email, $passwrd)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos

        $stmt = $dbh->prepare("SELECT * FROM users WHERE email=:email AND password=:passwrd");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":passwrd", $passwrd, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row = $stmt->rowCount(); //Contamos numero de filas que devuelve la consulta
        if ($row > 0) {
          //Si el número de filas >0 el usuario existe    
          foreach ($resultado as $user) {
              session_start(); //Iniciamos sesion
              $_SESSION['username'] = $user['username']; //Recuperamos el nombre de usuario
              $_SESSION['id'] = $user['id']; //Recuperamos Id de usuario
              $_SESSION['email'] = $user['email'];

              echo "<div class='alert alert-success' style='margin-top:15px' role='alert'> ¡Welcome! </div>";
              header( "refresh:1;url=index.php?controller=initial&action=listPage");//Enviamos a la página para usuarios registrados
            }
        } else {
          session_write_close(); //Borramos sesiones anteriores
          echo "<div class='mt-2 alert alert-danger' style='margin-top:15px' role='alert'> The fields can't be empty! </div>";
        }
      
    }
?>
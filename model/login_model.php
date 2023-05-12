<?php
function checkLogin()
{
  $conection = new Conecction(); //Objeto conexion
  $dbh = $conection->getConection(); //Conectamos a la base de datos

  if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $passwrd = $_POST['password'];

    $stmt = $dbh->prepare("SELECT email, password, username  FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $stmt->rowCount(); //Contamos numero de filas que devuelve la consulta
    if ($row > 0) {
      //Si el número de filas >0 el usuario existe    
      foreach ($resultado as $user) {
        $pass = $user['user_password'];
        //if (password_verify($password, $pass)) {
          //comprobamos que la contraseña descifrada coincida
          session_start(); //Iniciamos sesion
          $username = $user['username']; //Recuperamos el nombre de usuario
          $userid = $user['id']; //Recuperamos Id de usuario
          $usermail = $user['mail'];
          $_SESSION['username'] = $username; //Asignamos a la sesion del usuario el campo de nombre
          $_SESSION['id'] = $userid; //Asignamos a la sesion del usuario el campo de id
          setcookie('leprenotes', '', 86400); //Establecemos una cokkie de 1 dia
          header('location: indexStart.php'); //Enviamos a la página para usuarios registrados
        }

      

    } else {
      $sec = 3; //Segundos aparece mensaje de login no valido
      $message = 'LOGIN INVALIDO';
      include('./view/error_header_view.php');
      session_write_close(); //Borramos sesiones anteriores
      header("Refresh: $sec; url=index.php"); //Despues de los segundos establecidos nos reinicia la página de Login 
    }
  }
}
?>
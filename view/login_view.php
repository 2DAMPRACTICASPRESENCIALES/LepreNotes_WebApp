<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-4">
          <div class="card p-4">
            <h3 class="text-center mb-4">Sign in</h3>
            <form method="POST" action="" class="form-login">

                <div class="form-group">
                  <label for="name">Email </label>
                  <input type="text" name="email" id="email" value="" class="form-control">
                  <div class="errors"></div>
                </div>

                <div class="form-group">
                  <label for="password">Password </label>
                  <input type="password" name="password" id="password" class="form-control">
                  <div class="errors"></div>
                </div>

                <input type="submit" class="btn btn-primary" value="Log in"><br>
                <a class="btn btn-secondary" style='margin-top:15px;' href="index.php?controller=initial&action=registerUser">Register</a>

                <?php
                  if (isset($_POST['email'], $_POST['password'])) {
                    $email = $_POST['email'];
                    $passwrd = $_POST['password'];
                    checkLogin($email, $passwrd);
                  }
                ?>
          </div>
        </div>
      </div>
    </div>
  </body>
  <style>
    body {
      background-color: #f6f6f6;
      font-family: 'Roboto', sans-serif;
      display: flex;
      width: 100vw;
      height: 100vh;
      justify-content: center;
      align-items: center;
      background-image: url(./resources/img/logo-leprenotes-2.png);
      background-repeat: repeat;
    }
  
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  
    .btn-primary {
      width: 100%;
      background-color: #ffc107;
      border-color: #ffc107;
    }
  
    .btn-primary:hover {
      background-color: #e0a800;
      border-color: #e0a800;
    }

    .btn-secondary {
      width: 100%;
      background-color: #ecab0f;
      border-color: #ecab0f;
    }
  
    .btn-secondary:hover {
      background-color: #ecab0f;
      border-color: #ecab0f;
    }
  
    label {
      font-weight: 500;
    }
  
    input[type="email"],
    input[type="password"] {
      background-color: #f5f5f5;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 10px;
      padding: 10px;
      width: 100%;
    }

    input[type="email"]:hover,
    input[type="password"]:hover {
        border: 1px solid #02198b;
    }
  
    input[type="email"]:focus,
    input[type="password"]:focus {
      outline: none;
      box-shadow: none;
      border: none;
    }
  </style>
      
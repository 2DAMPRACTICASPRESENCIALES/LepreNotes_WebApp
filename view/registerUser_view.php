<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-4">
          <div class="card p-4">
            <h3 class="text-center mb-4">Sign in</h3>
            <form method="POST" action="" class="form-login">

                <div class="form-group">
                  <label for="name">Username </label>
                  <input type="text" name="username" id="username" value="" class="form-control">
                  <div class="errors"></div>
                </div>

                <div class="form-group">
                  <label for="email">Email </label>
                  <input type="email" name="email" id="email" class="form-control">
                  <div class="errors"></div>
                </div>

                <div class="form-group">
                  <label for="password">Password </label>
                  <input type="password" name="password" id="password" class="form-control">
                  <div class="errors"></div>
                </div>

                <input type="submit" class="btn btn-primary" value="Log in"><br>

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
      background-image: url(../logo-leprenotes-2.jpg);
      background-repeat: repeat;
      opacity: 0.7;
    }
  
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  
    .btn-primary {
      background-color: #ffc107;
      border-color: #ffc107;
    }
  
    .btn-primary:hover {
      background-color: #e0a800;
      border-color: #e0a800;
    }
  
    label {
      font-weight: 500;
    }
  
    input[type="username"],
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
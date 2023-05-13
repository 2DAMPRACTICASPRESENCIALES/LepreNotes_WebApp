<?php
    session_start();
    $user_id = $_SESSION['id'];
    if($user_id == null || $user_id == '') {
        session_destroy();
        header('Location:index.php');
    }
?>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LepreNotes</a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?controller=initial&action=listPage">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=user&action=listUsers">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?controller=note&action=publishNote">Publish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=initial&action=signout">Switch account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="padding:10px">
    <form method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-3 fw-normal">Publish your notes!</h1>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input class="form-control" id="exampleFormControlInput1" name="title"
                placeholder="Write your title here">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subject</label>
            <input class="form-control" id="exampleFormControlInput1" name="subject"
                placeholder="Write the subject here">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">School Year</label>
            <input class="form-control" id="exampleFormControlInput1" name="school_year"
                placeholder="Write your school year here">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input class="form-control" id="exampleFormControlInput1" name="price"
                placeholder="Write the price here">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">File upload</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="pdfContent">
        </div>
        <button class="w-20 mt-2 mb-2 btn btn-lg btn-primary" type="submit" name="submit">Publish</button>
    </form>

    <?php
        if (isset($_POST['submit'], $_POST['title'], $_POST['subject'], $_POST['school_year'], $_POST['price']) &&  $_FILES['pdfContent']) {
            $title = $_POST['title'];
            $subject = $_POST['subject'];
            $school_year = $_POST['school_year'];
            $price = $_POST['price'];
            $pdf = $_FILES["pdfContent"];
            $name = $pdf['name'];
            $pdfContent = $pdf["tmp_name"];

            if($title != '' && $subject != '' && $school_year != '' && $price != '' && $_FILES["pdfContent"]["type"] == "application/pdf") {
                 
                addNote($title, $subject, $school_year, $price, $name, $user_id);

                $carpeta_destino = './resources/pdfs/';
                $ruta_archivo_destino = $carpeta_destino . $name;
                move_uploaded_file($pdfContent, $ruta_archivo_destino);

                echo "<div class='alert alert-success' role='alert'> ¡Your notes has been published! </div>";
            } else {
                echo "<div class='mt-2 alert alert-danger' role='alert'> The fields can't be empty! </div>";
            }
        }
    ?>
</main>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="./resources/js/offcanvas-navbar.js"></script>

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
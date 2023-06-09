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
                    <a class="nav-link active" aria-current="page" href="index.php?controller=initial&action=listPage">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=user&action=listUsers">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=note&action=publishNote">Publish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=initial&action=signout">Switch account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
        <img class="me-3" src="./resources/img/logo-leprenotes.png" alt="" width="48" height="38">
        <div class="lh-1">
            <h1 class="h6 mb-0 mr-20 text-white lh-1">LepreNotes</h1>
            <small>Learning has never been so easy</small>
        </div>
    </div>
    <div class=-my-3 p-3 bg-body rounded shadow-sm->
        <h6 class='border-bottom pb-2 mb-0'>Note List</h6>
    <?php
        $notes = getNotes();
        foreach($notes as $note) {
            
            echo "
                    <div class='d-flex text-body-secondary pt-3' style='justify-content: space-between;'>
                        <svg class='bd-placeholder-img flex-shrink-0 me-2 rounded' style='margin:20px' width='32' height='32' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: 32x32' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%' fill='#007bff'/><text x='50%' y='50%' fill='#007bff' dy='.3em'>32x32</text></svg>
                        <p class='pb-3 mb-0 small lh-sm border-bottom' style='justify-content:center;'>
                        <strong class='d-block text-gray-dark ml-15' style='font-size:18px'>" . strtoupper($note['subject']) ."</strong>"
                            . $note['title'] .
                        "</p>
                        <div style='justify-content: space-between;'>
                            <p class='pb-3 mb-0 small lh-sm border-bottom'>
                            <strong class='d-block text-gray-dark ml-15' style='font-size:24px'>" . $note['price'] ."€</strong>
                            </p>
                        </div>
                    </div>
                    <div class='d-flex text-body-secondary pt-3' style='justify-content: center; align-items:center'>";
                        if($note['user_id'] != $user_id && !getOrdersByUserId($user_id, $note['id'])) {
                            echo "<button class='m-1 btn btn-outline-success' onclick='payOrder(" . $note['id'] . ")'> Pay it </button>";
                        }
                        if(getOrdersByUserId($user_id, $note['id'])) {
                            echo "<button class='m-1 btn btn-outline-secondary' onclick='downloadPDF(&quot;" . $note['content'] . "&quot;)'> Download </button>";
                        }
                        if($note['user_id'] == $user_id) {
                            echo "<button class='m-1 btn btn-outline-danger' onclick='deleteNote(" . $note['id'] . ")'> Delete </button>";
                        }
              echo "</div>
                    <h6 class='border-bottom pb-2 mb-0'></h6>";
        }
    ?>
    </div>
    
</main>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="./resources/js/offcanvas-navbar.js"></script>

<script>
    function payOrder(noteId) {
        fetch('index.php?controller=order&action=payOrder&id=' + noteId).then(() => location.reload());
    }

    function deleteNote(noteId) {
        fetch('index.php?controller=note&action=deleteMyNote&id=' + noteId).then(() => location.reload());
    }

    function downloadPDF(content) {
        var ruta = './resources/pdfs/' + content;
        var nombre_archivo = content;
        var url_descarga = ruta + '?nombre=' + nombre_archivo;
        window.open(url_descarga);
    }
</script>
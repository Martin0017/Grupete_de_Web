<?php 
require $_SERVER['DOCUMENT_ROOT'].'/mundialazo/server/controllers/MongoController.php';
?>

<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center" id="template-bg-3">

    <div class="card mb-5 p-5 bg-dark bg-gradient text-white col-md-4">
        <div class="card-header text-center">
            <h3>Iniciar sesión </h3>
        </div>
        <div class="card-body mt-3">
            <form name="login" action="" method="post">
                <div class="input-group form-group mt-3">
                    <input type="text" class="form-control text-center p-3" placeholder="Usuario" name="username">
                </div>
                <div class="input-group form-group mt-3">
                    <input type="password" class="form-control text-center p-3" placeholder="Contraseña"
                        name="password">
                </div>
                <div class="text-center">
                    <input type="submit" value="Acceder" class="btn btn-primary mt-3 w-100 p-2" name="login-btn">
                </div>
            </form>
            <p class="text-center text-muted mt-5 mb-0">No tiene una cuenta?, Registrese! <a href="../pages/register.php"
                                        class="fw-bold"><u>Registrase</u></a></p>
        </div>
    </div>

</div>

<?php

    if(isset($_POST['login-btn'])){
        $user = $_POST['username'];
        $password = $_POST['password'];
        $userdb = MongoController::login($user,$password);
        var_dump($userdb);
        if($userdb == NULL){
            echo '<div class="alert alert-warning alert-dismissible fade show fixed-top" role="alert">' .
            '<strong>' . 'Error!' . '</strong>' . ' Usuario no registrado'.
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' . '</button>' .
           '</div>';
        }elseif ($user == $userdb->user && $password == $userdb->password){
            if( $userdb->active == true){
                $_SESSION["newsession"]='true';
                echo '<script type="text/JavaScript">' . 'window.location.replace("/mundialazo/client/pages/repository_view.php")' . '</script>';
            }else{
              echo '<div class="alert alert-warning alert-dismissible fade show fixed-top" role="alert">' .
                '<strong>' . 'Error!' . '</strong>' . ' Usuario no activado '.
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' . '</button>' .
               '</div>';
            }
        }
        }

?>

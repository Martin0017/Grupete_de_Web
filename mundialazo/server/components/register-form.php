<?php 
require $_SERVER['DOCUMENT_ROOT'].'/mundialazo/server/controllers/MongoController.php';
?>

<section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Crea una cuenta</h2>

                            <form action='' method="POST">

                                <div class="form-outline mb-4">
                                    <input type="text" name="user" id="form3Example1cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example1cg">Usuario</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" name="mail" id="form3Example3cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example3cg">Correo</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cg">Contraseña</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="r_password" id="form3Example4cdg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cdg">Repita la contraseña</label>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <label class="form-check-label" for="form2Example3g">
                                        Normas de registro <button name="terms-of-service" class="text-body"><u>Terminos</u></button>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button name="register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Registrarse</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Tiene ya una cuenta? <a href="../pages/login.php"
                                        class="fw-bold text-body"><u>Inicie Sesión</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 

if(isset($_POST['register'])) {

    $password = $_POST['password'];
    $r_password = $_POST['r_password'];

    if( $password == $r_password ){

    $user = $_POST['user'];
    $mail = $_POST['mail'];
    MongoController::create_user($user,$mail,$password);
    echo '<div class="alert alert-success d-flex align-items-center fade show fixed-top" role="alert">'
     . '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">' 
     . '<use xlink:href="#check-circle-fill"/>' . '</svg>' .
  '<strong>' . 'Hecho!' . '</strong>' . ' Inicie sesión'.
  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' . '</button>' .
 '</div>';
    }else{
        echo '<div class="alert alert-warning alert-dismissible fade show fixed-top" role="alert">' .
  '<strong>' . 'Error!' . '</strong>' . ' Las contraseñas no son iguales '.
  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' . '</button>' .
 '</div>';
    }
  }


if(isset($_POST['terms-of-service'])) {
    echo '<div class="alert alert-warning alert-dismissible fade show fixed-top" role="alert">' .
  '<strong>' . 'Hola!' . '</strong>' . '<br>' . '1. Al crear una cuenta un administrador lo podria banear por comportamiento inadecuado' .
  '<br>' . '2. Un administrador u otro usuario podria modificar o eliminar sus aportaciones si lo cree conveniente' .
  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' . '</button>' .
 '</div>';
  }

?>


    <footer class="bg-dark text-center text-white position-relative fixed-bottom">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Form -->
      <section class="">
        <form action="" method="POST">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Finalizar sesión</strong>
              </p>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4" name='button-name'>
                Cerrar
              </button>

            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>

        <?php 
        
        if(isset($_POST['button-name'])) {
          $_SESSION["newsession"]='false';
          echo '<script type="text/JavaScript">' . 'window.location.replace("/mundialazo/client/pages/login.php")' . '</script>';
          }
        
        ?>
      </section>
      <!-- Section: Form -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Webmasters:
      <a class="text-white" href="https://github.com/Martin0017/AWD_Team_Cascade_Proyect.git">Grupete de Web</a>
    </div>
    <!-- Copyright -->
  </footer>
    

  <!-- End of .container -->
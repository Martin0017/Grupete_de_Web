<br><br><br>

<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center" id="template-bg-3">
    <div class="card mb-8 p-8card text-white bg-dark border border-success rounded-start border-5 col-md-7">
        <br>
        <div class="card-header text-center fs-2"> Añadir al repositorio</div>
        <div class="card-body">
            <form class="form-put text-center fs-5 me-5" action="" method="POST">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre común: </label>
                    <div class="col-sm-10">
                        <input type="text" name="vulgar" class="form-control" id="inputEmail3"
                            placeholder="Nombre común">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre cientifico: </label>
                    <div class="col-sm-10">
                        <input type="text" name="scientific" class="form-control" id="inputEmail3"
                            placeholder="Nombre cientifico">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción: </label>
                    <div class="col-sm-10">
                        <textarea type="text" name="description" class="form-control" rows="3" id="inputEmail3"
                            placeholder="Descripción"> </textarea>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de captura: </label>
                    <div class="col-sm-10">
                        <input type="text" name="date" class="form-control" id="inputEmail3"
                            placeholder="Fecha de captura">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo: </label>
                    <div class="col-sm-10">
                        <input type="text" name="type" class="form-control" id="inputEmail3" placeholder="Tipo">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Link de la imagen</label>
                    <div class="col-sm-10">
                        <input type="link" name="link" class="form-control" id="inputPassword3"
                            placeholder="Link de la imagen">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-sm-3">
                        <button type="submit" name="button-save" class="btn btn-primary">Guardar</button>
                    </div>

                    <div class="col-sm-3">
                        <button type="submit" name="button-delete" class="btn btn-primary">Borrar</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
<br>
<?php 
        
        if(isset($_POST['button-save'])) {

          $vulgar = $_POST['vulgar'];
          $scientific = $_POST['scientific'];
          $description = $_POST['description'];
          $link = $_POST['link'];
          $date = $_POST['date'];
          $type = $_POST['type'];

          MongoController::set_data_repository($vulgar,$scientific,$description,$link,$date,$type);
          }
        
          if(isset($_POST['button-delete'])) {

            $link = $_POST['link'];
  
            MongoController::delete_data_repository($link);
            }


        ?>
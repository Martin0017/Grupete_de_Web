<?php
require $_SERVER['DOCUMENT_ROOT'] . '/mundialazo/server/controllers/MongoController.php';
?>

<br /> <br /> <br />
<div class="align-content-sm-center">
    <form class="d-flex" action="" method="POST">
        <select class="form-select" name='team-a'>
            <option selected>Qatar</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Senegal">Senegal</option>
            <option value="Paises Bajos">Paises Bajos</option>
            <option value="Inglaterra">Inglaterra</option>
            <option value="Iran">Iran</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Gales">Gales</option>
            <option value="Argentina">Argentina</option>
            <option value="Arabia Saudita">Arabia Saudita</option>
            <option value="Mexico">Mexico</option>
            <option value="Polonia">Polonia</option>
            <option value="Francia">Francia</option>
            <option value="Australia">Australia</option>
            <option value="Dinamarca">Dinamarca</option>
            <option value="Tunez">Tunez</option>
            <option value="España">España</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Alemania">Alemania</option>
            <option value="Japon">Japon</option>
            <option value="Belgica">Belgica</option>
            <option value="Canada">Canada</option>
            <option value="Belgica">Belgica</option>
            <option value="Marruecos">Marruecos</option>
            <option value="Croacia">Croacia</option>
            <option value="Brazil">Brazil</option>
            <option value="Serbia">Serbia</option>
            <option value="Suiza">Suiza</option>
            <option value="Camerun">Camerun</option>
            <option value="Portugal">Portugal</option>
            <option value="Ghana">Ghana</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Corea del Sur">Corea del Sur</option>
        </select>

        <input class="form-control me-2" name="score-a" type="search" placeholder="Marcador A" aria-label="Search">
        <input class="form-control me-2" name="score-b" type="search" placeholder="Marcador B" aria-label="Search">
        <select class="form-select" name='team-b'>
            <option selected>Qatar</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Senegal">Senegal</option>
            <option value="Paises Bajos">Paises Bajos</option>
            <option value="Inglaterra">Inglaterra</option>
            <option value="Iran">Iran</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Gales">Gales</option>
            <option value="Argentina">Argentina</option>
            <option value="Arabia Saudita">Arabia Saudita</option>
            <option value="Mexico">Mexico</option>
            <option value="Polonia">Polonia</option>
            <option value="Francia">Francia</option>
            <option value="Australia">Australia</option>
            <option value="Dinamarca">Dinamarca</option>
            <option value="Tunez">Tunez</option>
            <option value="España">España</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Alemania">Alemania</option>
            <option value="Japon">Japon</option>
            <option value="Belgica">Belgica</option>
            <option value="Canada">Canada</option>
            <option value="Belgica">Belgica</option>
            <option value="Marruecos">Marruecos</option>
            <option value="Croacia">Croacia</option>
            <option value="Brazil">Brazil</option>
            <option value="Serbia">Serbia</option>
            <option value="Suiza">Suiza</option>
            <option value="Camerun">Camerun</option>
            <option value="Portugal">Portugal</option>
            <option value="Ghana">Ghana</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Corea del Sur">Corea del Sur</option>
        </select>

        <button class="btn btn-outline-success" name="btn-s-c" type="submit">Añadir</button>
        <button class="btn btn-outline-success" name="btn-s-v" type="submit">Buscar </button>
        <button class="btn btn-outline-success" name="btn-all" type="submit">Buscar todos</button>
        <button class="btn btn-outline-success" name="btn-s-a" type="submit">Actualizar </button>
        <button class="btn btn-outline-success" name="btn-s-e" type="submit">Eliminar </button>
    </form>
</div>



<?php

if (isset($_POST['btn-s-c'])) {
    $teama = $_POST['team-a'];
    $teamb = $_POST['team-b'];
    $scorea = $_POST['score-a'];
    $scoreb = $_POST['score-b'];
    $flaga = MongoController::search_flag($teama);
    $flagb = MongoController::search_flag($teamb);
    ob_end_clean();
    MongoController::set_data_repository($teama, $teamb, $scorea, $scoreb, $flaga, $flagb);

} elseif (isset($_POST['btn-s-v'])) {

    $teama = $_POST['team-a'];
    $data_repository = MongoController::get_match('team_a', $teama);
    $data_repository2 = MongoController::get_match('team_b', $teama);

    run_data($data_repository);
    run_data($data_repository2);

} elseif (isset($_POST['btn-all'])) {
    $data_repository = MongoController::get_all_matchs();
    run_data($data_repository);

} elseif (isset($_POST['btn-s-a'])) {
    $teama = $_POST['team-a'];
    $teamb = $_POST['team-b'];
    $scorea = $_POST['score-a'];
    $scoreb = $_POST['score-b'];
    MongoController::uptade_match($teama,$teamb,$scorea,$scoreb);
    $data_repository = MongoController::get_all_matchs();
    run_data($data_repository);

} elseif (isset($_POST['btn-s-e'])) {
    $teama = $_POST['team-a'];
    $teamb = $_POST['team-b'];
    MongoController::delete_match($teama,$teamb);
    $data_repository = MongoController::get_all_matchs();
    run_data($data_repository);
}else{
    $data_repository = MongoController::get_all_matchs();
    run_data($data_repository);
}

function run_data($data_repository)
{
    ob_start();

    foreach ($data_repository as $data) {
        echo '<table class="table">' .
        '<thead class="thead-dark">' .
        '<tr>' .
        '<th scope="col">' . 'Bandera 1' . '</th>' .
        '<th scope="col">' . 'Equipo 1' . '</th>' .
        '<th scope="col">' . 'Goles 1' . '</th>' .
        '<th scope="col">' . 'vs' . '</th>' .
        '<th scope="col">' . 'Goles 2' . '</th>' .
        '<th scope="col">' . 'Equipo 2' . '</th>' .
        '<th scope="col">' . 'Bandera 2' . '</th>' .
        '</tr>' .
        '</thead>' .
        '<tbody>' .
        '<tr>' .
        '<th scope="col">' . '<img src=' . $data->flag_a . 'width="100" height="100"/>' . '</th>' .
        '<th scope="col">' . $data->team_a . '</th>' .
        '<th scope="col">' . $data->score_a . '</th>' .
        '<th scope="col">' . 'vs' . '</th>' .
        '<th scope="col">' . $data->score_b . '</th>' .
        '<th scope="col">' . $data->team_b . '</th>' .
        '<th scope="col">' . '<img src=' . $data->flag_b . 'width="100" height="100"/>' . '</th>' .
            '</tr>' .
            '</tbody>' .
            '</table>';
    }
}
?>
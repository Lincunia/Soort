<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


$link = mysqli_connect(
    'localhost',
    'root',
    '',
    'great_brother'
    ) or die('Esto no funciona, conoce los detalles de esto: '.mysqli_error($mysqli));
function input_queries($link, $sql){
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo $sql;
        die("Petición fallida, posibles motivos:
	    <ol>
		<li> El usuario ya existe </li>
		<li> Error en el codigo interno</li>
	    </ol>
	    ".mysqli_error($link));
    }
}
function prepare_data($data, $link) {
    return mysqli_real_escape_string($link, stripslashes(htmlspecialchars($data)));
}
?>
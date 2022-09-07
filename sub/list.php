<?php
include('../includes/connection.php');
function is_session_started() {
    if ( php_sapi_name() !== 'cli' ) {
	if ( version_compare(phpversion(), '5.4.0', '>=') ) {
	    return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
	} else {
	    return session_id() === '' ? FALSE : TRUE;
	}
    }
    return FALSE;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"></link>
    <link rel="shortcut icon" href="../media/img/logo.png" type="image/x-icon">

    <title>List - soort</title>
</head>
<body style="background-color: #f9e0ff">
<?php
if ( is_session_started() === FALSE ){
    header('Location: ../index.php');
}
else{
?>
    <header>
	<h1>Menú</h1>
	Bienvenido, <?= $_SESSION['result']['name']; ?><br>
	con identificación <?= $_SESSION['result']['id']; ?>
    </header>
    <div class="basicCon">
	<section>
	    <form method="post" class="menu">
<?php
    include('../crud/read.php');
?>
	    </form>
	</section>
	<aside>
<?php
    if(isset($_POST['logOut'])){
	session_destroy();
	header('Location: ../index.php');
    }
?>
	    <div class="advice" style="background-color: #f2aabd;">
		<h2>Lo que integrar en la lista de compras:</h2>
		<ol>
<?php
    $prod_aux=array();
    for($i=2; $i<count($prod); $i+=3){
	if(isset($_POST[$prod[$i]])){
	    echo "<li>".$prod[$i-2]."</li>";
	    $prod_aux+=array($prod[$i-2]);	    
	}
    }
    print_r($prod_aux);
?>
		</ol>
		Total a pagar: $45000
		<div style="width: 20px"><a href="./egg.html"></a></div>
	    </div>
	    <div style="background-color: #f0e3ad">
		<form action="" method="POST">
		    <input type="submit" name="list_of_it" value="Terminar">
		    <button><a href="./modify.php" style="text-decoration: none">Cambios de cuenta</a></button>
<!--
		<button><a href="../index.php">Cancelar</a></button>
-->
		    <input type="submit" name="logOut" value="Cerrar sesión">
		</form>
	    </div>
	</aside>
    </div>
<?php } ?>
</body>
</html>

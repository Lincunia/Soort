<!DOCTYPE html>
<html lang="es">
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="shortcut icon" href="./css/mamadisimo.png" type="image/x-icon">
	<title>Food Control - Main</title>
    </head>
    <body style="background-image: url(./css/matrix.PNG); background-size: 100%; text-align: center;" background="./css/matrix.PNG">
<?php
ob_start();
include('./php/connection.php');
$_SESSION['property']='display: flex';
?>
	<header style="background-color: #ffa6c5;">
	    <img src="./css/mamadisimo.png" style="float: left; width: 7.5%;  margin: 10px;">
	    <h1>Food Control</h1>
	</header>
	<!--=============================
	CAJITAS
	==============================-->
<?php if(isset($_POST['sign_in'])){ ?>
	<div class="modal-container" style="<?= $_SESSION['property'] ?>">
	    <div class="modal" style="background-color: #fcff9e;">
		<form action="./php/crud/sign_in.php" method="POST">
		    <h1>Registro para los estudiantes</h1>
		    <input type="number" name="id" placeholder="Número de identidad">
		    <input type="text" name="name" placeholder="Nombre de estudiante">
		    <input type="email" name="email" placeholder="Correo electrónico del acudiente">
		    <input type="password" name="pass_s" placeholder="Contraseña del estudiante">
		    <input type="password" name="pass_p" placeholder="Contraseña del acudiente">

		    <button type="submit" name="btn_acc_modl">Insertar</button>
		    <button type="submit" name="btn_can_modl">Cancelar</button>
		</form>
	    </div>
	</div>
<?php } if(isset($_POST['sign_up_s'])){ ?>
	<div class="modal-container" style="<?= $_SESSION['property'] ?>">
	    <div class="modal" style="background-color: #fcff9e;">
		<form action="./php/credential/log_in.php" method="POST">
		    <h1>Ingreso de los estudiantes</h1>
		    <input type="number" name="students_id" placeholder="Número de identidad">
		    <input type="text" name="students_name" placeholder="Nombre del estudiante">
		    <input type="password" name="students_pass" placeholder="Contraseña">

		    <button type="submit" name="students_log_in">Ingresar</button>
		    <button type="submit" name="btn_can_modl_l">Cancelar</button>
		</form>
	    </div>
	</div>
<?php } if(isset($_POST['sign_up_p'])){ ?>
	<div class="modal-container" style="<?= $_SESSION['property'] ?>">
	    <div class="modal" style="background-color: #fcff9e;">
		<form action="./php/credential/log_in.php" method="POST">
		    <h1>Ingreso de los padres</h1>
		    <input type="number" name="parents_id" placeholder="Número de identidad">
		    <input type="email" name="parents_email" placeholder="Correo Electrónico">
		    <input type="password" name="parents_pass" placeholder="Contraseña">

		    <button type="submit" name="parents_log_in">Ingresar</button>
		    <button type="submit" name="btn_can_modl_l">Cancelar</button>
		</form>
	    </div>
	</div>
<?php } ?>
	<!--=============================
	CUERPESITO
	==============================-->
	<div style="background-color: #ffc767; text-align: center; width: 60%; display: block; margin-left: auto; margin-right: auto; width: 50%;">
	    <img src="./css/loguito.png" style="display: block; margin-left: auto; margin-right: auto; width: 50%;"><br>
	    Si a tus hijos quieres cuidar, un buen control debes aplicar. Con esta app podrás conocer el consumo diario de tus escuincles y saber qué medidas tomar. Porque como bien lo sabes, hay que tener un control en todo lo que se haga… todo es bueno, pero en cierta medida
	    <h1>¡Por los Enanoides!</h1>
	    <article style="background-color: #e7f797;">
<?php if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    session_unset();
}?>
	    </article>
	</div>
	<form method="POST">
	    <button type="submit" class="exce_enter" name="sign_up_s">Acceso del estudiante</button><br>
	    <button type="submit" class="exce_enter" name="sign_up_p">Acceso del acudiente</button><br>
	    <button type="submit" class="exce_enter" name="sign_in">Registrar estudiantes y padres</button><br>
	</form>
    </body>
</html>


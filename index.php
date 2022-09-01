<?php
include('includes/connection.php');
$_SESSION['displayed']='display: flex';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css"></link>
    <link rel="shortcut icon" href="./media/img/logo.png" type="image/x-icon">

    <title>Main - soort</title>
</head>
<body style="background-color: #c3d0e6">
    <header style="background-color: #ddc3e6">
	<h1>Soort</h1>
    </header>
<!--=============================
MODAL
==============================-->
<?php if(isset($_POST['btnModl'])){ ?>
<div class="modal-container" style="<?= $_SESSION['displayed'];?>">
    <div class="modal" style="background-color: #fcff9e;">
	<form action="./crud/reg_sig.php" method="POST">
	    <h1>Inserta tu nombre para aparecer</h1>
	    <input type="number" placeholder="ID" name="ID" autofocus><br>
	    <input type="text" placeholder="Nombre del nuevo estudiante" name="name"><br>
	    <input type="number" placeholder="Cantidad de dinero disponible" name="money"><br>
	    <input type="email" placeholder="Correo electrónico" name="email"><br>
	    <i>Curso: </i>
	    <select name="numLev">
		<option disabled selected>Grado</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
	    </select>
	    <i>Salón:</i>
	    <select name="charLev">
		<option disabled selected>Salón</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
	    </select><br>
	    <input type="submit" name="btnAccModlA" value="Insertar">
	    <input type="submit" name="btnCanModlA" value="Cancelar">
	</form>
    </div>
</div>
<?php }
if(isset($_POST['btnLog'])){ ?>
<div class="modal-container" style="<?= $_SESSION['displayed'];?>">
    <div class="modal" style="background-color: #bef794;">
	<form action="./crud/reg_sig.php" method="POST">
	    <h1>Inserte los datos corrientes</h1>
	    <input type="number" class="inData" placeholder="ID" name="lId"><br>
	    <input type="text" class="inData" placeholder="Nombre" name="lName"><br>
	    <i>Curso: </i>
	    <select name="numLevLog">
		<option disabled selected>Grado</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
	    </select>
	    <i>Salón:</i>
	    <select name="charLevLog">
		<option disabled selected>Salón</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
	    </select><br>
	    <input type="submit" name="btnAccModlB" value="Acceder">
	    <input type="submit" name="btnCanModlB" value="Cancelar">
	</form>
    </div>
</div>
<?php } ?>
<!--=============================
BODY
==============================-->
<div class="basicCon" >
    <section style="background-color: #f0e3ad">
	<article style="background-color: #f0cead">
	    <form method="post">
		<h2>Formulario de verificación</h2>
		<input name="btnLog" type="submit" class="btn" value="Buscar">
		<input name="btnModl" type="submit" class="btn" value="Registrarse si no está disponible">
	    </form>
	</article>
	<article style="background-color: #fcc07c">
<?php if(isset($_SESSION['message'])){ ?>
<div class="advice" name="d-alert" style="<?= $_SESSION['property'];?>">
    <?= $_SESSION['message'];?>
</div>
<?php session_unset();} ?>
	    <table name="table">
		<tr>
		    <th>ID</th>
		    <th>Nombre</th>
		    <th>Grado</th>
		    <th>Cantidad</th>
		</tr>
<?php
    include_once("./crud/read.php");
?>
	    </table>
	</article>
    </section>
    <aside style="background-color: #adecf0">
	<h2>¿Qué es?</h2>
	Esto es un sitio dedicado a la organización de los estudiantes en las filas de cafetería.
	<h2>¿En qué consiste?</h2>
	Se trata de un sitio en el que busca realizar ordenes de una forma rápida, haciendo las cosas de manera
	premeditada y garantiza un orden que ayudará a los estudiantes a obtener lo que necesitan de forma rápida.
	Para hacerlo, este sitio emplea un algorítmo basado en una estructura de datos que busca ser rápido
	independientclass="advice" emente de la cantidad de elementos que hayan en un programa (Estudiantes registrados en el
	sitio)
	<h2>¿Cómo usarlo?</h2>
	<p>
	Lo primero que el usuario debe hacer si nunca interactuó con Soort, es primero registrarse en el botón
	“Registrarse si no está disponible” que aparece en la parte superior de la notable tabla está al lado de la
	página.
	</p>
	<p>
	Lo siguiente que hay que hacer es comprar lo que uno desee con lo que uno desea para que conseguir en la página
	</p>
	<p>
	Por último, si se arrepiente de tener una cuenta o desea hacer cambios, clickee sobre el botón de “Cambios de
	cuenta” que aparece mientras se realiza la compra
	</p>
    </aside>
</div>
<?php
include('includes/footer.php');
?>

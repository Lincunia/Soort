<?php
include('../includes/connection.php');

function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
	if ( version_compare(phpversion(), '5.4.0', '>=') ) {
	    return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
	} else {
	    return session_id() === '' ? FALSE : TRUE;
	}
    }
    return FALSE;
}

if(isset($_POST['logOut'])){
    session_destroy();
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css"></link>
	<link rel="shortcut icon" href="../media/img/logo.png" type="image/x-icon">
	<title>User - soort</title>
    </head>
    <body style="background-color: #f5e6ed">
	<header style="background-color: #bea2fa">
	    <h1>Modificación de usuario</h1> 
	</header>

<?php
if ( is_session_started() === FALSE ){
    header('Location: ../index.php');
}
else{
?>
	<div class="basicCon" style="background-color: #d9fcb6">
	    <section style="background-color: #c5f2fa">
		<article style="background-color: #fbfcae">
		    <form action="../crud/delete_u.php" method="POST">
			<h2 style="color: red">¡ADVERTENCIA!</h2>
			<p>
			Si usted borra este usuario, ya no podrá hacer compras en la cafeteria del colegio, así que no
			lo intente. Si ya terminó de estudiar en la institución, por favor marque la casilla que está
			encima del botón.
			</p>
			<input type="checkbox" name="confirm"> Acepto las consecuencias que ocurrirán al borrar el
usuario <br>
			<input name="btnDel" type="submit" value="Eliminar">
		    </form>
		</article>
		<article style="background-color: #ddaefc">
		    <form method="POST">
			<input type="submit" name="logOut" value="Cerrar sesión">
			<button><a href="./list.php">Volver a las compras</a></button>
		    </form>
		</article>
	    </section>
	    <aside style="background-color: #fce4ae;">
		<form action="../crud/edit_u.php" method="POST">
		    <input type="text" name="nName" placeholder="Inserte nuevo nombre">
		    <input type="email" name="nEmail" placeholder="Inserte nuevo correo">

		    <input name="btnUp" type="submit" value="Actualizar">
<?php if(
    isset($_SESSION['message']) &&
    isset($_POST['btnUp'])
    ){ ?>
<div class="advice" style="<?= $_SESSION['property'];?>">
    <?= $_SESSION['message'];?>
</div>
<?php } ?>
		</form>
	    </aside>
	</div>
<?php
}

if(
    !isset($_POST['confirm']) &&
    isset($_SESSION['message']) &&
    isset($_SESSION['property'])
){ ?>
<div class="advice" style="<?= $_SESSION['property'];?>">
    <?= $_SESSION['message'];?>
</div>
<?php }
include('../includes/footer.php');
?>

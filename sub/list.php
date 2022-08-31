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
	    <form class="menu">
		<li class="menu-item" name="burguer" id="burguer">
		    <a href="#burguer" class="btn"> Hamburguesa </a>
		    <div class="menu-item-content">
			<div>
			    I'll take one to make me feel better
			    <input type="submit" value="Comprar">
			</div>
		    </div>
		</li>
		<li class="menu-item" name="fries" id="fries">
		    <a href="#fries" class="btn"> Papas </a>
		    <div class="menu-item-content">
			<div>
			    I work hard for my money
			    <input type="submit" value="Comprar">
			</div>
		    </div>
		</li>
		<li class="menu-item" name="hot-dog" id="hot-dog">
		    <a href="#hot-dog" class="btn"> Perro caliente </a>
		    <div class="menu-item-content">
			<div>
			    Just another night it's all that it takes to understand the difference between lovers and
			    fakes
			    <input type="submit" value="Comprar">
			</div>
		    </div>
		</li>
		<li class="menu-item" name="arepa" id="arepa">
		    <a href="#arepa" class="btn"> Arepa </a>
		    <div class="menu-item-content">
			<div>
			    Break the last of my heart while you fight and leave the past behind
			    <input type="submit" value="Comprar">
			</div>
		    </div>
		</li>
	    </form>
        </section>
        <aside>
<?php if(isset($_POST['logOut'])){
    session_destroy();
    header('Location: ../index.php');
}
?>
            <div style="background-color: #f2aabd;">
                <h2>Lo que integrar en la lista de compras:</h2>
                <ol>
                    <li>Almojabana</li>
                    <li>Palo de queso</li>
                    <li>Hamburguesa</li>
                    <li>Arepuela</li>
                </ol>
                Total a pagar: $45000
                <div style="width: 20px"><a href="./egg.html"></a></div>
            </div>
            <div style="background-color: #f0e3ad">
		<form action="" method="POST">
		    <button disabled>Terminar</button>
		    <button><a href="./modify.php" style="text-decoration: none">Modificar o eliminar usuario</a></button>
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

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
		<div name="burguer" id="burguer">
		    <a href="#burguer"> Hamburguesa </a>
		    <p>
		    <input type="radio"> Ketchup<br>
		    <input type="radio"> Salsa rosada<br>
		    <input type="radio"> Mostaza<br>
		    <input type="radio"> BBQ<br>
		    <input type="submit" name="burger" value="Comprar">
		    </p>
		</div>
		<div name="fries" id="fries">
		    <a href="#fries"> Papas fritas </a>
		    <p>In diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat.
		    Suspendisse nulla erat, lacinia nec, pretium vitae, feugiat ac, quam. Etiam sed
		    tellus vel est ultrices condimentum. Vestibulum euismod. Vivamus blandit.
		    Pellentesque eu urna. Vestibulum consequat sem vitae dui. In dictum feugiat
		    quam. Phasellus placerat. In sem nisl, elementum vitae, venenatis nec, lacinia
		    ac, arcu. Pellentesque gravida egestas mi. Integer rutrum tincidunt libero.</p>
		</div>
		<div name="hot-dog" id="hot-dog">
		    <a href="#hot-dog"> Perro caliente </a>
		    <p>Curabitur cursus volutpat neque. Proin posuere mauris ut ipsum. Praesent
		    scelerisque tortor a justo. Quisque consequat libero eu erat. In eros augue,
		    sollicitudin sed, tempus tincidunt, pulvinar a, lectus. Vestibulum ante ipsum
		    primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
		    interdum purus id risus. Ut ultricies cursus dui. In nec enim at odio aliquam
		    iaculis. Fusce nisl. Pellentesque sagittis. Lorem ipsum dolor sit amet,
		    consectetuer adipiscing elit. Aenean placerat tellus. In semper sagittis enim.
		    Aliquam risus neque, pretium in, fermentum vitae, vulputate et, massa. Nulla
		    sed erat.</p>
		</div>
		<div name="almojabana" id="almojabana">
		    <a href="#almojabana"> Almojabana </a>
		    <p>
		    aofghpaisdfiasdjfioas
		    </p>
		</div>
	    </form>
        </section>
        <aside>
<?php if(isset($_POST['logOut'])){
    session_destroy();
    header('Location: ../index.php');
}
?>
            <div class="advice" style="background-color: #f2aabd;">
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

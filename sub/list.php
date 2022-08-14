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
else{?>
    <header>
	<h1>Menú</h1>
	Bienvenido, <?= $_SESSION['result']['name']; ?><br>
	con identificación <?= $_SESSION['result']['id']; ?>
    </header>
    <div class="basicCon">
        <section>
            <p>
                <input type="radio"> Almojabana
            </p>
            <p>
                <input type="radio"> Palo de queso
            </p>
            <p>
                <input type="radio"> Hamburguesa
                <select>
                    <option>Ketchup</option>
                    <option>Mayonesa</option>
                    <option>Piña</option>
                    <option>BBQ</option>
                </select>
                <input type="checkbox"> Tomate
                <input type="checkbox"> Lechuga
                <input type="checkbox"> Queso
            </p>
            <p>
                <input type="radio"> Papas fritas
                <select>
                    <option>Ketchup</option>
                    <option>Mayonesa</option>
                    <option>Piña</option>
                    <option>BBQ</option>
                </select>
            </p>
            <p>
                <input type="radio"> Perro caliente
                <select>
                    <option>Ketchup</option>
                    <option>Mayonesa</option>
                    <option>Piña</option>
                    <option>BBQ</option>
                </select>
                <input type="checkbox"> Queso
                <input type="checkbox"> Papas
                <input type="checkbox"> Cebolla
            </p>
            <p>
                <input type="radio"> Ensalada de frutas
            </p>
            <p>
                <input type="radio"> Arepa con queso
                <input type="checkbox"> Chorizo
            </p>
            <p>
                <input type="radio"> Arepuela
            </p>
            <p>
                <input type="radio"> Sandwich normal
            </p>
            <p>
                <input type="radio"> Sandwich largo
            </p>
            <p>
                <input type="radio"> Papas fritas (Margarita o superricas)
            </p>
            <p>
                <input type="radio"> Galletas (6 unidades)
            </p>
            <p>
                <input type="radio"> Galletas (4 unidades)
            </p>
            <p>
                <input type="radio"> Ponqué gansito
            </p>
            <p>
                <input type="radio"> Ponqué chocorramo o gala
            </p>
            <p>
                <input type="radio"> Tostacos
            </p>
        </section>
        <aside>
<?php
if(isset($_POST['logOut'])){
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
<!--
                <button><a href="../index.php">Cancelar</a></button>
-->
		    <input type="submit" name="logOut" value="Cerrar sesión">
		</form>
            </div>
        </aside>
    </div>
    <!--
	<input type="radio"> 
    -->
<?php } ?>
</body>
</html>

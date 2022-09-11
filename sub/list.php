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
$_SESSION['prod_aux']='';
if ( is_session_started() === FALSE ){
    header('Location: ../index.php');
}
else{ ?>
    <header>
	<h1>Menú</h1>
	Bienvenido, <?= $_SESSION['result']['name']; ?><br>
	con identificación <?= $_SESSION['result']['id']; ?>
    </header>
    <div class="basicCon">
	<section>
	    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="menu">
<?php
    include("../crud/read.php");
?>
	    </section>
	    <aside>
		<div class="advice" style="background-color: #f2aabd;">
		    <h2>Lo que integrar en la lista de compras:</h2>
<?php echo "Esta es la cantidad de dinero que tiene el usuario: $" . $_SESSION['result']['amount_mon']; ?>
		    <ol>
<?php
if(isset($_POST['dieter_bohlen'])){
    if(!empty($_POST['dieter_bohlen'])) {
	$txt='';
	$money=0;
	foreach($prod as $key => $value) {
	    foreach($_POST['dieter_bohlen'] as $check) {
		if($key==$check){
		    echo '<li>' . $check . '  '. $value . '</li>';
		    $txt.=$check . ", ";
		    $money+=$value;
		}
	    }
	}
	$user_money=$_SESSION['result']['amount_mon'];
	if($money<=$user_money){
	    echo "¡ Compra exitosa !";
	    $result=$defConn->query("INSERT INTO shopping(name_prod, amount_mon, id) VALUES ('$txt', $money, {$_SESSION['result']['id']});");
	    $result=$defConn->query("UPDATE client SET amount_mon = ".($user_money - $money)." WHERE id={$_SESSION['result']['id']}");
	    if(!$result){
		die('Query fallida');
	    }
	}
	else{
	    echo "No puedes porque no tienes dinero suficiente";
	}
	echo "<br><br>Cantidad de dinero: $" . $money;
	/*
	$result=$defConn->query("INSERT INTO shopping(name_prod, amount_mon, id) VALUES
	    ('$txt', $money, {$_SESSION['result']['id']});");
	if(!$result){
	    die('Query fallida');
	}
	 */
    }
}
?>
		    </ol>
		    <input type="submit" name="list_it" value="Terminar">
		    <input type="submit" name="logOut" value="Cerrar sesión">
		    <button><a href="./modify.php" style="text-decoration: none">Cambios de cuenta</a></button>
		    <div style="width: 20px"><a href="./egg.html"> </a></div>
		</form>
	    </div>
	</aside>
    </div>
<?php
if(isset($_POST['logOut'])){
    session_destroy();
    header('Location: ../index.php');
}
} ?>
</body>
</html>

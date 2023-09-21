<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/style.css">
	</link>
	<link rel="shortcut icon" href="../../css/mamadisimo.png" type="image/x-icon">
	<title>Food Control - List</title>
</head>

<body style="background-color: #edfafc;">
	<?php
	include('../connection.php');
	function is_session_started()
	{
		if (php_sapi_name() !== 'cli') {
			if (version_compare(phpversion(), '5.4.0', '>=')) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return FALSE;
	}
	if (isset($_POST['log_out'])) {
		unset($_SESSION["username"]);
		session_destroy();
		header('Refresh: 2; URL = ../../index.php');
		exit;
	}
	if (is_session_started() === FALSE) {
		header('Refresh: 2; URL = ../index.php');
	} else { ?>
		<header style="background-color: #ffe880">
			<h1>Food Control</h1>
		</header>
		<div class="basicCon">
			<section style="background-color: #80ffc1">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="menu">
					<button type="submit" name="to_buy" class="to_buy">Comprar</button>
					<?php
					include("../crud/read.php");
					?>
				</form>
			</section>
			<aside style="background-color: #aff786">
				<article style="background-color: #e1ff80">
					Nombre del estudiante: <?= $_SESSION['result'][1]; ?><br>
					Identificación del estudiante: <?= $_SESSION['result'][0]; ?><br>
				</article>
				<article style="background-color: #ffdd80">
					<form method="post">
						<button type="submit" name="log_out">Cerrar sesión</button>
					</form>
				</article>
			</aside>
		</div>
	<?php
		if (isset($_POST['to_buy'])) {
			if (!empty($_POST['prod_for_them'])) {
				$txt = '';
				$money = 0;
				foreach ($prod as $key => $value) {
					foreach ($_POST['prod_for_them'] as $check) {
						if ($key == $check) {
							$money += $value;
							$txt .= $check . ", ";
						}
					}
				}
				echo $txt . $money;
				mysqli_query($link, "INSERT INTO shopping(name_prod, date_of_purch, amount_mon, name_student) VALUES (
			'{$txt}',
			NOW(),
			{$money},
			'{$_SESSION['result'][1]}');");
				$_POST['prod_for_them'] = null;
			}
			unset($_POST);
			//header("refresh: 3");
		}
		if (array_key_exists('postdata', $_SESSION)) {
			unset($_SESSION['postdata']);
		}
	} ?>
</body>

</html>
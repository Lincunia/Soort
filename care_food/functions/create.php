<?php
include('../includes/connection.php');
if (isset($_POST['insert_info'])) {
	if (
		empty($_POST['level_num']) ||
		empty($_POST['level_let']) ||
		empty($_POST['id']) ||
		empty($_POST['name']) ||
		empty($_POST['surname']) ||
		empty($_POST['phone_num']) ||
		empty($_POST['pass']) ||
		empty($_POST['email'])
	) {
		$_SESSION['prop'] = 'alert alert-danger';
		$_SESSION['message'] = 'Inserta todos los campos';
	} else {
		$id = prepare_data($_POST['id'], $link);
		$name = prepare_data($_POST['name'], $link);
		$surname = prepare_data($_POST['surname'], $link);
		$lev = prepare_data($_POST['level_num'], $link) . prepare_data($_POST['level_let'], $link);
		$phone_num = prepare_data($_POST['phone_num'], $link);
		$email = prepare_data($_POST['email'], $link);
		input_queries($link, "INSERT INTO users (id, name, surname, lev, phone_num, email) VALUES
	    ($id, '$name', '$surname', '$lev', '$phone_num', '$email');");

		$_SESSION['prop'] = 'alert alert-success';
		$_SESSION['message'] = 'Datos insertados correctamente';
	}
	unset($_POST);
	header("Location: " . $_SERVER['PHP_SELF']);
	exit;
}

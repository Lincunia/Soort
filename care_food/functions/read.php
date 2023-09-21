<?php
include('../includes/connection.php');

$_SESSION['result'] = '';
if (isset($_POST['check_out'])) {
    if (
        empty($_POST['id']) ||
        empty($_POST['email'])
    ) {
        $_SESSION['prop'] = 'alert alert-warning';
        $_SESSION['message'] = 'Inserta todos los campos';
        unset($_POST);
        header("Location: ../log_in.php");
        exit;
    } else {
        $email = prepare_data($_POST['email'], $link);
        $id = prepare_data($_POST['id'], $link);
        echo "SELECT * FROM users WHERE id=$id AND email='$email';";
        $result = mysqli_query($link, "SELECT * FROM users WHERE id=$id AND email='$email';");
    }
}
if (!isset($result)) {
    die('<br>Consulta no valida: ' . $link->error);
} else {
    $_SESSION['result'] = $result->fetch_array(MYSQLI_NUM);
    if (!$_SESSION['result']) {
        $_SESSION['prop'] = 'alert alert-danger';
        $_SESSION['message'] = 'No puedes acceder, digita bien los datos o registrate';
        header('Location: ../log_in.php');
    }
    if ($_SESSION['result'][0] == $id && $_SESSION['result'][5] == $email) header('Location: ../to_buy.php');
}
?>
<?php
include('../connection.php');
if (isset($_POST['btn_acc_modl'])) {
    if (
        empty($_POST['id']) ||
        empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['pass_s']) ||
        empty($_POST['pass_p'])
    ) {
        $_SESSION['message'] = 'Inserta datos de forma completa';
        header('Location: ../../index.php');
    } else {
        input_queries($link, "INSERT INTO students(id, name, password) VALUES (".
        prepare_data($_POST['id'], $link).", '".
        prepare_data($_POST['name'], $link)."', '".
        prepare_data($_POST['pass_s'], $link)."');");

        input_queries($link, "INSERT INTO parents(email, password, students_id) VALUES ('".
        prepare_data($_POST['email'], $link)."', '".
        prepare_data($_POST['pass_p'], $link)."', ".
        prepare_data($_POST['id'], $link).")");
    }
    
    $_SESSION['message'] = 'Datos insertados de forma correcta';
}
if (isset($_POST['btn_can_modl'])) {
    $_SESSION['property'] = 'display: none';
}
header('Location: ../../index.php');
?>
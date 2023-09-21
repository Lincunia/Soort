<?php
include('../includes/connection.php');
if(isset($_POST['btnUp'])){
    $result=$defConn->query("UPDATE client SET name='{$_POST['nName']}', email='{$_POST['nEmail']}' WHERE id={$_SESSION['result']['id']};");
    if(!$result){
	die('Query fallida');
    }
    $result->execute();
    $_SESSION['message']='Datos actualizados correctamente';
    $_SESSION['property']='background-color: rgb(131, 237, 121); display: block;';
    header('Location: ../sub/modify.php');
}
?>

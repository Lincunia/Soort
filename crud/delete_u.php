<?php
include('../includes/connection.php');

function send_info($query, $defConn){
    $result=$defConn->query($query);
    if(!$result){
	die('Query fallida');
    }
    $result->execute();
}

if(isset($_POST['btnDel'])){
    if(isset($_POST['confirm'])){
	send_info("DELETE FROM shopping WHERE id IN ( SELECT id FROM client WHERE name='{$_SESSION['result']['name']}');", $defConn);
	send_info("DELETE FROM client WHERE name='{$_SESSION['result']['name']}';", $defConn);

	$_SESSION['message']='';
	$_SESSION['property']='';
	header('Location: ../index.php');
	session_destroy();
    }
    else{
	$_SESSION['message']='Si desea borrar deliberadamente su cuenta, marque la casilla del panel izquierdo';
	$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
	header('Location: ../sub/modify.php');
    }
}
?>

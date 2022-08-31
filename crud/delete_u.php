<?php
include('../includes/connection.php');
if(isset($_POST['confirm'])){
    $id=$_SESSION['result']['id'];
    $query="DELETE FROM client WHERE id=$id;";
    echo $query;
    $result=$defConn->query($query);
    if(!$result){
	die('Query fallida');
    }
    $result->execute();
    session_destroy();
    header('Location: ../index.php');
}
$_SESSION['message']='Si desea borrar deliberadamente su cuenta, marque la casilla';
$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
// header('Location: ../sub/modify.php');
?>

<?php
include('../includes/connection.php');

if(isset($_POST['btnAccModlA'])){
    if((empty($_POST['numLev']) && empty($_POST['charLev'])) ||
	empty($_POST['ID']) ||
	empty($_POST['name']) ||
	empty($_POST['money']) ||
	empty($_POST['email'])) {
	$_SESSION['message']='Inserta datos de forma completa';
	$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
	header('Location: ../index.php');
    }
    else{
	$fdi=$_POST['numLev'].$_POST['charLev'];
	$result=$defConn->query("INSERT INTO client (id, name, level, email, amount_mon) VALUES ({$_POST['ID']}, '{$_POST['name']}', '$fdi', '{$_POST['email']}', {$_POST['money']});");
    }

    if(!$result){
	die('Query fallida');
    }
    $_SESSION['message']='Datos insertados de forma correcta';
    $_SESSION['property']="background-color: rgb(131, 237, 121); display: block;";
}
//==============================
if(isset($_POST['btnAccModlB'])){
    if((empty($_POST['numLevLog']) && empty($_POST['charLevLog'])) ||
	empty($_POST['lId']) ||
	empty($_POST['lName'])) {
	$_SESSION['message']='Inserta datos de forma completa';
	$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
	header('Location: ../index.php');
    }
    else{
	$fdi=$_POST['numLevLog'].$_POST['charLevLog'];
	$result=$defConn->query("SELECT * FROM client WHERE name='{$_POST['lName']}' AND level='$fdi' AND id={$_POST['lId']};");
    }
    if(!$result){
	die('Query fallida');
    }
    $result->execute();

    $_SESSION['result'] = $result->fetch(PDO::FETCH_ASSOC);
    if(!$_SESSION['result']){
	$_SESSION['message']='No puedes acceder, digita bien los datos o registrate';
	$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
	header('Location: ../index.php');
    }
    if($_SESSION['result']['name']==$_POST['lName'] && $_SESSION['result']['id']==$_POST['lId'] && $_SESSION['result']['level']==$fdi) header('Location: ../sub/list.php');
}
else{
    $_SESSION['displayed']='display: none';
    header('Location: ../index.php');
}
?>

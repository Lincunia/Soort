<?php
include('../includes/connection.php');

if(isset($_POST['btnAccModlA'])){
    $id=$_POST['ID'];
    $name=$_POST['name'];
    $money=$_POST['money'];
    $email=$_POST['email'];

    if(!empty($_POST['numLev']) && !empty($_POST['charLev'])) {
	$grade = $_POST['numLev'];
	$room = $_POST['charLev'];
	$fdi=$grade . $room;
    }
    if($id=="" || $name=="" || $money=="" || $email=="" || !$fdi){
	$_SESSION['message']='Inserta datos de forma completa';
	$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
	header('Location: ../index.php');
    }

    $query="INSERT INTO client (id, name, level, email, amount_mon) VALUES ($id, '$name', '$fdi', '$email', $money);";
    $result=$defConn->query($query);
    if(!$result){
	die('Query fallida');
    }
    $_SESSION['message']='Datos insertados de forma correcta';
    $_SESSION['property']="background-color: rgb(131, 237, 121); display: block;";
}
//============================== 
if(isset($_POST['btnCanModlA']) || isset($_POST['btnCanModlB'])){
    $_SESSION['displayed']='display: none';
}
header('Location: ../index.php');
//============================== 
if(isset($_POST['btnAccModlB'])){
    $id=$_POST['lId'];
    $name=$_POST['lName'];

    if(!empty($_POST['numLevLog']) && !empty($_POST['charLevLog'])) {
	$grade = $_POST['numLevLog'];
	$room = $_POST['charLevLog'];
	$fdi=$grade . $room;
    }
    if($id=="" || $name=="" || !$fdi){
	$_SESSION['message']='Inserta datos de forma completa';
	$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
	header('Location: ../index.php');
    }

    $query="SELECT * FROM client WHERE name='$name' AND level='$fdi' AND id=$id;";
    $result=$defConn->query($query);
    if(!$result){
	die('Query fallida');
    }
    $result->execute();
    $_SESSION['result'] = $result->fetch(PDO::FETCH_ASSOC);
    if(!$_SESSION['result']){
	$_SESSION['message']='No puedes acceder, digita bien los datos o registrate';
	$_SESSION['property']='background-color: rgb(201, 30, 30); display: block;';
	// header('Location: ../index.php');
    }
    if($_SESSION['result']['name']==$name && $_SESSION['result']['id']==$id && $_SESSION['result']['level']==$fdi) header('Location: ../sub/list.php');
}
?>

<?php
if(isset($_POST['btnAccModlA'])){
    $id=$_POST['ID'];
    $name=$_POST['name'];
    $money=$_POST['money'];
    $email=$_POST['email'];

    if(isset($_POST['btnAccModlA'])){
	if(!empty($_POST['numLev']) && !empty($_POST['charLev'])) {
	    $grade = $_POST['numLev'];
	    $room = $_POST['charLev'];
	    $fdi=$grade . $room;
	    echo $fdin;
	}
    }

    if($id=="" || $name=="" || $money=="" || $email==""){
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
    header('Location: ../sub/list.php');
}

?>

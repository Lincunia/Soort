<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

class classConn{
    function connectionDB(){
	    /*
	    DON'T FORGET TO FILL THIS!
	    */
	$host='';
	$dbname='';
	$username=''; 
	$pswd='';

	try{
	    $conn=new PDO ("pgsql:host=$host, dbname=$dbname", $username, $pswd);
	    return $conn;
	}
	catch(PDOException $yija){
	    echo "Hay un problema: $yija";
	}
    }
}

$alexandra=new classConn();
$defConn=$alexandra->connectionDB();

?>

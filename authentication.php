<?php
include("conexion.php");

$email=$_REQUEST["email"];
$passd=$_REQUEST["password"];

$sql="SELECT * FROM socios WHERE email='".$email."' AND password='".$passd."'";
$socio=mysqli_query($link,$sql); 
if($data=mysqli_fetch_array($socio)){
	//echo $data["nombres"];
	session_start();
    $_SESSION['id'] = $data["idsocios"];;
    $_SESSION['nombres'] = $data["nombres"];
    $_SESSION['apellidos'] = $data["apellidos"];
	header('location: sistema.php');
    die();
}else{
	echo "no se encontro el usuario";
	header('location: index.php');
	die();
}

?>
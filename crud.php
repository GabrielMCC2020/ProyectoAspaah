<?php
	include("conexion.php");

	$go=$_POST["go"];
	$nom=$_POST["nombres"];
	$ape=$_POST["apellidos"];
	$dni=$_POST["dni"];
	$fec=$_POST["fnacimiento"];
	$ema=$_POST["email"];
	$dir=$_POST["direccion"];
	$cel=$_POST["celular"];
	$id=$_POST["id"];


	if($go=="delete"){
		$id=$_POST["id"];
		$sql="DELETE FROM socios WHERE idsocios=".$id;
		mysqli_query($link,$sql);
	}
	
	if($go=="create"){
		$sql="INSERT INTO socios(nombres,apellidos,dni,fnacimiento,email,direccion,celular) VALUES('$nom','$ape','$dni','$fec','$ema','$dir','$cel')";
		mysqli_query($link,$sql);
	}

	if($go=="update"){
		$sql="UPDATE socios SET nombres='$nom',apellidos='$ape',dni='$dni',fnacimiento='$fec',email='$ema',direccion='$dir',celular='$cel' WHERE idsocios='$id'";
		mysqli_query($link,$sql);
	}


?>
<?php
	$host		='127.0.0.1';
	$user		='root';
	$pass		='';
	$database	='dbaspaah';

	$link=mysqli_connect($host,$user,$pass,$database);
	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>


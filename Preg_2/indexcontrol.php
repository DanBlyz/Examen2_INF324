<?php
$usuario=$_GET["usuario"];
$passsword=$_GET["password"];
if ($usuario=='benjamin' and $passsword=='benjamin')
{
	session_start();
	$_SESSION["usuario"]=$usuario;
	$_SESSION["rol"]='estudiante';
	echo "2";
	header("Location: bentrada.php");
	exit;
}
if ($usuario=='josue' and $passsword=='josue')
{
	session_start();
	$_SESSION["usuario"]=$usuario;
	$_SESSION["rol"]='Kardex';
	header("Location: bentrada.php");
	exit;
}
header("Location: index.php");
?>
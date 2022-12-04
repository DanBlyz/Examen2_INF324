<?php
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$pantalla = $_GET["pantalla"];
include "conexion.php";
include $pantalla.".grabar.inc.php";

if (isset($_GET["Siguiente"]))
{
	$sql="select Flujo, Proceso, ProcesoSiguiente as procesoselect, Tipo, Pantalla, Rol ";
	$sql.="from flujoproceso ";
	$sql.="where Flujo='".$flujo."' and ";
	$sql.="Proceso='".$proceso."'";
}
if (isset($_GET["Anterior"]))
{
	$sql="select Flujo, Proceso, ProcesoSiguiente as procesoselect, Tipo, Pantalla, Rol ";
	$sql.="from flujoproceso ";
	$sql.="where Flujo='".$flujo."' and ";
	$sql.="ProcesoSiguiente='".$proceso."'";
}

if (isset($_GET["Si"]))
{
	$sql="select Flujo, ProcesoSI as procesoselect ";
	$sql.="from flujoprocesocondicionante ";
	$sql.="where Flujo='".$flujo."' and ";
	$sql.="Proceso='".$proceso."'";
}
if (isset($_GET["No"]))
{
	$sql="select Flujo, ProcesoNO as procesoselect ";
	$sql.="from flujoprocesocondicionante ";
	$sql.="where Flujo='".$flujo."' and ";
	$sql.="Proceso='".$proceso."'";
}

$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$proceso = $fila["procesoselect"];
$parametros="?flujo=".$flujo;
$parametros.="&proceso=".$proceso;
$parametros.= $_GET["proceso"]=='P4'?"&usuario=".$_GET["usuario"]:"";
header("Location: flujo.php".$parametros);
?>
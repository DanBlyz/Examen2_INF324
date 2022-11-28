<?php
include 'header.php';
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
include "conexion.php";
$sql="select * from flujoproceso where Flujo='$flujo' and Proceso = '$proceso'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$pantalla=$fila["Pantalla"];
$tipo=$fila["Tipo"];
include $pantalla.".datos.inc.php";
?>
<div class="vh-100 d-flex justify-content-center align-items-center">
	<form method="GET" action="motor.php">
		<?php 
		include $pantalla.".inc.php";
		?>
		<input type="hidden" value="<?php echo $pantalla;?>" name="pantalla"/>
		<input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
		<input type="hidden" value="<?php echo $proceso;?>" name="proceso"/>
		<input type="hidden" value="<?php echo $tipo;?>" name="tipo"/>
		<br/>
		<?php
		if ($tipo=="C")
		{
		?>
		<input type="submit" value="Si" name="Si" class="btn btn-success"/>
		<input type="submit" value="No" name="No" class="btn btn-danger"/>
		<?php
		}
		else
		{
			if($proceso=="-" ){
				header("Location: bentrada.php");
			}else{
		?>
			<input type="submit" value="Anterior" name="Anterior" class="btn btn-info"/>
			<input type="submit" value="Siguiente" name="Siguiente" class="btn btn-primary"/>
		<?php
		}}
		?>
	</form>
</div>
<?php include 'footer.php' ?>

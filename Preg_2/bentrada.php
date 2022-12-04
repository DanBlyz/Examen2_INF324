<?php
  include "conexion.php";
  session_start();
  $usuario=$_SESSION["usuario"];
  if($_SESSION["rol"]=='Kardex'){
    $sql="select * from flujoprocesoseguimiento where usuario!='$usuario'";
  }else{
    $sql="select * from flujoprocesoseguimiento where usuario='$usuario'";
  }
  //and fechafin is null
  $resultado=mysqli_query($con, $sql);
  include 'header.php';
?>
<div class="vh-100 d-flex justify-content-center align-items-center">
  <div class="col-md-8 p-5 shadow-sm border rounded-3">
    <?php 
        if($_SESSION["rol"]=='estudiante'){
          echo '<h1>Sistema Estudiante</h1>';
        }else{
          echo '<h1>Sistema Kardex</h1>';
        }
    ?>
      <table class="table table-dark table-striped">
      <tr>
        <td>Flujo</td>
        <td>proceso</td>
        <td>Usuario</td>
        <td>fecha inicial</td>
        <td>fecha final</td>
        <td>Resultado</td>
        <td>Ir</td>
      </tr>
    <?php 
      while ($fila=mysqli_fetch_array($resultado)){
          echo "<tr>";
          echo "<td>".$fila["Flujo"]."</td>";
          echo "<td>".$fila["Proceso"]."</td>";
          echo "<td>".$fila["Usuario"]."</td>";
          echo "<td>".$fila["FechaInicio"]."</td>";
          echo "<td>".$fila["FechaFin"]."</td>";
          echo "<td>".$fila["rechazo"]."</td>";
          if($_SESSION["rol"]=='Kardex'){
            echo "<td><a class='btn btn-info' href='flujo.php?flujo=".$fila["Flujo"]."&proceso=P4&usuario=".$fila["Usuario"]."'>Ir</a></td>";
          }else{
            if($fila["rechazo"] == 'Rechazado'){
              echo "<td><a class='btn btn-info' href='flujo.php?flujo=".$fila["Flujo"]."&proceso=".$fila["Proceso"]."'>Ir</a></td>";
            }else{
              echo "<td></td>";
            }
          }
          echo "</tr>";
      }
    ?>
      </table>
      <a class='btn btn-danger' href="close_session.php">Cerrar Sesion</a>
    </div>
  </div>
<?php include 'footer.php'; ?>
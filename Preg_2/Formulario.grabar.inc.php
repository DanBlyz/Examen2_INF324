<?php
    $usuario = $_GET['nombre'];
    $fecha = date("Y-m-d");
    $sql= "UPDATE flujoprocesoseguimiento
        SET Proceso = 'P3', FechaFin = '$fecha', rechazo = 'Pendiente'
        WHERE Usuario = '$usuario'";
    mysqli_query($con, $sql);
?>
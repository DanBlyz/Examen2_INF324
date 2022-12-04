<?php
    $usuario = $_GET['usuario'];
    $fecha = date("Y-m-d");
    if(isset($_GET['Si'])){
        $sql= "UPDATE flujoprocesoseguimiento
        SET Proceso = 'P5', FechaFin = '$fecha', rechazo = 'Aceptado'
        WHERE Usuario = '$usuario'";
        mysqli_query($con, $sql);
    }
    if(isset($_GET['No'])){
        $sql= "UPDATE flujoprocesoseguimiento
        SET Proceso = 'P1', FechaFin = '$fecha', rechazo = 'Rechazado'
        WHERE Usuario = '$usuario'";
        mysqli_query($con, $sql);
    }
?>
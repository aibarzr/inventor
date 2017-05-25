<?php
    
    $mat=$_POST['material'];
    $fec=$_POST['fecha'];
    $inc=$_POST['incidencia'];
    $nonull=" ";

    session_start();
    $usuario = $_SESSION['nombre'];
    $usuario .= " ";
    $usuario .= $_SESSION['apellido'];
    $usuario .= " ";
    $usuario .= $_SESSION['apellidosegundo'];
    
    include("conexion.php");

    $sql="INSERT INTO incidencias(idreferencia,fechaincidencia,incidencia,usuario,fechasolucion,solucion) VALUES ('$mat','$fec','$inc','$usuario','$nonull','$nonull')";
     
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);

    header("location:form-incidencias.php");
?>
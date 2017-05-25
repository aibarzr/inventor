<?php
    $ubi=$_POST['ubicacion'];

    include("conexion.php");

    $sql="INSERT INTO ubicacion(ubicacion) VALUES ('$ubi')";

    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);

    header("location:form-ubicaciones.php");
?>
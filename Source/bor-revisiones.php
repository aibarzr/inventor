<?php
    include("conexion.php");
    $cla=$_GET['clave'];
    $sql="DELETE FROM revisiones WHERE idrevision='$cla'";
    mysqli_query($conexion,$sql) or die ("Error en el borrado");
    mysqli_close($conexion);
    header("location:ver-revisiones.php");
?>
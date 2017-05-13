<?php
    include("conexion.php");
    $cla=$_GET['clave'];
    $sql="DELETE FROM software WHERE idsoftware='$cla'";
    mysqli_query($conexion,$sql) or die ("Error en el borrado");
    mysqli_close($conexion);
    header("location:ver-software.php");
?>
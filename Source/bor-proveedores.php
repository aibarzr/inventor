<?php
    include("conexion.php");
    $cla=$_GET['clave'];
    $sql="DELETE FROM proveedores WHERE idproveedor='$cla'";
    mysqli_query($conexion,$sql) or die ("Error en el borrado");
    mysqli_close($conexion);
    header("location:ver-proveedores.php");
?>
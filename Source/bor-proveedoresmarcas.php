<?php
    include("conexion.php");
    $idmarca=$_GET['marc'];
    $idproveedor=$_GET['prov'];

    $sql="DELETE FROM marcaproveedor WHERE idmarca='$idmarca' AND idproveedor='$idproveedor'";
    mysqli_query($conexion,$sql) or die ("Error en el borrado");
    mysqli_close($conexion);
    header("location:ver-buscarproveedoresmarcas.php");
?>
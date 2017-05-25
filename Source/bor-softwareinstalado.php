<?php
    include("conexion.php");
    $idsoftware=$_GET['soft'];
    $idreferencia=$_GET['ref'];

    $sql="DELETE FROM softwareinstalado WHERE idsoftware='$idsoftware' AND idreferencia='$idreferencia'";
    mysqli_query($conexion,$sql) or die ("Error en el borrado");
    mysqli_close($conexion);
    header("location:ver-buscarsoftwareinstalado.php");
?>
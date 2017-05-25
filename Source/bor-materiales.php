<?php
    include("conexion.php");
    $idreferencia=$_GET['ref'];

    $sql="DELETE FROM material WHERE idreferencia='$idreferencia'";
    mysqli_query($conexion,$sql) or die ("Error en el borrado");
    mysqli_close($conexion);
    header("location:ver-buscarmateriales.php");
?>
<?php
    $ord=$_POST['ordenadores'];
    $sof=$_POST['software'];

    include("conexion.php");

    $count = count($sof);

    for ($i = 0; $i < $count; $i++) {
        $sql="INSERT INTO softwareinstalado(idreferencia,idsoftware) VALUES ('$ord','$sof[$i]') ";
        mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");
    }

    mysqli_close($conexion);

    header("location:form-softwareInstalado.php");
?>
<?php
    $mat=$_POST['material'];
    $rev=$_POST['revisor'];
    $fec=$_POST['fecharev'];
    $obs=$_POST['observaciones'];

    include("conexion.php");

    $sql="INSERT INTO revisiones(idreferencia,revisor,fecharevision,observaciones) VALUES ('$mat','$rev','$fec','$obs')";
    
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);

    header("location:form-revisiones.php");
?>
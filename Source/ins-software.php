<?php
    $nom=$_POST['nombre'];
    $lic=$_POST['licencia'];
    $cod=$_POST['codigo'];
    $can=$_POST['cantidad'];
    $fec=$_POST['fechafin'];
    $obs=$_POST['observaciones'];

    include("conexion.php");

    $sql="INSERT INTO software(software,idlicencia,codigolicencia,cantidad,fechafin,observaciones) VALUES ('$nom',$lic,'$cod',$can,'$fec','$obs')";
    
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);

    header("location:form-software.php");
?>
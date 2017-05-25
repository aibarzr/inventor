<?php
    $pro=$_POST['proveedor'];

    include("conexion.php");

    $sql="INSERT INTO proveedores(proveedor) VALUES ('$pro')";
    
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);

    header("location:form-proveedores.html");
?>
<?php
    
    $mod=$_POST['modelo'];
    $mar=$_POST['marca'];
    $pro=$_POST['proveedores'];
    $ubi=$_POST['ubicacion'];
    $usr=' ';
    $obs=$_POST['observaciones'];
    
    include("conexion.php");

    $sql="INSERT INTO material(modelo,idmarca,idproveedor,idusuario,idubicacion,observaciones) VALUES ('$mod','$mar','$pro', '$usr','$ubi','$obs');";
     
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);

    header("location:prueba.php");
?>
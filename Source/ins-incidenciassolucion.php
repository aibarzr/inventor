<?php
    
    $fec=$_POST['fecha'];
    $sol=$_POST['solucion'];
    
    include("conexion.php");

    $cla=$_POST['clave'];

    $sql="UPDATE incidencias SET fechasolucion='$fec', solucion='$sol' WHERE idincidencia='$cla'";
     
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");


?>

<?php
    include("conexion.php");
    $cla=$_POST['clave'];
    $sql2="DELETE FROM incidencias WHERE idincidencia='$cla'";
    mysqli_query($conexion, $sql2) or die("Error de la consulta de inserción $sql2");
    mysqli_close($conexion);
    header("location:ver-incidencias.php");
?>
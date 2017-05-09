<?php
    //Recuperamos datos del formulario
    $dni=$_POST['dni'];
    $nom=$_POST['nombre'];
    $ape=$_POST['apellidos'];
    $esp=$_POST['especialidad'];

    //Conectamos con la base de datos
    include("conexion.php");

    //Creamos la consulta
    $sql="INSERT INTO alumnos(dni,nombre,apellidos,especialidad) VALUES ('$dni','$nom','$ape','$esp')";
    
    //Ejecutamos la consulta. 
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    //Cerramos el proceso
    mysqli_close($conexion);

    //Nos posicionamos de manera automatica en la pagina que le metemos
    header("location:form-alumnos.php");
?>
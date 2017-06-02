<?php
    
    $nom=$_POST['nombre'];
    $ape1=$_POST['apellido1'];
    $ape2=$_POST['apellido2'];
    $esp=$_POST['especialidad'];
    
    //PASSWORD
    $logitud = 8; //LONGITUD PASSWORD
    $psswd = substr( md5(microtime()), 1, $logitud); //CONTRASEÑA TIPO MD5

    //USUARIO
    $usuario = substr("$nom", 0, 1); //INICIAL
    $usuario .="$ape1"; //INICIAL + APELLIDO
    $usuario = strtolower($usuario); //USUARIO EN MINÚSCULAS
    
    include("conexion.php");

    $sql="INSERT INTO usuarios(nombre,primerapellido,segundoapellido,usuario,clave,idEspecialidad) VALUES ('$nom','$ape1','$ape2','$usuario','$psswd',$esp)";
     
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);

    header("location:form-usuarios.php");
?>
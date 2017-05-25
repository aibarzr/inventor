<?php

session_start(); 

$usuario=$_POST['usuario'];
$clave=$_POST['pwd'];

include("conexion.php");

//2
$sql="SELECT u.*, e.*
    FROM usuarios as u, especialidad as e
    WHERE e.idEspecialidad=u.idespecialidad AND usuario='$usuario'";
$registros=mysqli_query($conexion, $sql);
$total=mysqli_num_rows($registros);
if($total==0){
    echo"<h2>EL USUARIO INTRODUCIDO NO ES VALIDO</h2>Pulse <a href='index.html'>aquí</a> para continuar.";
} else {
    while($linea=mysqli_fetch_array($registros)){
        if($linea['clave']==$clave){
            //VARIABLES DE SESION

            $_SESSION['nombre']=$linea['nombre'];
            $_SESSION['apellido']=$linea['primerapellido'];
            $_SESSION['apellidosegundo']=$linea['segundoapellido'];

            if($linea['idespecialidad']=='1'){//SAT
                //header("location:form-usuarios.php");
            } else if($linea['idespecialidad']=='2'){//ADMIN
                header("location:prueba.php");
            } else {//PROFESORES
                //header("location:form-usuarios.php");
            }

        } else {
            echo"<h2>CLAVE INCORRECTA</h2>Pulse <a href='index.html'>aquí</a> para continuar.";
        }
    }
}
?>
<?php
    session_start(); 

    $marca=$_POST['marca'];

    include("conexion.php");

    $sql="INSERT INTO marca(marca) VALUES ('$marca')";
     
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");
    
    $id = mysqli_insert_id($conexion); 
    $_SESSION['id']=$id;

    mysqli_close($conexion);
?>
<?php
    $prov=$_POST['proveedores'];
    $idmarca=$_SESSION['id'];

    include("conexion.php");

    $count = count($prov);

    for ($i = 0; $i < $count; $i++) {
        $sql2="INSERT INTO marcaproveedor(idmarca,idproveedor) VALUES ('$idmarca','$prov[$i]') ";
        mysqli_query($conexion, $sql2) or die("Error de la consulta de inserción $sql2");
    }

    mysqli_close($conexion);

    unset($_SESSION['id']);
    
    header("location:form-marcas.php");
?>
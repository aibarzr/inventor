<?php
    session_start(); 
    $mod=$_POST['modelo'];
    $mar=$_POST['marca'];
    $pro=$_POST['proveedores'];
    $ubi=$_POST['ubicacion'];
    $obs=$_POST['observaciones'];
    
    include("conexion.php");

    $sql="INSERT INTO material(material,modelo,idmarca,idproveedor,idusuario,idubicacion,observaciones) VALUES ('Monitor','$mod','$mar','$pro',' ','$ubi','$obs')";
    
    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");
    
    $id = mysqli_insert_id($conexion); 
    $_SESSION['id']=$id;
    
    mysqli_close($conexion);

?>
<?php
    $tip=$_POST['tipo'];
    $tam=$_POST['tamaño'];
    $nse=$_POST['numserie'];
    $nin=$_POST['numinterno'];
    $ent=$_POST['entrada'];
    $gar=$_POST['garantia'];
    $est=$_POST['estado'];

    include("conexion.php");
        
    $idref = $_SESSION['id'];

    $sql="INSERT INTO monitores(idreferencia,tipo,tamano,numserie,numinterno,fechaentrada,fechabaja,garantia,idestado) VALUES ('$idref','$tip','$tam','$nse','$nin','$ent','','$gar','$est')";

    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);
?>
<?php
    session_start();
    $nom = $_SESSION['nombre'];
    $ap1 = $_SESSION['apellido'];
    $ap2 = $_SESSION['apellidosegundo'];

    include("conexion.php");

    $sql="UPDATE material SET idusuario=(SELECT idusuario FROM usuarios WHERE nombre='$nom' AND primerapellido='$ap1' AND segundoapellido='$ap2')";

    mysqli_query($conexion, $sql) or die("Error de la consulta de inserción $sql");

    mysqli_close($conexion);
    
    header("location:form-materiales.php");
?>
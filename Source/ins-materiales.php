<?php
    
    $mat=$_POST['mat'];
    $mod=$_POST['modelo'];
    $mar=$_POST['marca'];
    $pro=$_POST['proveedores'];
    $ubi=$_POST['ubicacion'];
    $obs=$_POST['observaciones'];
    
    include("conexion.php");

    $sql="INSERT INTO material(material,modelo,idmarca,idproveedor,idusuario,idubicacion,observaciones) VALUES ('$mat','$mod',$mar,$pro,0,$ubi,'$obs')";
     
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
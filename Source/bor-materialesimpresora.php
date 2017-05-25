<?php
    session_start();

    $idreferencia=$_GET['ref'];
    $_SESSION['idreferencia']=$_GET['ref'];

    include("conexion.php");

    $sql="DELETE FROM material WHERE idreferencia='$idreferencia'";

    mysqli_query($conexion,$sql) or die ("Error en el borrado");

    mysqli_close($conexion);

?>
<?php
    include("conexion.php");

    $idref=$_SESSION['idreferencia'];

    $sql="UPDATE impresoras SET fechabaja=curdate() WHERE idreferencia='$idref'";

    mysqli_query($conexion,$sql) or die ("Error en la modificación");

    mysqli_close($conexion);
    

?>
<?php
    include("conexion.php");

    $idref=$_SESSION['idreferencia'];

    $sql="DELETE FROM impresoras WHERE idreferencia='$idref'";
    
    mysqli_query($conexion,$sql) or die ("Error en el borrado");

    mysqli_close($conexion);

    header("location:ver-buscarmateriales.php");
?>
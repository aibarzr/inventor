<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Panel de acceso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="container-fluid">
    <div class="container">
            <div id="menuContainer" style="z-index:2">
                <div id="logo">
                    <a href="dashboard.php"><img src="images/logosz.png" width="30"/></a>
                </div>
                <div id="user">
                    <h2>
                        <?php
                            session_start();
                            echo "Usuario: $_SESSION[nombre] $_SESSION[apellido]<br>";
                        ?>
                    </h2>
                    <a href="logout.php"><img src="images/logout.png" width="30"/></a>
                </div>
            </div>
           <div id="formcontainer" style="margin-top:200px">
                <div class="row">
                        <div class="col"><h5>MARCAS</h5> </div>
                        <div class="col"></div>
                </div>
<?php
    $prov=$_POST['proveedores'];

    include("conexion.php");

    $sql="SELECT mp.*, m.* FROM marcaproveedor as mp, marca as m WHERE m.idmarca=mp.idmarca AND mp.idproveedor=$prov;";
                        
    $registros=mysqli_query($conexion,$sql);

    //leemos el contenido de registros
    while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        
        echo"<div class='col'>$linea[marca]</div>";
        echo"<div class='col'><a href='bor-marcasproveedor.php?marc=$linea[idmarca]&prov=$linea[idproveedor]'><img src='./images/borrar.png' width='25'></a></div>";
        echo"</div>";  
    }
?>
<br>
            <div class="row">
                        <div class="col">
                            <a href="ver-buscarproveedoresmarcas.php"><input type="button" class="btn" value="Nueva busqueda"></a>
                        </div>
                        <div class="col">
                            <a href=""><input type="button" class="btn" value="Volver a inicio"></a>
                        </div>
                    </div>
            </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
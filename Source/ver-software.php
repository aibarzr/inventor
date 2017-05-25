<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

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
                    <img src="images/logosz.png" width="30"/>
                </div>
                <div id="user">
                    <h2>Pepe Manué
                        <?php
                            //session_start();
                            //echo "Usuario: $_SESSION[nombre] $_SESSION[apellido]<br>";
                        ?>
                    </h2>
                    <a href="logout.php"><img src="images/logout.png" width="30"/></a>
                </div>
            </div>
           <div class="container" style="padding-top:200px">
                <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-7">SOFTWARE</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">LICENCIA</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">CODIGO</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">CANTIDAD</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">FEHCA FIN</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">OBSERVACIONES</div>
                        <div class="col-md-7 col-sm-7 col-xs-7"></div>
                </div>
<?php
    include("conexion.php");

    $sql="SELECT s.*, l.* FROM software as s, licencia as l WHERE s.idlicencia=l.idlicencia;";

    $registros=mysqli_query($conexion,$sql);

    //leemos el contenido de registros
    while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        
        echo"<div class='col-md-7 col-sm-7 col-xs-7'>$linea[software]</div>";
        echo"<div class='col-md-7 col-sm-7 col-xs-7'>$linea[licencia]</div>";
        echo"<div class='col-md-7 col-sm-7 col-xs-7'>$linea[codigolicencia]</div>";
        echo"<div class='col-md-7 col-sm-7 col-xs-7'>$linea[cantidad]</div>";
        echo"<div class='col-md-7 col-sm-7 col-xs-7'>$linea[fechafin]</div>";
        echo"<div class='col-md-7 col-sm-7 col-xs-7'>$linea[observaciones]</div>";
        echo"<div class='col-md-4 col-sm-4 col-xs-4'><a href='bor-software.php?clave=$linea[idsoftware]'><img src='./images/borrar.png' width='25'></a></div>";
        echo"</div>";
            
            
           
        
    }

?>
            <div class="row">
                        <div class="col-*-*">
                            <a href="form-software.php"><input type="button" class="btn" value="Nuevo software"></a>
                        </div>
                        <div class="col-*-*">
                            <a href=""><input type="button" class="btn" value="Volver a inicio"></a>
                        </div>
                    </div>
            </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
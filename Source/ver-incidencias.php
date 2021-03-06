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
           <div id="formcontainer" style="margin-top:200px; ">
                <div class="row" style = "padding-left: 20px;">
                        <div class="col"><h5>Nº INCIDENCIA</h5></div>
                        <div class="col"><h5>MATERIAL</h5></div>
                        <div class="col"><h5>FECHA DE LA INCIDENCIA</h5></div>
                        <div class="col"><h5>DESCRIPCIÓN INCIDENCIA</h5></div>
                        <div class="col"><h5>ENVIADA POR</h5></div>
                        <div class="col"></div>
                </div>
                <br>
<?php
    include("conexion.php");

    $sql="SELECT i.*, m.* FROM incidencias as i, material as m WHERE i.idreferencia=m.idreferencia;";

    $registros=mysqli_query($conexion,$sql);

    //leemos el contenido de registros
    while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        
        echo"<div class='col'>$linea[idincidencia]</div>";
        echo"<div class='col'>$linea[idreferencia]</div>";
        echo"<div class='col'>$linea[fechaincidencia]</div>";
        echo"<div class='col'>$linea[incidencia]</div>";
        echo"<div class='col'>$linea[usuario]</div>";
        echo"<div class='col'><a href='form-incidenciassolucion.php?clave=$linea[idincidencia]'><img src='./images/editar.png' width='25'></a></div>";
        echo"<hr style=\"background-color: white; height: 2px;\">";
        echo"</div>";
            
            
           
        
    }

?>
            <div class="row">
                        <div class="col">
                            <a href="form-incidencias.php"><input type="button" class="btn" value="Nueva incidencia"></a>
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
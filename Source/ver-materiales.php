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
                        <div class="col-md-2 col-sm-2 col-xs-2">SOFTWARE: </div>
                        <div class="col-md-2 col-sm-2 col-xs-2"></div>
                </div>
<?php

    $mat=$_POST['material'];

    include("conexion.php");

    if($mat==1){//monitor
        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MODELO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MARCA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> PROVEEDOR </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> USUARIO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> UBICACIÓN </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> OBSERVACIONES </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> TIPO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> TAMAÑO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> NUMERO DE SERIE </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> NUMERO INTERNO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> FECHA ENTRADA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> GARANTIA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> ESTADO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>DAR DE BAJA</div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones, mon.*, es.*
                FROM material as m, marca as ma, ubicacion as u, usuarios as usu, monitores as mon, estadoequipos as es
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca AND es.idestado=mon.idestado 
                AND m.idreferencia IN (SELECT idreferencia FROM monitores)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[modelo]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[marca]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[idproveedor]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[ubicacion]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[observaciones]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[tipo]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[tamano]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[numserie]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[numinterno]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[fechaentrada]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[garantia]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[estado]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'><a href='bor-materialesmonitor.php?ref=$linea[idreferencia]'><img src='./images/borrar.png' width='25'></a></div>";
        echo"</div>";  
        }
    } else if($mat==2) {//impresora
        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MODELO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MARCA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> PROVEEDOR </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> USUARIO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> UBICACIÓN </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> OBSERVACIONES </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> TIPO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> CONSUMIBLE </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> NUMERO DE SERIE </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> NUMERO INTERNO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> FECHA ENTRADA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> GARANTIA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> ESTADO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>DAR DE BAJA</div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones, im.*, es.*
                FROM material as m, marca as ma, ubicacion as u, usuarios as usu, impresoras as im, estadoequipos as es
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca AND es.idestado=im.idestado 
                AND m.idreferencia IN (SELECT idreferencia FROM impresoras)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[modelo]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[marca]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[idproveedor]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[ubicacion]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[observaciones]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[tipo]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[consumible]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[numserie]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[numinterno]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[fechaentrada]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[garantia]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[estado]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'><a href='bor-materialesimpresora.php?ref=$linea[idreferencia]'><img src='./images/borrar.png' width='25'></a></div>";
        echo"</div>";  
        }
    } else if($mat==3) {//ordenador
        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MODELO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MARCA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> PROVEEDOR </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> USUARIO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> UBICACIÓN </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> OBSERVACIONES </div>";

        echo"<div class='col-md-1 col-sm-1 col-xs-1'> PLACA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> PROCESADOR </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> RAM </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> DISCO DURO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> TARJETAS </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> IP </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> DOMINIO </div>";

        echo"<div class='col-md-1 col-sm-1 col-xs-1'> NUMERO DE SERIE </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> NUMERO INTERNO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> FECHA ENTRADA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> GARANTIA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> ESTADO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>DAR DE BAJA</div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones, ord.*, es.*
                FROM material as m, marca as ma, ubicacion as u, usuarios as usu, ordenadores as ord, estadoequipos as es
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca AND es.idestado=ord.idestado 
                AND m.idreferencia IN (SELECT idreferencia FROM ordenadores)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[modelo]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[marca]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[idproveedor]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[ubicacion]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[observaciones]</div>";

        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[placa]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[procesador]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[ram]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[discoduro]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[tarjetas]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[ip]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[dominio]</div>";

        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[numserie]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[numinterno]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[fechaentrada]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[garantia]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[estado]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'><a href='bor-materialesordenador.php?ref=$linea[idreferencia]'><img src='./images/borrar.png' width='25'></a></div>";
        echo"</div>";  
        }
        
    } else if($mat==4) {//otros
        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MATERIAL </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MODELO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> MARCA </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> PROVEEDOR </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> USUARIO </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> UBICACIÓN </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'> OBSERVACIONES </div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'></div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.material, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones
                FROM material as m, marca as ma, ubicacion as u, usuarios as usu
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca
                AND idreferencia NOT IN (SELECT idreferencia FROM monitores)
                AND idreferencia NOT IN (SELECT idreferencia FROM impresoras)
                AND idreferencia NOT IN (SELECT idreferencia FROM ordenadores)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[material]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[modelo]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[marca]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[idproveedor]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[ubicacion]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'>$linea[observaciones]</div>";
        echo"<div class='col-md-1 col-sm-1 col-xs-1'><a href='bor-materiales.php?ref=$linea[idreferencia]'><img src='./images/borrar.png' width='25'></a></div>";
        echo"</div>";  
        }

    }
?>
            <div class="row">
                        <div class="col-*-*">
                            <a href="ver-buscarmateriales.php"><input type="button" class="btn" value="Buscar otro material"></a>
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
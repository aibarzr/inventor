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
            <<div id="menuContainer" style="z-index:2">
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
                        <div class="col"><h5>MATERIALES</h5> </div>
                        <div class="col"></div>
                </div>
<?php

    $mat=$_POST['material'];

    include("conexion.php");

    if($mat==1){//monitor
        echo"<div class='row'>";
        echo"<div class='col'> <h5>MODELO</h5> </div>";
        echo"<div class='col'> <h5>MARCA</h5> </div>";
        echo"<div class='col'> <h5>PROVEEDOR</h5> </div>";
        echo"<div class='col'> <h5>USUARIO</h5> </div>";
        echo"<div class='col'> <h5>UBICACIÓN</h5> </div>";
        echo"<div class='col'> <h5>OBSERVACIONES</h5> </div>";
        echo"<div class='col'> <h5>TIPO</h5> </div>";
        echo"<div class='col'> <h5>TAMAÑO</h5> </div>";
        echo"<div class='col'> <h5>NUMERO DE SERIE</h5> </div>";
        echo"<div class='col'> <h5>NUMERO INTERNO</h5> </div>";
        echo"<div class='col'> <h5>FECHA ENTRADA</h5> </div>";
        echo"<div class='col'> <h5>FECHA BAJA</h5> </div>";
        echo"<div class='col'> <h5>GARANTIA</h5> </div>";
        echo"<div class='col'> <h5>ESTADO</h5> </div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.material, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones, mon.*, es.*
                FROM historialmateriales as m, marca as ma, ubicacion as u, usuarios as usu, historialmonitores as mon, estadoequipos as es
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca AND mon.idestado=es.idestado
                AND m.idreferencia IN (SELECT idreferencia FROM historialmonitores)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col'>$linea[modelo]</div>";
        echo"<div class='col'>$linea[marca]</div>";
        echo"<div class='col'>$linea[idproveedor]</div>";
        echo"<div class='col'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col'>$linea[ubicacion]</div>";
        echo"<div class='col'>$linea[observaciones]</div>";
        echo"<div class='col'>$linea[tipo]</div>";
        echo"<div class='col'>$linea[tamano]</div>";
        echo"<div class='col'>$linea[numserie]</div>";
        echo"<div class='col'>$linea[numinterno]</div>";
        echo"<div class='col'>$linea[fechaentrada]</div>";
        echo"<div class='col'>$linea[fechabaja]</div>";
        echo"<div class='col'>$linea[garantia]</div>";
        echo"<div class='col'>$linea[estado]</div>";
        echo"</div>";  
        }
    } else if($mat==2) {//impresora
        echo"<div class='row'>";
        echo"<div class='col'> <h5>MODELO</h5> </div>";
        echo"<div class='col'> <h5>MARCA </h5></div>";
        echo"<div class='col'> <h5>PROVEEDOR</h5> </div>";
        echo"<div class='col'> <h5>USUARIO</h5> </div>";
        echo"<div class='col'> <h5>UBICACIÓN</h5> </div>";
        echo"<div class='col'> <h5>OBSERVACIONES</h5> </div>";
        echo"<div class='col'> <h5>TIPO</h5> </div>";
        echo"<div class='col'> <h5>CONSUMIBLE</h5> </div>";
        echo"<div class='col'> <h5>NUMERO DE SERIE</h5> </div>";
        echo"<div class='col'> <h5>NUMERO INTERNO</h5> </div>";
        echo"<div class='col'> <h5>FECHA ENTRADA</h5> </div>";
        echo"<div class='col'> <h5>FECHA BAJA </h5></div>";
        echo"<div class='col'> <h5>GARANTIA</h5> </div>";
        echo"<div class='col'> <h5>ESTADO</h5> </div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.material, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones, im.*, es.*
                FROM historialmateriales as m, marca as ma, ubicacion as u, usuarios as usu, historialimpresoras as im, estadoequipos as es
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca AND im.idestado=es.idestado
                AND m.idreferencia IN (SELECT idreferencia FROM historialimpresoras)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col'>$linea[modelo]</div>";
        echo"<div class='col'>$linea[marca]</div>";
        echo"<div class='col'>$linea[idproveedor]</div>";
        echo"<div class='col'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col'>$linea[ubicacion]</div>";
        echo"<div class='col'>$linea[observaciones]</div>";
        echo"<div class='col'>$linea[tipo]</div>";
        echo"<div class='col'>$linea[consumible]</div>";
        echo"<div class='col'>$linea[numserie]</div>";
        echo"<div class='col'>$linea[numinterno]</div>";
        echo"<div class='col'>$linea[fechaentrada]</div>";
        echo"<div class='col'>$linea[fechabaja]</div>";
        echo"<div class='col'>$linea[garantia]</div>";
        echo"<div class='col'>$linea[estado]</div>";
        echo"</div>";  
        }
    } else if($mat==3) {//ordenador
        echo"<div class='row'>";
        echo"<div class='col'> <h5>MODELO</h5> </div>";
        echo"<div class='col'> <h5>MARCA</h5> </div>";
        echo"<div class='col'> <h5>PROVEEDOR</h5> </div>";
        echo"<div class='col'> <h5>USUARIO</h5> </div>";
        echo"<div class='col'> <h5>UBICACIÓN</h5> </div>";
        echo"<div class='col'> <h5>OBSERVACIONES</h5> </div>";

        echo"<div class='col'> <h5>PLACA</h5> </div>";
        echo"<div class='col'> <h5>PROCESADOR </h5></div>";
        echo"<div class='col'> <h5>RAM</h5> </div>";
        echo"<div class='col'> <h5>DISCO DURO</h5> </div>";
        echo"<div class='col'> <h5>TARJETAS</h5> </div>";
        echo"<div class='col'> <h5>IP </h5></div>";
        echo"<div class='col'> <h5>DOMINIO </h5></div>";

        echo"<div class='col'> <h5>NUMERO DE SERIE</h5> </div>";
        echo"<div class='col'> <h5>NUMERO INTERNO</h5> </div>";
        echo"<div class='col'> <h5>FECHA ENTRADA</h5> </div>";
        echo"<div class='col'> <h5>FECHA BAJA</h5> </div>";
        echo"<div class='col'> <h5>GARANTIA</h5> </div>";
        echo"<div class='col'> <h5>ESTADO</h5> </div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.material, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones, ord.*, es.*
                FROM historialmateriales as m, marca as ma, ubicacion as u, usuarios as usu, historialordenadores as ord, estadoequipos as es
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca AND ord.idestado=es.idestado
                AND m.idreferencia IN (SELECT idreferencia FROM historialordenadores)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col'>$linea[modelo]</div>";
        echo"<div class='col'>$linea[marca]</div>";
        echo"<div class='col'>$linea[idproveedor]</div>";
        echo"<div class='col'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col'>$linea[ubicacion]</div>";
        echo"<div class='col'>$linea[observaciones]</div>";

        echo"<div class='col'>$linea[placa]</div>";
        echo"<div class='col'>$linea[procesador]</div>";
        echo"<div class='col'>$linea[ram]</div>";
        echo"<div class='col'>$linea[discoduro]</div>";
        echo"<div class='col'>$linea[tarjetas]</div>";
        echo"<div class='col'>$linea[ip]</div>";
        echo"<div class='col'>$linea[dominio]</div>";

        echo"<div class='col'>$linea[numserie]</div>";
        echo"<div class='col'>$linea[numinterno]</div>";
        echo"<div class='col'>$linea[fechaentrada]</div>";
        echo"<div class='col'>$linea[fechabaja]</div>";
        echo"<div class='col'>$linea[garantia]</div>";
        echo"<div class='col'>$linea[estado]</div>";
        echo"</div>";  
        }
        
    } else if($mat==4) {//otros
        echo"<div class='row'>";
        echo"<div class='col'> <h5>MATERIAL</h5> </div>";
        echo"<div class='col'> <h5>MODELO</h5> </div>";
        echo"<div class='col'> <h5>MARCA</h5> </div>";
        echo"<div class='col'> <h5>PROVEEDOR</h5> </div>";
        echo"<div class='col'> <h5>USUARIO</h5> </div>";
        echo"<div class='col'> <h5>UBICACIÓN </h5></div>";
        echo"<div class='col'> <h5>OBSERVACIONES </h5></div>";
        echo"</div>";

        $sql="SELECT m.idreferencia, m.material, m.modelo, ma.marca, m.idproveedor, usu.nombre, usu.primerapellido, usu.segundoapellido, u.ubicacion, m.observaciones
                FROM historialmateriales as m, marca as ma, ubicacion as u, usuarios as usu
                WHERE usu.idusuario=m.idusuario AND u.idubicacion=m.idubicacion AND m.idmarca=ma.idmarca
                AND idreferencia NOT IN (SELECT idreferencia FROM historialmonitores)
                AND idreferencia NOT IN (SELECT idreferencia FROM historialimpresoras)
                AND idreferencia NOT IN (SELECT idreferencia FROM historialordenadores)";


        $registros=mysqli_query($conexion,$sql);

        while($linea=mysqli_fetch_array($registros)){

        echo"<div class='row'>";
        echo"<div class='col'>$linea[material]</div>";
        echo"<div class='col'>$linea[modelo]</div>";
        echo"<div class='col'>$linea[marca]</div>";
        echo"<div class='col'>$linea[idproveedor]</div>";
        echo"<div class='col'>$linea[nombre] $linea[primerapellido] $linea[segundoapellido]</div>";
        echo"<div class='col'>$linea[ubicacion]</div>";
        echo"<div class='col'>$linea[observaciones]</div>";
        echo"</div>";  
        }

    }
?>
            <div class="row">
                        <div class="col">
                            <a href="ver-buscarmaterialeshistorial.php"><input type="button" class="btn" value="Buscar otro material"></a>
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
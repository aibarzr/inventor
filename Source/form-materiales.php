<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Entrada de material</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
</head>
<script language="JavaScript">
    function cambia(valor) {
        if (valor == 1) {
            document.getElementById("Monitor").style.display = "";
            document.getElementById("Impresora").style.display = "none";
            document.getElementById("Ordenador").style.display = "none";
            document.getElementById("Otros").style.display = "none";
        } else if (valor == 2) {
            document.getElementById("Monitor").style.display = "none";
            document.getElementById("Impresora").style.display = "";
            document.getElementById("Ordenador").style.display = "none";
            document.getElementById("Otros").style.display = "none";
        } else if (valor == 3){
            document.getElementById("Monitor").style.display = "none";
            document.getElementById("Impresora").style.display = "none";
            document.getElementById("Ordenador").style.display = "";
            document.getElementById("Otros").style.display = "none";
        } else if (valor == 4){
            document.getElementById("Monitor").style.display = "none";
            document.getElementById("Impresora").style.display = "none";
            document.getElementById("Ordenador").style.display = "none";
             document.getElementById("Otros").style.display = "";
        } else {
            document.getElementById("Monitor").style.display = "none";
            document.getElementById("Impresora").style.display = "none";
            document.getElementById("Ordenador").style.display = "none";
            document.getElementById("Otros").style.display = "none";
        }

    }
</script>
<body>
    <?php
        include("conexion.php");
    ?>
    <div class="container" style="overflow:auto">
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
        <br><br><br><br><br><br>
        <div id="formcontainer">
            <div class="row">
                <div class="col" style = "font-size: 20px">QUÉ MATERIAL ES?</div>
                <div class="col">
                    <select name="material" id="material" onchange="cambia(material.value)" style = "height: 30px; width: 100%">
                        <option value="0">
                        <option value="1">Monitor
                        <option value="2">Impresora
                        <option value="3">Ordenador
                        <option value="4">Otros
                    </select>  
                </div>
            </div>
            <br>
            <form name="Monitor" id="Monitor" method="post" action="ins-monitores.php" style="display: none">
                <div class="row">
                    <div class="col" style = "font-size: 20px">MODELO:</div>
                    <div class="col"><input type="text" name="modelo" id="modelo" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">MARCA:</div>
                    <div class="col">
                        <select name="marca" id="marca" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM marca";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idmarca]'>$linea[marca]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">PROVEEDORES:</div>
                    <div class="col">
                        <select name="proveedores" id="proveedores" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM proveedores";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idproveedor]'>$linea[proveedor]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">UBICACIÓN:</div>
                    <div class="col">
                        <select name="ubicacion" id="ubicacion" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM ubicacion";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idubicacion]'>$linea[ubicacion]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">OBSERVACIONES:</div>
                    <div class="col"><textarea class="form-control" rows="5" name="observaciones" id="observaciones" style = "height: 30px; width: 100%"></textarea></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">TIPO:</div>
                    <div class="col"><input type="text" name="tipo" id="tipo" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">TAMAÑO:</div>
                    <div class="col"><input type="text" name="tamaño" id="tamaño" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">NUMERO DE SERIE:</div>
                    <div class="col"><input type="text" name="numserie" id="numserie" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">NUMERO INTERNO:</div>
                    <div class="col"><input type="text" name="numinterno" id="numinterno" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">FECHA DE ENTRADA:</div>
                    <div class="col"><input type="date" name="entrada" id="entrada" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">GARANTIA (En años):</div>
                    <div class="col"><input type="number" name="garantia" id="garantia" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">ESTADO:</div>
                    <div class="col">
                        <select name="estado" id="estado" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM estadoequipos";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idestado]'>$linea[estado]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><button type="submit" class="btn" style = "width: 130px;">Añadir</button></div>
                    <div class="col">
                        <a href="ver-proveedores.php"><input type="button" class="btn" value="Ver materiales" style = "width: 150px;"></a>
                    </div> 
                    <div class="col">
                        <a href=""><input type="button" class="btn" value="Volver a inicio" style = "width: 130px;"></a>
                    </div>
                </div>
            </form>











            <form name="Impresora" id="Impresora" method="post" action="ins-impresoras.php" style="display: none">
                <div class="row">
                    <div class="col" style = "font-size: 20px">MODELO:</div>
                    <div class="col"><input type="text" name="modelo" id="modelo" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">MARCA:</div>
                    <div class="col">
                        <select name="marca" id="marca" style = "height: 30px; width: 100%"> 
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM marca";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idmarca]'>$linea[marca]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">PROVEEDORES:</div>
                    <div class="col">
                        <select name="proveedores" id="proveedores" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM proveedores";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idproveedor]'>$linea[proveedor]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">UBICACIÓN:</div>
                    <div class="col">
                        <select name="ubicacion" id="ubicacion" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM ubicacion";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idubicacion]'>$linea[ubicacion]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">OBSERVACIONES:</div>
                    <div class="col"><textarea class="form-control" rows="5" name="observaciones" id="observaciones" style = "height: 30px; width: 100%"></textarea></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">TIPO:</div>
                    <div class="col"><input type="text" name="tipo" id="tipo" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">CONSUMIBLE:</div>
                    <div class="col"><input type="text" name="consumible" id="consumible" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">NUMERO DE SERIE:</div>
                    <div class="col"><input type="text" name="numserie" id="numserie" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">NUMERO INTERNO:</div>
                    <div class="col"><input type="text" name="numinterno" id="numinterno" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">FECHA DE ENTRADA:</div>
                    <div class="col"><input type="date" name="entrada" id="entrada" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">GARANTIA (En años):</div>
                    <div class="col"><input type="number" name="garantia" id="garantia" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">ESTADO:</div>
                    <div class="col">
                        <select name="estado" id="estado" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM estadoequipos";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idestado]'>$linea[estado]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><button type="submit" class="btn" style = "width: 130px;">Añadir</button></div>
                    <div class="col">
                        <a href=""><input type="button" class="btn" value="Ver impresoras" style = "width: 150px;"></a>
                    </div>
                    <div class="col">
                        <a href=""><input type="button" class="btn" value="Volver a inicio" style = "width: 130px;"></a>
                    </div>
                </div>
            </form>












            <form name="Ordenador" id="Ordenador" method="post" action="ins-ordenadores.php" style="display: none">
                <div class="row">
                    <div class="col" style = "font-size: 20px">MODELO:</div>
                    <div class="col"><input type="text" name="modelo" id="modelo" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">MARCA:</div>
                    <div class="col">
                        <select name="marca" id="marca" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM marca";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idmarca]'>$linea[marca]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">PROVEEDORES:</div>
                    <div class="col">
                        <select name="proveedores" id="proveedores" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM proveedores";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idproveedor]'>$linea[proveedor]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">UBICACIÓN:</div>
                    <div class="col">
                        <select name="ubicacion" id="ubicacion" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM ubicacion";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idubicacion]'>$linea[ubicacion]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">OBSERVACIONES:</div>
                    <div class="col"><textarea class="form-control" rows="5" name="observaciones" id="observaciones" style = "height: 30px; width: 100%"></textarea></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">PLACA:</div>
                    <div class="col"><input type="text" name="placa" id="placa" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">PROCESADOR:</div>
                    <div class="col"><input type="text" name="procesador" id="procesador" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">RAM:</div>
                    <div class="col"><input type="text" name="ram" id="ram" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">DISCO DURO:</div>
                    <div class="col"><input type="text" name="disco" id="disco" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">TARJETAS:</div>
                    <div class="col"><input type="text" name="tarjetas" id="tarjetas" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">IP:</div>
                    <div class="col"><input type="text" name="ip" id="ip" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">DOMINIO:</div>
                    <div class="col"><input type="text" name="dominio" id="dominio" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">NUMERO DE SERIE:</div>
                    <div class="col"><input type="text" name="numserie" id="numserie" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">NUMERO INTERNO:</div>
                    <div class="col"><input type="text" name="numinterno" id="numinterno" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">FECHA DE ENTRADA:</div>
                    <div class="col"><input type="date" name="entrada" id="entrada" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">GARANTIA (En años):</div>
                    <div class="col"><input type="number" name="garantia" id="garantia" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">ESTADO:</div>
                    <div class="col">
                        <select name="estado" id="estado" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM estadoequipos";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idestado]'>$linea[estado]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><button type="submit" class="btn" style = "width: 130px;">Añadir</button></div>
                    <div class="col">
                        <a href=""><input type="button" class="btn" value="Ver ordenadores" style = "width: 150px;"></a>
                    </div>
                    <div class="col">
                        <a href=""><input type="button" class="btn" value="Volver a inicio" style = "width: 130px;"></a>
                    </div>
                </div>
            </form>











            <form name="Otros" id="Otros" method="post" action="ins-materiales.php" style="display: none">
                <div class="row">
                    <div class="col" style = "font-size: 20px">MATERIAL:</div>
                    <div class="col"><input type="text" name="mat" id="mat" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">MODELO:</div>
                    <div class="col"><input type="text" name="modelo" id="modelo" style = "height: 30px; width: 100%"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">MARCA:</div>
                    <div class="col">
                        <select name="marca" id="marca" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM marca";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idmarca]'>$linea[marca]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">PROVEEDORES:</div>
                    <div class="col">
                        <select name="proveedores" id="proveedores" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM proveedores";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idproveedor]'>$linea[proveedor]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">UBICACIÓN:</div>
                    <div class="col">
                        <select name="ubicacion" id="ubicacion" style = "height: 30px; width: 100%">
                            <option value="">
                                            <?php
                                                $sql="SELECT * FROM ubicacion";
                                                $registros = mysqli_query($conexion, $sql);
                                                while($linea=mysqli_fetch_array($registros)){
                                                    echo"<option value='$linea[idubicacion]'>$linea[ubicacion]";
                                                }
                                            ?>
                        </select>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col" style = "font-size: 20px">OBSERVACIONES:</div>
                    <div class="col"><textarea class="form-control" rows="5" name="observaciones" id="observaciones" style = "height: 30px; width: 100%"></textarea></div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><button type="submit" class="btn" style = "width: 130px;">Añadir</button></div>
                    <div class="col">
                        <a href=""><input type="button" class="btn" value="Ver materiales" style = "width: 150px;"></a>
                    </div>
                    <div class="col">
                        <a href=""><input type="button" class="btn" value="Volver a inicio" style = "width: 130px;"></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
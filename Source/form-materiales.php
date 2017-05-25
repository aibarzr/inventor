<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Panel de acceso</title>
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
        <div id="menuContainer">
            <div id="logo">
                <img src="images/logosz.png" />
            </div>
            <div id="user">
                <h2>
                    <?php
                         session_start();
                         echo "Usuario: $_SESSION[nombre] $_SESSION[apellido]<br>";
                     ?>
                 </h2>
                  <a href="logout.php"><img src="images/logout.png" width="30" /></a>
            </div>
        </div>
        <br><br><br><br><br><br>
        <div id="formcontainer">
            <div class="row">
                <div class="col-*-*">QUÉ MATERIAL ES?</div>
                <div class="col-*-*">
                    <select name="material" id="material" onchange="cambia(material.value)">
                        <option value="0">
                        <option value="1">Monitor
                        <option value="2">Impresora
                        <option value="3">Ordenador
                        <option value="4">Otros
                    </select>  
                </div>
            </div>
            <form name="Monitor" id="Monitor" method="post" action="ins-monitores.php" style="display: none">
                <div class="row">
                    <div class="col-*-*">MODELO:</div>
                    <div class="col-*-*"><input type="text" name="modelo" id="modelo"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">MARCA:</div>
                    <div class="col-*-*">
                        <select name="marca" id="marca">
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
                <div class="row">
                    <div class="col-*-*">PROVEEDORES:</div>
                    <div class="col-*-*">
                        <select name="proveedores" id="proveedores">
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
                <div class="row">
                    <div class="col-*-*">UBICACIÓN:</div>
                    <div class="col-*-*">
                        <select name="ubicacion" id="ubicacion">
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
                <div class="row">
                    <div class="col-*-*">OBSERVACIONES:</div>
                    <div class="col-*-*"><textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea></div>
                </div>
                <div class="row">
                    <div class="col-*-*">TIPO:</div>
                    <div class="col-*-*"><input type="text" name="tipo" id="tipo"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">TAMAÑO:</div>
                    <div class="col-*-*"><input type="text" name="tamaño" id="tamaño"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">NUMERO DE SERIE:</div>
                    <div class="col-*-*"><input type="text" name="numserie" id="numserie"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">NUMERO INTERNO:</div>
                    <div class="col-*-*"><input type="text" name="numinterno" id="numinterno"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">FECHA DE ENTRADA:</div>
                    <div class="col-*-*"><input type="date" name="entrada" id="entrada"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">GARANTIA (En años):</div>
                    <div class="col-*-*"><input type="number" name="garantia" id="garantia"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">ESTADO:</div>
                    <div class="col-*-*">
                        <select name="estado" id="estado">
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
                <div class="row">
                    <div class="col-*-*"><button type="submit" class="btn">Añadir</button></div>
                    <div class="col-*-*">
                        <a href="ver-proveedores.php"><input type="button" class="btn" value="Ver materiales"></a>
                    </div>
                    <div class="col-*-*">
                        <a href=""><input type="button" class="btn" value="Volver a inicio"></a>
                    </div>
                </div>
            </form>











            <form name="Impresora" id="Impresora" method="post" action="ins-impresoras.php" style="display: none">
                <div class="row">
                    <div class="col-*-*">MODELO:</div>
                    <div class="col-*-*"><input type="text" name="modelo" id="modelo"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">MARCA:</div>
                    <div class="col-*-*">
                        <select name="marca" id="marca">
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
                <div class="row">
                    <div class="col-*-*">PROVEEDORES:</div>
                    <div class="col-*-*">
                        <select name="proveedores" id="proveedores">
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
                <div class="row">
                    <div class="col-*-*">UBICACIÓN:</div>
                    <div class="col-*-*">
                        <select name="ubicacion" id="ubicacion">
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
                <div class="row">
                    <div class="col-*-*">OBSERVACIONES:</div>
                    <div class="col-*-*"><textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea></div>
                </div>
                <div class="row">
                    <div class="col-*-*">TIPO:</div>
                    <div class="col-*-*"><input type="text" name="tipo" id="tipo"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">CONSUMIBLE:</div>
                    <div class="col-*-*"><input type="text" name="consumible" id="consumible"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">NUMERO DE SERIE:</div>
                    <div class="col-*-*"><input type="text" name="numserie" id="numserie"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">NUMERO INTERNO:</div>
                    <div class="col-*-*"><input type="text" name="numinterno" id="numinterno"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">FECHA DE ENTRADA:</div>
                    <div class="col-*-*"><input type="date" name="entrada" id="entrada"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">GARANTIA (En años):</div>
                    <div class="col-*-*"><input type="number" name="garantia" id="garantia"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">ESTADO:</div>
                    <div class="col-*-*">
                        <select name="estado" id="estado">
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
                <div class="row">
                    <div class="col-*-*"><button type="submit" class="btn">Añadir</button></div>
                    <div class="col-*-*">
                        <a href=""><input type="button" class="btn" value="Ver impresoras"></a>
                    </div>
                    <div class="col-*-*">
                        <a href=""><input type="button" class="btn" value="Volver a inicio"></a>
                    </div>
                </div>
            </form>












            <form name="Ordenador" id="Ordenador" method="post" action="ins-ordenadores.php" style="display: none">
                <div class="row">
                    <div class="col-*-*">MODELO:</div>
                    <div class="col-*-*"><input type="text" name="modelo" id="modelo"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">MARCA:</div>
                    <div class="col-*-*">
                        <select name="marca" id="marca">
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
                <div class="row">
                    <div class="col-*-*">PROVEEDORES:</div>
                    <div class="col-*-*">
                        <select name="proveedores" id="proveedores">
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
                <div class="row">
                    <div class="col-*-*">UBICACIÓN:</div>
                    <div class="col-*-*">
                        <select name="ubicacion" id="ubicacion">
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
                <div class="row">
                    <div class="col-*-*">OBSERVACIONES:</div>
                    <div class="col-*-*"><textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea></div>
                </div>
                <div class="row">
                    <div class="col-*-*">PLACA:</div>
                    <div class="col-*-*"><input type="text" name="placa" id="placa"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">PROCESADOR:</div>
                    <div class="col-*-*"><input type="text" name="procesador" id="procesador"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">RAM:</div>
                    <div class="col-*-*"><input type="text" name="ram" id="ram"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">DISCO DURO:</div>
                    <div class="col-*-*"><input type="text" name="disco" id="disco"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">TARJETAS:</div>
                    <div class="col-*-*"><input type="text" name="tarjetas" id="tarjetas"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">IP:</div>
                    <div class="col-*-*"><input type="text" name="ip" id="ip"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">DOMINIO:</div>
                    <div class="col-*-*"><input type="text" name="dominio" id="dominio"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">NUMERO DE SERIE:</div>
                    <div class="col-*-*"><input type="text" name="numserie" id="numserie"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">NUMERO INTERNO:</div>
                    <div class="col-*-*"><input type="text" name="numinterno" id="numinterno"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">FECHA DE ENTRADA:</div>
                    <div class="col-*-*"><input type="date" name="entrada" id="entrada"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">GARANTIA (En años):</div>
                    <div class="col-*-*"><input type="number" name="garantia" id="garantia"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">ESTADO:</div>
                    <div class="col-*-*">
                        <select name="estado" id="estado">
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
                <div class="row">
                    <div class="col-*-*"><button type="submit" class="btn">Añadir</button></div>
                    <div class="col-*-*">
                        <a href=""><input type="button" class="btn" value="Ver ordenadores"></a>
                    </div>
                    <div class="col-*-*">
                        <a href=""><input type="button" class="btn" value="Volver a inicio"></a>
                    </div>
                </div>
            </form>











            <form name="Otros" id="Otros" method="post" action="ins-materiales.php" style="display: none">
                <div class="row">
                    <div class="col-*-*">MATERIAL:</div>
                    <div class="col-*-*"><input type="text" name="mat" id="mat"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">MODELO:</div>
                    <div class="col-*-*"><input type="text" name="modelo" id="modelo"></div>
                </div>
                <div class="row">
                    <div class="col-*-*">MARCA:</div>
                    <div class="col-*-*">
                        <select name="marca" id="marca">
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
                <div class="row">
                    <div class="col-*-*">PROVEEDORES:</div>
                    <div class="col-*-*">
                        <select name="proveedores" id="proveedores">
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
                <div class="row">
                    <div class="col-*-*">UBICACIÓN:</div>
                    <div class="col-*-*">
                        <select name="ubicacion" id="ubicacion">
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
                <div class="row">
                    <div class="col-*-*">OBSERVACIONES:</div>
                    <div class="col-*-*"><textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea></div>
                </div>
                <div class="row">
                    <div class="col-*-*"><button type="submit" class="btn">Añadir</button></div>
                    <div class="col-*-*">
                        <a href=""><input type="button" class="btn" value="Ver materiales"></a>
                    </div>
                    <div class="col-*-*">
                        <a href=""><input type="button" class="btn" value="Volver a inicio"></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
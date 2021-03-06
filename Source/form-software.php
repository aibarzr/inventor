<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <?php
        include("conexion.php");
    ?>
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
            <br><br><br><br><br><br>
            <div id="formcontainer">
                <form name="software" id="software" method="post" action="ins-software.php">
                    <div class="row">
                        <div class="col" style="font-size: 20px">NOMBRE:</div>
                        <div class="col"><input type="text" name="nombre" id="nombre" style="height: 30px; width: 100%"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col" style="font-size: 20px">TIPO DE LICENCIA:</div>
                        <div class="col">
                            <select name="licencia" id="licencia" style="height: 30px; width: 100%">
                                <option value="">
                                    <?php
                                        $sql="SELECT * FROM licencia";
                                        $registros = mysqli_query($conexion, $sql);
                                        while($linea=mysqli_fetch_array($registros)){
                                            echo"<option value='$linea[idlicencia]'>$linea[licencia]";
                                        }
                                    ?>
                            </select>  
                        </div>
                    </div>
                        <br>
                        <div class="row">
                            <div class="col" style="font-size: 20px">CODIGO DE LA LICENCIA:</div>
                            <div class="col"><input type="text" name="codigo" id="codigo" style="height: 30px; width: 100%"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="font-size: 20px">CANTIDAD:</div>
                            <div class="col"><input type="number" name="cantidad" id="cantidad" style="height: 30px; width: 100%"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="font-size: 20px">FECHA FIN:</div>
                            <div class="col"><input type="date" name="fechafin" id="fechafin" style="height: 30px; width: 100%"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="font-size: 20px">OBSERVACIONES:</div>
                            
                            <div class="col"><textarea class="form-control" rows="5" name="observaciones" id="observaciones" style="height: 30px; width: 100%"></textarea></div>
                        </div>
                    <br>
                            <div class="row">
                                <div class="col"><button type="submit" class="btn" style="width: 130px;">Añadir</button></div>
                                <div class="col">
                                    <a href="ver-software.php"><input type="button" class="btn" value="Ver" style="width: 130px;"></a>
                                </div>
                                <div class="col">
                                    <a href=""><input type="button" class="btn" value="Volver a inicio" style="width: 130px;"></a>
                                </div>
                            </div>
                </form>
                </div>
                </div>



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
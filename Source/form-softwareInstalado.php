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
            <div id="menuContainer">
                <div id="logo">
                    <img src="images/logosz.png" />
                </div>
                <div id="user">
                    <h2>Pepe Manué
                        <?php
                            //session_start();
                            //echo "Usuario: $_SESSION[nombre] $_SESSION[apellido]<br>";
                        ?>
                    </h2>
                    <a href="logout.php"><img src="images/logout.png" width="30" /></a>
                </div>
            </div>
            <br><br><br><br><br><br>
            <div id="formcontainer">
                <form name="softwareinstalado" id="softwareinstalado" method="post" action="ins-softwareinstalado.php">
                        <div class="row">
                            <div class="col-*-*">SELECCIONE EL NUMERO INTERNO DEL ORDENADOR:</div>
                            <div class="col-*-*">
                                <select name="ordenadores" id="ordenadores">
                                        <?php
                                            $sql="SELECT * FROM ordenadores";
                                            $registros = mysqli_query($conexion, $sql);
                                            while($linea=mysqli_fetch_array($registros)){
                                                echo"<option value='$linea[idreferencia]'>$linea[numinterno]";
                                            }
                                        ?>
                                </select>  
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-*-*">SOFTWARE:</div>
                        <div class="col-*-*">
                            
                                    <?php
                                        $sql="SELECT * FROM software";
                                        $registros = mysqli_query($conexion, $sql);
                                        while($linea=mysqli_fetch_array($registros)){
                                            echo"<label><input type='checkbox' name='software[]' value='$linea[idsoftware]'>$linea[software]</label><br>";
                                        }
                                    ?>
                            
                        </div>
                    </div>
                    

                            <div class="row">
                                <div class="col-*-*"><button type="submit" class="btn">Añadir</button></div>
                                <div class="col-*-*">
                                    <a href="ver-buscarsoftwareinstalado.php"><input type="button" class="btn" value="Ver"></a>
                                </div>
                                <div class="col-*-*">
                                    <a href=""><input type="button" class="btn" value="Volver a inicio"></a>
                                </div>
                            </div>
                    </div>
                </form>
                </div>
                </div>



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
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
        <div style="margin-top: 150px; text-align: center;">
            <?php
                if($_SESSION['idespecialidad']=='2'){//ADMIN
                    echo"<div class=\"row\">
                <a href=\"form-materiales.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar material</h3>
                </div></a>
                <a href=\"form-usuarios.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar usuarios</h3>
                </div></a>
                <a href=\"form-revisiones.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar revisiones</h3>
                </div></a>
                <a href=\"form-software.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar software</h3>
                </div></a>
                <a href=\"form-ubicaciones.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar ubicaciones</h3>
                </div></a>
            </div>
            <br>
            <div class=\"row\">
                <a href=\"form-softwareInstalado.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar software instalado</h3>
                </div></a>
                <a href=\"form-marcas.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar marcas</h3>
                </div></a>
                <a href=\"form-proveedores.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar proveedores</h3>
                </div></a>
                <a href=\"form-inciencias.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar incidencias</h3>
                </div></a>
                
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class=\"row\">
                <a href=\"ver-material.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver material</h3>
                </div></a>
                <a href=\"ver-usuarios.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver usuarios</h3>
                </div></a>
                <a href=\"ver-revisiones.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver revisiones</h3>
                </div></a>
                <a href=\"ver-software.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver software</h3>
                </div></a>
                <a href=\"ver-ubicaciones.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver ubicaciones</h3>
                </div></a>
            </div>
            <br>
            <div class=\"row\">
                <a href=\"ver-marcas.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver marcas</h3>
                </div></a>
                <a href=\"ver-proveedores.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver proveedores</h3>
                </div></a>
                <a href=\"ver-incidencias.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver incidencias</h3>
                </div></a>
                <a href=\"ver-softwareInstalado.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver software instalado</h3>
                </div></a>
            </div>";
                } else if($_SESSION['idespecialidad']=='1'){//SAT
                    echo"<div class=\"row\">
                <a href=\"form-incidencias.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar incidencias</h3>
                </div></a>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class=\"row\">
                <a href=\"ver-incidencias.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver incidencias</h3>
                </div></a>
            </div>";
                } else if($_SESSION['idespecialidad']=='3'){//PROFESORES
                    echo"<div class=\"row\">
                <a href=\"form-incidencias.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Insertar incidencias</h3>
                </div></a>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class=\"row\">
                <a href=\"ver-incidenciasprofesores.php\" class=\"col\" style=\"background: gray; margin-left: 10px; margin-right: 10px; color: white; border-radius: 10px 10px 10px; width: 150px; height: 120px;\"><div style = \"display:flex; justify-content: center;\">
                    <h3 style=\"position:relative; margin:auto;\">Ver incidencias</h3>
                </div></a>
            </div>";
                }
                ?>
            

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
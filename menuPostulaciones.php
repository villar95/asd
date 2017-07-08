<?php
session_start();
if (isset($_SESSION["user"])) {
    $data = $_SESSION["user"];
} else {
    $data = array();
}
?>
<!DOCTYPE html>


<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>Nuevo Futuro</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php if (count($data) > 0) { ?>
            <nav>
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">Nuevo Futuro</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="menuUsuario.php"><i class="material-icons left">assignment_ind</i>Bienvenido <?= $data[1] ?></a></li>
                        <li><a href="Perfil.php"><i class="material-icons left">perm_identity</i>Ver Perfil</a></li>
                        <li><a href="menuPostulaciones.php"><i class="material-icons left">view_list</i>Mis Postulaciones</a></li>
                        <li><a href="moduloOfertas.php"><i class="material-icons left">search</i>Ver Ofertas</a></li>
                        <li><a href="Salir.php"><i class="material-icons right">power_settings_new</i>Salir</a></li>
                    </ul>
                </div>
            </nav>
            <input id="rut"  class="hide" value="<?= $data[0] ?>">
            <div class="container">
                <div class="col m3">
                    <div class="col m6">
                        <table id="tabla">
                            <thead>
                                <tr><td>Nombre</td><td>Estado</td></tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="input-field col m3">
                    <input type="submit" value="Actualizar" class="btn" id="Actualizar"> 
                </div>
            </div>


        <?php } else { //sino existe enviamos un mensaje   ?>
            Necesitas Permisos para estar aca. <br>
            En segundos seras redireccionado
            <br>
            <meta http-equiv="REFRESH" content="5;URL=index.html">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        <?php } ?>


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/myJS.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                getPostulaciones();
                $("#Actualizar").click(function (e) {
                    e.preventDefault();
                    getPostulaciones();
                });
            });
        </script>

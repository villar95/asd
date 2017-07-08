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

            <div class="container">
                <div class="col m3">
                    <div class="col m6">
                        <table id="tabla">
                            <thead>
                                <tr><td>Codigo</td><td>Oferta</td></tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>Detalle</h4>
                    <div class="col m12 ">
                        <table>
                            <tr><td><h4><b>Codigo</b></h4></td><td><h4><b>Nombre</b></h4></td><td><h4><b>Cargo</b></h4></td></tr>
                            <tr><td><u><input type="text" id="codigo"></u></td><td><u><input type="text" id="nombre"></u></td><td><u><input type="text" id="cargo"></u></td></tr>

                            <tr><td></td><td><h4><b>Descripcion</b></h4></td></tr>
                            <tr><td></td><td><u><input type="text" id="descripcion"></u></td></tr>

                            <tr><td><h4><b>Vacantes</b></h4></td><td><h4><b>mail</b></h4></td></tr>
                            <tr><td><u><input type="text" id="vacantes"></u></td><td><u><input type="text" id="mail"></u></td></tr>

                        </table>
                        <table class="hide">
                            <tr><td><input id="rutPostulante" value="<?= $data[0] ?>"></td>
                                <td><input id="codigoOferta" ></td>
                                <td><input id="xestado"></td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat btn-block red">Salir</a>
                            <input type="submit" name="bt" id="btnPostular" value="Postular" class="btn right"/>
                        </div>
                    </div
                </div>
            </div>
        </div>


    <?php } else { //sino existe enviamos un mensaje  ?>
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
            getOfertas();
            
            $("#tbody").click(function (e) {
                e.preventDefault();
                cargarModal();
            });
            $("#btnPostular").click(function (e) {
                e.preventDefault();
                descontarVacantes();
                Postulacion();
                
                
            });

        });
    </script>

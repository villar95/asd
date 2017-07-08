<?php
session_start();

if (isset($_SESSION["admin"])) {
    $data = $_SESSION["admin"];
} else {
    $data = array();
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>Nuevo Futuro</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php if (count($data) > 0) { ?>
            <nav>
                <div class="nav-wrapper col x12 s12 m12">
                    <a href="#!" class="brand-logo">Nuevo Futuro</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="Administrador.php"><i class="material-icons left">assignment_ind</i>Bienvenido <?= $data[1] ?></a></li>
                        <li><a href="perfilAdmin.php"><i class="material-icons left">perm_identity</i>Ver Perfil</a></li>
                        <li><a href="ofertaAdmin.php"><i class="material-icons left">view_list</i>Gestion Of. Laboral</a></li>
                        <li><a href="gestionPostulacion.php"><i class="material-icons left">search</i>Gestion Postulaciones</a></li>
                        <li><a href="Salir.php"><i class="material-icons right">power_settings_new</i>Salir</a></li>
                    </ul>
                </div>
            </nav>

            <div id="index-banner" class="parallax-container">
                <div class="section no-pad-bot">
                    <div class="container">
                    </div>
                </div>
                <div class="parallax"><img src="Imagenes/20160821_190539.jpg" class="responsive-img" alt=""/></div>
            </div>

            <div class="col m12">
                <div id="modal1" class="modal">
                    <div class="modal-content">

                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat btn-block red">Salir</a>

                    </div>
                </div>
            </div>


            <div class="container">
                <div class="section">

                    <!--   Icon Section   -->
                    <div class="row">
                        <div class="col s12 m4">
                            <div class="icon-block">
                                <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                                <h5 class="center">Postulaciones y ofertas.</h5>

                                <p class="light">En esta pagina tendras ofertas de trabajo, en donde podras postular a corto plazo.</p>
                            </div>
                        </div>

                        <div class="col s12 m4">
                            <div class="icon-block">
                                <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                                <h5 class="center">Rapidez de respuesta</h5>
                                <p class="light">Todos los resultados, de tus postulaciones estaran al instante.</p>
                            </div>
                        </div>

                        <div class="col s12 m4">
                            <div class="icon-block">
                                <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
                                <h5 class="center">Modificar tu Perfil</h5>

                                <p class="light">Podras modificar el perfil a tu gusto, incluyendo una nueva foto.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>




            <div class="parallax-container valign-wrapper">
                <div class="section no-pad-bot">
                    <div class="container">
                        <div class="row center">

                        </div>
                    </div>
                </div>
                <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 3"></div>
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

        <script src="js/materialize.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/myJS.js" type="text/javascript"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript">
            $(function () {





            });
        </script>
    </body>
</html>

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

        <!--Import materialize.css-->


        <!--Let browser know website is optimized for mobile-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
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
                <div class="row">
                    <br>
                    <br><br><br>
                    <div class="col s3 m3">
                        <img  style="border-radius: 10%" class="responsive-img" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION["user"][7]) ?>">
                    </div>
                    <div class="col s9 m9">
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">account_circle</i>
                            <label for="xrut">Rut</label>
                            <input type="text" value="<?= $data[0] ?>"id="xrut">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">perm_identity</i>
                            <label for="xnombre">Nombre</label>
                            <input type="text" value="<?= $data[1] ?>"id="xnombre">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">perm_identity</i>
                            <label for="xapellido">Apellido</label>
                            <input type="text"value="<?= $data[2] ?>" id="xapellido">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">work</i>
                            <label for="xprofesion">Profesion</label>
                            <input type="text"value="<?= $data[3] ?>" id="xprofesion">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">location_on</i>
                            <label for="xciudad">Ciudad</label>
                            <input type="text"value="<?= $data[4] ?>" id="xciudad">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">account_circle</i>
                            <label for="xmail">Email</label>
                            <input type="text"value="<?= $data[5] ?>" id="xmail">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">account_circle</i>
                            <label for="xclave">Clave</label>
                            <input type="password"value="<?= $data[6] ?>" id="xclave">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">account_circle</i>
                            <label for="xclave2">Ingrese Clave Nuevamente</label>
                            <input type="password"value="<?= $data[6] ?>" id="xclave2">
                        </div>

                        <form enctype="multipart/form-data" action="SubirImg.php" method="POST">
                            <div class="hide">
                                <input type=text id="xrut" name="rut" value="<?= $data[0] ?>">
                                <input type=text id="xclave" name="clave" value="<?= $data[6] ?>">
                            </div>
                            <div class="input-field col m6">

                                <label for="perfil"></label>
                                <input name="perfil" id="perfil" type="file">
                            </div>
                            <div class="col m3">
                                <input type="submit" value="Guardar Imagen" class="btn" id="aa"> 

                            </div>
                        </form>
                        <div class="col m4"></div>
                        <div class="col m3">
                            <input type="submit" value="Editar"name="bt" class="btn" id="bt"> 
                        </div>  

                    </div>
                </div>
            </div>




        <?php } else { //sino existe enviamos un mensaje    ?>
            Necesitas Permisos para estar aca. <br>
            En segundos seras redireccionado
            <br>
            <meta http-equiv="REFRESH" content="5;URL=index.html">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        <?php } ?>


        <!--  Scripts-->
        <script src="js/materialize.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/myJS.js" type="text/javascript"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#bt").click(function (e) {
                    e.preventDefault();
                    editarPerfil();
                    subirPerfil();
                });
            });



        </script>

    </body>
</html>
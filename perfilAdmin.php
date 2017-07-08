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
            <div class="container">
                <div class="row">
                    <br>
                    <br><br><br>
                    <div class="col s3 m3">
                        <img  style="border-radius: 10%" class="responsive-img" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION["admin"][6]) ?>">
                        <img  style="border-radius: 10%" class="responsive-img" src="data:pdf">
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
                            <label for="xcargo">Cargo</label>
                            <input type="text"value="<?= $data[3] ?>" id="xcargo">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">email</i>
                            <label for="xmail">Mail</label>
                            <input type="text"value="<?= $data[4] ?>" id="xmail">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">account_circle</i>
                            <label for="xclave">Clave</label>
                            <input type="password"value="<?= $data[5] ?>" id="xclave">
                        </div>
                        <div class="col m6 input-field">
                            <i class="material-icons prefix big">account_circle</i>
                            <label for="xclave2">Ingrese Clave Nuevamente</label>
                            <input type="password"value="<?= $data[5] ?>" id="xclave2">
                        </div>
                        <form enctype="multipart/form-data" action="subirImgAdmin.php" method="POST">
                            <div class="hide">
                                <input type=text id="xrut" name="rut" value="<?= $data[0] ?>">
                                <input type=text id="xclave" name="clave" value="<?= $data[5] ?>">
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
                $("#bt").click(function (e) {
                    e.preventDefault();
                    editarPerfilAdmin();
                    subirPerfilAdmin();
                });
            });
        </script>
    </body>
</html>

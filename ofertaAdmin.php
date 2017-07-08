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
            <input type="text" value="<?= $data[0] ?>" id="krut" class="hide">
            <input type="text" value="<?= $data[5] ?>" id="kclave" class="hide">
            <div class="container">
                <div class="row">
                    <div class="col m3"></div>
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
                    <div class="col m3"></div>
                </div>
                <div class="row">
                    <div class="col m3"></div>
                    <div class="col m6">
                        <input type=submit value="NUEVA OFERTA" id="btnOferta" name="btnOferta" class="btn blue-grey">

                    </div>
                </div>
            </div>
            <div id="modalAyuda" class="modal">
                <div class="modal-content">
                    <div class="container">
                        <div class="col m12">
                            <p><h4>Al momento de cerrar una OFERTA, los postulantes ya no tendran opcion a verla y los usuarios NO podran Postular a esta.</h4></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat btn-block red">Salir</a>
                </div>
            </div>


            <div id="modal1" class="modal">
                <div class="modal-content">
                    <div class="container">
                        <div class="col m12">
                            <input type="text" class="hide" id="estado" value="Activo">
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">perm_identity</i>
                                <label for="nombre">Titulo</label>
                                <input type="text" class="validate"id="nombre">
                            </div>
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">perm_identity</i>
                                <label for="cargo">Cargo</label>
                                <input type="text"class="validate" id="cargo">
                            </div>
                            <div class="col m12 input-field">
                                <i class="material-icons prefix big">work</i>
                                <label for="descripcion">Descripcion</label>
                                <input type="text" id="descripcion">
                            </div>
                            <div class="col m4 input-field">
                                <i class="material-icons prefix big">location_on</i>
                                <label for="vacantes">Vacantes</label>
                                <input type="text" id="vacantes">
                            </div>
                            <div class="col m8 input-field">
                                <i class="material-icons prefix big">account_circle</i>
                                <label for="rut">Rut</label>
                                <input type="text" value="<?= $data[0] ?>"id="rut">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat btn-block red">Salir</a>
                    <input type="submit" name="bt" id="btnAgregar" value="Guardar" class="btn right"/>
                </div>
            </div>

            <div id="modalOferta" class="modal">
                <div class="modal-content">
                    <h4>Detalle</h4>
                    <div class="col m12 ">
                        <table>
                            <tr><td>Codigo</td><td>Titulo</td><td>Cargo</td></tr>
                            <tr><td><input type="text" id="ncodigo"></td><td><input type="text" id="nnombre" ></td><td><input type="text" id="ncargo"></td></tr>
                            <tr><td colspan="3" class="center">Descripcion</td></tr>
                            <tr><td colspan="3" class="center"><input type="text" id="ndescripcion"></td></tr>
                            <tr><td>Vacantes</td><td>Mail</td></tr>
                            <tr><td><input type="text" id="nvacantes"></td><td><input type="text" id="nmail"></td></tr>
                            <tr></tr>
                        </table>
                        <div class="modal-footer">
                            <input type="submit" name="bt" id="btnCerrar" value="Cerrar Oferta" class="btn right"/>
                            <input type=submit value="¿Que es Cerrar Oferta?" id="btnAyuda" name="btnOferta" class="btn red left">
                        </div>
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
            getOfertasAdmin();
            $("#btnOferta").click(function (e) {
                e.preventDefault();
                $("#modal1").openModal();
            });
            $("#btnAgregar").click(function (e) {
                e.preventDefault();
                insertarOferta();
                subirAdminActualizado();
            });
            $("#tbody").click(function (e) {
                e.preventDefault();
                cargarOfertas();
            });
            $("#btnCerrar").click(function (e) {
                e.preventDefault();
                cerrarOfertaPostulante();
                cerrarOferta();
            });
            $("#btnAyuda").click(function (e) {
                e.preventDefault();
                $("#modalAyuda").openModal();
            });
        });
    </script>
</body>
</html>
<?php
require './libmysql.php';
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
                <div class="input-field col-12">
                    <form id="formulario">
                        <select id="selectoferta" name="selectoferta">
                            <option value="" disabled selected>Seleccione oferta</option>
                            <?php
                            foreach (getSelect() as $item) {
                                ?>
                                <option value="<?php echo $item["codigo"] ?>"><?php echo $item["nombre"] ?></option>
                            <?php }
                            ?>
                        </select>
                    </form>
                </div>
                <div class="col m12">
                    <table id="tabla">
                        <thead>
                            <tr><td>CODIGO</td><td>RUT POSTULANTE</td><TD>NOMBRE</TD><TD>APELLIDO</TD><TD>PROFESION</TD><TD>CIUDAD</TD></tr>
                        </thead>
                        <tbody id="tbody">
                            <?php
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="modalDatosPostulante" class="modal">
                <div class="modal-content">
                    <table id="tabla">
                        <tr><td>Codigo</td><td>Rut</td><td>Nombre</td></tr>
                        <tr><td><input type="text" id="qcodigo"></td><td><input type="text" id="qrutPostulante"></td><td><input type="text" id="qnombre"></td></tr>
                        <tr><td colspan="3">Apellido</td></tr>
                        <tr><td colspan="3"><input type="text" id="qapellido"></td></tr>
                        <tr><td>Profeson</td><td>Ciudad</td></tr>
                        <tr><td><input type="text" id="qprofesion"></td><td><input type="text" id="qciudad"></td></tr>
                    </table>
                    <div class="modal-footer">
                        <input type="submit" name="bt" id="btnRechazar" value="Rechazar" class="btn left red"/>
                        <input type="submit" name="bt" id="btnAceptar" value="Aceptar" class="btn left"/>
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

                $('select').material_select();
                $("#selectoferta").change(function (e) {
                    e.preventDefault();
                    var codigo = $("#selectoferta").val();
                    $.ajax({
                        url: "Controller.php?opcion=mostrarPostulantes",
                        type: "POST",
                        dataType: "json",
                        data: {"codigo": codigo}
                    }).success(function (data) {
                        $("#tbody").empty();
                        $.each(data, function (i, obj) {
                            var x = "<tr><td>" + obj.codigo + "</td><td>" + obj.rutPostulante + "</td><td>" + obj.nombre + "</td><td>" + obj.apellido + "</td><td>" + obj.profesion + "</td><td>" + obj.ciudad + "</td></tr>";
                            $("#tbody").append(x);
                        });
                    }).fail(function () {
                        alert("error");
                    });
                });

                $("#tbody").click(function (e) {
                    e.preventDefault();
                    cargarDatosPostulante();
                });
                $("#btnRechazar").click(function () {
                    rechazarPostulante();
                });
                $("#btnAceptar").click(function () {
                    validarVacantes();
                    aceptarPostulante();
                    aceptarPostulante2();

                });

            });
        </script>
    </body>
</html>

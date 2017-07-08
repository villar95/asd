<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>Parallax Template - Materialize</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
                <div class="container">


                    <h1 class="header center teal-text text-lighten-2">Rafael Villar</h1>
                    <div class="row center">
                        <h5 class="header col s12 light">Analista Programador Inacap Talca</h5>
                    </div>
                    <br><br>

                </div>
            </div>
            <div class="parallax"><img src="Imagenes/20160821_190539.jpg" class="responsive-img" alt=""/></div>
        </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m12">
                        <div class="icon-block">
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">account_circle</i>
                                <label for="rut">Rut</label>
                                <input type="text" name="rut" class="validate" id="rut">
                            </div>
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">perm_identity</i>
                                <label for="nombre">Nombre</label>
                                <input type="text" class="validate"id="nombre">
                            </div>
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">perm_identity</i>
                                <label for="apellido">Apellido</label>
                                <input type="text"class="validate" id="apellido">
                            </div>
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">work</i>
                                <label for="profesion">Profesion</label>
                                <input type="text" id="profesion">
                            </div>
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">location_on</i>
                                <label for="ciudad">Ciudad</label>
                                <input type="text" id="ciudad">
                            </div>
                            <div class="col m6 input-field">
                                <i class="material-icons prefix big">email</i>
                                <label for="mail">Email</label>
                                <input type="email" id="mail">
                            </div>
                            <div class="input-field col m6">

                                <i class="material-icons prefix big">vpn_key</i>
                                <input id="clave" type="password" class="validate">
                                <label for="clave">Clave</label>
                            </div>
                            <div class="input-field col m6">
                                <i class="material-icons prefix big">vpn_key</i>
                                <input id="clave2" type="password" class="validate">
                                <label for="clave2">Confirmar Clave</label>
                            </div>
                            <div class="col m2"></div>
                            <div class="col m2">
                                <input type="submit" id="btn" name="btn" class="btn " value="Agregar">
                            </div>
                            <div class="col m4"></div>
                            <div class="col m2">
                                <input type="submit" id="btnI" name="btn" class="btn " value="Volver al Inicio">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">
                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                    </div>
                </div>
            </div>
            <div class="parallax"><img src="background2.jpg" alt="Unsplashed background img 2"></div>
        </div>


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/myJS.js" type="text/javascript"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#btn").click(function (e) {
                    e.preventDefault();
                    insertarUsuario();
                });
                $("#btnI").click(function (e) {
                    e.preventDefault();
                    window.location = 'index.html';
                });
            });
        </script>

    </body>
</html>

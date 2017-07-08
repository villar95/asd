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

            <div class="hide">
                <input type=text id="xrut" name="rut" value="<?= $data[0] ?>">
                <input type=text id="xclave" name="clave" value="<?= $data[6] ?>">
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
        <script src="js/materialize.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/myJS.js" type="text/javascript"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript">
            $(function () {
                subirPerfil();
<?php
require './libmysql.php';

if ($_POST["rut"] && $_POST["clave"]) {
    $conexion = conectar();
    $rut = $_POST["rut"];
    $perfil = addslashes(file_get_contents($_FILES['perfil']['tmp_name']));
    $query = "update cuenta set perfil= '$perfil'where rut='$rut'";
    $resultado = $conexion->query($query);
}
?>
            });



        </script>
    </body>
</html>
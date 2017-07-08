<?php

session_start();
require './libmysql.php';
$opcion = $_GET["opcion"];

if ($opcion == "insertarUsuario") {
    insertarUsuario($_POST["rut"], $_POST["nombre"], $_POST["apellido"], $_POST["profesion"], $_POST["ciudad"], $_POST["mail"], $_POST["clave"]);
    echo json_encode(array("ok", "ok"));
} else if ($opcion == "getRut") {
    echo json_encode(getRut($_POST["rut"]));
} else if ($opcion == "iniciarSesion") {
    $data = iniciarSesion($_POST["rut"], $_POST["clave"]);
    if ($data[0] != "") {
        $_SESSION["user"] = $data;
        echo json_encode(array("msg" => "ok"));
    } else {
        echo json_encode(array("msg" => "error"));
    }
} else if ($opcion == "actualizar") {
    echo json_encode(actualizarCuenta($_POST["rut"], $_POST["nombre"], $_POST["apellido"], $_POST["profesion"], $_POST["ciudad"], $_POST["mail"], $_POST["clave"]));
} else if ($opcion == "iniciarSesion2") {
    $data = iniciarSesion($_POST["rut"], $_POST["clave"]);
    if ($data[0] != "") {
        $_SESSION["user"] = $data;
    }
    echo json_encode($data);
} else if ($opcion == "getOfertas") {
    echo json_encode(getOfertas());
} else if ($opcion == "postular") {
    echo json_encode(insertarPostulante($_POST["rutPostulante"], $_POST["codigoOferta"], $_POST["estado"]));
} else if ($opcion == "getPostulaciones") {
    echo json_encode(getPostulaciones($_SESSION["user"][0]));
} else if ($opcion == "getPos") {
    echo json_encode(getPostulaciones2($_POST["rut"]));
} else if ($opcion == "iniciarAdmin") {
    $data = iniciarSesionAdmin($_POST["rut"], $_POST["clave"]);
    if ($data[0] != "") {
        $_SESSION["admin"] = $data;
        echo json_encode(array("msg" => "ok"));
    } else {
        echo json_encode(array("msg" => "error"));
    }
} else if ($opcion == "insertarOferta") {
    insertarOferta($_POST["nombre"], $_POST["cargo"], $_POST["descripcion"], $_POST["vacantes"], $_POST["estado"], $_POST["rutAdministrativo"]);
    echo json_encode(array("ok", "ok"));
} else if ($opcion == "cerrarOferta") {
    echo json_encode(cerrarOferta($_POST["codigo"]));
} else if ($opcion == "cerrarOfertaPostulante") {
    echo json_encode(cerrarOfertaPostulante($_POST["codigo"]));
} else if ($opcion == "prueba") {
    echo json_encode(getOfertasAdmin());
} else if ($opcion == "select") {
    echo json_encode(getSelect($_SESSION["admin"][0]));
} else if ($opcion == "mostrarPostulantes") {
    echo json_encode(mostrarPostulantes($_POST["codigo"]));
} else if ($opcion == "aceptarOferta") {
    echo json_encode(aceptarOferta($_POST["codigo"]));
} else if ($opcion == "rechazarOferta") {
    echo json_encode(rechazarOferta($_POST["codigo"]));
} else if ($opcion == "aceptarOferta2") {
    echo json_encode(aceptarOferta2($_POST["codigo"]));
} else if ($opcion == "actualizarAdmin") {
    echo json_encode(actualizarCuentaAdmin($_POST["rut"], $_POST["nombre"], $_POST["apellido"], $_POST["cargo"], $_POST["mail"], $_POST["clave"]));
} else if ($opcion=="validarVacantes") {
    echo json_encode(validarVacantes($_POST["codigo"]));
}else if ($opcion== "restarVacantes") {
    echo json_encode(restarVacantes($_POST["codigoOferta"]));
}

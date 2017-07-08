<?php

function conectar() {
    $conn = new mysqli("127.0.0.1", "root", "", "postula");
    return $conn;
}

function insertarUsuario($rut, $nombre, $apellido, $profesion, $ciudad, $mail, $clave) {
    $conn = conectar();
    $sql = "insert into cuenta values(?,?,?,?,?,?,?,null)";
    $st = $conn->prepare($sql);
    $st->bind_param("sssssss", $rut, $nombre, $apellido, $profesion, $ciudad, $mail, $clave);
    $st->execute();
    $conn->close();
}

function getRut($rut) {
    $conn = conectar();
    $sql = "select rut from cuenta where rut =?";
    $st = $conn->prepare($sql);
    $st->bind_param("s", $rut);
    $st->execute();
    $st->bind_result($rut);
    $data = array();
    //$st->bind_result($rut);
    if ($st->fetch()) {
        $data[] = array($rut);
        return array("msg" => "ok");
    } else {
        return array("msg" => "error");
    }
    $conn->close();
    return $data;
}

function iniciarSesion($rut, $clave) {
    $conn = conectar();
    $sql = "select * from cuenta where rut =? and clave =?";
    $st = $conn->prepare($sql);
    $st->bind_param("ss", $rut, $clave);
    $st->execute();
    $data = array();
    $st->bind_result($rut, $nombre, $apellido, $profesion, $ciudad, $mail, $clave, $perfil);
    while ($st->fetch()) {
        $data = array($rut, $nombre, $apellido, $profesion, $ciudad, $mail, $clave, $perfil);
    }
    $conn->close();
    return $data;
}

function actualizarCuenta($rut, $nombre, $apellido, $profesion, $ciudad, $mail, $clave) {
    $conn = conectar();
    $sql = "update cuenta set nombre=?,apellido=?,profesion=?,ciudad=?,mail=?,clave=? where rut=?";
    $st = $conn->prepare($sql);
    $st->bind_param("sssssss", $nombre, $apellido, $profesion, $ciudad, $mail, $clave, $rut);
    $st->execute();
    $conn->close();
}

function actualizarCuentaAdmin($rut, $nombre, $apellido, $cargo, $mail, $clave) {
    $conn = conectar();
    $sql = "update administrativo set nombre=?,apellido=?,cargo=?,mail=?,clave=? where rut=?";
    $st = $conn->prepare($sql);
    $st->bind_param("ssssss", $nombre, $apellido, $cargo, $mail, $clave, $rut);
    $st->execute();
    $conn->close();
}

function mostrarCuenta() {
    $conn = conectar();
    $sql = "select * from cuenta";
    $st = $conn->prepare($sql);
    $st->execute();
    $data = array();
    $st->bind_result($rut, $nombre, $apellido, $profesion, $ciudad, $mail, $clave, $perfil);
    while ($st->fetch()) {
        $data[] = array("rut" => $rut, "nombre" => $nombre, "apellido" => $apellido, "profesion" => $profesion, "ciudad" => $ciudad, "mail" => $mail, "clave" => $clave, "perfil" => $perfil);
    }
    $conn->close();
    return $data;
}

function getOfertas() {
    $conn = conectar();
    $sql = "select a.codigo ,a.nombre, a.cargo, a.descripcion,a.vacantes,a.estado,c.mail from ofertaLaboral a join administrativo c on a.rutAdministrativo = c.rut where a.estado='Activo'";
    $st = $conn->prepare($sql);
    $st->execute();
    $data = array();
    $st->bind_result($codigo, $nombre, $cargo, $descripcion, $vacantes, $estado, $mail);
    while ($st->fetch()) {
        $data[] = array("codigo" => $codigo, "nombre" => $nombre, "cargo" => $cargo, "descripcion" => $descripcion, "vacantes" => $vacantes, "estado" => $estado, "mail" => $mail);
    }
    $conn->close();
    return $data;
}

function getOfertasAdmin() {
    $conn = conectar();
    $sql = "select a.codigo ,a.nombre, a.cargo, a.descripcion,a.vacantes,a.estado,c.mail from ofertaLaboral a join administrativo c on a.rutAdministrativo = c.rut and a.estado='Activo';";
    $st = $conn->prepare($sql);
    $st->execute();
    $data = array();
    $st->bind_result($codigo, $nombre, $cargo, $descripcion, $vacantes, $estado, $mail);
    while ($st->fetch()) {
        $data[] = array("codigo" => $codigo, "nombre" => $nombre, "cargo" => $cargo, "descripcion" => $descripcion, "vacantes" => $vacantes, "estado" => $estado, "mail" => $mail);
    }
    $conn->close();
    return $data;
}

function getSelect() {
    $conn = conectar();
    $sql = "select codigo ,nombre from ofertaLaboral where estado='Activo'";
    $st = $conn->prepare($sql);
    $st->execute();
    $data = array();
    $st->bind_result($codigo, $nombre);
    while ($st->fetch()) {
        $data[] = array("codigo" => $codigo, "nombre" => $nombre);
    }
    $conn->close();
    return $data;
}

function insertarPostulante($rutPostulante, $codigoOferta, $estado) {
    $conn = conectar();
    $sql = "insert into postulante values(null,?,?,?)";
    $st = $conn->prepare($sql);
    $st->bind_param("sis", $rutPostulante, $codigoOferta, $estado);
    $st->execute();
    $conn->close();
}

function restarVacantes($codigoOferta) {
    $conn = conectar();
    $sql = "update ofertaLaboral set vacantes=(vacantes-1) where codigo=?";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigoOferta);
    $st->execute();
    $conn->close();
}

function getPostulaciones($rut) {
    $conn = conectar();
    $sql = "select a.nombre ,a.estado from ofertaLaboral a join postulante p on a.codigo = p.codigoOferta where p.rutPostulante=? and a.estado='Activo'";
    $st = $conn->prepare($sql);
    $st->bind_param("s", $rut);
    $st->execute();
    $data = array();
    $st->bind_result($nombre, $estado);
    while ($st->fetch()) {
        $data[] = array("nombre" => $nombre, "estado" => $estado);
    }
    $conn->close();
    return $data;
}

function iniciarSesionAdmin($rut, $clave) {
    $conn = conectar();
    $sql = "select * from administrativo where rut =? and clave =?";
    $st = $conn->prepare($sql);
    $st->bind_param("ss", $rut, $clave);
    $st->execute();
    $data = array();
    $st->bind_result($rut, $nombre, $apellido, $cargo, $mail, $clave, $perfil);
    while ($st->fetch()) {
        $data = array($rut, $nombre, $apellido, $cargo, $mail, $clave, $perfil);
    }
    $conn->close();
    return $data;
}

function insertarOferta($nombre, $cargo, $descripcion, $vacantes, $estado, $rutAdministrativo) {
    $conn = conectar();
    $sql = "insert into ofertaLaboral values(null,?,?,?,?,?,?)";
    $st = $conn->prepare($sql);
    $st->bind_param("sssiss", $nombre, $cargo, $descripcion, $vacantes, $estado, $rutAdministrativo);
    $st->execute();
    $conn->close();
}

function cerrarOferta($codigo) {
    $conn = conectar();
    $sql = "update ofertalaboral set estado='Cerrada' where codigo=?";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigo);
    $st->execute();
    $conn->close();
}

function cerrarOfertaPostulante($codigo) {
    $conn = conectar();
    $sql = "update postulante set estado='Cerrada' where codigoOferta=?";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigo);
    $st->execute();
    $conn->close();
}

function mostrarPostulantes($codigo) {
    $conn = conectar();
    $sql = "select p.codigo, p.rutPostulante, a.nombre,a.apellido,a.profesion, a.ciudad from postulante p join cuenta a on a.rut=p.rutPostulante where p.codigoOferta=? and p.estado='Activo'";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigo);
    $st->execute();
    $data = array();
    $st->bind_result($codigo, $rutPostulante, $nombre, $apellido, $profesion, $ciudad);
    while ($st->fetch()) {
        $data[] = array("codigo" => $codigo, "rutPostulante" => $rutPostulante, "nombre" => $nombre, "apellido" => $apellido, "profesion" => $profesion, "ciudad" => $ciudad);
    }
    $conn->close();
    return $data;
}

function aceptarOferta($codigo) {
    $conn = conectar();
    $sql = "update ofertaLaboral set vacantes=(vacantes-1) where codigo=?";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigo);
    $st->execute();
    $conn->close();
}

function aceptarOferta2($codigo) {
    $conn = conectar();
    $sql = "update postulante set estado='Aceptado' where codigo=?";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigo);
    $st->execute();
    $conn->close();
}

function rechazarOferta($codigo) {
    $conn = conectar();
    $sql = "update postulante set estado='Rechazado' where codigo=?";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigo);
    $st->execute();
    $conn->close();
}

function validarVacantes($codigo){
    $conn = conectar();
    $sql = "update ofertaLaboral set estado='Cerrada' where codigo=? and vacantes<=0";
    $st = $conn->prepare($sql);
    $st->bind_param("i", $codigo);
    $st->execute();
    $conn->close();
}

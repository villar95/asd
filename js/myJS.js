function insertarUsuario() {
    var rut = $("#rut").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var profesion = $("#profesion").val();
    var ciudad = $("#ciudad").val();
    var mail = $("#mail").val();
    var clave = $("#clave").val();
    var clave2 = $("#clave2").val();
    if (rut == "" || nombre == "" || apellido == "" || profesion == "" || ciudad == "" || mail == "" || clave == "" || clave2 == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");

    } else if (clave != clave2) {
        Materialize.toast("Las Contraseñas no coinciden", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=getRut",
            type: "POST",
            dataType: "json",
            data: {"rut": rut}
        }).success(function (o) {
            if (o.msg == "error") {
                $.ajax({
                    url: "Controller.php?opcion=insertarUsuario",
                    type: "POST",
                    dataType: "json",
                    data: {"rut": rut, "nombre": nombre, "apellido": apellido, "profesion": profesion, "ciudad": ciudad, "mail": mail, "clave": clave}
                }).success(function (x) {
                    Materialize.toast("Usuario insertado Con Exito", "3000");
                }).fail(function () {
                    alert("Error");
                });
            } else {
                Materialize.toast("RUT YA REGISTRADO ", "3000");
            }
        });
    }
}
function subirUsuario() {
    var rut = $("#xrut").val();
    var clave = $("#xclave").val();
    if (rut == "" || clave == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=iniciarSesion",
            type: "POST",
            dataType: "json",
            data: {"rut": rut, "clave": clave}
        }).success(function (o) {
            if (o.msg == "ok") {
                Materialize.toast("Inicio de Sesion Correcto", "3000");
                window.location = 'menuUsuario.php';
            } else {
                Materialize.toast("Datos incorrectos", "3000");
            }

        }).fail(function () {
            Materialize.toast("Error", "3000");
        });

    }
}
function editarPerfil() {
    var xrut = $("#xrut").val();
    var xnombre = $("#xnombre").val();
    var xapellido = $("#xapellido").val();
    var xprofesion = $("#xprofesion").val();
    var xciudad = $("#xciudad").val();
    var xmail = $("#xmail").val();
    var xclave = $("#xclave").val();
    var xclave2 = $("#xclave2").val();
    if (xrut == "" || xnombre == "" || xapellido == "" || xprofesion == "" || xciudad == "" || xmail == "" || xclave == "" || xclave2 == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else if (xclave != xclave2) {
        Materialize.toast("Las Contraseñas no coindicen.", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=actualizar",
            type: "POST",
            dataType: "json",
            data: {"rut": xrut, "nombre": xnombre, "apellido": xapellido, "profesion": xprofesion, "ciudad": xciudad, "mail": xmail, "clave": xclave}
        }).success(function (msg) {
            Materialize.toast("Perfil editado.", "3000");
            window.location = 'Perfil.php';
        }).fail(function () {
            alert("error");
        });
    }
}
function getCuenta() {
    var url = "controller.php?opcion=mostrar";
    $("#tbody").empty();
    $.getJSON(url, function (objetos) {
        $.each(objetos, function (i, obj) {
            var x = "<tr><td>" + obj.rut + "</td><td>" + obj.nombre + "</td><td>" + obj.apellido + "</td>" + "<td>" + obj.profesion + "</td>" + "<td>" + obj.ciudad + "</td>" + "<td>" + obj.mail + "</td><td>" + obj.clave + "</td>" + "<td>" + obj.perfil + "</td>" + "</tr>";
            $("#tbody").append(x);
        });
    });
}
function subirPerfil() {
    var rut = $("#xrut").val();
    var clave = $("#xclave").val();
    if (rut == "" || clave == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=iniciarSesion2",
            type: "POST",
            dataType: "json",
            data: {"rut": rut, "clave": clave}
        }).success(function (msg) {
            window.location = 'Perfil.php';
        }).fail(function () {
            Materialize.toast("Datos incorrectos", "3000");
        });
    }
}
function getOfertas() {
    var url = "Controller.php?opcion=getOfertas";
    $("#tbody").empty();
    $.getJSON(url, function (objetos) {
        $.each(objetos, function (i, obj) {
            var x = "<tr><td>" + obj.codigo + "</td><td>" + obj.nombre + "</td><td class='hide'>" + obj.cargo + "</td><td class='hide'>" + obj.descripcion + "</td><td class='hide'>" + obj.vacantes + "</td><td class='hide'>" + obj.estado + "</td><td class='hide'>" + obj.mail + "</td></tr>";
            $("#tbody").append(x);
        });
    });
}
function cargarModal() {
    $("body").on("click", "#tabla tr", function (e) {
        e.preventDefault();
        var celdas = $(this).find("td");
        $("#codigo").val($(celdas[0]).html());
        $("#nombre").val($(celdas[1]).html());
        $("#cargo").val($(celdas[2]).html());
        $("#descripcion").val($(celdas[3]).html());
        $("#vacantes").val($(celdas[4]).html());
        $("#estado").val($(celdas[5]).html());
        $("#mail").val($(celdas[6]).html());
        $("#codigoOferta").val($(celdas[0]).html());
        $("#xestado").val($(celdas[5]).html());
        $("#modal1").openModal();
    });
}
function Postulacion() {
    var rutPostulante = $("#rutPostulante").val();
    var codigoOferta = $("#codigoOferta").val();
    var estado = $("#xestado").val();
    if (rutPostulante == "" || codigoOferta == "" || estado == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=postular",
            type: "POST",
            dataType: "json",
            data: {"rutPostulante": rutPostulante, "codigoOferta": codigoOferta, "estado": estado}
        }).success(function (msg) {
            Materialize.toast("Postulado Correctamente", "3000");
        }).fail(function () {
            alert("error");
        });
    }
}

function descontarVacantes() {
    var codigoOferta = $("#codigoOferta").val();
    if (codigoOferta == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=restarVacantes",
            type: "POST",
            dataType: "json",
            data: {"codigoOferta": codigoOferta}
        }).success(function (msg) {
            
        }).fail(function () {
            
        });
    }
}
function getPostulaciones() {
    var url = "Controller.php?opcion=getPostulaciones";
    $("#tbody").empty();
    $.getJSON(url, function (objetos) {
        $.each(objetos, function (i, obj) {
            var x = "<tr><td>" + obj.nombre + "</td><td>" + obj.estado + "</td></tr>";
            $("#tbody").append(x);
        });
    });
}
function subirAdmin() {
    var rut = $("#arut").val();
    var clave = $("#aclave").val();
    if (rut == "" || clave == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=iniciarAdmin",
            type: "POST",
            dataType: "json",
            data: {"rut": rut, "clave": clave}
        }).success(function (o) {
            if (o.msg == "ok") {
                Materialize.toast("Inicio de Sesion Correcto", "3000");
                window.location = 'Administrador.php';
            } else {
                Materialize.toast("Datos incorrectos", "3000");
            }

        }).fail(function () {
            Materialize.toast("Error", "3000");
        });
    }
}
function subirAdminActualizado() {
    var rut = $("#krut").val();
    var clave = $("#kclave").val();
    if (rut == "" || clave == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=iniciarAdmin",
            type: "POST",
            dataType: "json",
            data: {"rut": rut, "clave": clave}
        }).success(function (o) {
            if (o.msg == "ok") {
                window.location = 'ofertaAdmin.php';
            } else {
                Materialize.toast("Datos incorrectos", "3000");
            }

        }).fail(function () {
            Materialize.toast("Error", "3000");
        });
    }
}
function insertarOferta() {
    var nombre = $("#nombre").val();
    var cargo = $("#cargo").val();
    var descripcion = $("#descripcion").val();
    var vacantes = $("#vacantes").val();
    var estado = $("#estado").val();
    var rutAdministrativo = $("#rut").val();
    if (nombre == "" || cargo == "" || descripcion == "" || vacantes == "" || estado == "" || rutAdministrativo == "") {
        Materialize.toast("Rellene todos los campos requeridos", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=insertarOferta",
            type: "POST",
            dataType: "json",
            data: {"nombre": nombre, "cargo": cargo, "descripcion": descripcion, "vacantes": vacantes, "estado": estado, "rutAdministrativo": rutAdministrativo}
        }).success(function (o) {
            Materialize.toast("Nueva Oferta Registrada", "3000");
        }).fail(function (msg) {
            Materialize.toast("lo hiciste mal zi", "3000");
        });

    }
}
function cargarOfertas() {
    $("body").on("click", "#tabla tr", function (e) {
        e.preventDefault();
        var celdas = $(this).find("td");
        $("#ncodigo").val($(celdas[0]).html());
        $("#nnombre").val($(celdas[1]).html());
        $("#ncargo").val($(celdas[2]).html());
        $("#ndescripcion").val($(celdas[3]).html());
        $("#nvacantes").val($(celdas[4]).html());
        $("#nmail").val($(celdas[6]).html());
        $("#modalOferta").openModal();
    });
}
function getOfertasAdmin() {
    var url = "Controller.php?opcion=prueba";
    $("#tbody").empty();
    $.getJSON(url, function (objetos) {
        $.each(objetos, function (i, obj) {
            var x = "<tr><td>" + obj.codigo + "</td><td>" + obj.nombre + "</td><td class='hide'>" + obj.cargo + "</td><td class='hide'>" + obj.descripcion + "</td><td class='hide'>" + obj.vacantes + "</td><td class='hide'>" + obj.estado + "</td><td class='hide'>" + obj.mail + "</td></tr>";
            $("#tbody").append(x);
        });
    });
}
function Select() {
    var url = "Controller.php?opcion=select";
    $("#ofertas").empty();
    $.getJSON(url, function (objetos) {
        $.each(objetos, function (i, obj) {
            var x = "<option class='hide' value='codigo'>" + obj.codigo + "</option><option>" + obj.nombre + "</option>";
            $("#ofertas").append(x);
        });
    });
}
function Oferta() {
    var codigo = $("#ncodigo").val();
    $.ajax({
        url: "Controller.php?opcion=cerrarOferta",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (msg) {
        Materialize.toast("Oferta Cerrada", "3000");
    }).fail(function () {
        alert("error");
    });
}
function cerrarOfertaPostulante() {
    var codigo = $("#ncodigo").val();
    $.ajax({
        url: "Controller.php?opcion=cerrarOfertaPostulante",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (msg) {
        window.location = 'ofertaAdmin.php';
        Materialize.toast("Oferta Cerrada", "3000");
    }).fail(function () {
        alert("error");
    });
}
function mostrarPostulante() {
    var codigo = $("#selectoferta").val();
    $.ajax({
        url: "Controller.php?opcion=mostrarPostulantes",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (data) {
        $("#tbody").empty();
        $.each(data, function (i, obj) {
            var x = "<tr><td>" + obj.codigo + "</td><td>" + obj.rutPostulante + "</td><td>" + obj.nombre + "</td><td>" + obj.apellido + "</td><td>" + obj.vacantes + "</td><td>" + obj.profesion + "</td><td>" + obj.ciudad + "</td></tr>";
            $("#tbody").append(x);
        });
    }).fail(function () {
        alert("error");
    });
}
function cargarDatosPostulante() {
    $("body").on("click", "#tabla tr", function (e) {
        e.preventDefault();
        var celdas = $(this).find("td");
        $("#qcodigo").val($(celdas[0]).html());
        $("#qrutPostulante").val($(celdas[1]).html());
        $("#qnombre").val($(celdas[2]).html());
        $("#qapellido").val($(celdas[3]).html());
        $("#qprofesion").val($(celdas[4]).html());
        $("#qciudad").val($(celdas[5]).html());
        $("#modalDatosPostulante").openModal();
    });
}
function aceptarPostulante() {
    var codigo = $("#selectoferta").val();
    $.ajax({
        url: "Controller.php?opcion=aceptarOferta",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (msg) {
        
    }).fail(function () {
        alert("error");
    });
}
function aceptarPostulante2() {
    var codigo = $("#qcodigo").val();
    $.ajax({
        url: "Controller.php?opcion=aceptarOferta2",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (msg) {
        Materialize.toast("Postulante Aceptado", "3000");
        window.location = 'gestionPostulacion.php';
    }).fail(function () {
        alert("error");
    });
}
function rechazarPostulante() {
    var codigo = $("#qcodigo").val();
    $.ajax({
        url: "Controller.php?opcion=rechazarOferta",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (msg) {
        Materialize.toast("Postulante Rechazado", "3000");
        window.location = 'gestionPostulacion.php';
    }).fail(function () {
        alert("error");
    });
}
function editarPerfilAdmin() {
    var xrut = $("#xrut").val();
    var xnombre = $("#xnombre").val();
    var xapellido = $("#xapellido").val();
    var xcargo = $("#xcargo").val();
    var xmail = $("#xmail").val();
    var xclave = $("#xclave").val();
    var xclave2 = $("#xclave2").val();
    if (xrut == "" || xnombre == "" || xapellido == "" || xcargo == "" || xmail == "" || xclave == "" || xclave2 == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else if (xclave != xclave2) {
        Materialize.toast("Las Contraseñas no coindicen.", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=actualizarAdmin",
            type: "POST",
            dataType: "json",
            data: {"rut": xrut, "nombre": xnombre, "apellido": xapellido, "cargo": xcargo, "mail": xmail, "clave": xclave}
        }).success(function (msg) {
            Materialize.toast("Perfil editado.", "3000");
            window.location = 'perfilAdmin.php';
        }).fail(function () {
            alert("errorasdasd");
        });
    }
}
function subirPerfilAdmin() {
    var rut = $("#xrut").val();
    var clave = $("#xclave").val();
    if (rut == "" || clave == "") {
        Materialize.toast("Rellene los campos de forma correcta", "3000");
    } else {
        $.ajax({
            url: "Controller.php?opcion=iniciarAdmin",
            type: "POST",
            dataType: "json",
            data: {"rut": rut, "clave": clave}
        }).success(function (o) {
            if (o.msg == "ok") {
                window.location = 'perfilAdmin.php';
            } else {
                Materialize.toast("Datos incorrectos", "3000");
            }
        }).fail(function () {
            Materialize.toast("Datos incorrectos", "3000");
        });
    }
}
function validarVacantes(){
     var codigo = $("#selectoferta").val();
    $.ajax({
        url: "Controller.php?opcion=validarVacantes",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (msg) {
        alert("Oferta Cerrada... Sin Vacantes");
        
    }).fail(function () {
        alert("error po wn");
    });
}

function validarVacantes2(){
     var codigo = $("#codigoOferta").val();
    $.ajax({
        url: "Controller.php?opcion=validarVacantes",
        type: "POST",
        dataType: "json",
        data: {"codigo": codigo}
    }).success(function (msg) {
        alert("Oferta Cerrada... Sin Vacantes");
        
    }).fail(function () {
        alert("error po wn");
    });
}
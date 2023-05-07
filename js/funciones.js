function limpiar() {
    document.form.reset();
    document.form.id_u.focus();
}
//validar campos vacios
function validar() {
    var form = document.form;
    if (form.id_u.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el codigo del Usuario",
            icon: "error",
        });
        form.id_u.value = "";
        form.id_u.focus();
        return false;
    }
    if (form.username.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el Nombre del Usuario",
            icon: "error",
        });
        form.username.value = "";
        form.username.focus();
        return false;
    }
    if (form.pass.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite la contraseña del Usuario",
            icon: "error",
        });
        form.pass.value = "";
        form.pass.focus();
        return false;
    }
    if (form.usertype.value == "") {
        Swal.fire({
            title: "ERROR!",
            text: "Digite el tipo de Usuario",
            icon: "error",
        });
        form.usertype.value = "";
        form.usertype.focus();
        return false;
    }

    if (form.respuesta1.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite la respuesta 1",
            icon: "error",
        });
        form.username.value = "";
        form.username.focus();
        return false;
    }

    if (form.respuesta2.value == 0) {
        Swal.fire({
            title: "ERROR!",
            text: "Digite la respuesta 2",
            icon: "error",
        });
        form.username.value = "";
        form.username.focus();
        return false;
    }






    //ejecutar el evento submit del formulario
    form.submit();
}

function mostrarContrasena() {
    var tipo = document.getElementById("pass");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function mostrarConclave() {
    var tipo = document.getElementById("confirm");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}



function mostrarRespuesta2() {
    var tipo = document.getElementById("respuesta2");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function mostrarRespuesta1() {
    var tipo = document.getElementById("respuesta1");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}


function eliminar(url) {
    Swal.fire({
        title: 'Esta seguro?',
        text: 'No se puede reversar la accion',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#DBDE0C',
        cancelButtonColor: '#DE190C',
        confirmButtonText: 'Si, eliminar registro'


    }).then((result) => {
        if (result.value) {
            window.location = url;
        }
    });




}
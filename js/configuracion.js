function cargarDatos() {
    $.ajax({
        //Tipo de envio
        type: "POST",
        //URL destino
        url: "configuracion-cargar.php",
        //Datos a enviar
        data: {},  
        //Procesa Dato recibido
        success: function (data) {
            //Coloca el resultado en la pagina WEB
            if(data.substring(0,data.length-3)!==" Error al cargar los datos"){
                document.getElementById("informacion").innerHTML = data;
            }else{
                alert(data+"\n Intentalo mas tarde");
                regresar();
            }
        },
        //Procesa mensaje de error
        error: function (e) {
            //Coloca un mensaje en la pagina WEB
            $("#informacion").text("error:" + e.status + "error:" + e.statusText);           
        }
    });
}
function regresar() {
    window.location.replace("inicio.php")
}
function validarCorreo() {
    var corr = document.getElementById("nuevoCorreo").value;
    var correo2 = JSON.stringify(corr);
    correo2 = correo2.substring((correo2.indexOf('"') + 1), correo2.length - 1);

    if (correo2.length < 1) {
        alert("El campo esta vacio");
    } else {
        $.ajax({
            //Tipo de envio
            type: "POST",
            //URL destino
            url: "configuracion-correo.php",
            //Datos a enviar
            data: { correo: correo2 },  

            //Procesa Dato recibido
            success: function (data) {
                //Coloca el resultado en la pagina WEB
                alert(data);
            },

            //Procesa mensaje de error
            error: function (e) {
                //Coloca un mensaje en la pagina WEB
                alert("error:" + e.status + "error:" + e.statusText);
            }
        });
        document.getElementById("correo").value = correo2;
        document.getElementById("nuevoCorreo").value = "";
    }
}
function validarContra() {
    var pass = document.getElementById("pass").value;
    var pass_c = document.getElementById("confirm-pass").value;

    var pass2 = JSON.stringify(pass);
    pass2 = pass2.substring((pass2.indexOf('"') + 1), pass2.length - 1);

    var pass_c2 = JSON.stringify(pass_c);
    pass_c2 = pass_c2.substring((pass_c2.indexOf('"') + 1), pass_c2.length - 1);


    if (pass2.length < 1 || pass_c2.length < 1) {
        alert("Los campos deben estar completos");
    }
    else if (pass !== pass_c) {
        alert("Las contraseñas no coinciden");
    }
    else {
        $.ajax({
            //Tipo de envio
            type: "POST",
            //URL destino
            url: "configuracion-contra.php",
            //Datos a enviar
            data: { pass: pass_c, 'confirm-pass': pass_c2 }, 
            //Procesa Dato recibido
            success: function (data) {
                //Coloca el resultado en la pagina WEB
                alert(data);
            },

            //Procesa mensaje de error
            error: function (e) {
                //Coloca un mensaje en la pagina WEB
                alert("error:" + e.status + "error:" + e.statusText);
            }
        });
        document.getElementById("pass").value = "";
        document.getElementById("confirm-pass").value = "";
        window.location.replace("salir.php");
    }
}
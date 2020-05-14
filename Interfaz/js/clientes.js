//variables========================================================================================
var cliente1;           //salida de cargarTarjetas
var salidaGuardar;     //salida de guardarCliente
//Funciones========================================================================================
function cargarTarjetas(texto){
    var postData = {
        metodo: "cargarTarjetas",
        texto: texto
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ClientesAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("contenedorGridResponsivo").innerHTML = arrayResponse[0].mensajeDatos;
            cliente1 = arrayResponse[0].Cliente1;
        }
    });
}
//=================================================================================================
function cargarInfo(correo){
    var postData = {
        metodo: "cargarInfo",
        correo: correo
    }
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ClientesAjax.php',
        type:"POST",
        async: true,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("divInfoClientes").innerHTML = arrayResponse[0].mensajeDatos;
        }
    });
}
//=================================================================================================
function cargarAgregar(){
    var postData = {
        metodo: "cargarAgregar"
    }
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ClientesAjax.php',
        type:"POST",
        async: true,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("divInfoClientes").innerHTML = arrayResponse[0].mensajeDatos;
        }
    });
}
//=================================================================================================
function guardarCliente(){
    var postData = {
        metodo:             "guardarCliente",
        titulo:             document.getElementById('titulo'),
        nom_empr:           document.getElementById('nom_empr'),
        nombre_contac:      document.getElementById('nombre_contac'),
        rfc:                document.getElementById('rfc'),
        numero_contac:      document.getElementById('numero_contac'),
        email:              document.getElementById('email'),
        direc:              document.getElementById('direc'),
        cod_pos:            document.getElementById('cod_pos'),
        cod_pos:            document.getElementById('colonia'),
        cod_pos:            document.getElementById('ciudad'),
        img:                obtenerNombreArchivo()
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ClientesAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            salidaGuardar = arrayResponse[0].mensajeDatos;
        }
    });
}
//=================================================================================================
//=================================================================================================
//=================================================================================================
//=================================================================================================
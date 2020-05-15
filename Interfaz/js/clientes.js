//variables========================================================================================
var cliente1;           //salida de cargarTarjetas
var salidaGuardar;     //salida de guardarCliente
var eliminarCliente;    //salida de eliminaCiente
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
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ClientesAjax.php',
        type:"POST",
        async: false,
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
    };
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
        tituloReg:          document.getElementById('tituloReg').value,
        nom_empr:           document.getElementById('nom_empr').value,
        nombre_contac:      document.getElementById('nombre_contac').value,
        rfc:                document.getElementById('rfc').value,
        numero_contac:      document.getElementById('numero_contac').value,
        emailReg:           document.getElementById('emailReg').value,
        direc:              document.getElementById('direc').value,
        cod_pos:            document.getElementById('cod_pos').value,
        colonia:            document.getElementById('colonia').value,
        ciudad:             document.getElementById('ciudad').value,
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
function eliminarCliente(){
    var emailReg = document.getElementById('emailReg').value;
    postData = {
        metodo: "eliminarCliente",
        emailReg: emailReg
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ClientesAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            eliminarCliente = arrayResponse[0].mensajeDatos;
        }
    });
}
//=================================================================================================
//=================================================================================================
//=================================================================================================
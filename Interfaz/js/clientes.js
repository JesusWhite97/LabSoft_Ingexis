//variables========================================================================================
var cliente1;           //salida de cargarTarjetas
var salidaGuardar;     //salida de guardarCliente
var eliminarCliente;    //salida de eliminaCiente
var modificacionCliente;    //salida de la modificacion
var correoActivo;       //salida de cargar Info
//Funciones========================================================================================
function cargarTarjetasC(texto){
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
function iniciarInterfazClientes(){
    cargarTarjetasC('');
    cargarInfoC(cliente1);
}
//=================================================================================================
function cargarInfoC(correo){
    tarjetaSeleccionada(correo);
    correoActivo = correo;
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
            document.getElementById("divInfo").innerHTML = arrayResponse[0].mensajeDatos;
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
            document.getElementById("divInfo").innerHTML = arrayResponse[0].mensajeDatos;
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
    infoModal('respuesta',eliminarCliente,"iniciarInterfazClientes()",'OK','"'+emailReg+'"','ninguna');
}
//=================================================================================================
function modificarCliente(cambios){
    var postData = {
        metodo: "modificarCliente",
        cambios: cambios,
        correoA: correoActivo
    };
    if(cambios[0]){
        postData.nota = document.getElementById('nota').nota;
    }
    if(cambios[1]){
        postData.emailReg = document.getElementById('emailReg').value;
        postData.nombre_contac = document.getElementById('nombre_contac').value;
        postData.numero_contac = document.getElementById('numero_contac').value;
    }
    if(cambios[2]){
        postData.titulo = document.getElementById('tituloReg').value;
        postData.nom_empr = document.getElementById('nom_empr').value;
        postData.rfc = document.getElementById('rfc').value;
    }
    if(cambios[3]){
        postData.direc = document.getElementById('direc').value;
        postData.cod_pos = document.getElementById('cod_pos').value;
        postData.colonia = document.getElementById('colonia').value;
        postData.ciudad = document.getElementById('ciudad').value;
    }
    if(cambios[4]){
        postData.img = obtenerNombreArchivo();
    }
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ClientesAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            modificacionCliente = arrayResponse[0].mensajeDatos;
        }
    });
}
//=================================================================================================
//=================================================================================================
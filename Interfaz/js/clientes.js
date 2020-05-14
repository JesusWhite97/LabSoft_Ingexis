//variables========================================================================================
var cliente1;           //salida de cargarTarjetas
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
//=================================================================================================
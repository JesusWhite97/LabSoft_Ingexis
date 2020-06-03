//Funciones========================================================================================
function cargarTarjetasO(){
    var postData = {
        metodo: "cargarTarjetas",
        //texto: texto
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ObrasAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("contenedorGridResponsivo").innerHTML = arrayResponse[0].mensajeDatos;
            //cliente1 = arrayResponse[0].Cliente1;
        }
    });
}
//=================================================================================================
function cargarInfoO(){
    //tarjetaSeleccionada(correo);
    var postData = {
        metodo: "cargarInfo",
        //correo: correo
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ObrasAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("divInfo").innerHTML = arrayResponse[0].mensajeDatos;
        }
    });
}
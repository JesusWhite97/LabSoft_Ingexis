//variables========================================================================================
var obra1;
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
            obra1 = arrayResponse[0].obra1;
        }
    });
}
//=================================================================================================
function cargarInfoO(id_obra){
    var postData = {
        metodo: "cargarInfo",
        id_obra: id_obra
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
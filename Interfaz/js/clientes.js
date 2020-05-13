//variables========================================================================================

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
        async: true,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("contenedorGridResponsivo").innerHTML = arrayResponse[0].mensajeDatos;
        }
    });
}
//=================================================================================================
window.onload = function(){
    this.cargarTarjetas('','1111');
}

function cargarTarjetas(cadenaBuscar, cadenaFiltrado){
    var tarjetas = '';
    const postData ={
        metodo:"cargarTarjetas", 
        busqueda: cadenaBuscar, 
        filtro: cadenaFiltrado
    };
    $.post('/LabSoft_Ingexis/Logica/UsuariosAjax.php',postData,function(response){
        console.log(response);
        let arrayResponse = JSON.parse(response);
        tarjetas = arrayResponse[0].mensajeRespuesta;
        document.getElementById("contenedorGridResponsivo").innerHTML = arrayResponse[0].mensajeDatos;
    });
    
}
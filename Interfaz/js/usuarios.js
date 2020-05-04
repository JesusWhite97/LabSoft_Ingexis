//Funciones=====================================================

//################################
function cargarTarjetas(cadenaBuscar, cadenaFiltrado){
    const postData ={
        metodo:"cargarTarjetas", 
        busqueda: cadenaBuscar, 
        filtro: cadenaFiltrado
    };
    $.post('/LabSoft_Ingexis/Logica/UsuariosAjax.php',postData,function(response){
        alert('si entro');
        console.log(response);
        let arrayResponse = JSON.parse(response);
        document.getElementById("contenedorGridResponsivo").innerHTML = arrayResponse[0].mensajeDatos;
    });
}
//################################
function cargarInfo(correo){
    var salida = '';
    const postData = {
        metodo: "cargarInfo",
        correo: correo
    };
    $.post('/LabSoft_Ingexis/Logica/UsuariosAjax.php',postData,function(response){
        console.log(response);
        let arrayResponse = JSON.parse(response)
        console.log(arrayResponse[0].infoUsuario);
        document.getElementById("divInfoUsuarios").innerHTML = arrayResponse[0].infoUsuario;
    });
}
//################################
//################################
//################################
//==============================================================
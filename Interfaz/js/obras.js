//variables========================================================================================
var obra1;
obraSeleccionada = "";
//Funciones========================================================================================
function cargarTarjetasO(){
    var postData = {
        metodo: "cargarTarjetas",
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
    obraSeleccionada = id_obra;
    tarjetaSeleccionada(id_obra);
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
//=================================================================================================
function cargarInfoE(){
    var postData = {
        metodo: "imprimir_info_elemento",
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ObrasAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("divInfoElemento").innerHTML = arrayResponse[0].scriptHTML;
        }
    });
}
//=================================================================================================
function cargarRegistroO(){
    var postData = {
        metodo: "imprimir_registro_obra",
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ObrasAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            document.getElementById("divInfo").innerHTML = arrayResponse[0].scriptHTML;
        }
    });
}
//=================================================================================================
function cargarRegistroE(id_obra){
    var postData = {
        metodo: "imprimir_registro_elemento",
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
            document.getElementById("tarjetaElementoNuevo").innerHTML = arrayResponse[0].scriptHTML;
        }
    });
}
//=================================================================================================
function registrarObraNueva(){
    var postData = {
        metodo:     "registrarObraNueva",
        titulo:     document.getElementById('tituloObra').value,
        id_cliente: document.getElementById('IdCliente').value,
        ubicacion:  document.getElementById('ubicacion').value,
        notas:      document.getElementById('Notas').value
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ObrasAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            let arrayResponse = JSON.parse(response);
            $salida = arrayResponse[0].salida;
            if($salida == 'true'){
                alert('Obra Registrada Correctamente');
                cargarTarjetasO();
                obraSeleccionada = arrayResponse[0].cargar;
                cargarInfoO(arrayResponse[0].cargar);
            }else{
                alert($salida);
            }
        }
    });
}
//=================================================================================================
function registrarNuevoElemento(id_obra){
    var postData = {
        metodo:  "registrarNuevoElemento",
        tituloEle: document.getElementById('tituloElemento').value,
        id_obra: id_obra
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ObrasAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            let arrayResponse = JSON.parse(response);
            $salida = arrayResponse[0].salida;
            if($salida == 'true'){
                alert('Elemento Agregado Correctamente');
                cargarInfoO(id_obra)
            }else{
                alert($salida);
            }
        }
    });
}
//=================================================================================================
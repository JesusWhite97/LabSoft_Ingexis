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
        metodo:     "cargarInfo",
        id_obra:    id_obra
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
function cargarInfoE(idEle){
    var postData = {
        metodo:     "imprimir_info_elemento",
        idElemento: idEle
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
        metodo:     "imprimir_registro_elemento",
        id_obra:    id_obra
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
        metodo:     "registrarNuevoElemento",
        tituloEle:  document.getElementById('tituloElemento').value,
        id_obra:    id_obra
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
function registrarDatosElemento(idElemento,id1,id2,id3){
    var postData = {
        metodo:         "registrarDatosElemento",
        correoUser:     usuarioLog(),
        id_elemento:    idElemento,
        fecha_muestreo: document.getElementById('fecha_muestreo').value,
        id_muestra_1:   document.getElementById('id_muestra_1').value,
        id_muestra_2:   document.getElementById('id_muestra_2').value,
        id_muestra_3:   document.getElementById('id_muestra_3').value,
        id1:            id1,
        id2:            id2,
        id3:            id3
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/ObrasAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            $salida = arrayResponse[0].salida;
            if($salida == 'true'){
                alert('Datos Elemento agregados correctamente.');
                cargarInfoO(id_obra)
            }else{
                alert($salida);
            }
        }
    });
}
//=================================================================================================
function ModificarObra(id_obra){
    var postData = {
        metodo:         "ModificarObra",
        id_obra:        id_obra,
        TituloObra:     document.getElementById('TituloObra').value,
        Cliente:        document.getElementById('Cliente').value,
        Direccion:      document.getElementById('Direccion').value,
        Anotaciones:    document.getElementById('Anotaciones').value
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
                alert('Datos Modificcados correctamente.');
                cargarTarjetasO();
                obraSeleccionada = id_obra;
                cargarInfoO(id_obra);
            }else{
                alert($salida);
            }
        }
    });
}
//=================================================================================================
function EliminarObra(id_obra){
    var postData = {
        metodo:         "EliminarObra",
        id_obra:        id_obra
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
                alert('Obra eliminada correctamente.');
                cargarTarjetasO();
                obraSeleccionada = id_obra;
                cargarInfoO(obra1);
            }else{
                alert($salida);
            }
        }
    });
}
//=================================================================================================
//variables========================================================================================
var obra1;
obraSeleccionada = "";
//Funciones========================================================================================
//=================================================================================================
function iniciarInterfazObra(id_obra){
    imprimirLayout("obras");
    cargarTarjetasO();
    cargarInfoO(id_obra);
}
function iniciarInterfazObra(id_obra,id_ele){
    imprimirLayout("obras");
    cargarTarjetasO();
    cargarInfoO(id_obra);
    cargarInfoE(id_ele,id_obra)
}
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
    tarjetaSeleccionada(id_obra,"contenedorGridResponsivo");
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
            document.getElementById("divInfoElemento").innerHTML = '';
        }
    });
}
//=================================================================================================
function cargarInfoE(idEle,idObra){
    tarjetaSeleccionada("ele-"+idEle, "elementosGridResponsivo");
    if(idEle != "" || idEle != null){
        var postData = {
            metodo:     "imprimir_info_elemento",
            idElemento: idEle,
            idO: idObra
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
            document.getElementById("tarjetaElementoNuevo").scrollIntoView();
           
        
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
                infoModal('respuesta','Obra Registrada Correctamente',"iniciarInterfazObra('"+arrayResponse[0].cargar +"')",'OK','"'+document.getElementById('tituloObra').value+"'",'ninguna');
            }else{
                infoModal('respuesta','Obra no se puedo registrar,<br> Informe de servidor:',"closeModal('contenedorModal')",'OK','"'+salida+"'",'ninguna');
            }
        }
    });
}
//=================================================================================================
function registrarNuevoElemento(id_obra){
    if(document.getElementById('tituloElemento').value == ''){
        infoModal('respuesta','Nombre elemento vacío','closeModal("contenedorModal")','OK',' ','ninguna');
    }else{
  
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
            var $salida = arrayResponse[0].salida;
            if($salida == 'true'){
                infoModal('respuesta','Elemento Registrado Correctamente',"iniciarInterfazObra('"+id_obra +"')",'OK',' ','ninguna');

            }else{
                infoModal('respuesta','NO se registro Elemento',"iniciarInterfazObra('"+id_obra +"')",'OK',$salida,'ninguna');
            }
        }
    });
}
}
//=================================================================================================
function EliminarElemento(idElemento, id_obra){
    var postData = {
        metodo:         "EliminarElemento",
        id_elemento:    idElemento
    }
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
                infoModal('respuesta','Elemento Eliminado Correctamente',"iniciarInterfazObra('"+id_obra +"')",'OK','','ninguna');
            }else{
                infoModal('respuesta','No se pudo eliminar elemento.','closeModal("contenedorModal")','OK',$salida,'ninguna');
            }
        }
    });
}
//=================================================================================================
function registrarDatosElemento(idElemento,id1,id2,id3,id_obra){
    var postData = {
        metodo:         "registrarDatosElemento",
        correoUser:     usuarioLog(),
        id_elemento:    idElemento,
        tituloElemento: document.getElementById('TituloElemento').value,
        observaciones:  document.getElementById('observaciones').value,
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
             var $salida = arrayResponse[0].salida;
            if($salida == 'true'){
                infoModal('respuesta','Datos del Elemento Registrados Correctamente',"closeAndLoadElemento('"+idElemento+"')",'OK','','ninguna');
            }else{
                infoModal('respuesta','ERROR, no se guardaron los datos.','closeModal("contenedorModal")','OK',$salida,'ninguna');
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
                infoModal('respuesta','Obra Modificada Correctamente',"iniciarInterfazObra('"+id_obra +"')",'OK',document.getElementById('TituloObra').value,'ninguna');
            }else{
                infoModal('respuesta','No se pudo modificar, <br> Respuesta servidor:',"iniciarInterfazObra('"+id_obra +"')",'OK',$salida,'ninguna');
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
                infoModal('respuesta','Obra Eliminada Correctamente',"iniciarInterfazObra('"+obra1 +"')",'OK',"",'ninguna');
            }else{
                alert($salida);
            }
        }
    });
}
//=================================================================================================
function RegistrarResultado(idElemento, identificador, resultado, id_obra){
    var postData = {
        metodo:         "RegistrarResultado",
        identificador:  identificador,
        resultado:      resultado
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
                infoModal('respuesta','Resultado Prueba Registrado  Correctamente',"cargarInfoE('"+idElemento+"')",'OK','','ninguna');
            }else{
                infoModal('respuesta','ERROR, no se guardaron los datos.','closeModal("contenedorModal")','OK',$salida,'ninguna');
            }
        }
    });
}
//=================================================================================================
function ModificarMuestraFull(id_obra, idElemento, identificador1, identificador2, identificador3){
    let res1 = "??";
    let res2 = "??";
    let res3 = "??";
    if( document.getElementById('resul-'+identificador1)){
             res1 = document.getElementById('resul-'+identificador1).value;
    }
    if( document.getElementById('resul-'+identificador2)){
             res2 = document.getElementById('resul-'+identificador2).value;
    }
    if( document.getElementById('resul-'+identificador3)){
             res3 = document.getElementById('resul-'+identificador3).value;
    }

    var postData = {
        metodo:            "ModificarMuestraFull",
        TituloElemento:    document.getElementById('TituloElemento').value,
        observaciones:     document.getElementById('observaciones').value,
        fechaMuestro:      document.getElementById('fechaMuestro').value,
        idElemento:        idElemento,
        // ----------------------------
        ident1Ant:         document.getElementById('iden-' +identificador1).id,
        ident1New:         document.getElementById('iden-' +identificador1).value,
   
        resul1:            res1,
        // ----------------------------
        ident2Ant:         document.getElementById('iden-' +identificador2).id,
        ident2New:         document.getElementById('iden-' +identificador2).value,
        resul2:            res2,
        // ----------------------------
        ident3Ant:         document.getElementById('iden-' +identificador3).id,
        ident3New:         document.getElementById('iden-' +identificador3).value,
        resul3:            res3,
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
                infoModal('respuesta','Datos del Elemento Modificados Correctamente',"cargarInfoE('"+idElemento+"')",'OK','','ninguna');
            }else{
                infoModal('respuesta','ERROR, no se guardaron los datos.','closeModal("contenedorModal")','OK',$salida,'ninguna');
            }
        }
    });
}
//=================================================================================================
function closeAndLoadElemento(idEle){
 cargarInfoE(idEle);
 closeModal("contenedorModal");
}
//=================================================================================================
//=================================================================================================
//=================================================================================================
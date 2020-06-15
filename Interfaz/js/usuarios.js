//variables========================================================================================
var salidaUsuario ="";                  //agregar
var salidaUsuarioEliminado ="";         //eliminado
var modificacionSalida = "";            //modificado
//Funciones========================================================================================
function cargarInterfazUsuarios(busqueda,filtro,correo){
    this.cargarTarjetasU(busqueda,filtro);
    cargarInfoU(correo);
}
//=================================================================================================
function cargarTarjetasU(cadenaBuscar, cadenaFiltrado){
    const postData ={
        metodo:"cargarTarjetas", 
        busqueda: cadenaBuscar, 
        filtro: cadenaFiltrado
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/UsuariosAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
        let arrayResponse = JSON.parse(response);
        document.getElementById("contenedorGridResponsivo").innerHTML = arrayResponse[0].mensajeDatos;
        }
    });
}
//=================================================================================================
function cargarInfoU(correo){
    var salida = '';
    // tarjetaSeleccionada(correo); =================================== no jala este metodo para esta pantalla
    const postData = {
        metodo: "cargarInfo",
        correo: correo
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/UsuariosAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            console.log(response);
            let arrayResponse = JSON.parse(response);
            console.log(arrayResponse[0].infoUsuario);
            
            document.getElementById("divInfo").innerHTML = arrayResponse[0].infoUsuario;
        }
    });
    
}
//=================================================================================================
function cargarRegistroUsuario(){
    const postData = {
        metodo: "cargarRegistroUsuario",
    };
    $.post('/LabSoft_Ingexis/Logica/UsuariosAjax.php',postData,function(response){
        let arrayResponse = JSON.parse(response);
        console.log(arrayResponse[0].registroUsuario);
        document.getElementById("divInfo").innerHTML = arrayResponse[0].registroUsuario;
    });
}
//=================================================================================================
function guardarUsuario(){
    var postData = {
        metodo: "guardarUsuario",
        apodo:document.getElementById("apodo").value.toUpperCase(),
        puesto: obtenerValorSelect(document.getElementById("puesto").selectedIndex),
        nom1:document.getElementById("nom1").value[0].toUpperCase() + document.getElementById("nom1").value.slice(1),
        nom2:document.getElementById("nom2").value,
        ape1:document.getElementById("ape1").value[0].toUpperCase() + document.getElementById("ape1").value.slice(1),
        ape2:document.getElementById("ape2").value,
        rfc: document.getElementById("rfc").value.toUpperCase(),
        curp: document.getElementById("curp").value.toUpperCase(),
        cel: document.getElementById("cel").value,
        correo: document.getElementById("correo").value.toLowerCase(),
        contra1: document.getElementById("contra1").value,
        calle: document.getElementById("calle").value,
        entre: document.getElementById("entre").value,
        numCasa: document.getElementById("num").value,
        ciudad: document.getElementById("ciudad").value,
        cp: document.getElementById("cp").value,
        colonia: document.getElementById("colonia").value,
        img: obtenerNombreArchivo(),
    };
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/UsuariosAjax.php',
        type:"POST",
        async: false,
        success:function(response){
            var arrayResponse = JSON.parse(response);
            console.log(arrayResponse[0].validacion);
            salidaUsuario = arrayResponse[0].validacion;
            console.log(salidaUsuario);
        }
    });
}
//=================================================================================================
function eliminarUsuario(){
    let correoLOG = usuarioLog();
    let correo = document.getElementById("correo").value

    if(correo == correoLOG){
    infoModal('respuesta','No se puede eliminar el usuario que inicio sesión:',"closeModal('contenedorModal')",'OK','"'+correo+'"','ninguna');
    }else{

    let respuestaServidor = "No contesto";
    postData = {
        metodo: "eliminarUsuario",
        correo: document.getElementById("correo").value,
    };
    $.ajax({
        data: postData,
        url: '/LabSoft_Ingexis/Logica/UsuariosAjax.php',
        type: "POST",
        async: false,
        success:function(response){
            console.log(response);
            var arrayResponse = JSON.parse(response);
            salidaUsuarioEliminado = arrayResponse[0].validacion;
            if(arrayResponse[0].validacion == "true"){
                respuestaServidor = "Eliminado del sistema: ";   
            }else{
                respuestaServidor = "<b>Error:</b>"+arrayResponse[0].validacion;
            }

        }
    })
    var correoScript = usuarioLog();
    infoModal('respuesta',respuestaServidor,"cargarInterfazUsuarios('','1111','"+correoScript+"')",'OK','"'+correo+'"','ninguna');
}
}
//=================================================================================================
function modificarUsuario(cambios){
    var postData = {
        metodo: "modificarUsuario",
        cambios: cambios,
        correo: document.getElementById("correo").value
    };
    //-----------------------------------------
    if(cambios[0]){
        postData.apodo = document.getElementById("apodo").value;
    }
    if(cambios[1]){
        postData.puesto = obtenerValorSelect(document.getElementById("puesto").selectedIndex);
    }
    if(cambios[2]){
        postData.nom1 = document.getElementById("nom1").value;
        postData.nom2 = document.getElementById("nom2").value;
        postData.ape1 = document.getElementById("ape1").value;
        postData.ape2 = document.getElementById("ape2").value;
    }
    if(cambios[3]){
        postData.rfc = document.getElementById("rfc").value;
    }
    if(cambios[4]){
        postData.curp = document.getElementById("curp").value;
    }
    if(cambios[5]){
        postData.cel = document.getElementById("cel").value;
    }
    if(cambios[6]){
        postData.contra1 = document.getElementById("contra1").value;
        postData.contra2 = document.getElementById("contra2").value;
    }
    if(cambios[7]){
        postData.calle = document.getElementById("calle").value;
        postData.entre = document.getElementById("entre").value;
        postData.num = document.getElementById("num").value;
        postData.ciudad = document.getElementById("ciudad").value;
        postData.cp = document.getElementById("cp").value;
        postData.colonia = document.getElementById("colonia").value;
    }
    if(cambios[8]){
        postData.img = obtenerNombreArchivo();
    }
    //-----------------------------------------
    $.ajax({
        data:postData,
        url:'/LabSoft_Ingexis/Logica/UsuariosAjax.php',
        type:"POST",
        async: false,
         success:function(response){
            console.log(response);
            var arrayResponse = JSON.parse(response);
            modificacionSalida = arrayResponse[0].validacion;
        }
    });

}
//=================================================================================================

//=================================================================================================
function filtrado(){
    var checkAdmon = document.getElementById("admon");
    var checkJefe = document.getElementById("jefe");
    var checkLab1 = document.getElementById("lab1");
    var checkLab2 = document.getElementById("lab2");
    var filtro = "";

    if(checkJefe.checked == true){
        filtro += "1";
    }else{
        filtro += "0";
    }
    if(checkAdmon.checked == true){
        filtro += "1";
    }else{
        filtro += "0";
    }
    if(checkLab1.checked == true){
        filtro += "1";
    }else{
        filtro += "0";
    }
    if(checkLab2.checked == true){
        filtro += "1";
    }else{
        filtro += "0";
    }
    
    return(filtro);
}
//=================================================================================================
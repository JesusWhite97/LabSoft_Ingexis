//Funciones=====================================================
//################################
function cargarTarjetas(cadenaBuscar, cadenaFiltrado){
    const postData ={
        metodo:"cargarTarjetas", 
        busqueda: cadenaBuscar, 
        filtro: cadenaFiltrado
    };
    $.post('/LabSoft_Ingexis/Logica/UsuariosAjax.php',postData,function(response){
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
        let arrayResponse = JSON.parse(response);
        console.log(arrayResponse[0].infoUsuario);
        document.getElementById("divInfoUsuarios").innerHTML = arrayResponse[0].infoUsuario;
    });
}
//################################
function cargarRegistroUsuario(){
    const postData = {
        metodo: "cargarRegistroUsuario",
    };
    $.post('/LabSoft_Ingexis/Logica/UsuariosAjax.php',postData,function(response){
        let arrayResponse = JSON.parse(response);
        console.log(arrayResponse[0].registroUsuario);
        document.getElementById("divInfoUsuarios").innerHTML = arrayResponse[0].registroUsuario;
    });
}
//################################
var salidaUsuario ="";
function guardarUsuario(){
    var postData = {
        metodo: "guardarUsuario",
        apodo:document.getElementById("apodo").value,
        puesto: obtenerValorSelect(document.getElementById("puesto").selectedIndex),
        nom1:document.getElementById("nom1").value,
        nom2:document.getElementById("nom2").value,
        ape1:document.getElementById("ape1").value,
        ape2:document.getElementById("ape2").value,
        rfc: document.getElementById("rfc").value,
        curp: document.getElementById("curp").value,
        cel: document.getElementById("cel").value,
        correo: document.getElementById("correo").value,
        contra: document.getElementById("contra").value,
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
            console.log(response);
            var arrayResponse = JSON.parse(response);
            console.log(arrayResponse[0].validacion);
            salidaUsuario = arrayResponse[0].validacion;
            console.log(salidaUsuario);
        }
    });
}
//################################
var salidaUsuarioEliminado ="";
function eliminarUsuario(){
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
        }
    });
}
//################################
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
//################################
//==============================================================
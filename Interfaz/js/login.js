//Funciones ===================================================================
function iniciarSesion(correo){
    var respuesta = "";
    const postData = {
        metodo: "iniciarSesion",
        correo: correo.toLowerCase()
    };
    $.post('/LabSoft_Ingexis/Logica/LoginAjax.php', postData, function(response){
        console.log(response);
        let arrayResponse = JSON.parse(response);
        alert(arrayResponse[0].mensajeSalida);
        location.href = arrayResponse[0].validacion;
        
    });
}
// ###############################
function validaContra(contra){
    var respuesta = "";
    const postData = {
        metodo: "validaContra",
        contra: contra
    }
    $.post('/LabSoft_Ingexis/Logica/LoginAjax.php', postData, function(response){
        console.log(response);
        let arrayResponse = JSON.parse(response);
        alert(arrayResponse[0].mensajeSalida);
        location.href = arrayResponse[0].validacion;
    });
}
// ============================================================================
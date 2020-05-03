function iniciarSesion(correo){
    var respuesta = "";
    var valida  = '';
    const postData = {
        metodo: "iniciarSesion",
        correo: correo
    };
    $.post('/LabSoft_Ingexis/Logica/LoginAjax.php', postData, function(response){
        console.log(response);
        let arrayResponse = JSON.parse(response);
        alert(arrayResponse[0].mensajeSalida);
        if(arrayResponse[0].validacion = 'true'){
            location.href='/LabSoft_Ingexis/Interfaz/LoginContraseña.php';
        }
    });    
}
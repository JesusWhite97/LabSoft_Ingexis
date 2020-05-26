//======================================================================================================
//Función para validar una CURP La entrada tiene que ser toda en mayusculas 
function curpValida(curp) {
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.toUpperCase().match(re);
    if (!validado)  //Coincide con el formato general?
        return false;
    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }
    if (validado[2] != digitoVerificador(validado[1])) 
        return false;
    return true; //Validado
}
//======================================================================================================
//Función para validar una RFC La entrada tiene que ser toda en mayusculas 
function validateRFC(rfc) {
    var patternPM = "^(([A-ZÑ&]{3})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{3})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{3})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{3})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";
    var patternPF = "^(([A-ZÑ&]{4})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";

    if (rfc.toUpperCase().match(patternPM) || rfc.toUpperCase().match(patternPF)) {
        return true;
    } else {
        // alert("La estructura de la clave de RFC es incorrecta.");
        return false;
    }
}
//======================================================================================================
function validaCorreoValido(correo){
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(correo)) {
        return true;
    } else {
        return false;
    }
}
//======================================================================================================
function validaContraFormat(Contra){
    if(Contra != "" || Contra != null){
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,16}$/;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (Contra.match(regex)) {
        return true;
    } else {
        return false;
    }
}
}
//======================================================================================================
function camposRequeridos(){
    var ok = true;
    var requireds = document.getElementsByClassName("required");

    for(var i = 0; i <  requireds.length; i++){
              if(requireds[i].value == "" || requireds == null){
                    ok = false;
                    requireds[i].style.border = "1px solid #8B0000";
                }else{
                    requireds[i].style.border = "0px";
                    requireds[i].style["border-bottom"]= "2px solid rgba(255, 255, 255, 0.5)";
                }
    }
    return ok;
}
//======================================================================================================
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return false;
    return true;
  } 

//======================================================================================================
function validaCoincideContra(contra1, contra2){
    if(contra1 == contra2){
        return true;
    }else{
        return false;
    }
}
//======================================================================================================
//======================================================================================================
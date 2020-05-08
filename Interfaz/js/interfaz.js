function verPantallaModificar(item){

    let arrayInputs = document.getElementsByTagName("input");
    let btnImg = document.getElementById("botonImg");
    let btnGuardar = document.getElementById("botonGuardar");
    let btnsDelPrint = document.getElementById("botonesDelPrint");
    let btnEdit = document.getElementById("botonEditar");
    let btnDel = document.getElementById("botonEliminar");
    let btnCancel = document.getElementById("botonCancelar");
    let textoModalPregunta = document.getElementById("textoModalPregunta");
    let botonEliminarModal = document.getElementById("botonEliminarModal");
    let botonGuardarModal = document.getElementById("botonGuardarModal");
    let divContras = document.getElementById("inContras");
    let correo = document.getElementById("correo");

    selectModificar();

      for(let i = 0; i < arrayInputs.length;i++){
        arrayInputs[i].classList.add("registro");
      }
      correo.classList.remove("registro");
      btnImg.style.display = "block";
      divContras.style.display = "block";
      btnCancel.style.display = "block";
      btnGuardar.style.display = "block";
      btnsDelPrint.style.display = "none";
      //botonGuardarModal.style.display = "block";
      btnEdit.style.display = "none";
      botonEliminarModal.style.display = "none";
      textoModalPregunta.innerHTML = "Desea modificar " + item + " ?";

}
//===================================================================================================
function verPantallaInfo(correo){
    cargarTarjetas("",filtrado());
    cargarInfo(correo);
}
//===================================================================================================
function selectModificar(){
      var arrayInputInfo = document.getElementsByClassName("selectInfo");
      var arraySelects =  document.getElementsByTagName("select");

      for(var i = 0; i < arraySelects.length; i++){
                arraySelects[i].style.display = "block";
                arrayInputInfo[i].style.display = "none";
      }
}
//===================================================================================================

//===================================================================================================

//===================================================================================================
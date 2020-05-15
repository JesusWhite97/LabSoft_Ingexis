//===================================================================================================
// Función para que una cambiar a una pantalla con campos modificables

function verPantallaModificar(item){
    let arrayInputs = document.getElementsByTagName("input");
    let btnImg = document.getElementById("botonImg");
    let btnFooterGuardar = document.getElementById("footerGuardar_Boton");
    let btnGuardar = document.getElementById("botonGuardar");
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
    botonGuardarModal.style.display = "block";
    btnEdit.style.display = "none";
    botonEliminarModal.style.display = "none";
    btnFooterGuardar.style.display = "block";
    textoModalPregunta.innerHTML = "Desea modificar " + item + " ?";
}
//===================================================================================================
//clon de la funcion anterior namas que para clientes
function verPantallaEditar(item){
  let arrayInputs = document.getElementsByTagName("input");
    let btnImg = document.getElementById("botonImg");
    let btnFooterGuardar = document.getElementById("footerGuardar_Boton");
    let btnGuardar = document.getElementById("botonGuardar");
    let btnEdit = document.getElementById("botonEditar");
    let btnDel = document.getElementById("botonEliminar");
    let btnCancel = document.getElementById("botonCancelar");
    let textoModalPregunta = document.getElementById("textoModalPregunta");
    let botonEliminarModal = document.getElementById("botonEliminarModal");
    let botonGuardarModal = document.getElementById("botonGuardarModal");
    let correo = document.getElementById("emailReg");
    selectModificar();
    for(let i = 0; i < arrayInputs.length;i++){
      arrayInputs[i].classList.add("registro");
    }
    btnImg.style.display = "block";
    btnCancel.style.display = "block";
    botonGuardarModal.style.display = "block";
    btnEdit.style.display = "none";
    botonEliminarModal.style.display = "none";
    btnFooterGuardar.style.display = "block";
    textoModalPregunta.innerHTML = "Desea modificar " + item + " ?";
}
//===================================================================================================
  function infoModal(claseBoton, textoModal, textoBoton, metodo){
    let scriptModal = '<div id="fondoModal"></div><div class="modal"><p id ="textoModalPregunta" class="textoModal">'+textoModal+'</p><button id ="botonEliminarModal"class="'+claseBoton+'" onclick="'+metodo+'">'+textoBoton+'</button><button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button></div>';
    let cotenendorModal = document.getElementById("contenedorModal");
    cotenendorModal.innerHTML = scriptModal;
    openModal();
  }
//===================================================================================================
// Función para mostrar un modal con el boton de eliminar
 function verModalEliminar(item){
   
  let textoModalPregunta = document.getElementById("textoModalPregunta");
  let botonEliminarModal = document.getElementById("botonEliminarModal");
  let botonGuardarModal = document.getElementById("botonGuardarModal");

  botonGuardarModal.style.display = "none";
  botonEliminarModal.style.display = "block";
  textoModalPregunta.innerHTML = "Desea eliminar <br><b>" + item + "</b> ?";
  openModal();
  
 }
//===================================================================================================
// Función para mostrar un modal con el boton de modificar
 function verModalModificar(item){
   
  let textoModalPregunta = document.getElementById("textoModalPregunta");
  let botonEliminarModal = document.getElementById("botonEliminarModal");
  let botonGuardarModal = document.getElementById("botonGuardarModal");

  botonGuardarModal.style.display = "block";
  botonEliminarModal.style.display = "none";
  textoModalPregunta.innerHTML = "Desea modificar <br><b>" + item + "</b> ?";
  openModal();

 }
//===================================================================================================
// Función para mostrar un modal con el boton de modificar
 function verModalGuardar(item){
   
  let textoModalPregunta = document.getElementById("textoModalPregunta");
  let botonGuardarModal = document.getElementById("botonGuardarModal");

  botonGuardarModal.style.display = "block";
  textoModalPregunta.innerHTML = "Desea Guardar <br><b>" + item + "</b> ?";
  openModal();

 }
//===================================================================================================
// Función para que una cambiar a una pantalla donde se muestra información sin campos modificables
function verPantallaInfo(correo){
    cargarTarjetas("",filtrado());
    cargarInfo(correo);
}
//===================================================================================================
function verPantallaInfoCliente(correo){
  cargarTarjetas("");
  cargarInfo(correo);
}
//===================================================================================================
// Función para que un select sea seleccionable
function selectModificar(){
      var arrayInputInfo = document.getElementsByClassName("selectInfo");
      var arraySelects =  document.getElementsByTagName("select");

      for(var i = 0; i < arraySelects.length; i++){
                arraySelects[i].style.display = "block";
                arrayInputInfo[i].style.display = "none";
      }
}
//===================================================================================================
 function tarjetaSeleccionada(item){
  arrayTarjetasUsuarios = document.getElementsByClassName("contenedorTarjetaUsuario");

  for(let i = 0; i < arrayTarjetasUsuarios.length;i++){
      arrayTarjetasUsuarios[i].style.border = "0px";
      arrayTarjetasUsuarios[i].style["boxShadow"] = "0px 5px 4px 0px rgba(0,0,0,0.46)";
  }
  tarjetaUser = document.getElementById(item);
  tarjetaUser.style.border = "1px solid #fff";
  tarjetaUser.style["boxShadow"] = "0px 5px 4px 0px #fff";

 }
//===================================================================================================

//===================================================================================================
//===================================================================================================
var CamposErroneos = [];

// Función para que una cambiar a una pantalla con campos modificables

function verPantallaModificar(item){

 // muestra botones opciones parte superior
    let btnEdit = document.getElementById("botonEditar");
    let btnCancel = document.getElementById("botonCancelar");
    let btnImg = document.getElementById("botonImg");
    btnImg.style.display = "block";
    btnCancel.style.display = "block";
    btnEdit.style.display = "none";


    // Validación por si existe  los campos contraseña los muestre
    if (document.getElementById("inContras")){
      let divContras = document.getElementById("inContras");
      divContras.style.display = "block";
    }
      
    //Muestra recorre los arreglos de los tags input y textarea para agregar la clase registro y sean editables.
    let arrayInputs = document.getElementsByTagName("input");
    let arrayTextArea = document.getElementsByTagName("textArea");
    for(let i = 0; i < arrayInputs.length;i++){
      arrayInputs[i].classList.add("registro");
    }

    for(let i = 0; i < arrayTextArea.length;i++){
      arrayTextArea[i].disabled = false;
    }

    //Quita la clase registro para que no se pueda modificar
    if(document.getElementById("correo")){
    let correo = document.getElementById("correo");
      correo.classList.remove("registro");
    }
    
    // Metodo para que se active cualquiere select que se tenga
    selectModificar();

     //Muestra boton de guardar en la parte inferior
      let btnFooterGuardar = document.getElementById("footerGuardar_Boton");
      btnFooterGuardar.style.display = "block";
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
  openModal("contenedorModal");
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
function infoModal(tipo,texto,funcion,textoBoton,item,claseBoton){
  let modal = document.getElementById('contenedorModal');
  let tipoModal = 'imprimir_modal_'+tipo;

  postData = {
      metodo: tipoModal,
      texto: texto,
      funcion: funcion,
      textoBoton: textoBoton,
      item: item,
      claseBoton: claseBoton,
  };
  $.ajax({
      data: postData,
      url: '/LabSoft_Ingexis/Logica/ModalInterfaz.php',
      type: "POST",
      async: false,
      success:function(response){
          console.log(response);
          var arrayResponse = JSON.parse(response);
          modal.innerHTML = arrayResponse[0].scriptHTML; 
      }
  });
  openModal("contenedorModal");
}
//===================================================================================================
function openModal(item) {
  document.getElementById(item).style.height = "100%";
  window.addEventListener('scroll', noScrollModal);
}

function closeModal(item){
document.getElementById(item).style.height = "0%";
window.removeEventListener('scroll', noScrollModal);
} 
//===================================================================================================
function noScroll() {
  window.scrollTo(0, 0);
}
function noScrollModal() {
  var y1 = document.getElementById("contenedorModal").offsetTop;
  var y2 = y1 + document.getElementById("contenedorModal").height;
  window.scrollTo(y1, y2);
}
//===================================================================================================
function campoOK(id,ok){
  campo = document.getElementById(id);
  
  if(ok==false){
     campo.style.border = "1px solid #8B0000";
     if(CamposErroneos.indexOf(id) == -1){
       CamposErroneos.push(id);
     }
  }else{
     campo.style.border = "1px solid #008000";
     if(CamposErroneos.indexOf(id) != null){
      CamposErroneos.splice(CamposErroneos.indexOf(id),1);
    }
     
  }
}
//===================================================================================================
function errores(){
  let cadena = '';
  if(CamposErroneos.length == 0){
    return false;
  }else{
    for(i=0;i<CamposErroneos.length;i++){
      if(CamposErroneos[i] == "contra1"){
        cadena =cadena + '<br>Formato incorecto en CONTRASEÑA';
      }else{
        if(CamposErroneos[i] == "contra2"){
          cadena =cadena + '<br>CONTRASEÑAS no coinciden';
        }else{
          cadena =cadena + '<br>Formato incorrecto en: '+CamposErroneos[i].toUpperCase();
        }
      }
    }
    return cadena;
  }
}
//===================================================================================================
 var noMasNumeros = '';
function telNumberFormat(id){
   let numeroTel = document.getElementById(id);
    
  
  if(numeroTel.value.length == 10){
    numeroTel.value = '('+numeroTel.value.slice(0,-7)+')-'+numeroTel.value.slice(3,-4)+'-'+numeroTel.value.slice(6);
    noMasNumeros = numeroTel.value;
  }
  if(numeroTel.value.length > 13){
    numeroTel.value = noMasNumeros;
  }
  



  

}
//===================================================================================================
function selectItemMenu(itemSelected,img){
  document.getElementById("itemHome").style["background-image"] = 'url("img/HomeIcon.svg")';
  document.getElementById("itemHome").style["border-radius"] = "5px";
  document.getElementById("itemHome").style["border-bottom"]= "none";

  document.getElementById("itemObras").style["background-image"] = 'url("img/ObrasIcon.svg")';
  document.getElementById("itemObras").style["border-radius"] = "5px";
  document.getElementById("itemObras").style["border-bottom"]= "none";

  document.getElementById("itemMuestras").style["background-image"] = 'url("img/MuestraIcon.svg")';
  document.getElementById("itemMuestras").style["border-radius"] = "5px";
  document.getElementById("itemMuestras").style["border-bottom"]= "none";

  document.getElementById("itemPruebas").style["background-image"] = 'url("img/PruebaIcon.svg")';
  document.getElementById("itemPruebas").style["border-radius"] = "5px";
  document.getElementById("itemPruebas").style["border-bottom"]= "none";

  document.getElementById("itemUsers").style["background-image"] = 'url("img/UserIcon.svg")';
  document.getElementById("itemUsers").style["border-radius"] = "5px";
  document.getElementById("itemUsers").style["border-bottom"]= "none";

  document.getElementById("itemClients").style["background-image"] = 'url("img/ClientesIcon.svg")';
  document.getElementById("itemClients").style["border-radius"] = "5px";
  document.getElementById("itemClients").style["border-bottom"]= "none";

  item = document.getElementById(itemSelected);
  item.style["background-image"] = 'url('+img+')';
  item.style["border-radius"] = "0px";
  item.style["border-bottom"]= "4px solid #0109FC";

  if(itemSelected == "itemUsers"){
    imprimirLayout("usuarios");
    cargarInterfazUsuarios("",'1111',usuarioLog());
    
  }
  if(itemSelected == "itemClients"){
    imprimirLayout("clientes");
    iniciarInterfazClientes();
  }

  if(itemSelected == "itemObras"){
    imprimirLayout("obras");
    cargarTarjetasO();
    cargarInfoO();
  }
}
//===================================================================================================
function imprimirNavBar(){
  postData = {
      metodo: "imprimir_navbar"
  };
  $.ajax({
      data: postData,
      url: '/LabSoft_Ingexis/Logica/NavBar.php',
      type: "POST",
      async: false,
      success:function(response){
          console.log(response);
          var arrayResponse = JSON.parse(response);
          document.getElementById("menuNavegacion").innerHTML = arrayResponse[0].scriptHTML; 
      }
  });
  
}
//===================================================================================================
function imprimirLayout(interfaz){
  postData = {
      metodo: "imprimir_layout",
      layout: interfaz
  };
  $.ajax({
      data: postData,
      url: '/LabSoft_Ingexis/Logica/LayoutInterfaz.php',
      type: "POST",
      async: false,
      success:function(response){
          console.log(response);
          var arrayResponse = JSON.parse(response);
          document.getElementById("contenedorPrincipal").innerHTML = arrayResponse[0].scriptHTML; 
      }
  });
  
}
//===================================================================================================
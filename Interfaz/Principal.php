<?php
    //-------------------------------------------
    session_start();
    if(!isset($_SESSION["correo"]) || !isset($_SESSION["puesto"])){
        header('Location: /LabSoft_Ingexis/Interfaz/Login.php');
    }
    //-------------------------------------------
    unset($_SESSION['carpeta']);
    unset($_SESSION['Nuevo']);
    unset($_SESSION['Client1']);
    //var_dump($_SESSION);
    //-------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/main.css">
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous">
	</script>
	<script src="js/usuarios.js"></script>
    <script src="js/clientes.js"></script>
	<script src="js/main.js"></script>
	<script src="js/interfaz.js"></script>
	<script src="js/validaciones.js"></script>

    <script>
        window.onload = function(){
			imprimirNavBar();
		}
    
        function cargarUsers(){
        var postData = {
            metodo: "cargarUsers",
        };
        $.ajax({
            data:postData,
            url:'BorrarDespes.php',
            type:"POST",
            async: false,
            success:function(response){
                console.log(response);
                var arrayResponse = JSON.parse(response);
                alert(arrayResponse[0].validacion);
            }
        });
    }
    //##################### USUARIOS ################################################################################
    // --------------------------------------
		function usuarioLog(){
			return '<?php echo $_SESSION['correo'] ?>';
		}
		// --------------------------------------
		var flag = true;
		function mostrarOpcionesU(){
			let contenedorBuscador = document.getElementById("contenedorBuscador");
			let contenedorOpciones = document.getElementById("contenedorOpciones");
			let contenedorGridResponsivo = document.getElementById("contenedorGridResponsivo");
			let sombradesenfoque = document.getElementById("desenfoque");
			let botonOpciones = document.getElementById("opciones");
			if(flag == true){
				contenedorBuscador.style.backgroundImage = ":linear-gradient(to right,#17232470,#17232470);"
				contenedorOpciones.style.display = "grid";
				contenedorGridResponsivo.style.marginTop = "140px";
				sombradesenfoque.classList.remove("sombra");
				botonOpciones.style.backgroundImage = "url(img/opcionesOpen.svg)";
				flag = false;
			}else{
				contenedorOpciones.style.display = "none";
				contenedorGridResponsivo.style.marginTop = "10px";
				sombradesenfoque.classList.add("sombra");
				botonOpciones.style.backgroundImage = "url(img/opcionesClose.svg)";
				flag = true;
			}
		}
		// --------------------------------------
		function cargarInfoUsuario(email){
			if (screen.width >= 800) {
				let divTarjetas = document.getElementById("divTarjetas");
				let divInfo = document.getElementById("divInfo");
				divTarjetas.style.display = "block";
				divInfo.style.display = "block";
			}
			if (screen.width < 800) {
				let divTarjetas = document.getElementById("divTarjetas");
				let divInfo = document.getElementById("divInfo");
				divTarjetas.style.display = "none";
				divInfo.style.display = "block";
			}
			cargarInfo(email);
		}
		// --------------------------------------
		function goBack(){
			if (screen.width < 800) {
				let divTarjetas = document.getElementById("divTarjetas");
				let divInfo = document.getElementById("divInfo");
				divTarjetas.style.display = "block";
				divInfo.style.display = "none";
			}
		}
		// --------------------------------------
		function guardarUser(){
			if(camposRequeridos()== false){
				infoModal('respuesta','Faltan campos requeridos:',"closeModal('contenedorModal')",'OK','Registre los campos requeridos','ninguna');
			}
			else{
				if(errores() == false){
					infoModal('confirmar','Desea guardar el usuario:','guardarUser2()','Guardar',document.getElementById("correo").value,'guardarBotonModal');
				}
				else{
					infoModal('respuesta','Errores en los campos:'+errores(),"closeModal('contenedorModal')",'OK','Corrija los errores','ninguna');
				}
			}
		}

		function guardarUser2(){
			correoNuevo = document.getElementById("correo").value;
			guardarUsuario();
				if(salidaUsuario == 'true'){
					subirImg();
					if(respuestaSubirIMG != 'NO'){
						infoModal('respuesta','Usuario registrado con exito 🤘.',"cargarInterfazUsuarios('','1111','"+correoNuevo+"')",'OK',correoNuevo,'ninguna');
					}
					else{
						eliminarUsuario();
						if(eliminarUsuario == 'true'){
							infoModal('respuesta','error al registrar Usuario: ' + errorSubirIMG,"closeModal('contenedorModal')",'OK',correoNuevo,'ninguna');
						}
					}
				}
				else{
					infoModal('respuesta',salidaUsuario,"closeModal('contenedorModal')",'OK','No hay registro','ninguna');
				}
		}
		// --------------------------------------
		var arregloCambios = Array(0,0,0,0,0,0,0,0,0);//Apodo-Puesto-Nombre-RFC-Curp-Telefono-Contraseña-Direccion-IMG
		function modificarUser(){
			if(arregloCambios.includes(1)){
				if(camposRequeridos()== false){
							infoModal('respuesta','Faltan campos requeridos:',"closeModal('contenedorModal')",'OK','Registre los campos requeridos','ninguna');
				}
				else{
						if(errores() == false){
								infoModal('confirmar','Desea guardar el usuario:','modificarUser2()','Modificar',document.getElementById("correo").value,'guardarBotonModal');
						}
						else{
								infoModal('respuesta','Errores en los campos:'+errores(),"closeModal('contenedorModal')",'OK','Corrija los errores','ninguna');
						}
					}
			}else{
				infoModal('respuesta','El sistema no detecta cambios en ningún campo.<br>','cargarInfo(document.getElementById("correo").value)','OK','No se registro ninguna modificación.','ninguna');
			}
		}
		function modificarUser2(){
			var correoNuevo = document.getElementById("correo").value;
				if(arregloCambios[8]){
					subirImg();
					if(respuestaSubirIMG == 'NO'){
						arregloCambios[8] = 0;
					}
				}
				modificarUsuario(arregloCambios);
				infoModal('respuesta',modificacionSalida,"cargarInterfazUsuarios('','1111','"+correoNuevo+"')",'OK','"'+correoNuevo+"'",'ninguna');
				arregloCambios = Array(0,0,0,0,0,0,0,0,0);
		}
		// --------------------------------------
		function selectItem(seleccionado){
			var arrayOptions = document.getElementsByTagName("option");
			for(var i = 0;arrayOptions.length;i++){
				if(arrayOptions[index].value== seleccionado){
					arrayOptions[index].selected = true;
				}
			}
		}
        // --------------------------------------


         //##################### CLIENTES ################################################################################
        	// --------------------------------------
		var flag = true;
		function mostrarOpcionesC(){
			let contenedorBuscador = document.getElementById("contenedorBuscador");
			let contenedorOpciones = document.getElementById("contenedorOpciones");
			let contenedorGridResponsivo = document.getElementById("contenedorGridResponsivo");
			let sombradesenfoque = document.getElementById("desenfoque");
			let botonOpciones = document.getElementById("opciones");
			if(flag == true){
				contenedorBuscador.style.backgroundImage = ":linear-gradient(to right,#17232470,#17232470);"
				contenedorOpciones.style.display = "grid";
				contenedorGridResponsivo.style.marginTop = "40px";
				sombradesenfoque.classList.remove("sombra");
				botonOpciones.style.backgroundImage = "url(img/opcionesOpen.svg)";
				flag = false;
			}else{
				contenedorOpciones.style.display = "none";
				contenedorGridResponsivo.style.marginTop = "10px";
				sombradesenfoque.classList.add("sombra");
				botonOpciones.style.backgroundImage = "url(img/opcionesClose.svg)";
				flag = true;
			}
		}
		// --------------------------------------
		function guardarClient(){
			if(camposRequeridos()== false){
				infoModal('respuesta','Faltan campos requeridos:',"closeModal('contenedorModal')",'OK','Registre los campos requeridos','ninguna');
			}
			else{
				if(errores() == false){
					infoModal('confirmar','Desea guardar el usuario:','guardarClient2()','Guardar',document.getElementById("nom_empr").value,'guardarBotonModal');
				}
				else{
					infoModal('respuesta','Errores en los campos:'+errores(),"closeModal('contenedorModal')",'OK','Corrija los errores','ninguna');
				}
			}
			
		}
		function guardarClient2(){
			guardarCliente();
			if(salidaGuardar == 'true'){
				subirImg();
				if(respuestaSubirIMG != 'NO'){
					alert('Usuario registrado con exito 🤘.');
				}else{
					eliminarCliente();
					if(eliminarCliente == 'true'){
						alert('error al registrar Usuario: ' + errorSubirIMG);
					}
				}
			}
			var ClienteNuevo = document.getElementById('emailReg').value;
			cargarTarjetas('');
			cargarInfo(ClienteNuevo);

		}
		// --------------------------------------
		function eliminarClient(){
			infoModal('confirmar','Desea guardar el usuario:','eliminarCliente()','Eliminar',document.getElementById("nom_empr").value,'guardarBotonModal');
		}
		// --------------------------------------
		var arregloCambios = Array(0,0,0,0,0); //-----nota--Contacto--datosBasicos--direccion--img
		function ModificarClient(){
			if(arregloCambios.includes(1)){
				if(camposRequeridos()== false){
							infoModal('respuesta','Faltan campos requeridos:',"closeModal('contenedorModal')",'OK','Registre los campos requeridos','ninguna');
				}
				else{
						if(errores() == false){
								infoModal('confirmar','Desea modificar cliente:','ModificarClient2()','Modificar',document.getElementById("nom_empr").value,'guardarBotonModal');
						}
						else{
								infoModal('respuesta','Errores en los campos:'+errores(),"closeModal('contenedorModal')",'OK','Corrija los errores','ninguna');
						}
					}
			}else{
				infoModal('respuesta','El sistema no detecta cambios en ningún campo.<br>','cargarInfo(document.getElementById("emailReg").value)','OK','No se registro ninguna modificación.','ninguna');
			}
			
		}
		function ModificarClient2(){
			var correoNuevo = document.getElementById("emailReg").value;
				if(arregloCambios[4]){
					subirImg();
					if(respuestaSubirIMG == 'NO'){
						arregloCambios[4] = 0;
					}
				}
				modificarCliente(arregloCambios);																														
				arregloCambios = Array(0,0,0,0,0);
				correoNuevo = document.getElementById("emailReg").value;
				infoModal('respuesta',modificacionCliente,"iniciarInterfazClientes()",'OK','"'+correoNuevo+"'",'ninguna');
		}
		// --------------------------------------


    </script>
    
    <!-- ==================================================== -->
    <style>
        a{
            font-size: 30px;
        }
    </style>
    <!-- ==================================================== -->
</head>
<body id="bodyPricipal">
<div class="fondoPantalla"></div>
	<header id="encabezadoBotones">
            <button id="regresar">
            </button>
            <div id="menuNavegacion">
            </div>
            <div id="imgUsuarioLogin" style='background-image: url("../Usuarios/<?php echo $_SESSION['correo'];?>/<?php echo $_SESSION['imgUsuario'];?>");'></div>
            <div id="nombreUsuarioLogin"><?php echo $_SESSION['apodo']; ?></div>
    </header>   
    <div id="contenedorPrincipal">
		
	</div>
	
    
</body>
</html>
<!-- <br>
<br>
<br>
<br>
<a href="/LabSoft_Ingexis/Interfaz/usuarios.php">Usuarios</a>
<br>
<br>
<br>
<br>
<a href="/LabSoft_Ingexis/Interfaz/clientes.php">Clientes</a>
<br>
<br>
<br>
<br>
<button onclick="cargarUsers();">Cargar Usuarios</button> -->
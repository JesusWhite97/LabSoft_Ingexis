<?php   
	session_start();
	if($_SESSION['puesto'] != 'Administrador' && $_SESSION['puesto'] != 'Jefe De Laboratorio'){
		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
	}
	$_SESSION['carpeta'] = 'Clientes';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- ========================Con esto evitamos la cache (Quitar despues)======================== -->
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<!-- =========================================================================================== -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/main.css">
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous">
	</script>
	<script src="js/clientes.js"></script>
	<script src="js/main.js"></script>
	<script src="js/interfaz.js"></script>
	<script src="js/validaciones.js"></script>
	<script>
		// --------------------------------------
		window.onload = function(){
			cargarTarjetas('');
			cargarInfo(cliente1);
		}
		// --------------------------------------
		var flag = true;
		function mostrarOpciones(){
			let contenedorBuscador = document.getElementById("contenedorBuscador");
			let contenedorOpciones = document.getElementById("contenedorOpciones");
			let contenedorGridResponsivo = document.getElementById("contenedorGridResponsivo");
			let sombradesenfoque = document.getElementById("desenfoque");
			let botonOpciones = document.getElementById("opciones");
			if(flag == true){
				contenedorBuscador.style.backgroundImage = ":linear-gradient(to right,#17232470,#17232470);"
				contenedorOpciones.style.display = "grid";
				contenedorGridResponsivo.style.marginTop = "80px";
				sombradesenfoque.classList.remove("sombra");
				botonOpciones.style.backgroundImage = "url(img/opcionesOpen.svg)";
				flag = false;
			}else{
				contenedorOpciones.style.display = "none";
				contenedorGridResponsivo.style.marginTop = "60px";
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
		// --------------------------------------
	</script>
	<title>Ingexis Labsoft - Clientes</title>
</head>
<body ><div class="fondoPantalla"></div>
	<header id="encabezadoBotones">
	<button id="regresar" onclick="goBack()"></button>
	<h2 id="titulo">Clientes</h2>
	<button id="menu"></button>
	</header>
	<div class="contenedorPrincipal">
		<!-- 00000000000000000000000 -->
		<div id="divTarjetas">
			<div id="contenedorBuscador">
					<div id="desenfoque" class="sombra"></div>
					<input type="text" id="buscarEntrada" onkeyup="cargarTarjetas(document.getElementById('buscarEntrada').value);" placeholder="Buscar..." title="Type in a name"></input>
					<button id="opciones" onclick="mostrarOpciones()"></button>
			</div> 
			<div id="contenedorOpciones" class="sombra" style="display: none;">
				<div class="itemMenu" onclick="cargarAgregar()">
					<div class="icoMenu" style="background-image:url(img/icoAgregar.svg);background-size: 30px 30px;" ></div>
					<p>Agregar Cliente</p> 
				</div>
            </div>
			<div id="contenedorGridResponsivo" onload="cargarTarjetas('')">
				
			</div>
		</div>
		<!-- 11111111111111111111111 -->
		<div id="divInfo">
			
		</div>
		<!-- 22222222222222222222222 -->
	</div>
</body>
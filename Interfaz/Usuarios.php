<?php   
	session_start();
	if($_SESSION['puesto'] != 'Administrador' && $_SESSION['puesto'] != 'Jefe De Laboratorio'){
		header('Location: /LabSoft_Ingexis/Interfaz/Login.php');
		// echo "<script type='text/javascript'>";
		// echo "window.history.back(-1)";
		// echo "</script>";
	}
	$_SESSION['carpeta'] = 'Usuarios';
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
	<script src="js/usuarios.js"></script>
	<script src="js/main.js"></script>
	<script src="js/interfaz.js"></script>
	<script src="js/validaciones.js"></script>
	<script>
		// --------------------------------------
		window.onload = function(){
			cargarInterfazUsuarios('','1111','<?php echo $_SESSION['correo'] ?>');
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
				contenedorGridResponsivo.style.marginTop = "180px";
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
		function cargarInfoUsuario(email){
			if (screen.width >= 800) {
				let divUsuarios = document.getElementById("divUsuarios");
				let divInfoUsuarios = document.getElementById("divInfoUsuarios");
				divUsuarios.style.display = "block";
				divInfoUsuarios.style.display = "block";
			}
			if (screen.width < 800) {
				let divUsuarios = document.getElementById("divUsuarios");
				let divInfoUsuarios = document.getElementById("divInfoUsuarios");
				divUsuarios.style.display = "none";
				divInfoUsuarios.style.display = "block";
			}
			cargarInfo(email);
		}
		// --------------------------------------
		function goBack(){
			if (screen.width < 800) {
				let divUsuarios = document.getElementById("divUsuarios");
				let divInfoUsuarios = document.getElementById("divInfoUsuarios");
				divUsuarios.style.display = "block";
				divInfoUsuarios.style.display = "none";
			}
		}
		// --------------------------------------
		function guardarUser(){
			var ValidaContra = validaCoincideContra(document.getElementById("contra1").value, document.getElementById("contra2").value);
			var validaContraForm = validaContraFormat(document.getElementById("contra1").value);
			var ValidaCurp = curpValida(document.getElementById("curp").value.toUpperCase());
			var ValidaRfc = validateRFC(document.getElementById("rfc").value.toUpperCase());
			var ValidaCorreo = validaCorreoValido(document.getElementById("correo").value);
			if(ValidaContra == true && ValidaCurp == true && ValidaRfc == true && ValidaCorreo == true && validaContraForm ==true)
			{
				//----------------------------------------------------------------
				guardarUsuario();
				if(salidaUsuario == 'true'){
					subirImg();
					if(respuestaSubirIMG != 'NO'){
						alert('Usuario registrado con exito 🤘.');
					}else{
						eliminarUsuario();
						if(eliminarUsuario == 'true'){
							alert('error al registrar Usuario: ' + errorSubirIMG);
						}
					}
				}
				var correoNuevo = document.getElementById("correo").value;
				this.cargarTarjetas('','1111');
				cargarInfo(correoNuevo);
				//----------------------------------------------------------------
			}
			else{
				closeModal();
				var alerta = 		   'Error en los siguientes campos:\n' + 
				(ValidaContra 	? validaContraForm ? '' : 'El formato para lo contraseña es incorreco.\n' : 'Las contraseñas no coinciden.\n') +
				(ValidaCurp 	? '' : 'El curp no tiene el formato correcto.\n') +
				(ValidaRfc 		? '' : 'El rfc no tiene el formato correcto.\n') +
				(ValidaCorreo	? '' : 'El Correo no tiene el formato correcto.\n');
				alert(alerta);
			}
		}
		// --------------------------------------
		var arregloCambios = Array(0,0,0,0,0,0,0,0,0);//Apodo-Puesto-Nombre-RFC-Curp-Telefono-Contraseña-Direccion-IMG
		function modificarUser(){
			var correoNuevo = document.getElementById("correo").value;
			if(arregloCambios.includes(1)){
				if(arregloCambios[8]){
					subirImg();
					if(respuestaSubirIMG == 'NO'){
						arregloCambios[8] = 0;
					}
				}
				modificarUsuario(arregloCambios);
				infoModal('respuesta',modificacionSalida,"cargarInterfazUsuarios('','1111','"+correoNuevo+"')",'OK','"'+correoNuevo+"'",'ninguna');
				arregloCambios = Array(0,0,0,0,0,0,0,0,0);
			}else{
				closeModal('contenedorModal');
				cargarInfo(correoNuevo);
			}
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
	</script>
	<title>Ingexis Labsoft - Usuarios</title>
</head>
<body >
	<div class="fondoPantalla"></div>
	<header id="encabezadoBotones">
	<button id="regresar" onclick="goBack()"></button>
	<h2 id="titulo">Usuarios</h2>
	<button id="menu"></button>
	</header>
	<div class="contenedorPrincipal">
		<!-- 00000000000000000000000 -->
		<div id="divUsuarios">
			<div id="contenedorBuscador">
					<div id="desenfoque" class="sombra"></div>
					<input type="text" id="buscarEntrada" onkeyup="cargarTarjetas(document.getElementById('buscarEntrada').value,filtrado())" placeholder="Buscar..." title="Type in a name"></input>
					<button id="opciones" onclick="mostrarOpciones()"></button>
			</div> 
			<div id="contenedorOpciones" class="sombra" style="display: none;">
                                <div class="itemMenu" onclick="cargarRegistroUsuario()">
                                        <div class="icoMenu" style="background-image:url(img/icoAgregar.svg);background-size: 30px 30px;" ></div>
                                        <p>Agregar usuario</p> 
                                </div>
                                <div class="itemMenu">
                                        <div class="icoMenu" style="background-image:url(img/icoFiltro.svg);"></div>
                                        <p>Filtrado</p>

                                        <div id="filtrado">
                                                <div> <input checked type="checkbox" value="admon" id="admon" onclick="cargarTarjetas(document.getElementById('buscarEntrada').value,filtrado())"><p>Administrador</p></input></div>
                                                <div style="margin-left: -15px;"> <input checked type="checkbox" value="jefe" id="jefe"  onclick="cargarTarjetas(document.getElementById('buscarEntrada').value,filtrado())"><p>Jefe de Laboratorio</p></input></div>
                                                <div> <input checked type="checkbox" value="lab1" id="lab1" onclick="cargarTarjetas(document.getElementById('buscarEntrada').value,filtrado())"><p>Laboratorista 1</p></input></div>
                                                <div style="margin-left: -15px;"> <input checked type="checkbox" value="lab2" id="lab2" onclick="cargarTarjetas(document.getElementById('buscarEntrada').value,filtrado())"><p>Laboratorista 2</p></input></div>
                                        </div>
                                </div>
            </div>
					
			<div id="contenedorGridResponsivo"> 
			</div>
		</div>
		<!-- 11111111111111111111111 -->
		<div id="divInfoUsuarios">
			
		</div>
		<!-- 22222222222222222222222 -->
	</div>
</body>
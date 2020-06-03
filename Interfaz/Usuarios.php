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
			cargarInterfazUsuarios("",'1111',usuarioLog());
		}
		// --------------------------------------
		function usuarioLog(){
			return '<?php echo $_SESSION['correo'] ?>';
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
	</script>
	<title>Ingexis Labsoft - Usuarios</title>
</head>
<body >
	<div class="fondoPantalla"></div>
	<header id="encabezadoBotones">
            <button id="regresar">
            </button>
            <div id="menuNavegacion">
                <div class="item" id="itemHome"  	style='background-image: url("img/HomeIcon.svg");' 		onclick="selectItemMenu('itemHome', 	'img/HomeIconBlue.svg');"></div>
                <div class="item" id="itemObras" 	style='background-image: url("img/ObrasIcon.svg");' 	onclick="selectItemMenu('itemObras', 	'img/ObrasIconBlue.svg');"></div>
                <div class="item" id="itemMuestras" style='background-image: url("img/MuestraIcon.svg");' 	onclick="selectItemMenu('itemMuestras',	'img/MuestraIconBlue.svg');"></div>
                <div class="item" id="itemPruebas" 	style='background-image: url("img/PruebaIcon.svg");'  	onclick="selectItemMenu('itemPruebas',	'img/PruebaIconBlue.svg');"></div>
                <div class="item" id="itemUsers" 	style='background-image: url("img/UserIcon.svg");'  	onclick="selectItemMenu('itemUsers',	'img/UserIconBlue.svg');"></div>
                <div class="item" id="itemClients" 	style='background-image: url("img/ClientesIcon.svg");'  onclick="selectItemMenu('itemClients',	'img/ClientesIconBlue.svg');"></div>
            </div>
            <div id="imgUsuarioLogin" style='background-image: url("../Usuarios/<?php echo $_SESSION['correo'];?>/<?php echo $_SESSION['imgUsuario'];?>");'></div>
                <div id="nombreUsuarioLogin"><?php echo $_SESSION['apodo']; ?></div>
        </header>   
	<div id="contenedorPrincipal">
		<!-- 00000000000000000000000 -->
		<div id="divTarjetas">
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
		<div id="divInfo">
			
		</div>
		<!-- 22222222222222222222222 -->

		<!-- 33333333333333333333333 -->
	</div>
</body>
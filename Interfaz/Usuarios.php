<?php   
	session_start();
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
	<script>
		// --------------------------------------
		window.onload = function(){
			this.cargarTarjetas('','1111');
			cargarInfo('<?php echo $_SESSION['correo'] ?>');
		}
		// --------------------------------------
		var flag = true;
		function mostrarOpciones(){
			let contenedorOpciones = document.getElementById("contenedorOpciones");
			let contenedorGridResponsivo = document.getElementById("contenedorGridResponsivo");
			let sombradesenfoque = document.getElementById("desenfoque");
			let botonOpciones = document.getElementById("opciones");
			if(flag == true){
				contenedorOpciones.style.display = "grid";
				contenedorGridResponsivo.style.marginTop = "175px";
				sombradesenfoque.classList.remove("sombra");
				sombradesenfoque.style.borderRadius = "10px 10px 0px 0px";
				botonOpciones.style.backgroundImage = "url(../img/opcionesOpen.svg)";
				flag = false;
			}else{
				contenedorOpciones.style.display = "none";
				contenedorGridResponsivo.style.marginTop = "120px";
				sombradesenfoque.classList.add("sombra");
				sombradesenfoque.style.borderRadius = "10px";
				botonOpciones.style.backgroundImage = "url(../img/opcionesClose.svg)";
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
					<input type="text" id="buscarEntrada" onkeyup="cargarTarjetas(document.getElementById('buscarEntrada').value,'1111')" placeholder="Buscar..." title="Type in a name"></input>
					<button id="opciones" onclick="mostrarOpciones()"></button>
			</div> 
			<div id="contenedorOpciones" clsass="sombra" style="display: none;">
					<a href="">Agregar usuario</a>
					<a href="">Filtrado</a>
			</div>
			<div id="contenedorGridResponsivo" onload="cargarTarjetas('','1111')"> 
			</div>
		</div>
		<!-- 11111111111111111111111 -->
		<div id="divInfoUsuarios">
			
		</div>
		<!-- 22222222222222222222222 -->
	</div>
</body>
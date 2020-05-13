<?php   
	session_start();
	if($_SESSION['puesto'] != 'Administrador' && $_SESSION['puesto'] != 'Jefe De Laboratorio'){
		echo "<script type='text/javascript'>";
		echo "window.history.back(-1)";
		echo "</script>";
	}
?>
<!DOCTYPE html>
<html lang="es">
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
	<script src="js/clientes.js"></script>
	<script src="js/main.js"></script>
	<script src="js/interfaz.js"></script>
	<script src="js/validaciones.js"></script>
	<script>
		// --------------------------------------
		window.onload = function(){
			cargarTarjetas('');
		}
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
		<div id="divUsuarios">
			<div id="contenedorBuscador">
					<div id="desenfoque" class="sombra"></div>
					<input type="text" id="buscarEntrada" onkeyup="cargarTarjetas(document.getElementById('buscarEntrada').value,filtrado())" placeholder="Buscar..." title="Type in a name"></input>
					<button id="opciones" onclick="mostrarOpciones()"></button>
			</div> 
			<div id="contenedorOpciones" class="sombra" style="display: none;">
                                <div class="itemMenu" onclick="">
                                        <div class="icoMenu" style="background-image:url(img/icoAgregar.svg);background-size: 30px 30px;" ></div>
                                        <p>Agregar Cliente</p> 
                                </div>
                                <div class="itemMenu">
                                        <div class="icoMenu" style="background-image:url(img/icoFiltro.svg);"></div>
                                        <p>Filtrado</p>

                                        <div id="filtrado">
                                                <div> <input checked type="checkbox" value="admon" id="admon"><p>Administrador</p></input></div>
                                                <div style="margin-left: -15px;"> <input checked type="checkbox" value="jefe" id="jefe"><p>Jefe de Laboratorio</p></input></div>
                                                <div> <input checked type="checkbox" value="lab1" id="lab1"><p>Laboratorista 1</p></input></div>
                                                <div style="margin-left: -15px;"> <input checked type="checkbox" value="lab2" id="lab2"><p>Laboratorista 2</p></input></div>
                                        </div>
                                </div>
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
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
    var_dump($_SESSION);
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
	<script src="js/main.js"></script>
	<script src="js/interfaz.js"></script>
	<script src="js/validaciones.js"></script>
	<script>

    <script>
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
    </script>
    
    <!-- ==================================================== -->
    <style>
        a{
            font-size: 30px;
        }
    </style>
    <!-- ==================================================== -->
</head>
<body>
<div class="fondoPantalla"></div>
    <header id="encabezadoBotones"> 
        <button id="regresar">
        </button>
        <div id="menuNavegacion">
            <div class="item" id="itemHome"  style='background-image: url("img/HomeIcon.svg");' onclick=selectItemMenu("itemHome","img/HomeIconBlue.svg");></div>
            <div class="item" id="itemObras" style='background-image: url("img/ObrasIcon.svg");' onclick=selectItemMenu("itemObras","img/ObrasIconBlue.svg");></div>
            <div class="item" id="itemMuestras" style='background-image: url("img/MuestraIcon.svg");' onclick=selectItemMenu("itemMuestras","img/MuestraIconBlue.svg");></div>
            <div class="item" id="itemPruebas" style='background-image: url("img/PruebaIcon.svg");'  onclick=selectItemMenu("itemPruebas","img/PruebaIconBlue.svg");></div>
            <div class="item" id="itemUsers" style='background-image: url("img/UserIcon.svg");'  onclick=selectItemMenu("itemUsers","img/UserIconBlue.svg");></div>
            <div class="item" id="itemClients" style='background-image: url("img/ClientesIcon.svg");'  onclick=selectItemMenu("itemClients","img/ClientesIconBlue.svg");></div>
        </div>
        <div id="imgUsuarioLogin" style='background-image: url("../Usuarios/<?php echo $_SESSION['correo'];?>/<?php echo $_SESSION['imgUsuario'];?>");'></div>
        <div id="nombreUsuarioLogin"><?php echo $_SESSION['apodo']; ?></div>
    </header> 
</body>
</html>
<br>
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
<button onclick="cargarUsers();">Cargar Usuarios</button>
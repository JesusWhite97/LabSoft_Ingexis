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
    <title>Document</title>
    <!-- ==================================================== -->
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous">
    </script>
    <!-- ==================================================== -->
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
<!-- ========================================================================================== -->
<?php
    session_start();
    unset($_SESSION['correo']);
?>
<!-- ========================================================================================== -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/login.js"></script>
    <script>
        function clickIniciar(){
            let email = document.getElementById("inputLogin").value; 
            iniciarSesion(email);
        }
    </script>
    <title>Ingexis LabSoftware</title>
</head>
<body>
    <div id="contenedorLogin">
        <div id="contenedorTituloLogin">
            <div id="imgLogin"></div>
            <h2 id="tituloLogin">Software de laboratorio de <br> control de calidad de<br>concretos.</h2>
        </div>
        <div id="contenedorInputLogin">
            <input type="email" name="email" id="inputLogin" placeholder="Correo Electronico">
            <script>var email = document.getElementById("inputLogin").value;</script>
            <button id="footerGuardar_Boton" style="margin:00px auto;" onclick=clickIniciar()>Iniciar sesión</button>
        </div>
    </div>
</body>
</html>
<!-- ========================================================================================== -->
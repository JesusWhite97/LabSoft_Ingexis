<!-- ========================================================================================== -->
<?php
    session_start();    
    if(!isset($_SESSION["correo"])){
        header('Location: /LabSoft_Ingexis/Interfaz/Login.php');
    }
?>
<!-- ========================================================================================== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/login.js"></script>
    <title>Ingexis LabSoftware</title>
    <script>
        function clickIniciar(){
            let contra = document.getElementById("inputLogin").value; 
            validaContra(contra);
        }
    </script>
</head>

    <div id="contenedorLogin">
        <div id="contenedorTituloLogin">
            <div id="imgUser"></div>
            <h2 id="tituloLogin"> <?php echo $_SESSION['apodo']; ?></h2>
        </div>
        <div id="contenedorInputLogin">
            <input type="password" name="password" id="inputLogin" placeholder="Contraseña">
            <button id="footerGuardar_Boton" style="margin:00px auto;" onclick=clickIniciar()>Iniciar sesión</button>
        </div>
    </div>

</html>
<!-- ========================================================================================== -->
<?php
    //-------------------------------------------
    session_start();
    if(!isset($_SESSION["correo"]) || !isset($_SESSION["puesto"])){
        header('Location: /LabSoft_Ingexis/Interfaz/Login.php');
    }
    //-------------------------------------------
    var_dump($_SESSION);
    //-------------------------------------------
?>
<style>
    a{
        font-size: 30px;
    }
</style>
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
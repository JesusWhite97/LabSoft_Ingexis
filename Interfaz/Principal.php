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
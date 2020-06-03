<?php
    // ========================================================
    session_start();
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="imprimir_navbar"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_navbar()
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    // ========================================================
    function imprimir_navbar(){
        $puesto = $_SESSION["puesto"];
        $homeIcon = "'background-image: url(".'"img/HomeIcon.svg"'.");'";
        $obrasIcon = "'background-image: url(".'"img/ObrasIcon.svg"'.");'";
        $muestrasIcon = "'background-image: url(".'"img/MuestraIcon.svg"'.");'";
        $pruebasIcon = "'background-image: url(".'"img/PruebaIcon.svg"'.");'";
        $usersIcon = "'background-image: url(".'"img/UserIcon.svg"'.");'";
        $clientsIcon = "'background-image: url(".'"img/ClientesIcon.svg"'.");'";
        if($puesto == "Administrador" || $puesto == "Jefe de Laboratorios"){
            return ' 
            <div class="item" id="itemHome"  style='.$homeIcon.' onclick=selectItemMenu("itemHome","img/HomeIconBlue.svg");></div>
            <div class="item" id="itemObras" style='.$obrasIcon.' onclick=selectItemMenu("itemObras","img/ObrasIconBlue.svg");></div>
            <div class="item" id="itemMuestras" style='.$muestrasIcon.' onclick=selectItemMenu("itemMuestras","img/MuestraIconBlue.svg");></div>
            <div class="item" id="itemPruebas" style='.$pruebasIcon.'  onclick=selectItemMenu("itemPruebas","img/PruebaIconBlue.svg");></div>
            <div class="item" id="itemUsers" style='.$usersIcon.'  onclick=selectItemMenu("itemUsers","img/UserIconBlue.svg");></div>
            <div class="item" id="itemClients" style='.$clientsIcon.'  onclick=selectItemMenu("itemClients","img/ClientesIconBlue.svg");></div>
            ';
        }
        if($puesto == "Laboratorista 1" || $puesto == "Laboratorista 2"){
            return ' 
            <div class="item" id="itemHome"  style='.$homeIcon.' onclick=selectItemMenu("itemHome","img/HomeIconBlue.svg");></div>
            <div class="item" id="itemObras" style='.$obrasIcon.' onclick=selectItemMenu("itemObras","img/ObrasIconBlue.svg");></div>
            <div class="item" id="itemMuestras" style='.$muestrasIcon.' onclick=selectItemMenu("itemMuestras","img/MuestraIconBlue.svg");></div>
            <div class="item" id="itemPruebas" style='.$pruebasIcon.'  onclick=selectItemMenu("itemPruebas","img/PruebaIconBlue.svg");></div>
            ';
        }
      
    }

    // ========================================================
?>
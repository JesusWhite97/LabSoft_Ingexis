<?php
    // ========================================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/UsuariosInterfaz.php';

    if(isset($_POST["metodo"])){
        if($_POST["metodo"]=="cargarTarjetas"){
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_tarjetas_usuario($_POST["busqueda"],$_POST["filtro"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
    }
    // ========================================================
?>
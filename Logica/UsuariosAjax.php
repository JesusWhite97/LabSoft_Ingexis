<?php
    // Librerias===============================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/UsuariosInterfaz.php';
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="cargarTarjetas"){
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_tarjetas_usuario($_POST["busqueda"],$_POST["filtro"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        //########################
        if($_POST["metodo"]=="cargarInfo"){
            //declaracion de variables--------------------------
            $correo = $_POST['correo'];
            //salida--------------------------------------------
            //echo imprimir_info_usuario($correo);
            $json[] =  [
                'infoUsuario' => imprimir_info_usuario($correo)
            ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    // ========================================================
?>
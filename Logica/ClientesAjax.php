<?php
    // Librerias===============================================
    include 'ClientesInterfaz.php';    
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="cargarTarjetas"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_tarjetas_clientes($_POST["texto"]),
                    'Cliente1'       => $_SESSION['Client1']
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        //########################
        if($_POST["metodo"]=="cargarInfo"){
            //declaracion de variables--------------------------
            $correo = $_POST['correo'];
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_info_cliente($correo)
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        //########################
        //########################
        //########################
        //########################
        //########################
        //########################
    }
    // ========================================================
?>
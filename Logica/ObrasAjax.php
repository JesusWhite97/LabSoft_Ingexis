<?php
    // Librerias===============================================
    include 'ObrasInterfaz.php';    
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="cargarTarjetas"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_tarjetas_obras()
                    // 'Obra1'       => $_SESSION['Obra1']
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"]=="cargarInfo"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_info_obra()
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"] == "cargarAgregar"){
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_registro_cliente()
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"] == "guardarCliente"){
            //declaracion de variables--------------------------
            $cliente = new Cliente();
            $salida = '';
            //Formular Respuesta--------------------------------
            $salida = $cliente->Insertar();
            $_SESSION['Nuevo'] = $_POST['emailReg'];
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => $salida
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"] == "eliminarCliente"){
            $cliente = new Cliente();
            $salida = '';
            //Formular Respuesta--------------------------------
            $salida = $cliente->Eliminar();
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => $salida
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"] == "modificarCliente"){
            $cliente = new Cliente();
            $correoA = $_POST["correoA"];
            $cambios = $_POST["cambios"];
            $salida = '';
            //Formular Respuesta--------------------------------

            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => $salida
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        //########################
    }
    // ========================================================
?>
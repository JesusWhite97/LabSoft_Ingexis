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
            $salida = $cliente->Insertar($_POST['tituloReg'], $_POST['nom_empr'], $_POST['rfc'], $_POST['direc'], $_POST['cod_pos'], $_POST['colonia'], $_POST['ciudad'], $_POST['nombre_contac'], $_POST['numero_contac'], $_POST['emailReg'], "aqui va la nota", $_POST['img']);
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
            
        }
        //########################
        //########################
        //########################
    }
    // ========================================================
?>
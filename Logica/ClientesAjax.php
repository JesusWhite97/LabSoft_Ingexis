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
            $_SESSION['Nuevo'] = $_POST['correo'];
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
            $salida = $cliente->Insertar($_POST['tituloReg'], $_POST['nom_empr'], $_POST['rfc'], $_POST['direc'], $_POST['cod_pos'], $_POST['colonia'], $_POST['ciudad'], $_POST['nombre_contac'], $_POST['numero_contac'], $_POST['emailReg'], $_POST['nota'], $_POST['img']);
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
            $salida = $cliente->Eliminar($_POST['emailReg']);
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
            $correoN = $_POST['emailReg'];
            $cambios = $_POST["cambios"];
            $salida = '';
            //Formular Respuesta--------------------------------
            if($cambios[0]==1){
                $salida = $salida.$cliente->Modificar_nota($correo, $_POST["nota"]);
            }
            if($cambios[2]==1){
                $salida = $salida.$cliente->Modificar_datosBasicos($correo, $_POST["titulo"], $_POST["nom_empr"], $_POST["rfc"]);
            }
            if($cambios[3]==1){
                $salida = $salida.$cliente->Modificar_direccion($correo, $_POST["direc"], $_POST["cod_pos"], $_POST["colonia"], $_POST["ciudad"]);
            }
            if($cambios[4]==1){
                $salida = $salida.$cliente->Modificar_img($correo, $_POST["img"]);
            }
            if($cambios[1]==1){
                $salida = $salida.$cliente->Modificar_contacto($correoA, $correoN, $_POST["nombre_contac"], $_POST["numero_contac"]);
            }
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
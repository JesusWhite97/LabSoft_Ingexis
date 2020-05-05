<?php
    // Librerias===============================================
    include 'UsuariosInterfaz.php';
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
        //########################
        if($_POST["metodo"]=="cargarRegistroUsuario"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =  [
                'registroUsuario' => imprimir_registro_usuario()
            ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"] == "guardarUsuario"){
            //declaracion de variables--------------------------
            $user = new Usuario();
            $salida = "";
            //Formular Respuesta--------------------------------
            $salida = $user->Insertar($_POST['correo'], $_POST['contra'], $_POST['img'], $_POST['nom1'], $_POST['nom2'], $_POST['ape1'], $_POST['ape2'], $_POST['apodo'], $_POST['cel'], $_POST['puesto'], $_POST['curp'], $_POST['rfc'], $_POST['calle'], $_POST['entre'], $_POST['numCasa'], $_POST['colonia'], $_POST['cp'], $_POST['ciudad']);
            $_SESSION['NuevoUser'] = $_POST['correo'];
            //salida--------------------------------------------
            $json[] =  [
                'validacion' => $salida
            ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"] == "eliminarUsuario"){
            //declaracion de variables--------------------------
            $user = new Usuario();
            $salida = "";
            //Formular Respuesta--------------------------------
            $salida = $user->Eliminar($_POST['correo']);
            //salida--------------------------------------------
            $json[] =  [
                'validacion' => $salida
            ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
    }
    // ========================================================
?>
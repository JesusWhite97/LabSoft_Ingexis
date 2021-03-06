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
            $_SESSION['Nuevo'] = $_POST['correo'];
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
            $salida = $user->Insertar($_POST['correo'], $_POST['contra1'], $_POST['img'], $_POST['nom1'], $_POST['nom2'], $_POST['ape1'], $_POST['ape2'], $_POST['apodo'], $_POST['cel'], $_POST['puesto'], $_POST['curp'], $_POST['rfc'], $_POST['calle'], $_POST['entre'], $_POST['numCasa'], $_POST['colonia'], $_POST['cp'], $_POST['ciudad']);
            $_SESSION['Nuevo'] = $_POST['correo'];
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
        if($_POST["metodo"] == "modificarUsuario"){
            //declaracion de variables--------------------------
            $user = new Usuario();
            $cambios = $_POST['cambios']; //Apodo-Puesto-Nombre-RFC-Curp-Telefono-Contraseña-Direccion-IMG
            $correo = $_POST['correo'];
            $salida = "<br><b>Modificaciones</b>:<br>";
            $_SESSION['Nuevo'] = $_POST['correo'];
            //Formular Respuesta--------------------------------
            if($cambios[0] == 1){
                $salida = $salida.$user->Modificar_Apodo($correo, $_POST['apodo']).", <b>Apodo</b>";
            }            
            if($cambios[1] == 1){
                $salida = $salida.$user->Modificar_puesto($correo, $_POST['puesto']).", <b>Puesto</b>";
            }            
            if($cambios[2] == 1){
                $salida = $salida.$user->Modificar_Nombre($correo, $_POST['nom1'], $_POST['nom2'], $_POST['ape1'], $_POST['ape2']).", <b>Nombre</b>";
            }            
            if($cambios[3] == 1){
                $salida = $salida.$user->Modificar_RFC($correo, $_POST['rfc']).", <b>RFC</b>";
            }            
            if($cambios[4] == 1){
                $salida = $salida.$user->Modificar_CURP($correo, $_POST['curp']).", <b>CURP</b>";
            }            
            if($cambios[5] == 1){
                $salida = $salida.$user->Modificar_Telefono($correo, $_POST['cel']).", <b>Telefono</b>";
            }
            if($cambios[6] == 1){
                $salida = $salida.$user->Modificar_contra_admin($correo, $_POST['contra1']).", <b>Contraseña</b>";
            }
            if($cambios[7] == 1){
                $salida = $salida.$user->Modificar_Direccion($correo, $_POST['calle'], $_POST['entre'], $_POST['num'], $_POST['colonia'], $_POST['cp'], $_POST['ciudad']).", <b>Direccion</b>";
            }
            if($cambios[8] == 1){
                $salida = $salida.$user->Modificar_img($correo, $_POST['img']).", <b>Imagen</b>";
            }
            //salida--------------------------------------------
            $json[] =  [
                'validacion' => $salida."<br><br> <b>en usuario:</b>"
            ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
    }
    // ========================================================
?>
<?php
    // Librerias ETC============================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/UsuariosFunciones.php';
    session_start();
    //Metodos===================================================
    if(isset($_POST["metodo"])){
        if($_POST["metodo"]=="iniciarSesion"){
            //declaracion de variables--------------------------
            $Respuesta = '';
            $infoUser = '';
            $Salida = '';
            $correo = $_POST['correo'];
            $usuario = new Usuario();
            //Formular Respuesta--------------------------------
            if($usuario->Existencia_de_correo($correo) == 'true'){
                $infoUser = $usuario->Info_Correo($correo);
                $Respuesta = 'Bienvenido '. $infoUser[0] .'.';
                $_SESSION["correo"]     = $correo;
                $_SESSION["apodo"]      = $infoUser[0];
                $_SESSION["imgUsuario"] = $infoUser[1];
                $Salida = '/LabSoft_Ingexis/Interfaz/LoginContraseña.php';
            }
            else{
                $Respuesta = 'El correo ingresado no existe. -'. $correo .'-';
                $Salida = '/LabSoft_Ingexis/Interfaz/Login.php';
            }
            //salida--------------------------------------------
            $json[] =   [
                            'mensajeSalida' => $Respuesta,
                            'validacion'    => $Salida
                        ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        // ################################
        if($_POST["metodo"]=="validaContra"){
            //declaracion de variables--------------------------
            $Respuesta = '';
            $usuario = new Usuario();
            $contra = $_POST['contra'];
            //Formular Respuesta--------------------------------
            if($usuario->Validar_contra($_SESSION["correo"], $contra) == 'true'){
                $Respuesta = 'A Trabajar '. $_SESSION["apodo"] .' 👍.';
            }
            else{
                $Respuesta = 'Contraseña Incorrecta.';
            }
            //salida--------------------------------------------
            $json[] =   [
                            'mensajeSalida' => $Respuesta,
                            'validacion'    => $usuario->Validar_contra($_SESSION["correo"], $contra)
                        ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    // =========================================================
?>
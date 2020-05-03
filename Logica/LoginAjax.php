<?php
    // Librerias ETC============================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/UsuariosInterfaz.php';
    //Metodos===================================================
    if(isset($_POST["metodo"])){
        if($_POST["metodo"]=="iniciarSesion"){
            //declaracion de variables----------------------------
            $Respuesta = '';
            $infoUser = '';
            $correo = $_POST['correo'];
            $usuario = new Usuario();
            //Formular Respuesta----------------------------------
            if($usuario->Existencia_de_correo($correo) == 'true'){
                $infoUser = $usuario->Info_Correo($correo);
                $Respuesta = 'Bienvenido '. $infoUser[0] .'.';
                session_start();
                $_SESSION["Correo"]     = $correo;
                $_SESSION["apodo"]      = $infoUser[0];
                $_SESSION["imgUsuario"] = $infoUser[1];
            }
            else{
                $Respuesta = 'El correo ingresado no existe. -'. $correo .'-';
            }
            //salida----------------------------------------------
            $json[] =   [
                            'mensajeSalida' => $Respuesta,
                            'validacion'    => $usuario->Existencia_de_correo($correo)
                        ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
    }
    // =========================================================
?>
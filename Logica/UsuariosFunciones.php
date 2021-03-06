<?php
    // ========================================================
    include '../BD/ProceUser.php';
    // ========================================================
    class Usuario{
        //#####################################################
        public function Puesto($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->PuestoByCorreo($correo);
            return $respuesta;
        }
        //#####################################################
        public function Existencia_de_correo($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ExisteCorreo($correo);
            return $respuesta;
        }
        //#####################################################
        public function Validar_contra($correo, $contra){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ConfirmarContraseña($correo, $contra);
            return $respuesta;
        }
        //#####################################################
        public function Info_Correo($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->InfoLogin($correo);
            return $respuesta;
        }
        //#####################################################
        public function Insertar( 
            $correo,    $contra,    $img,       $nom1, 
            $nom2,      $ape1,      $ape2,      $apodo, 
            $num,       $puesto,    $curp,      $rfc,
            $calleP,    $entre,     $numCasas,  $col, 
            $codPost,   $ciudad
        ){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->AgregarUsuario($correo, $contra, $img, $nom1, $nom2, $ape1, $ape2, $apodo, $num, $puesto, $curp, $rfc, $calleP, $entre, $numCasas, $col, $codPost, $ciudad);
            return $respuesta;
        }
        //#####################################################
        public function Eliminar($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->EliminarUsuario($correo);
            return $respuesta;
        }
        //#####################################################
        public function TarjetaEspecifica($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->TrajetaEspecifica($correo);
            return $respuesta;
        }
        //#####################################################
        public function VistaCompleta($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->VistaPorUsuario($correo);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_contra_user($correo, $actual, $nueva){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModContra_user($correo, $actual, $nueva);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_contra_admin($correo, $actual){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModContra_admin($correo, $actual);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_puesto($correo, $puesto){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModPuesto($correo, $puesto);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Nombre($correo, $nom1, $nom2, $ape1, $ape2){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModNombre($correo, $nom1, $nom2, $ape1, $ape2);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_CURP($correo, $curp){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->Modcurp($correo, $curp);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_RFC($correo, $rfc){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModRFC($correo, $rfc);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Apodo($correo, $apodo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModApodo($correo, $apodo);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Telefono($correo, $telefono){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModTelefono($correo, $telefono);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Direccion($correo, $calle, $entre, $numCasa, $col, $codP, $ciudad){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModDireccion($correo, $calle, $entre, $numCasa, $col, $codP, $ciudad);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_img($correo, $img){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->Modimg($correo, $img);
            return $respuesta;
        }
        //#####################################################
        public function Buscar_tarjetas($texto, $arregloPuestos){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->Buscar_tarjetas_usuarios($texto);
            $lim = count($respuesta);
            //filtrado Si existe ===============
            for($i = 0; $i < $lim; $i++){
                if($arregloPuestos[0] == '0' && $respuesta[$i]['puesto'] == 'Jefe De Laboratorio'){
                    unset($respuesta[$i]);
                }
                else if($arregloPuestos[1] == '0' && $respuesta[$i]['puesto'] == 'Administrador'){
                    unset($respuesta[$i]);
                }
                else if($arregloPuestos[2] == '0' && $respuesta[$i]['puesto'] == 'Laboratorista 1'){
                    unset($respuesta[$i]);
                }
                else if($arregloPuestos[3] == '0' && $respuesta[$i]['puesto'] == 'Laboratorista 2'){
                    unset($respuesta[$i]);
                }
            }
            //==================================
            $respuesta = array_values($respuesta);
            return $respuesta;
        }
        //#####################################################
        // public function TarjetasUsuarios(){
        //     $usuarioBD = new procedimientos_User();
        //     $respuesta = $usuarioBD->ListaTarjetasUsuarios();
        //     return $respuesta;
        // }
        //#####################################################
        // public function Filtro_por_puesto($arregloPuestos){
        //     //ingresar arreglo con los puestos buscados 
        //     //Ejemplo1: $puestos = ['Jefe De Laboratorio','Administrador','Laboratorista 1','Laboratorista 2'];
        //     //Ejemplo2: $puestos = ['Jefe De Laboratorio','Administrador','Laboratorista 1',''];
        //     //Ejemplo3: $puestos = ['Jefe De Laboratorio','Administrador','',''];
        //     //Ejemplo4: $puestos = ['Jefe De Laboratorio','','',''];
        //     $usuarioBD = new procedimientos_User();
        //     $respuesta = $usuarioBD->Filtro_tarjetas_puesto($arregloPuestos[0], $arregloPuestos[1], $arregloPuestos[2], $arregloPuestos[3]);
        //     return $respuesta;
        // }
        //#####################################################
    }
    // ========================================================
    // $usuario = new Usuario();
    // $arregloEjemplo = $usuario->Modificar_Direccion('jesus120190240.8@gmail.com', 'aaaaaaaaaa', 'avellana y limon', '201', 'aaaaaa', '24058', 'La Paz');
    // var_dump($arregloEjemplo);
    // ========================================================
    // $usuario = new Usuario();
    // $arregloEjemplo = $usuario->TarjetasUsuarios('Luis@gmail.com','1234');
    // var_dump($arregloEjemplo);
    // echo '
    //     <table style="width:100%">
    //     <tr>
    //         <th>img</th>
    //         <th>apodo</th>
    //         <th>puesto</th>
    //         <th>numero</th>
    //         <th>correo</th>
    //     </tr>
    // ';
    // for($ren = 0; $ren < count($arregloEjemplo); $ren++){
    //     echo '
    //         <tr>
    //             <td>'.$arregloEjemplo[$ren]['img'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['apodo'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['puesto'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['numero'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['correo'].'</td>
    //         </tr>
    //     ';        
    // }
    // echo '</table>';
    // ========================================================
?>
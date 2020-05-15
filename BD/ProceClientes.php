<?php
    // ========================================================
    include '../Logica/CrearDirectorios.php';
    include 'conexion.php';
    header("Content-Type: text/html;charset=utf-8"); 
    // ========================================================
    class procedimientos_Clientes{
        //#####################################################
        public function VerCliente($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call verCliente('".$correo."');");
            $rows = $resultado->fetch_assoc();
            $salida['titulo']           = $rows['titulo'];
            $salida['nom_empr']         = $rows['nom_empr'];
            $salida['rfc']              = $rows['rfc'];
            $salida['direc']            = $rows['direc'];
            $salida['cod_pos']          = $rows['cod_pos'];
            $salida['colonia']          = $rows['colonia'];
            $salida['ciudad']           = $rows['ciudad'];
            $salida['nombre_contac']    = $rows['nombre_contac'];
            $salida['numero_contac']    = $rows['numero_contac'];
            $salida['email']            = $rows['email'];
            $salida['nota']             = $rows['nota'];
            $salida['img']              = $rows['img'];
            $salida['fecha_reg']        = $rows['fecha_reg'];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################
        public function Insertar_cliente(
            $titulo,    $Nom_emp,       $rfc,
            $direc,     $cod_post,      $colonia,
            $ciudad,    $nom_contacto,  $nun_contacto,
            $correo,    $nota,          $img
        ){
            //crea Conexion===============
            $directorios = new CreacionDirectorios();
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            //============================
            $fecha = date("Y-m-d");
            //============================
            $query = "CALL insertarCliente('".$titulo."', '".$Nom_emp."', '".$rfc."', '".$direc."', '".$cod_post."', '".$colonia."', '".$ciudad."', '".$nom_contacto."', '".$nun_contacto."', '".$correo."', '".$nota."', '".$img."', '".$fecha."')";
            if($mysqli->query($query)===TRUE){
                $directorios->CrearDirectorioClientes($correo);
                return "true";
            }else{
                return "NO se puedo hacer el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Eliminar_clientes($correo){
            //crea Conexion===============
            $directorios = new CreacionDirectorios();
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $query = "CALL eliminar_cliente('".$correo."')";
            if($mysqli->query($query)===TRUE){
                $directorios->EliminarDirectorioConContenido($correo);
                return "true";
            }else{
                return "NO se puedo eliminar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Tarjetas_clientes(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call tarjetas_clientes()");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "img"           => $rows["img"],
                    "titulo"        => $rows["titulo"],
                    "rfc"           => $rows["rfc"],
                    "nombreContac"  => $rows["nombreContac"],
                    "numeroContac"  => $rows["numeroContac"],
                    "correo"        => $rows["correo"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
        public function Mod_nota($correo, $nota){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $query = "CALL Clientes_mod_nota('".$correo."', '".$nota."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_contacto($correoA, $correoN, $nombreContac, $numeroContac){
            //crea Conexion===============
            $directorios = new CreacionDirectorios();
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $query = "CALL Clientes_mod_Contacto('".$correoA."', '".$correoN."', '".$nombreContac."', '".$numeroContac."')";
            if($mysqli->query($query)===TRUE){
                if($correoA != $correoN)
                    $directorios->CambiarNameDirec($correoA, $correoN);
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_datosBasicos($correo, $titulo, $nomEmpresa, $RFC){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $query = "CALL Clientes_mod_Dbasicos('".$correo."', '".$titulo."', '".$nomEmpresa."', '".$RFC."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_direccion($correo, $direccion, $cod_post, $colonia, $ciudad){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $query = "CALL Clientes_mod_direccion('".$correo."', '".$direccion."', '".$cod_post."', '".$colonia."', '".$ciudad."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_img($correo, $img){
            //crea Conexion===============
            $directorios = new CreacionDirectorios();
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $imgAnte = "";
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "select img_Client_by_correo('".$correo."');");
            $rows = $resultado->fetch_array();
            $imgAnte = $rows[0];
            $directorios->EliminarUnArchivo($correo, $imgAnte);
            $resultado->free();
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL Clientes_mod_Img('".$correo."', '".$img."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Buscar_tarjetas($texto){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call buscar_tar_Cliente('".$texto."')");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "img"           => $rows["img"],
                    "titulo"        => $rows["titulo"],
                    "rfc"           => $rows["rfc"],
                    "nombreContac"  => $rows["nombreContac"],
                    "numeroContac"  => $rows["numeroContac"],
                    "correo"        => $rows["correo"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
    }
    // ========================================================
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Insertar_cliente("LA nueva","A Inc.","CZxS671901DFB","8001 Faucibus. Carretera","32674","ipsum","Kingston","Colby","8531171095","InstitutoTecnologico@tecnm.com","la de las pruebas","No Img");
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Eliminar_clientes("InstitutoTecnologico@tecnm.com");
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Tarjetas_clientes();
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_nota("InstitutoTecnologico@tecnm.com", 'este pedo si jala machin');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_nota("InstitutoTecnologico@tecnm.com", 'John Wick', '6241459988');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_datosBasicos("InstitutoTecnologico@tecnm.com", 'El Tep', 'Tecnologico', "el RFC");
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_direccion("InstitutoTecnologico@tecnm.com", 'paya y pa ca', '23085', "indelocos", 'la pazcion');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_img("InstitutoTecnologico@tecnm.com", 'suna nueva imagen');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Buscar_tarjetas("gay");
    // var_dump($salida);
    // ========================================================
?>
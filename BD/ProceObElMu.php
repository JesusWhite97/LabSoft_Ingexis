<?php
    // ========================================================
    include_once 'conexion.php';
    header("Content-Type: text/html;charset=utf-8"); 
    // ========================================================================================================================
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ========================================================================================================================
    class procedimientos_Obra{
        //#####################################################
        public function Agregar($id_client, $nombre, $direccion, $anotaciones){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL Obra_agregar('".$id_client."', '".$nombre."', '".$direccion."', '".$anotaciones."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function Eliminar($id_obra){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL Obra_eliminar('".$id_obra."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function Modificar($id_obra, $nombre, $direccion, $anotaciones){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL Obra_modificar('".$id_obra."', '".$nombre."', '".$direccion."', '".$anotaciones."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function obraById($id_obra){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call Obra_by_id('".$id_obra."')");
            $rows = $resultado->fetch_assoc();
            $salida['id_obra']    = $rows['id_obra'];
            $salida['nom_empr']    = $rows['nom_empr'];
            $salida['nombre']    = $rows['nombre'];
            $salida['direccion']    = $rows['direccion'];
            $salida['anotaciones']    = $rows['anotaciones'];
            return $salida;
            $resultado->free();
        }
        //#####################################################
        public function obraFullByClient($id_cliente){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call Obra_full_by_client('".$id_cliente."')");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "id_obra"       => $rows["id_obra"],
                    "id_Cliente"     => $rows["id_clientes"],
                    "nombre"    => $rows["nombre"],
                    "direccion"    => $rows["direccion"],
                    "anotaciones"    => $rows["anotaciones"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
        public function obraFull(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call Obra_full()");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "id_obra"       => $rows["id_obra"],
                    "nombre"     => $rows["nombre"],
                    "nom_empr"    => $rows["nom_empr"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
        public function Elementos($id_obra){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call Obra_elementos('".$id_obra."')");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "id_elemento"       => $rows["id_elemento"],
                    "id_obra"           => $rows["id_obra"],
                    "id_usuario"        => $rows["id_usuario"],
                    "nombre"            => $rows["nombre"],
                    "observaciones"     => $rows["observaciones"],
                    "fecha_muestreo"    => $rows["fecha_muestreo"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
    }
    // ========================================================================================================================
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ========================================================================================================================
    class procedimientos_elementos_muestra{
        //#####################################################
        public function VerificaNombre($id_obra, $nombre){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "select existencia_elemento_in_obra('".$id_obra."', '".$nombre."')");
            $rows = $resultado->fetch_assoc();
            $salida['existencia_elemento_in_obra']    = $rows['existencia_elemento_in_obra'];
            return $salida;
            $resultado->free();
        }
        //#####################################################
        public function Agregar($id_obra, $id_usuario, $nombre){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL ElemMues_agregar('".$id_obra."', '".$id_usuario."', '".$nombre."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function Fechas_identificadores($correoUser, $id_elemento, $fecha_muestreo, $id_mues1, $id_mues2, $id_mues3, $iden1, $iden2, $iden3){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL ElemMues_Fechas_ident('".$correoUser."', '".$id_elemento."', '".$fecha_muestreo."', '".$id_mues1."', '".$id_mues2."', '".$id_mues3."', '".$iden1."', '".$iden2."', '".$iden3."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function eliminarElemento($id_elemento){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL ElemMues_Eleminar('".$id_elemento."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function modificarElemento($id_elemento, $correoUser, $nombre, $observaciones, $fachaMestreo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL ElemMues_Modificar_Elemento('".$id_elemento."', '".$correoUser."', '".$nombre."', '".$observaciones."', '".$fachaMestreo."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function modificarMuestra($id_muestra, $correoUser, $iden, $resultado){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $query = "CALL ElemMues_Modificar_Muestra('".$id_muestra."', '".$correoUser."', '".$iden."', '".$resultado."')";
            if($mysqli->query($query)===TRUE){
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
            } 
        }
        //#####################################################
        public function infoTotalById($id_elemento){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion($_SESSION['puesto']);
            //============================
            $salida = array();
            mysqli_query($mysqli, "SET NAMES 'utf8'");
            $resultado = mysqli_query($mysqli, "call ElemMues_info_elemento_by_id('".$id_elemento."')");
            $rows = $resultado->fetch_assoc();
            $salida['id_elemento']          = $rows['id_elemento'];
            $salida['nombre']               = $rows['nombre'];
            $salida['observaciones']        = $rows['observaciones'];
            $salida['fecha_muestreo']       = $rows['fecha_muestreo'];
            //----------------------------
            $salida['07-id_muestra']        = $rows['id_muestra'];
            $salida['07-identificador']     = $rows['identificador'];
            $salida['07-resultado']         = $rows['resultado'];
            $salida['07-fecha_prog']        = $rows['fecha_prog'];
            $rows = $resultado->fetch_assoc();
            //----------------------------  
            $salida['14-id_muestra']        = $rows['id_muestra'];
            $salida['14-identificador']     = $rows['identificador'];
            $salida['14-resultado']         = $rows['resultado'];
            $salida['14-fecha_prog']        = $rows['fecha_prog'];
            $rows = $resultado->fetch_assoc();
            //----------------------------  
            $salida['28-id_muestra']        = $rows['id_muestra'];
            $salida['28-identificador']     = $rows['identificador'];
            $salida['28-resultado']         = $rows['resultado'];
            $salida['28-fecha_prog']        = $rows['fecha_prog'];
            return $salida;
            $resultado->free();
        }
        //#####################################################
    }
    // ========================================================================================================================
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ========================================================================================================================
    // $_SESSION["puesto"] = 'Jefe De Laboratorio';
    // var_dump($_SESSION);
    // $jaja = new procedimientos_elementos_muestra();
    // var_dump($jaja->infoTotalById(1));
?>
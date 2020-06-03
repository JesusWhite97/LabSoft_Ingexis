<?php
    // ========================================================
    include '../Logica/CrearDirectorios.php';
    include 'conexion.php';
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
                    "id_obra"     => $rows["id_obra"],
                    "id_usuario"    => $rows["id_usuario"],
                    "nombre"    => $rows["nombre"],
                    "observaciones"    => $rows["observaciones"],
                    "fecha_reg"    => $rows["fecha_reg"]
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
    }
    // ========================================================================================================================
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ========================================================================================================================
?>
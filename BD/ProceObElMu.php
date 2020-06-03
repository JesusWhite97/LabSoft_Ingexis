<?php
    // ========================================================
    include '../Logica/CrearDirectorios.php';
    include 'conexion.php';
    header("Content-Type: text/html;charset=utf-8"); 
    // ========================================================
    class procedimientos_Obra{
        //#####################################################
        public function obraAgregar($id_client, $nombre, $direccion, $anotaciones){
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
        public function obraEliminar($id_obra){
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
        public function obraModificar(){
            
        }
        //#####################################################
    }
    // ========================================================
?>
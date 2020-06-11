<?php
    // ========================================================
        include '../BD/ProceObElMu.php';
    // ========================================================================================================================
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ========================================================================================================================
    class Obra{
        //#####################################################
        public function Agregar($id_client, $nombre, $direccion, $anotaciones){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->Agregar($id_client, $nombre, $direccion, $anotaciones);
            return $respuesta;
        }
        //#####################################################
        public function Eliminar($id_obra){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->Eliminar($id_obra);
            return $respuesta;
        }
        //#####################################################
        public function Modificar($id_obra, $nombre, $direccion, $anotaciones, $id_cliente){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->Modificar($id_obra, $nombre, $direccion, $anotaciones, $id_cliente);
            return $respuesta;
        }
        //#####################################################
        public function obraById($id_obra){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->obraById($id_obra);
            return $respuesta;
        }
        //#####################################################
        public function obraFullByClient($id_cliente){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->obraFullByClient($id_cliente);
            return $respuesta;
        }
        //#####################################################
        public function obraFull(){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->obraFull();
            return $respuesta;
        }
        //#####################################################
        public function Elementos($id_obra){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->Elementos($id_obra);
            return $respuesta;
        }
        //#####################################################
        public function Obra_by_titulo($nombre){
            $ObraFun = new procedimientos_Obra();
            $respuesta = $ObraFun->Obra_by_titulo($nombre);
            return $respuesta;
        }
        //#####################################################
    }
    // ========================================================================================================================
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ========================================================================================================================
    class ElemMues{
        //#####################################################
        public function Agregar($id_obra, $id_usuario, $nombre){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->Agregar($id_obra, $id_usuario, $nombre);
            return $respuesta;
        }
        //#####################################################
        public function Fechas_identificadores($correoUser, $id_elemento, $fecha_muestreo, $id_mues1, $id_mues2, $id_mues3, $iden1, $iden2, $iden3){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->Fechas_identificadores($correoUser, $id_elemento, $fecha_muestreo, $id_mues1, $id_mues2, $id_mues3, $iden1, $iden2, $iden3);
            return $respuesta;
        }
        //#####################################################
        public function eliminarElemento($id_elemento){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->eliminarElemento($id_elemento);
            return $respuesta;
        }
        //#####################################################
        public function modificarElemento($id_elemento, $correoUser, $nombre, $observaciones, $fachaMestreo){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->modificarElemento($id_elemento, $correoUser, $nombre, $observaciones, $fachaMestreo);
            return $respuesta;
        }
        //#####################################################
        public function modificarMuestra($id_muestra, $correoUser, $iden, $resultado){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->modificarMuestra($id_muestra, $correoUser, $iden, $resultado);
            return $respuesta;
        }
        //#####################################################
        public function VerificaNombre($id_obra, $nombre){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->VerificaNombre($id_obra, $nombre);
            return $respuesta;
        }
        //#####################################################
        public function infoElemtoById($id_elemento){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->infoTotalById($id_elemento);
            return $respuesta;
        }
        //#####################################################
        public function existencia_identificador($identificador){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->existencia_identificador($identificador);
            return $respuesta;
        }
        //#####################################################
        public function EventosCalendar($hoy){
            $eleMuesFun = new procedimientos_elementos_muestra();
            $respuesta = $eleMuesFun->EventosCalendar($hoy);
            return $respuesta;
        }
        //#####################################################
    }
    // ========================================================================================================================
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄
    // ========================================================================================================================

?>
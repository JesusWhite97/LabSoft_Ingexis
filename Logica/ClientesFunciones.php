<?php
    // ========================================================
    include '../BD/ProceClientes.php';
    // ========================================================
    class Cliente{
        //#####################################################
        public function Insertar(
            $titulo,    $Nom_emp,       $rfc,
            $direc,     $cod_post,      $colonia,
            $ciudad,    $nom_contacto,  $nun_contacto,
            $correo,    $nota,          $img
        ){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Insertar_cliente($titulo, $Nom_emp, $rfc, $direc,$cod_post, $colonia, $ciudad, $nom_contacto, $nun_contacto, $correo, $nota, $img);
            return $respuesta;
        }
        //#####################################################
        public function Eliminar($correo){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Eliminar_clientes($correo);
            return $respuesta;
        }
        //#####################################################
        public function Tarjetas(){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Tarjetas_clientes();
            return $respuesta;
        }
        //#####################################################}
        public function Modificar_nota($correo, $nota){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Mod_nota($correo, $nota);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_contacto($correo, $Nombre, $numero){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Mod_contacto($correo, $Nombre, $numero);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_datosBasicos($correo, $titulo, $nomEmpresa, $RFC){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Mod_datosBasicos($correo, $titulo, $nomEmpresa, $RFC);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_direccion($correo, $direccion, $cod_post, $colonia, $ciudad){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Mod_direccion($correo, $direccion, $cod_post, $colonia, $ciudad);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_img($correo, $img){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Mod_img($correo, $img);
            return $respuesta;
        }
        //#####################################################
        public function Buscar_Tarjetas($texto){
            $cliente = new procedimientos_Clientes();
            $respuesta = $cliente->Buscar_tarjetas($texto);
            return $respuesta;
        }
        //#####################################################
        //#####################################################
        //#####################################################
        //#####################################################
    }
    // ========================================================
?>
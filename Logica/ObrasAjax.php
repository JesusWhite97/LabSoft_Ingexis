<?php
    // Librerias===============================================
    include 'ObrasInterfaz.php';    
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="cargarTarjetas"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_tarjetas_obras(),
                    'obra1'          => $_SESSION['Obra1']
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"]=="cargarInfo"){
            //declaracion de variables--------------------------
            $id_obra = $_POST['id_obra'];
            //salida--------------------------------------------
            $json[] =   
                [
                    'mensajeDatos'   => imprimir_info_obra($id_obra)
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"]=="imprimir_info_elemento"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_info_elemento()
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        
        //########################
        if($_POST["metodo"]=="imprimir_registro_obra"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_registro_obra()
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"]=="imprimir_registro_elemento"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_registro_elemento()
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST['metodo'] == 'registrarObraNueva'){
            //declaracion de variables--------------------------
            $obra = new Obra();
            $salida = $obra->Agregar($_POST['id_cliente'], $_POST['titulo'], $_POST['ubicacion'], $_POST['notas']);
            //salida--------------------------------------------
            $json[] =   
                [
                    'salida'    => $salida,
                    'cargar'    => $obra->Obra_by_titulo($_POST['titulo'])
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
    }
    // ========================================================
?>
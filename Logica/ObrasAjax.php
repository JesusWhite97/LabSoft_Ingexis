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
                    'scriptHTML'   => imprimir_info_elemento($_POST["idElemento"],$_POST["idO"])
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
                    'scriptHTML'   => imprimir_registro_elemento($_POST['id_obra'])
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
        if($_POST['metodo'] == 'registrarNuevoElemento'){
            //declaracion de variables--------------------------
            $obra = new ElemMues();
            $salida = $obra->Agregar($_POST['id_obra'], $_SESSION['correo'], $_POST['tituloEle']);
            //salida--------------------------------------------
            $json[] =   
                [
                    'salida'    => $salida,
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST['metodo'] == 'registrarDatosElemento'){
            //declaracion de variables--------------------------
            $EleMues = new ElemMues();
            $salida1 = $EleMues->Fechas_identificadores($_POST['correoUser'],$_POST['id_elemento'],$_POST['fecha_muestreo'],$_POST['id1'],$_POST['id2'],$_POST['id3'],$_POST['id_muestra_1'],$_POST['id_muestra_2'],$_POST['id_muestra_3']);
            $salida2 = $EleMues->modificarElemento($_POST['id_elemento'], $_POST['correoUser'], $_POST['tituloElemento'], $_POST['observaciones'], $_POST['fecha_muestreo']);
            //--------------------------------------------------
            if($salida1 == 'true' && $salida2 == 'true'){
                $salida = 'true';
            }else{
                $salida = ($salida1 != 'true') ? $salida1.'; ' : '';
                $salida.= ($salida2 != 'true') ? $salida2.'; ' : '';
            }
            //salida--------------------------------------------
            $json[] =   
                [
                    'salida'    => $salida,
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST['metodo'] == 'EliminarElemento'){
            //declaracion de variables--------------------------
            $EleMues = new ElemMues();
            $salida = $EleMues->eliminarElemento($_POST['id_elemento']);
            //salida--------------------------------------------
            $json[] =   
                [
                    'salida'    => $salida,
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST['metodo'] == 'ModificarObra'){
            //declaracion de variables--------------------------
            $obra = new Obra();
            $salida = $obra->Modificar($_POST['id_obra'], $_POST['TituloObra'], $_POST['Direccion'], $_POST['Anotaciones'], $_POST['Cliente']);
            //salida--------------------------------------------
            $json[] =   
                [
                    'salida'    => $salida
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST['metodo'] == 'EliminarObra'){
            //declaracion de variables--------------------------
            $obra = new Obra();
            $salida = $obra->Eliminar($_POST['id_obra']);
            //salida--------------------------------------------
            $json[] =   
                [
                    'salida'    => $salida
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST['metodo'] == 'RegistrarResultado'){
            //declaracion de variables--------------------------
            $EleMues = new ElemMues();
            $salida = $EleMues->registrarResultado($_POST['identificador'], $_POST['resultado']);
            //salida--------------------------------------------
            $json[] =   
                [
                    'salida'    => $salida
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST['metodo'] == 'ModificarMuestraFull'){
            //declaracion de variables--------------------------
            $EleMues = new ElemMues();
            $salida1 = $EleMues->modificarElementoConFecha($_POST['idElemento'], $_POST['TituloElemento'], $_POST['observaciones'], $_POST['fechaMuestro']);
            $salida2 = $EleMues->modificarMuestra(substr($_POST['ident1Ant'], 5), $_POST['ident1New'], $_POST['resul1']);
            $salida3 = $EleMues->modificarMuestra(substr($_POST['ident2Ant'], 5), $_POST['ident2New'], $_POST['resul2']);
            $salida4 = $EleMues->modificarMuestra(substr($_POST['ident3Ant'], 5), $_POST['ident3New'], $_POST['resul3']);
            //preparar salida-----------------------------------
            if($salida1 == 'true' && $salida2 == 'true' && $salida3 == 'true' && $salida4 == 'true'){
                $salida = 'true';
            }else{
                $salida = ($salida1 != 'true') ? $salida1.'; ' : '';
                $salida.= ($salida2 != 'true') ? $salida2.'; ' : '';
                $salida.= ($salida3 != 'true') ? $salida3.'; ' : '';
                $salida.= ($salida4 != 'true') ? $salida4.'; ' : '';
            }
            //salida------------------------------------------
            $json[] =  
                [
                    'salida'    => $salida
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
    }
    // ========================================================
?>
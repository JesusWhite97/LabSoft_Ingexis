<?php
    // ========================================================
    session_start();
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="imprimir_modal_confirmar"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_modal_confirmar($_POST["texto"],$_POST["funcion"],$_POST["textoBoton"],$_POST["item"],$_POST["claseBoton"])
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
        if($_POST["metodo"]=="imprimir_modal_respuesta"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_modal_respuesta($_POST["texto"],$_POST["funcion"],$_POST["item"])
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    // ========================================================
    function imprimir_modal_confirmar($texto,$funcion,$textoBoton,$item,$claseBoton){
        $funcionCancelar = "'contenedorModal'";
       return ' 
                    <div id="fondoModal"></div>

                    <div class="modal">

                        <p id="textoModalPregunta" class="textoModal">
                            '.$texto.' <br><b>'.$item.'?</b>
                        </p>

                        <button id ="botonGuardarModal"class="'.$claseBoton.'" onclick='.$funcion.'>'.$textoBoton.'</button>

                        <button class="cancelarBotonModal"  onclick="closeModal('.$funcionCancelar.')">Cancelar</button>
                    </div>
       ';
    }
    // ========================================================
    function imprimir_modal_respuesta($texto,$funcion,$item){
        return  '                
            <div id="fondoModal"></div>
                <div class="modal">
                    <p class="textoModal" id="textoExito">
                    '.$texto.' <br><b>'.$item.'</b>
                    </p>
                    <button class="OK" onclick='.$funcion.'>OK</button>
                </div>
        ';
     }
  
    // ========================================================

    // ========================================================
?>
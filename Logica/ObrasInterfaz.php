<?php
    //=========================================================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/ObrasFunciones.php';
    session_start();
    //=========================================================================
    function imprimir_tarjetas_obras(){
        //declaracion de variables=====
        $obras = new Obra();
        $fullObras = $obras->obraFull();
        $_SESSION['Obra1'] = $fullObras[0]['id_obra'];
        //=============================
        for($i = 0; $i < count($fullObras); $i++){
            $Tarjetas = ' 
                    <div id="TO-'.$fullObras[$i]['id_obra'].'" class="contenedorTarjetaUsuario" style="height:70px;" onclick=cargarInfoO("'.$fullObras[$i]['id_obra'].'")>
                        <a style= "grid-column:1 / span 2; justify-self:start; justify-content:start;">
                            <h2 class="tituloTarjetaUsuario" style="margin-left:0px; grid-column:1 / span 2;"> "'.$fullObras[$i]['nombre'].'" </h2>
                            <h3 class="subtituloTarjetaUsuario" style="margin-left:0px; grid-column:1 / span 2;">"'.$fullObras[$i]['nom_empr'].'"</h3>
                        </a>
                    </div>
                    ';
        }
        //salida=======================
        return $Tarjetas;
    }
    //=========================================================================
    function imprimir_info_obra($id_obra){
        //declaracion de variables=========================
        $obras = new Obra();
        $infObra = $obras->obraById($id_obra);
        // //=========DATOS MODAL==========================
        $tipoModal = "'confirmar'";
        $item = "'"."Titulo"."'";
        // //=========DATOS MODAL MODIFICAR================
        $textoModificar = "'Desea modificar obra: '";
        $funcionModificar = "'ModificarObra()'";
        $textoBotonModificar = "'Modificar'";
        $claseBotonModificar = "'guardarBotonModal'";
        // //=========DATOS MODAL ELIMINAR=================
        $textoEliminar = "'Desea eliminar obra: '";
        $funcionEliminar = "'eliminarObra()'";
        $textoBotonEliminar = "'Eliminar'";
        $claseBotonEliminar = "'eliminarBotonModal'";
        //=================================================
        $interfazInfoUsuario = '
        <div class="contenedorCentradoResponsivo">
            <!-- Titulo de la obra ============================== -->
            <div id="tituloContenedor">
                <div id="editarImagen" style="background-image: url(../Interfaz/img/obracolado.jpeg);"> 
                    <button id="botonEditar" onclick=verPantallaModificar(document.getElementById("correo").value)>
                    <button id="botonEliminar" onclick="infoModal('.$tipoModal.','.$textoEliminar.','.$funcionEliminar.','.$textoBotonEliminar.','.$item.','.$claseBotonEliminar.')">
                    <button id="botonCancelar" style="display:none"  onclick=verPantallaInfo(document.getElementById("correo").value) ></button>
                </div>
                <input id="TituloObra" class="inputTexto mayus" style="color:white;" type="text" value="'.$infObra['nombre'].'" maxlength="60">
                <p class="textoAyuda textoAyudaTitulo">Titulo Obra</p>
            </div>
            <div class="tarjetaBlanca" style="margin-top: 0px;">
                <label class="titulo">Ubicación</label>
                <textarea id="Direccion" disabled>'.$infObra['direccion'].'</textarea>
            </div>
            <div class="tarjetaBlanca" style="margin-top: 0px;">
                <label class="titulo">Notas</label>
                <textarea id="Notas" disabled>'.$infObra['anotaciones'].'</textarea>
            </div>
            <!=========== Elementos ============================= -->
            <h1 id="tituloPag" style="margin-bottom:0px;">Elementos de la obra</h1>
            <div id="elementosGridResponsivo">'.imprimir_tarjetas_elementos($infObra['id_obra']).'</div>
                <!-- Boton Final================================= -->
                <button id="footerGuardar_Boton" onclick="" style="margin:20px auto; display:block;">Registrar elemento</button>
                <!-- ============================================ -->
            </div>
        </div>
        <!-- Modales ============================================ -->
        <div id="contenedorModal">
        </div>
        <!-- ==================================================== -->
        ';
        return $interfazInfoUsuario;
    }
    //=========================================================================
    function imprimir_tarjetas_elementos($id_obra){
        //declaracion de variables=========================
        $obras = new Obra();
        $TarElem = $obras->Elementos($id_obra);
        //=================================================
        $TarjetasElementos = '';
        for($i = 0; $i < count($TarElem); $i++){
            $TarjetasElementos = $TarjetasElementos.
            '<div id="'.$TarElem[$i]['id_elemento'].'" class="tarjetaElemento">
                <div class="tituloElemento">'.$TarElem[$i]['nombre'].'</div>
                <div class="subtituloElemento">Observaciones: '.$TarElem[$i]['observaciones'].'<br></div>
                <div class="botonEditar"></div>
                <div class="botonEliminar"></div>
                <div class="botonElemento">Registrar muestras</div>
            </div>'
            ;
        }
        return $TarjetasElementos;
    }
    //=========================================================================
?>
<?php
//=========================================================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/ObrasFunciones.php';
    include_once 'ClientesFunciones.php';
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
                    <div id="'.$fullObras[$i]['id_obra'].'" class="contenedorTarjetaUsuario" style="height:70px;" onclick=cargarInfoO("'.$fullObras[$i]['id_obra'].'")>
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
            <div id="tituloContenedor" style="height:150px;">
                <div id="editarImagen" style="background-image: url(../Interfaz/img/obracolado.jpeg);"> 
                    <button id="botonEditar" onclick=verPantallaModificar("obra")>
                    <button id="botonEliminar" onclick="infoModal('.$tipoModal.','.$textoEliminar.','.$funcionEliminar.','.$textoBotonEliminar.','.$item.','.$claseBotonEliminar.')">
                    <button id="botonCancelar" style="display:none"  onclick=verPantallaInfo(document.getElementById("correo").value) ></button>
                </div>
                <input id="TituloObra" class="inputTexto mayus" style="color:white;" type="text" value="'.$infObra['nombre'].'" maxlength="60">
                <p class="textoAyuda textoAyudaTitulo">Titulo Obra</p>
            </div>
            <div class="tarjetaBlanca" style="margin-top:5px;">
                    <input type="text" id="puestoInput" class="selectInfo" style="text-align:center;" value="'.$infObra['nombre'].'" onchange="arregloCambios[2]=1;">        
                    <select id="puesto" class="registro" style="display:none;" onchange="arregloCambios[1]=1;">
                        '."cliente".'
                    </select>
                <p class="textoAyuda" style="text-align: center;">Cliente</p>
                <textarea class="" id="Direccion">'.$infObra['direccion'].'</textarea>
                <div class="textoAyuda">Dirección obra<br></div>
                <textarea class="" id="Direccion">'.$infObra['anotaciones'].'</textarea>
                <div class="textoAyuda">Notas<br></div>
            </div>
            <!=========== Elementos ============================= -->
            <h1 id="tituloPag" style="margin-bottom:0px;">Elementos de la obra</h1>
            <div id="elementosGridResponsivo">'.imprimir_tarjetas_elementos($infObra['id_obra']).'
            <div id="tarjetaElementoNuevo"></div>
            </div>
                <!-- Boton Final================================= -->
                <button id="footerGuardar_Boton" onclick="cargarRegistroE()" style="margin:20px auto; display:block;">Registrar elemento</button>
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
            </div>'
            ;
        }
        return $TarjetasElementos;
    }
    //=========================================================================
    function imprimir_info_elemento(){
    
        $id7 = "7";
        $id14 = "1";
        $id28 = "1";
        // Si edtan vacios los identificadores de las muestras 
        if($id7 == ""){
            $script = ' 
            <div class="contenedorCentradoResponsivo">
                <!-- Titulo elemento ============================ -->
                <div class="tarjetaBlanca">
                    <h1 class="tituloElemento">Elemento</h1>
                    <textarea id="observaciones" disabled></textarea>
                    <div class="textoAyuda">Observaciones<br></div>
                </div>
                <!-- Registro ID´s muestras ============================ -->
                <div class="tarjetaBlanca">
                    <p class="titulo" style="margin-bottom:5px;">Registro de identificadores</p>
                    <input id="fechaMuestro" type="date" class="registro mayus" style="margin-top:5px;" placeholder="">
                    <p class="textoAyuda" >Fech muestreo</p>
                    <input id="7dias" type="text"class="registro mayus required" placeholder=""  maxlength="5">
                    <p class="textoAyuda">ID 7 días</p>
                    <input id="14dias" type="text"class="registro mayus required" placeholder=""  maxlength="5">
                    <p class="textoAyuda">ID 14 días</p>
                    <input id="28dias" type="text"class="registro mayus required" placeholder=""  maxlength="5">
                    <p class="textoAyuda">ID 28 días</p>
                    <button id="footerGuardar_Boton" style="margin:0px auto; display:block; height:auto; border-radius:5px;" onclick="">Guardar</button>
                </div>
            ';
        }else{
            $script = ' 
            <div class="contenedorCentradoResponsivo">
                <!-- Titulo elemento ============================ -->
                <div class="tarjetaBlanca">
                    <h1 class="tituloElemento">Elemento</h1>
                    <textarea id="Notas" disabled></textarea>
                    <div class="textoAyuda">Observaciones<br></div>
                    <input id="fechaMuestro" type="date" class="mayus" style="margin-top:5px;" placeholder="">
                    <p class="textoAyuda" >Fecha de muestreo</p>
                </div>'
                .scriptPruebas("","resultado ingresado")
                .scriptPruebas("","")
                .scriptPruebas("antesPrueba","").'
            </div>';
        }
        return $script;
    }
// ================================================================================================================================================================
function scriptPruebas($fecha, $prueba){
    if($fecha == "antesPrueba"){
            return '
            <!-- Información por muestra ============================ -->
            <div class="tarjetaBlanca" style="font-size:16px; ">
                <p class="titulo" >7 Dias</p>
                <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                    <input id="7dias" type="text"class="mayus required"   placeholder="1234"  maxlength="5" >
                    <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                </div>
                <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                    <p class="textoAyuda" style="">Identificador</p>
                    <p class="textoAyuda" style="">Fecha</p>  
                </div> 
            </div>';
    }else{
        if($prueba == ""){
            return ' 
                <!-- Registro prueba ============================ -->
                <div class="tarjetaBlanca" style="font-size:16px; ">
                    <p class="titulo" >7 Dias</p>
                    <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                        <input id="7dias" type="text"class="mayus required"   placeholder="1234"  maxlength="5" >
                        <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                    </div>
                    <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                        <p class="textoAyuda" style="">Identificador</p>
                        <p class="textoAyuda" style="">Fecha</p>  
                    </div> 
                    <div class="inputEnLinea" style="justify-self:strech; align-items: center; height:40px; grid-template-columns: 1fr 50px;">
                        <input id="Prueba7dias" type="text"class=" registro mayus required" style:"height:20px; align-self:center;"  placeholder=""  maxlength="5">
                        <p class="textoAyuda" style="color:white;font-size:16px;">kg/cm2</p>
                    </div>
                    <p class="textoAyuda">Resultado prueba</p>
                    <button id="footerGuardar_Boton" style="margin:0px auto; display:block; height:auto; border-radius:5px; justify-self:strech;" onclick="">Guardar</button>
                </div>
            ';
        }
        if($prueba == "resultado ingresado"){
            return '
                <!-- Información prueba ============================ -->
                <div class="tarjetaBlanca" style="font-size:16px; ">
                    <p class="titulo" >7 Dias</p>
                    <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                        <input id="7dias" type="text"class="mayus required"   placeholder="1234"  maxlength="5" >
                        <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                    </div>
                    <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                        <p class="textoAyuda" style="">Identificador</p>
                        <p class="textoAyuda" style="">Fecha</p>  
                    </div> 
                    <div class="inputEnLinea" style="justify-self:strech; align-items: center; height:40px; grid-template-columns: 1fr 50px;">
                        <input id="Prueba7dias" type="text"class=" mayus required" style:"height:20px; align-self:center;"  placeholder=""  maxlength="5">
                        <p class="textoAyuda" style="color:white;font-size:16px;">kg/cm2</p>
                    </div>
                    <p class="textoAyuda">Resultado prueba</p>
                </div>
            ';
        }
    }
}
// ================================================================================================================================================================
// =========================================================================IMPRIMIR REGISTRO DE OBRA==============================================================
// ================================================================================================================================================================
function imprimir_registro_obra(){
    //declaracion de variables=========================
    $obras = new Cliente();
    $clientesReg = $obras->Clientes_reg();
    $options = '';
    //creacion de option===============================
    for($i = 0; $i < count($clientesReg); $i++){
        $options .= '<option value="'.$clientesReg[$i]['id_clientes'].'">'.$clientesReg[$i]['nom_empr'].'</option>';
    }
    //=================================================
    return '
        <div class="tarjetaBlanca " style="margin-top: 0px;">   
            <h1 id="tituloPag" style="margin-bottom:10px;">Registro de obra nueva</h1>
        </div>
        <div class="tarjetaBlanca " style="margin-top: 0px;"> 
            <input id="tituloObra" type="text"class="mayus required registro"   placeholder=""  maxlength="30"> 
            <p class="textoAyuda" style="text-align: center;">Titulo de la obra</p>
            <select id="puesto" class="registro">
                '.$options.'
            </select>
            <p class="textoAyuda" style="text-align: center;">Cliente</p>
            <textarea class="registro" id="Notas"></textarea>
            <div class="textoAyuda">Ubicación<br></div>
            <textarea class="registro" id="Notas"></textarea>
            <div class="textoAyuda">Notas<br></div>
        <button id="footerGuardar_Boton" style="margin:0px auto; display:block; height:auto; border-radius:5px; justify-self:strech;" onclick="">Guardar</button>
        </div>
    ';
}
// ================================================================================================================================================================
// ======================================================================IMPRIMIR REGISTRO ELEMENTO================================================================
// ================================================================================================================================================================
function imprimir_registro_elemento(){
    return '
        <div class="tarjetaBlanca " style="margin:10px 5px;">  
            <input id="tituloElemento" type="text"class=" required registro"   placeholder=""  maxlength="30"> 
            <p class="textoAyuda" style="text-align: center;">Titulo elemento</p>
            <div class="inputEnLinea" style="">
                    <button id ="botonGuardarModal"class="" onclick=>Guardar</button>
                    <button class="cancelarBotonModal"  onclick="cargarInfoO(obraSeleccionada)">Cancelar</button>
            </div>
        </div>
    ';
}






// ================================================================================================================================================================
// ================================================================================================================================================================
?>
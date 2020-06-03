<?php
    //=========================================================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/ClientesFunciones.php';
    session_start();
    //=========================================================================
    function imprimir_tarjetas_obras(){
        // $cliente = new Cliente();
        // $arrayTajetas = $cliente->Buscar_Tarjetas($texto);
        // $_SESSION['Client1'] = $arrayTajetas[0]['correo'];
        // $Tarjetas = '';
        // for($i = 0; $i<count($arrayTajetas); $i++){
            $Tarjetas = ' 
                        <div id="*IDObra*" class="contenedorTarjetaUsuario" style="height:70px;">
            
                            <a style= "grid-column:1 / span 2; justify-self:start; justify-content:start;">
                                <h2 class="tituloTarjetaUsuario" style="margin-left:0px; grid-column:1 / span 2;"> "TituloObra" </h2>
                                <h3 class="subtituloTarjetaUsuario" style="margin-left:0px; grid-column:1 / span 2;">"Cliente"</h3>
                            </a>
                        </div>
                        ';
        // }
        return $Tarjetas;
    }
    //=========================================================================
    function imprimir_info_obra(){
        // //varables=============================
        // $cliente = new Cliente();
        // $infoCliente = $cliente->Info($correo);
        // //=====================================

        // //=========DATOS MODAL=================
        $tipoModal = "'confirmar'";
        $item = "'"."Titulo"."'";

        // //=========DATOS MODAL MODIFICAR=================
        $textoModificar = "'Desea modificar obra: '";
        $funcionModificar = "'ModificarObra()'";
        $textoBotonModificar = "'Modificar'";
        $claseBotonModificar = "'guardarBotonModal'";

        // //=========DATOS MODAL ELIMINAR=================
        $textoEliminar = "'Desea eliminar obra: '";
        $funcionEliminar = "'eliminarObra()'";
        $textoBotonEliminar = "'Eliminar'";
        $claseBotonEliminar = "'eliminarBotonModal'";


        //===============================================
        $interfazInfoUsuario = '
        <div class="contenedorCentradoResponsivo">
                <!-- Titulo de la obra ============================ -->
                <div id="tituloContenedor">
                <div id="editarImagen" style="background-image: url(../Interfaz/img/obracolado.jpeg);"> 
                <button id="botonEditar" onclick=verPantallaModificar(document.getElementById("correo").value)>
                <button id="botonEliminar" onclick="infoModal('.$tipoModal.','.$textoEliminar.','.$funcionEliminar.','.$textoBotonEliminar.','.$item.','.$claseBotonEliminar.')">
                <button id="botonCancelar" style="display:none"  onclick=verPantallaInfo(document.getElementById("correo").value) ></button>

                
            </div>
            <input id="apodo tituloInfo" class="inputTexto mayus" style="color:white;" type="text" value="TITULO OBRA" onchange="arregloCambios[0]=1;" maxlength="60">
                <p class="textoAyuda textoAyudaTitulo">Titulo Obra</p>
         
                </div>
            <div class="tarjetaBlanca" style="margin-top: 0px;">
                <label class="titulo">Ubicación</label>
                <textarea id="nota" onchange="arregloCambios[3] = 0;" disabled></textarea>
            </div>
            <!-- ///Titulo de la obra ============================ -->
            <!===================================Elementos ============================ -->
            <h1 id="tituloPag" style="margin-bottom:0px;">Elementos de la obra</h1>

            <div id="elementosGridResponsivo">'.imprimir_tarjetas_elementos().'</div>

                <!-- Boton Final============================ -->
                <button id="footerGuardar_Boton" onclick="" style="margin:20px auto; display:block;">Registrar elemento</button>
                <!-- ======================================= -->
            </div>
        </div>
        <!-- Modales========================== -->
        <div id="contenedorModal">
        </div>
        <!-- ================================= -->
        ';
        return $interfazInfoUsuario;
    }
    //=========================================================================
    function imprimir_tarjetas_elementos(){

        $TarjetasElementos = '';

        for($i = 0; $i<10; $i++){
            $TarjetasElementos = $TarjetasElementos.'<div id="*IDObra*" class="tarjetaElemento">
                                                            <div class="tituloElemento">Titulo Elemento</div>
                                                            <div class="subtituloElemento">Observaciones:<br></div>
                                                            <div class="botonEditar"></div>
                                                            <div class="botonEliminar"></div>
                                                            <div class="botonElemento">Registrar muestras</div>
                                                    </div>'
            ;
        }
        return $TarjetasElementos;


    }
    //=========================================================================
    function imprimir_registro_cliente(){
        $interfazRegistroUsuario = '
        <div class="contenedorCentradoResponsivo">
            <div id="tituloContenedor">
                <div id="editarImagen" style=" background-size: cover; background-position: center;">
                    <form id="formImg">
                        <input class="inputImg" id="inImg" name="archivo[]" type="file" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);" value=""/>
                    </form> 
                    <label id="botonImg" class="btnImgRegistro" for="inImg"></label>
                    <div id="blah"> </div>
                </div>
                <input id="tituloReg" class="inputTexto mayus registro required" style="color:white;" type="text">
                <p class="textoAyuda textoAyudaTitulo">Titulo</p>
            </div>
            <!-- DatosPersonales ============================ -->
            <div class="tarjetaBlanca">
                <p class="titulo">Datos personales</p>
                <input required type="text" id="nom_empr" class="registro required" onchange="">
                <p class="textoAyuda">Nombre de la empresa</p>
                <input required type="text" id="nombre_contac" class="registro required" onchange="">
                <p class="textoAyuda">Nombre del contacto</p>
                <input type="text" id="rfc" class="registro required" onchange="" onkeyup=campoOK("rfc",validateRFC(document.getElementById("rfc").value)) maxlength="13">
                <p class="textoAyuda" >RFC</p>
            </div>
            <!-- Datos de contacto=========================== -->
            <div class="tarjetaBlanca">
                <p class="titulo">Contacto</p>
                <input required type="tel"id="numero_contac" class="registro required" onchange="" onkeypress="javascript:return isNumberKey(event)" onkeyup=telNumberFormat("cel") maxlength="14">
                <p class="textoAyuda">Número celular</p>
                <input required type="email" id="emailReg" class="registro required" onkeyup=campoOK("correo",validaCorreoValido(document.getElementById("correo").value)) maxlength="50">
                <p class="textoAyuda">Email</p>
            </div>
            <!-- Datos De direccion========================== -->
            <div class="tarjetaBlanca">
                <p class="titulo">Dirección</p>
                <input type="text" id="direc" class="registro" onchange="">
                <p class="textoAyuda">Direcccion</p>
                <input type="text" id="cod_pos" class="registro" onchange="" onkeypress="javascript:return isNumberKey(event)">
                <p class="textoAyuda">Código Postal</p>
                <div class="inputEnLinea">
                    <input type="text" class="registro" id="colonia" onchange="">
                    <input type="text" class="registro" id="ciudad" onchange="">
                </div>
                <div class="inputEnLinea">
                    <p class="textoAyuda">Colonia</p>
                    <p class="textoAyuda">Ciudad</p>
                </div>
            </div>
                <!-- Datos De Notas========================== -->
            <div class="tarjetaBlanca">
                <label class="titulo">No hay notas</label>
                <textarea id="nota" class="registro"></textarea>
            </div>
            <button id="footerGuardar_Boton" style="margin:20px auto; display:block;" onclick ="guardarClient()">Guardar</button>
        </div>
        <!-- Modales========================== -->
        <div id="contenedorModal">
        </div>
        <!-- ================================= -->
        ';
        return $interfazRegistroUsuario;
    }
    //=========================================================================
    //=========================================================================
    //=========================================================================
    //=========================================================================
    //=========================================================================
?>
<?php
    //=========================================================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/ClientesFunciones.php';
    session_start();
    //=========================================================================
    function imprimir_tarjetas_clientes($texto){
        $cliente = new Cliente();
        $arrayTajetas = $cliente->Buscar_Tarjetas($texto);
        $_SESSION['Client1'] = $arrayTajetas[0]['correo'];
        $Tarjetas = '';
        for($i = 0; $i<count($arrayTajetas); $i++){
            $Tarjetas = $Tarjetas . '
                        <div id="'. $arrayTajetas[$i]['correo'] .'" class="contenedorTarjetaUsuario" onclick=cargarInfo("'.$arrayTajetas[$i]['correo'].'")>
                            <div id="desenfoque" class="sombra"></div>
                            <a>
                                <div class="imgUsuario" style="background-image: url('."'../Clientes/".$arrayTajetas[$i]['correo']."/".$arrayTajetas[$i]['img']."'".');"></div>
                                <h2 class="tituloTarjetaUsuario"> '.$arrayTajetas[$i]['titulo'].' </h2>
                                <h3 class="subtituloTarjetaUsuario">'.$arrayTajetas[$i]['nombreContac'].'<br>'.$arrayTajetas[$i]['rfc'].'</h3>
                            </a>
                            <a id="telefono" class="botonInfo" href="tel: '.$arrayTajetas[$i]['numeroContac'].'"></a>
                            <a id="email" class="botonInfo" href="mailto: '.$arrayTajetas[$i]['correo'].'"></a>
                        </div>
                        ';
        }
        return $Tarjetas;
    }
    //=========================================================================
    function imprimir_info_cliente($correo){
        //varables=============================
        $cliente = new Cliente();
        $infoCliente = $cliente->Info($correo);
        //=====================================

        //=========DATOS MODAL=================
        $tipoModal = "'confirmar'";
        $item = "'".$infoCliente['nom_empr']."'";

        //=========DATOS MODAL MODIFICAR=================
        $textoModificar = "'Desea modificar cliente: '";
        $funcionModificar = "'ModificarClient()'";
        $textoBotonModificar = "'Modificar'";
        $claseBotonModificar = "'guardarBotonModal'";

        //=========DATOS MODAL ELIMINAR=================
        $textoEliminar = "'Desea eliminar cliente: '";
        $funcionEliminar = "'eliminarClient()'";
        $textoBotonEliminar = "'Eliminar'";
        $claseBotonEliminar = "'eliminarBotonModal'";


        //===============================================
        $interfazInfoUsuario = '
        <div class="contenedorCentradoResponsivo">
                <div id="tituloContenedor">
                    <div id="editarImagen" style="background-image: url('."'../Clientes/".$correo."/".$infoCliente['img']."'".'); background-size: cover; background-position: center;">
                    <form id="formImg">
                        <input class="inputImg" id="inImg" name="archivo[]" type="file" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this); arregloCambios[4] = 1" value=""/>
                    </form> 
                    <label id="botonImg" for="inImg" style="display:none;"></label>
                    <button id="botonEditar" onclick=verPantallaModificar('."'".$infoCliente['email']."'".');>
                    <button id="botonEliminar" onclick="infoModal('.$tipoModal.','.$textoEliminar.','.$funcionEliminar.','.$textoBotonEliminar.','.$item.','.$claseBotonEliminar.')">
                    <button id="botonCancelar" style="display:none"  onclick="verPantallaInfoCliente('."'".$infoCliente['email']."'".')">
                    <div id="blah"> </div>
                </div>
                <input id="tituloReg" class="inputTexto mayus required" style="color:white;" type="text" value="'.$infoCliente['titulo'].'" onchange="arregloCambios[2] = 1;">
                <p class="textoAyuda textoAyudaTitulo">Titulo</p>
                    </div>
                <!-- DatosPersonales ============================ -->
                <div class="tarjetaBlanca">
                    <p class="titulo">Datos personales</p>
                    <input required class="required" type="text" id="nom_empr" value="'.$infoCliente['nom_empr'].'" onchange="arregloCambios[2] = 1;">
                    <p class="textoAyuda">Nombre de la empresa</p>
                    <input required type="text" id="nombre_contac" value="'.$infoCliente['nombre_contac'].'" onchange="arregloCambios[1] = 1;">
                    <p class="textoAyuda">Nombre del contacto</p>
                    <input class="required" type="text" id="rfc" value="'.$infoCliente['rfc'].'" onchange="arregloCambios[2] = 1;" onkeyup=campoOK("rfc",validateRFC(document.getElementById("rfc").value)) maxlength="13">
                    <p class="textoAyuda" >RFC</p>
                </div>
                <!-- Datos de contacto=========================== -->
                <div class="tarjetaBlanca">
                    <p class="titulo">Contacto</p>
                    <input required class="required" type="tel"id="numero_contac" value="'.$infoCliente['numero_contac'].'" onchange="arregloCambios[1] = 1;" onkeypress="javascript:return isNumberKey(event)" onkeyup=telNumberFormat("numero_contac") maxlength="14">
                    <p class="textoAyuda">Número celular</p>
                    <input required class="required" type="email" id="emailReg" value="'.$infoCliente['email'].'" onchange="arregloCambios[1] = 1;" onkeyup=campoOK("emailReg",validaCorreoValido(document.getElementById("correo").value))  maxlength="50">
                    <p class="textoAyuda">Email</p>
                </div>
                <!-- Datos De direccion========================== -->
                <div class="tarjetaBlanca">
                    <p class="titulo">Dirección</p>
                    <input type="text" id="direc" value="'.$infoCliente['direc'].'" onchange="arregloCambios[3] = 1;">
                    <p class="textoAyuda">Direcccion</p>
                    <input type="text" id="cod_pos"  value="'.$infoCliente['cod_pos'].'"  onchange="arregloCambios[3] = 1;" onkeypress="javascript:return isNumberKey(event)" maxlength="10">
                    <p class="textoAyuda">Código Postal</p>
                    <div class="inputEnLinea">
                        <input type="text" id="colonia" value="'.$infoCliente['colonia'].'" onchange="arregloCambios[3] = 1;">
                        <input type="text" id="ciudad" value="'.$infoCliente['ciudad'].'" onchange="arregloCambios[3] = 1;">
                    </div>
                    <div class="inputEnLinea">
                        <p class="textoAyuda">Colonia</p>
                        <p class="textoAyuda">ciudad</p>
                    </div>
                </div>
                <!-- Datos De Notas========================== -->
                <div class="tarjetaBlanca">
                    <label class="titulo">No hay notas</label>
                    <textarea id="nota" onchange="arregloCambios[3] = 0;" disabled>'.$infoCliente['nota'].'</textarea>
                </div>
                <!-- Boton Final============================ -->
                <button id="footerGuardar_Boton" onclick="ModificarClient()" style="margin:20px auto;">Guardar</button>
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
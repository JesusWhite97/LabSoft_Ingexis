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
                        <div class="contenedorTarjetaUsuario" onclick=cargarInfo("'.$arrayTajetas[$i]['correo'].'")>
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
        $cliente = new Cliente();
        $infoCliente = $cliente->Info($correo);
        $interfazInfoUsuario = '
        <div class="contenedorCentradoResponsivo">
                        <div id="tituloContenedor">
                            <div id="editarImagen" style="background-image: url('."'../Clientes/".$correo."/".$infoCliente['img']."'".'); background-size: cover; background-position: center;">
                            <form id="formImg">
                                <input class="inputImg" id="inImg" name="archivo[]" type="file" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this); arregloCambios[4] = 1" value=""/>
                            </form> 
                            <label id="botonImg" for="inImg" style="display:none;"></label>
                            <button id="botonEditar" onclick="verPantallaEditar('."'".$infoCliente['email']."'".');">
                            <button id="botonEliminar" onclick="eliminarClient();">
                            <button id="botonCancelar" style="display:none"  onclick="verPantallaInfoCliente('."'".$infoCliente['email']."'".')">
                            <div id="blah"> </div>
                        </div>
                        <input id="tituloReg" class="inputTexto mayus" style="color:white;" type="text" value="'.$infoCliente['titulo'].'" onchange="arregloCambios[2] = 1;">
                        <p class="textoAyuda textoAyudaTitulo">Titulo</p>
                            </div>
                        <!-- DatosPersonales ============================ -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Datos personales</p>
                            <input required type="text" id="nom_empr" value="'.$infoCliente['nom_empr'].'" onchange="arregloCambios[2] = 1;">
                            <p class="textoAyuda">Nombre de la empresa</p>
                            <input required type="text" id="nombre_contac" value="'.$infoCliente['nombre_contac'].'" onchange="arregloCambios[1] = 1;">
                            <p class="textoAyuda">Nombre del contacto</p>
                            <input type="text" id="rfc" value="'.$infoCliente['rfc'].'" onchange="arregloCambios[2] = 1;">
                            <p class="textoAyuda" >RFC</p>
                        </div>
                        <!-- Datos de contacto=========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Contacto</p>
                            <input required type="tel"id="numero_contac" value="'.$infoCliente['numero_contac'].'" onchange="arregloCambios[1] = 1;">
                            <p class="textoAyuda">Número celular</p>
                            <input required type="email" id="emailReg" value="'.$infoCliente['email'].'" onchange="arregloCambios[1] = 1;">
                            <p class="textoAyuda">Email</p>
                        </div>
                        <!-- Datos De direccion========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Dirección</p>
                            <input type="text" id="direc" value="'.$infoCliente['direc'].'" onchange="arregloCambios[3] = 1;">
                            <p class="textoAyuda">Direcccion</p>
                            <input type="text" id="cod_pos"  value="'.$infoCliente['cod_pos'].'"  onchange="arregloCambios[3] = 1;">
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
                            <button id="footerGuardar_Boton" onclick=verModalModificar(document.getElementById("emailReg").value)>Guardar</button>
                    </div>
                </div>
                <!-- Modales========================== -->
                <div id="contenedorModal">
                    <div id="fondoModal"></div>
                        <div class="modal">
                            <p id ="textoModalPregunta" class="textoModal">
                                ¿Desea?
                            </p>
                            <button id ="botonEliminarModal"class="eliminarBotonModal" onclick="">Eliminar</button>
                            <button id ="botonGuardarModal"class="guardarBotonModal" style="display:none;" onclick="ModificarClient()">Modificar</button> <!-- aqui va modificar========================= -->
                            <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
                        </div>
                </div>
                <!-- Modales========================== -->
                <div id="contenedorModalEliminado">
                    <div id="fondoModal"></div>
                        <div class="modal">
                            <p class="textoModal" id="textoExito">
                                Usuario eliminado
                            </p>
                            <button class="OK" onclick="verPantallaInfoCliente(document.getElementById("emailReg").value)">OK</button>
                        </div>
                        
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
                            <input id="tituloReg" class="inputTexto mayus registro" style="color:white;" type="text">
                            <p class="textoAyuda textoAyudaTitulo">Titulo</p>
                        </div>
                        <!-- DatosPersonales ============================ -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Datos personales</p>
                            <input required type="text" id="nom_empr" class="registro" onchange="">
                            <p class="textoAyuda">Nombre de la empresa</p>
                            <input required type="text" id="nombre_contac" class="registro" onchange="">
                            <p class="textoAyuda">Nombre del contacto</p>
                            <input type="text" id="rfc" class="registro" onchange="">
                            <p class="textoAyuda" >RFC</p>
                        </div>
                        <!-- Datos de contacto=========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Contacto</p>
                            <input required type="tel"id="numero_contac" class="registro" onchange="">
                            <p class="textoAyuda">Número celular</p>
                            <input required type="email" id="emailReg" class="registro">
                            <p class="textoAyuda">Email</p>
                        </div>
                        <!-- Datos De direccion========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Dirección</p>
                            <input type="text" id="direc" class="registro" onchange="">
                            <p class="textoAyuda">Direcccion</p>
                            <input type="text" id="cod_pos" class="registro" onchange="">
                            <p class="textoAyuda">Código Postal</p>
                            <div class="inputEnLinea">
                                <input type="text" class="registro" id="colonia" onchange="">
                                <input type="text" class="registro" id="ciudad" onchange="">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Colonia</p>
                                <p class="textoAyuda">ciudad</p>
                            </div>
                        </div>
                        <button id="footerGuardar_Boton" style="margin:20px auto; display:block;" onclick = verModalGuardar(document.getElementById("emailReg").value)>Guardar</button>
                </div>
                <div id="contenedorModal">
                <div id="fondoModal"></div>
                <div class="modal">
                    <p id ="textoModalPregunta" class="textoModal">
                        ¿Desea?
                    </p>
                    <button id ="botonGuardarModal" class="guardarBotonModal" style="display:none;" onclick="guardarClient()">Guardar</button>
                    <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
                </div>
            </div>
            <div id="contenedorModalEliminado">
                <div id="fondoModal"></div>
                <div class="modal">
                    <p class="textoModal" id="textoExito">

                    </p>
                    <button class="OK" onclick=verPantallaInfoCliente("document.getElementById("emailReg").value")>OK</button>
                </div>
            </div>
        ';
        return $interfazRegistroUsuario;
    }
    //=========================================================================
    //=========================================================================
    //=========================================================================
    //=========================================================================
    //=========================================================================
?>
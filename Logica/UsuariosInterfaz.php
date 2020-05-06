<?php
    // ========================================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/UsuariosFunciones.php';
    session_start();
    // ========================================================
    function imprimir_tarjetas_usuario($busqueda, $filtro){
        $Usuario = new Usuario();
        $arrayTajetas = $Usuario->Buscar_tarjetas($busqueda,$filtro);
        $Tarjetas = '';
        for($i = 0; $i<count($arrayTajetas); $i++){
            $Tarjetas = $Tarjetas . '
                        <div class="contenedorTarjetaUsuario" onclick=cargarInfoUsuario("'. $arrayTajetas[$i]['correo'] .'")>
                            <div id="desenfoque" class="sombra"></div>
                            <a>
                                <div class="imgUsuario" style="background-image: url('."'../Usuarios/".$arrayTajetas[$i]['correo']."/".$arrayTajetas[$i]['img']."'".');"></div>
                                <h2 class="tituloTarjetaUsuario"> '.$arrayTajetas[$i]['apodo'].' </h2>
                                <h3 class="subtituloTarjetaUsuario">'.$arrayTajetas[$i]['puesto'].'</h3>
                            </a>
                            <a id="telefono" class="botonInfo" href="tel: '.$arrayTajetas[$i]['numero'].'"></a>
                            <a id="email" class="botonInfo" href="mailto: '.$arrayTajetas[$i]['correo'].'"></a>
                        </div>
                        ';
        }
        return $Tarjetas;
    }
    // ========================================================
    function imprimir_info_usuario($correo){
        $Usuario = new Usuario();
        $infoUsuario = $Usuario->VistaCompleta($correo);
        $imgUsuario = $Usuario->Info_Correo($correo);

        $optionsPuesto = "";

        if($infoUsuario["puesto"] == "Administrador"){
            $optionsPuesto = '<option selected value="Administrador">Administrador</option>';
        }else{
            $optionsPuesto ='<option value="Administrador">Administrador</option>';
        }

        if($infoUsuario["puesto"] == "Jefe De Laboratorio"){
            $optionsPuesto = $optionsPuesto.'<option selected value="Jefe De Laboratorio">Jefe De Laboratorio</option>';
        }else{
            $optionsPuesto =$optionsPuesto.'<option value="Jefe De Laboratorio">Jefe De Laboratorio</option>';
        }

        if($infoUsuario["puesto"] == "Laboratorista 1"){
            $optionsPuesto = $optionsPuesto.'<option selected value="Laboratorista 1">Laboratorista 1</option>';
        }else{
            $optionsPuesto =$optionsPuesto.'<option value="Laboratorista 1">Laboratorista 1</option>';
        }

        if($infoUsuario["puesto"] == "Laboratorista 2"){
            $optionsPuesto =$optionsPuesto.'<option selected value="Laboratorista 1">Laboratorista 2</option>';
        }else{
            $optionsPuesto =$optionsPuesto.'<option value="Laboratorista 2">Laboratorista 2</option>';
        }
            


        $interfazInfoUsuario = '
        <div class="contenedorCentradoResponsivo">
                        <div id="tituloContenedor">
                            <div id="editarImagen" style="background-image: url('."'../Usuarios/".$correo."/".$imgUsuario[1]."'".'); background-size: cover; background-position: center;">
                            <form id="formImg">
                                <input class="inputImg" id="inImg" name="archivo[]" type="file" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);" value=""/>
                            </form> 
                            <label id="botonImg" for="inImg" style="display:none;"></label>
                            <div id="blah"> </div>
                        </div>
                        <input id="apodo" class="inputTexto mayus" style="color:white;" type="text" placeholder="'.$infoUsuario['apodo'].'" value="'.$infoUsuario['apodo'].'">
                        <p class="textoAyuda textoAyudaTitulo">Apodo</p>
                            </div>
                        <div class="tarjetaBlanca" style="margin-top: 0px;">        
                            <select id="puesto" class="registro">
                                '.$optionsPuesto.'
                            </select>
                            <p class="textoAyuda" style="text-align: center; grid-row: 2/ span 1; grid-column: 1/ span 1;">Puesto</p>
                        </div>
                        <!-- DatosPersonales ============================ -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Datos personales</p>
                            <div class="inputEnLinea" >
                                <input type="text"  placeholder="'.$infoUsuario['nom1'].'">
                                <input type="text"  placeholder="'.$infoUsuario['nom2'].'">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Primer Nombre</p>
                                <p class="textoAyuda">Segundo Nombre</p>
                            </div>
                            <div class="inputEnLinea" >
                                <input type="text"  placeholder="'.$infoUsuario['ape1'].'">
                                <input type="text"  placeholder="'.$infoUsuario['ape2'].'">
                            </div>
                            <div class="inputEnLinea" >
                                    <p class="textoAyuda">Apellido Paterno</p>
                                    <p class="textoAyuda">Apellido Materno</p>
                            </div>
                            <input type="text" placeholder="'.$infoUsuario['rfc'].'" >
                            <p class="textoAyuda" >RFC</p>
                            <input type="text" placeholder="'.$infoUsuario['curp'].'">
                            <p class="textoAyuda">CURP</p>
                        </div>
                        <!-- Datos de contacto=========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Contacto</p>
                            <input type="text"id="telefono" placeholder="'.$infoUsuario['telefono'].'">
                            <p class="textoAyuda">Número celular</p>
                            <input type="text" id="correo" value="'.$infoUsuario['correo'].'" placeholder="'.$infoUsuario['correo'].'">
                            <p class="textoAyuda">Email</p>
                            <input type="text" id="password"  placeholder="'.$infoUsuario['contra'].'">
                            <p class="textoAyuda" >Contraseña</p>
                        </div>
                        <!-- Datos De direccion========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Dirección</p>
                            <input type="text" placeholder="'.$infoUsuario['calle'].'">
                            <p class="textoAyuda">Calle</p>
                            <input type="text" placeholder="'.$infoUsuario['entre'].'">
                            <p class="textoAyuda">Entre</p>
                            <div class="inputEnLinea">
                                <input type="text" placeholder="'.$infoUsuario['ciudad'].'">
                                <input type="text" placeholder="'.$infoUsuario['codPostal'].'">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Ciudad</p>
                                <p class="textoAyuda">Código Postal</p>
                            </div>
                            <input type="text" placeholder="'.$infoUsuario['colonia'].'">
                            <p class="textoAyuda">Colonia</p>
                        </div>

                        <div class="tarjetaBlanca centrar">
                        <div id="botonesDelPrint" class="botonesEliminarImprimer">
                            <button class="footerImprimir_Boton" onclick=cambiarPantallaEditar(document.getElementById("correo").value)>Modificar</button>
                            <button class="footerEliminar_Boton" onclick=openModal(document.getElementById("correo").value)>Eliminar Usuario</button>
                        </div>
                        <div id="botonGuardar" class="botonesEliminarImprimer" style="display:none;">
                            <button id="footerGuardar_Boton" onclick=openModal(document.getElementById("correo").value) style="grid-column: 1 / span 2;">Guardar</button>
                        </div>
                    </div>
                </div>
                
                <div id="contenedorModal">
                    <div id="fondoModal"></div>
                        <div class="modal">
                            <p id ="textoModalPregunta" class="textoModal">
                                ¿Desea ELIMINAR?
                            </p>
                            <button id ="botonEliminarModal"class="eliminarBotonModal" onclick=eliminarUsuario()>Eliminar</button>
                            <button id ="botonGuardarModal"class="guardarBotonModal" style="display:none;">Modificar</button>
                            <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
                        </div>
                </div>


                <div id="contenedorModalEliminado">
                    <div id="fondoModal"></div>
                        <div class="modal">
                            <p class="textoModal" id="textoExito">
                                Usuario eliminado
                            </p>
                            <button class="OK" onclick=cambiarPantallaInfo()>OK</button>
                        </div>
                        
                </div>
        ';
        return $interfazInfoUsuario;
    }
    // ========================================================
    function imprimir_registro_usuario(){
        $interfazRegistroUsuario = '
        <div class="contenedorCentradoResponsivo">
                        <div id="tituloContenedor">
                        <div id="editarImagen" style=" background-size: cover; background-position: center;">
                        <form id="formImg">
                            <input class="inputImg" id="inImg" name="archivo[]" type="file" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);" value=""/>
                        </form> 
                        <label id="botonImg" for="inImg"></label>
                        <div id="blah"> </div>
                    </div>
                    <input id="apodo" class="registro inputTexto mayus" style="color:white;" type="text">
                    <p class="textoAyuda textoAyudaTitulo">Apodo</p>
                        </div>
                        <div class="tarjetaBlanca" style="margin-top: 0px;">        
                            <select id="puesto" class="registro">
                                    <option value="Administrador">Administrador</option>
                                    <option value="Jefe de Laboratorio">Jefe de Laboratorio</option>
                                    <option value="Laboratorista 1">Laboratorista 1</option>
                                    <option value="Laboratorista 2">Laboratorista 2</option>
                            </select>
                        <p class="textoAyuda" style="text-align: center;">Puesto</p>
                        </div>
                        <!-- DatosPersonales ============================ -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Datos personales</p>
                            <div class="inputEnLinea" >
                                <input id="nom1" type="text" class="registro" placeholder="">
                                <input id="nom2" type="text" class="registro" placeholder="">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Primer Nombre</p>
                                <p class="textoAyuda">Segundo Nombre</p>
                            </div>
                            <div class="inputEnLinea" >
                                <input id="ape1" type="text" class="registro" placeholder="">
                                <input id="ape2" type="text" class="registro" placeholder="">
                            </div>
                            <div class="inputEnLinea" >
                                    <p class="textoAyuda">Apellido Paterno</p>
                                    <p class="textoAyuda">Apellido Materno</p>
                            </div>
                            <input id="rfc" type="text"class="registro mayus" placeholder="" >
                            <p class="textoAyuda" >RFC</p>
                            <input id="curp" type="text"class="registro mayus" placeholder="">
                            <p class="textoAyuda">CURP</p>
                        </div>
                        <!-- Datos de contacto=========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Contacto</p>
                            <input id="cel" type="text" class="registro" id="telefono" placeholder="">
                            <p class="textoAyuda">Número celular</p>
                            <input id="correo" type="text" class="registro" id="correo" placeholder="">
                            <p class="textoAyuda">Email</p>
                            <input id="contra" type="text" class="registro" id="password"  placeholder="">
                            <p class="textoAyuda" >Contraseña</p>
                        </div>
                        <!-- Datos De direccion========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Dirección</p>
                            <input id="calle" type="text" class="registro" placeholder="">
                            <p class="textoAyuda">Calle</p>
                            <input id="entre" type="text" class="registro" placeholder="">
                            <p class="textoAyuda">Entre</p>
                            <div class="inputEnLinea">
                                <input id="num" type="text" class="registro" placeholder="">
                                <input id="cp" type="text" class="registro" placeholder="">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Número de casa</p>
                                <p class="textoAyuda">Código Postal</p>
                            </div>
                            <div class="inputEnLinea">
                                <input id="colonia" type="text" class="registro" placeholder="">
                                <input id="ciudad" type="text" class="registro" placeholder="">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Colonia</p>
                                <p class="textoAyuda">Ciudad</p>
                            </div>

                        </div>
                        <button id="footerGuardar_Boton" onclick = guardarUser()>Guardar</button>
                    
                </div>
        ';
        return $interfazRegistroUsuario;
    }
    // ========================================================
    // ========================================================
    // ========================================================
?>
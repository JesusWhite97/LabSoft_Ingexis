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
                        <div  id="'. $arrayTajetas[$i]['correo'] .'" class="contenedorTarjetaUsuario" onclick=cargarInfoUsuario("'. $arrayTajetas[$i]['correo'] .'")>
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

        //=========DATOS MODAL=================
        $tipoModal = "'confirmar'";
        $item = "'".$correo."'";

        //=========DATOS MODAL MODIFICAR=================
        $textoModificar = "'Desea modificar usuario: '";
        $funcionModificar = "'modificarUser()'";
        $textoBotonModificar = "'Modificar'";
        $claseBotonModificar = "'guardarBotonModal'";

      
        //=========DATOS MODAL ELIMINAR=================
        $textoEliminar = "'Desea eliminar usuario: '";
        $funcionEliminar = "'eliminarUsuario()'";
        $textoBotonEliminar = "'Eliminar'";
        $claseBotonEliminar = "'eliminarBotonModal'";

     

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
                            <div id="editarImagen" style="background-image: url('."'../Usuarios/".$correo."/".$imgUsuario[1]."'".');">
                            <form id="formImg">
                                <input class="inputImg" id="inImg" name="archivo[]" type="file" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this); arregloCambios[8]=1;" value=""/>
                            </form> 
                            <label id="botonImg" for="inImg" style="display:none;"></label>
                            <button id="botonEditar" onclick=verPantallaModificar(document.getElementById("correo").value)>
                            <button id="botonEliminar" onclick="infoModal('.$tipoModal.','.$textoEliminar.','.$funcionEliminar.','.$textoBotonEliminar.','.$item.','.$claseBotonEliminar.')">
                            <button id="botonCancelar" style="display:none"  onclick=verPantallaInfo(document.getElementById("correo").value) >
                            <div id="blah"> </div>
                        </div>
                        <input id="apodo" class="inputTexto mayus" style="color:white;" type="text" value="'.$infoUsuario['apodo'].'" onchange="arregloCambios[0]=1;">
                        <p class="textoAyuda textoAyudaTitulo">Apodo</p>
                            </div>
                        <div class="tarjetaBlanca" style="margin-top: 0px;">
                            <input type="text" id="puestoInput" class="selectInfo" style="text-align:center;" value="'.$infoUsuario['puesto'].'" onchange="arregloCambios[2]=1;">        
                            <select id="puesto" class="registro" style="display:none;" onchange="arregloCambios[1]=1;">
                                '.$optionsPuesto.'
                            </select>
                            <p class="textoAyuda" style="text-align: center; grid-row: 2/ span 1; grid-column: 1/ span 1;">Puesto</p>
                        </div>
                        <!-- DatosPersonales ============================ -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Datos personales</p>
                            <div class="inputEnLinea" >
                                <input  type="text" id="nom1" class="required" value="'.$infoUsuario['nom1'].'" onchange="arregloCambios[2]=1;">
                                <input type="text" id="nom2" value="'.$infoUsuario['nom2'].'" onchange="arregloCambios[2]=1;">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Primer Nombre</p>
                                <p class="textoAyuda">Segundo Nombre</p>
                            </div>
                            <div class="inputEnLinea" >
                                <input required type="text" id="ape1" class="required" value="'.$infoUsuario['ape1'].'" onchange="arregloCambios[2]=1;">
                                <input type="text" id="ape2" value="'.$infoUsuario['ape2'].'" onchange="arregloCambios[2]=1;">
                            </div>
                            <div class="inputEnLinea" >
                                    <p class="textoAyuda">Apellido Paterno</p>
                                    <p class="textoAyuda">Apellido Materno</p>
                            </div>
                            <input type="text" id="rfc" value="'.$infoUsuario['rfc'].'" onchange="arregloCambios[3]=1;">
                            <p class="textoAyuda" >RFC</p>
                            <input  type="text" id="curp" class="required" value="'.$infoUsuario['curp'].'" onchange="arregloCambios[4]=1;">
                            <p class="textoAyuda">CURP</p>
                        </div>
                        <!-- Datos de contacto=========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Contacto</p>
                            <input required type="tel" id="cel" value="'.$infoUsuario['telefono'].'" onchange="arregloCambios[5]=1;">
                            <p class="textoAyuda">Número celular</p>
                            <input required type="email" id="correo" class="required" value="'.$infoUsuario['correo'].'">
                            <p class="textoAyuda">Email</p>
                        </div>
                        <!-- Datos de contrseña=========================== -->
                        <div id="inContras" style="display:none;"  class="tarjetaBlanca">
                            <p class="titulo">Contraseña</p>
                            <div  class="inputEnLinea">
                            <input type="password" title="Entre 8 y 16 caracteres,obligatorio: mayuscula, minuscula, número y algún caracter de los siguientes:$@!%*?&" id="contra1" class="required" value=""    onchange="arregloCambios[6]=1;">
                            <input type="password" id="contra2"c lass="required"  value=""   onchange="arregloCambios[6]=1;">
                            </div>
                            <div  class="inputEnLinea">
                            <p class="textoAyuda">Contraseña nueva</p>
                            <p class="textoAyuda">Confirmar contraseña nueva</p>
                            </div>
                        </div>
                        <!-- Datos De direccion========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Dirección</p>
                            <input type="text" id="calle" value="'.$infoUsuario['calle'].'" onchange="arregloCambios[7]=1;">
                            <p class="textoAyuda">Calle</p>
                            <input type="text" id="entre" value="'.$infoUsuario['entre'].'" onchange="arregloCambios[7]=1;">
                            <p class="textoAyuda">Entre</p>
                            <div class="inputEnLinea">
                                <input type="text" id="num" value="'.$infoUsuario['numCasa'].'"    onchange="arregloCambios[7]=1;">
                                <input type="text" id="cp"  value="'.$infoUsuario['codPostal'].'"  onchange="arregloCambios[7]=1;">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Numero de casa</p>
                                <p class="textoAyuda">Código Postal</p>
                            </div>
                            <div class="inputEnLinea">
                                <input type="text" id="colonia" value="'.$infoUsuario['colonia'].'" onchange="arregloCambios[7]=1;">
                                <input type="text" id="ciudad" value="'.$infoUsuario['ciudad'].'" onchange="arregloCambios[7]=1;">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">Colonia</p>
                                <p class="textoAyuda">ciudad</p>
                            </div>
                        </div>
                            <button id="footerGuardar_Boton" onclick="infoModal('.$tipoModal.','.$textoModificar.','.$funcionModificar.','.$textoBotonModificar.','.$item.','.$claseBotonModificar.')">Guardar</button>
                    </div>
                </div>
                
                <div id="contenedorModal">
                </div>

        ';
        return $interfazInfoUsuario;
    }
    // ========================================================
    function imprimir_registro_usuario(){
        $interfazRegistroUsuario = '
        <div class="contenedorCentradoResponsivo">
                        <form action="" autocomplete="on">
                        <div id="tituloContenedor">
                        <div id="editarImagen" style=" background-size: cover; background-position: center;">
                        <form id="formImg">
                            <input class="inputImg" id="inImg" name="archivo[]" type="file" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);" value=""/>
                        </form> 
                        <label id="botonImg" class="btnImgRegistro" for="inImg"></label>
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
                        <p class="textoAyuda" style="text-align: center;">*Puesto</p>
                        </div>
                        <!-- DatosPersonales ============================ -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Datos personales</p>
                            <div class="inputEnLinea" >
                                <input id="nom1" type="text" class="registro required" placeholder="">
                                <input id="nom2" type="text" class="registro" placeholder="">
                            </div>
                            <div class="inputEnLinea">
                                <p class="textoAyuda">*Primer Nombre</p>
                                <p class="textoAyuda">Segundo Nombre</p>
                            </div>
                            <div class="inputEnLinea" >
                                <input id="ape1" type="text" class="registro required" placeholder="">
                                <input id="ape2" type="text" class="registro" placeholder="">
                            </div>
                            <div class="inputEnLinea" >
                                    <p class="textoAyuda">*Apellido Paterno</p>
                                    <p class="textoAyuda">Apellido Materno</p>
                            </div>
                            <input id="rfc" type="text"class="registro mayus" placeholder="" onkeyup=campoOK("rfc",validateRFC(document.getElementById("rfc").value))>
                            <p class="textoAyuda" >RFC</p>
                            <input id="curp" type="text"class="registro mayus required" placeholder="" onkeyup=campoOK("curp",curpValida(document.getElementById("curp").value))>
                            <p class="textoAyuda">*CURP</p>
                        </div>
                        <!-- Datos de contacto=========================== -->
                        <div class="tarjetaBlanca">
                            <p class="titulo">Contacto</p>
                            <input id="cel" type="tel" class="registro required" id="telefono" placeholder="" onkeypress="javascript:return isNumberKey(event)" onkeyup=telNumberFormat("cel") maxlength="14">
                            <p class="textoAyuda">*Número celular</p>
                            <input id="correo" type="text" class="registro required" id="correo" placeholder="" onkeyup=campoOK("correo",validaCorreoValido(document.getElementById("correo").value))>
                            <p class="textoAyuda">*Email</p>
                        </div>
                        <!-- Datos de contrseña=========================== -->
                        <div id="inContras"  class="tarjetaBlanca">
                            <p class="titulo">Contraseña</p>
                            <div  class="inputEnLinea">
                            <input type="password" id="contra1" value="" onkeyup=campoOK("contra1",validaContraFormat(document.getElementById("contra1").value)) class="registro required">
                            <input type="password" id="contra2"  value="" onkeyup=campoOK("contra2",validaCoincideContra(document.getElementById("contra1").value,document.getElementById("contra2").value)) class="registro required">
                            </div>
                            <div  class="inputEnLinea">
                            <p class="textoAyuda">*Contraseña nueva</p>
                            <p class="textoAyuda">*Confirmar contraseña nueva</p>
                            </div>
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
                        <button id="footerGuardar_Boton" style="margin:20px auto; display:block;" onclick="guardarUser()">Guardar</button>
                        </form>
                </div>
                <div id="contenedorModal">
                <div id="fondoModal"></div>
                <div class="modal">
                    <p id ="textoModalPregunta" class="textoModal">
                        ¿Desea?
                    </p>
                    <button id ="botonGuardarModal"class="guardarBotonModal" style="display:none;" onclick=guardarUser()>Guardar</button>
                    <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
                </div>
            </div>
            <div id="contenedorModal">
                <div id="fondoModal"></div>
                <div class="modal">
                    <p class="textoModal" id="textoExito">

                    </p>
                    <button class="OK" onclick=verPantallaInfo()>OK</button>
                </div>
            </div>
        ';
        return $interfazRegistroUsuario;
    }
    // ========================================================
    // ========================================================
    // ========================================================
?>
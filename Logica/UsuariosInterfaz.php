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
        $interfazInfoUsuario = '
        <div class="contenedorCentradoResponsivo">
                        <div id="tituloContenedor">
                            <div id="tituloImagen" style="background-image: url('."'../Usuarios/".$correo."/".$imgUsuario[1]."'".');"> </div>
                            <h3 id="tituloInfo">'.$infoUsuario['apodo'].'</h3>
                        </div>
                        <div class="tarjetaBlanca" style="margin-top: 0px;">        
                            <input style="text-align: center; grid-row: 1/ span 1; grid-column: 1/ span 1;" type="text" placeholder="'.$infoUsuario['puesto'].'">
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
                            <input type="text" id="email" placeholder="'.$infoUsuario['correo'].'">
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
                </div>
        ';
        return $interfazInfoUsuario;
    }
    // ========================================================
?>
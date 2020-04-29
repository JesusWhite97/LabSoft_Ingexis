<?php
    include '/wamp64/www/LabSoft_Ingexis/Logica/UsuariosFunciones.php';
    function imprimir_tarjetas_usuario($busqueda, $filtro){
        $Usuario = new Usuario();
        $arrayTajetas = $Usuario->Buscar_tarjetas($busqueda,$filtro);
        $Tarjetas = '';
        for($i = 0; $i<count($arrayTajetas); $i++){
            $Tarjetas = $Tarjetas . '
                        <div class="contenedorTarjetaUsuario" onclick="cargarInfoUsuario()">
                        <div id="desenfoque" class="sombra"></div>
                        <a>
                            <div class="imgUsuario" style="background-image: url('."'".$arrayTajetas[$i]['img']."'".');"></div>
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
?>
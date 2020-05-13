<?php
    //=========================================================================
    include '/wamp64/www/LabSoft_Ingexis/Logica/ClientesFunciones.php';
    session_start();
    //=========================================================================
    function imprimir_tarjetas_clientes($texto){
        $cliente = new Cliente();
        $arrayTajetas = $cliente->Buscar_Tarjetas($texto);
        $Tarjetas = '';
        for($i = 0; $i<count($arrayTajetas); $i++){
            $Tarjetas = $Tarjetas . '
                        <div class="contenedorTarjetaUsuario" onclick=()>
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
    //=========================================================================
    //=========================================================================
    //=========================================================================
    //=========================================================================
    //=========================================================================
    //=========================================================================
?>
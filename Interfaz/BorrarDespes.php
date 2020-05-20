<?php
    session_start();
    include '/wamp64/www/LabSoft_Ingexis/Logica/UsuariosFunciones.php';
    //=======================================
    if(isset($_POST["metodo"])){
        if($_POST["metodo"] == "cargarUsers"){
            //crear variables====================
            $user = new Usuario();
            $directorios = new CreacionDirectorios();
            $Salida = "";
            //===================================
            $Salida = $Salida . $user->Insertar('jesus120190240.8@gmail.com', '1234', '', 'Jesus', '', 'Villavicencio', 'Osuna', 'JesusWhite', '6121671121', 'Jefe De Laboratorio', '2tnDu2TmJVFekasd', '2tnDu2TmJVFek', 'piñon', 'avellana y limon', '201', 'indeco', '23070', 'la paz') . "\n";
            //===================================
            $Salida = $Salida . $user->Insertar('ñonga@gmail.com', '1234', '', 'Elver', '', 'Galindo', 'Prado', 'La ñonga', '6124558796', 'Laboratorista 2', 'avdrthbcg', 'GAPE881112FG4', 'Papaya', 'Melón y Datil', '564', 'Ferroviaria', '23071', 'la paz') . "\n";
            //===================================
            $Salida = $Salida . $user->Insertar('meli@gmail.com', '1234', '', 'Melisa', 'samanta', 'cesena', 'rodrigez', 'Meli', '6121458795', 'Laboratorista 1', 'aXmMm4LDfWRq6muiSj', 'hXFUwgrwHKtQM', 'pitaya', 'Melón y Datil', '564', 'Ferroviaria', '23071', 'la paz') . "\n";
            //===================================
            $Salida = $Salida . $user->Insertar('rtapiz@gmail.com', '1234', '', 'Raul', 'Jesus', 'Ruiz', 'Tapiz', 'RTapiz', '6121123422', 'Administrador', 'RUTR881111HBSZPL07', 'RUTR8811116FA', 'Forjadores', 'Tecnológico y Terminal', '564', 'Sudcalifornia', '23080', 'la paz') . "\n";
            //===================================
            $json[] =   [
                'validacion'    => $Salida
            ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    //=======================================
?>
<?php
    // ========================================================
    session_start();
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="imprimir_layout"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_layout($_POST["layout"])
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    // ========================================================
    function imprimir_layout($interfaz){
        // ===========================USUARIOS============================
        if($interfaz == "usuarios"){
            $_SESSION['carpeta'] = 'Usuarios';
            $_SESSION['NavBarSelected'] = '"itemUsers","img/UserIconBlue.svg"';//================================variable seleccion de menu
            return ' 
                <!-- 00000000000000000000000 -->
                <div id="divTarjetas">
                    <h1 id="tituloPag">Usuarios</h1>
                    <div id="contenedorBuscador">
                        <div id="desenfoque" class="sombra"></div>
                        <input type="text" id="buscarEntrada" onkeyup="cargarTarjetas(document.getElementById("buscarEntrada").value,filtrado())" placeholder="Buscar..." title="Type in a name"></input>
                        <button id="opciones" onclick="mostrarOpcionesU()"></button>
                    </div> 
                    <div id="contenedorOpciones" class="sombra" style="display: none;">
                        <div class="itemMenu" onclick="cargarRegistroUsuario()">
                            <div class="icoMenu" style="background-image:url(img/icoAgregar.svg);background-size: 30px 30px;" ></div>
                            <p>Agregar usuario</p> 
                        </div>
                        <div class="itemMenu">
                            <div class="icoMenu" style="background-image:url(img/icoFiltro.svg);"></div>
                            <p>Filtrado</p>
                            <div id="filtrado">
                                <div> <input checked type="checkbox" value="admon" id="admon" onclick="cargarTarjetas(document.getElementById("buscarEntrada").value,filtrado())"><p>Administrador</p></input></div>
                                <div style="margin-left: -15px;"> <input checked type="checkbox" value="jefe" id="jefe"  onclick="cargarTarjetas(document.getElementById("buscarEntrada").value,filtrado())"><p>Jefe de Laboratorio</p></input></div>
                                <div> <input checked type="checkbox" value="lab1" id="lab1" onclick="cargarTarjetas(document.getElementById("buscarEntrada").value,filtrado())"><p>Laboratorista 1</p></input></div>
                                <div style="margin-left: -15px;"> <input checked type="checkbox" value="lab2" id="lab2" onclick="cargarTarjetas(document.getElementById("buscarEntrada").value,filtrado())"><p>Laboratorista 2</p></input></div>
                            </div>
                        </div>
                    </div>
                    <div id="contenedorGridResponsivo"> 
                    </div>
                </div>
                <!-- 11111111111111111111111 -->
                <div id="divInfo">
                </div>
                <!-- 22222222222222222222222 -->
                <div id="divTarjetas"></div>
                <!-- 33333333333333333333333 -->
            ';
        }
          // ============================CLIENTES============================
        if($interfaz == "clientes" ){
            $_SESSION['carpeta'] = 'Clientes';
            $_SESSION['NavBarSelected'] = '"itemClients","img/ClientesIconBlue.svg"';//================================variable seleccion de menu
            return ' 
                <!-- 00000000000000000000000 -->
                <div id="divTarjetas">
                    <h1 id="tituloPag">Clientes</h1>
                        <div id="contenedorBuscador">
                            <div id="desenfoque" class="sombra"></div>
                            <input type="text" id="buscarEntrada" onkeyup="cargarTarjetas(document.getElementById("buscarEntrada").value);" placeholder="Buscar..." title="Type in a name"></input>
                            <button id="opciones" onclick="mostrarOpcionesC()"></button>
                        </div> 
                        <div id="contenedorOpciones" class="sombra" style="display: none;">
                            <div class="itemMenu" onclick="cargarAgregar()">
                                <div class="icoMenu" style="background-image:url(img/icoAgregar.svg);background-size: 30px 30px;" ></div>
                                <p>Agregar Cliente</p> 
                            </div>
                        </div>
                        <div id="contenedorGridResponsivo" onload="cargarTarjetas("")">
                        </div>
                    </div>
                    <!-- 11111111111111111111111 -->
                    <div id="divInfo">
                        
                    </div>
                    <!-- 22222222222222222222222 -->
                </div>
            ';
        }
          // ============================OBRAS============================
        if($interfaz == "obras" ){
            $_SESSION['NavBarSelected'] = '"itemObras","img/ObrasIconBlue.svg"';//================================variable seleccion de menu
            return ' 
                <!-- 00000000000000000000000 -->
                <div id="divTarjetas">
                <h1 id="tituloPag">Obras</h1>
                    <div id="contenedorBuscador">
                        <div id="desenfoque" class="sombra"></div>
                        <input type="text" id="buscarEntrada" onkeyup="cargarTarjetas(document.getElementById("buscarEntrada").value);" placeholder="Buscar..." title="Type in a name"></input>
                        <button id="opciones" onclick="mostrarOpcionesC()"></button>
                    </div> 
                    <div id="contenedorOpciones" class="sombra" style="display: none;">
                    <div class="itemMenu" onclick="cargarRegistroO()">
                        <div class="icoMenu" style="background-image:url(img/icoAgregar.svg);background-size: 30px 30px;" ></div>
                        <p>Agregar Obra</p> 
                    </div>
                    </div>
                    <div id="contenedorGridResponsivo">
                    </div>
                </div>
                <!-- 11111111111111111111111 -->
                <div id="divInfo">
                </div>
                <!-- 22222222222222222222222 -->
                <div id="divInfoElemento">
                </div>
                <!-- 33333333333333333333333 -->
            ';
        }
          // ============================MUESTRAS============================
        if($interfaz == "muestras" ){
            $_SESSION['NavBarSelected'] = '"itemMuestras","img/MuestraIconBlue.svg"';//================================variable seleccion de menu
            return ' 

            ';
        }
          // ===========================PRINCIPAL=============================
        if($interfaz == "principal" ){
            $_SESSION['NavBarSelected'] = '"itemHome","img/HomeIconBlue.svg"';//================================variable seleccion de menu
            return ' 

            ';
        }
          // =============================PRUEBAS===========================
        if($interfaz == "pruebas" ){
            $_SESSION['NavBarSelected'] = '"itemPruebas","img/PruebaIconBlue.svg"';//================================variable seleccion de menu
            return ' 

            ';
        }
    }
    // ========================================================
?>
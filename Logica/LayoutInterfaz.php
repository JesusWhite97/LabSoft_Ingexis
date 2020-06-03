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
                    <div class="itemMenu" onclick="cargarAgregar()">
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
                <div class="contenedorCentradoResponsivo">


                    <!-- Titulo elemento ============================ -->
                    <div class="tarjetaBlanca">
                        <h1 class="tituloElemento">Elemento</h1>
                        <div class="subtituloElemento">Observaciones:<br></div>
                    </div>

                    <!-- Registro ID´s muestras ============================ -->
                    <div class="tarjetaBlanca">
                            <p class="titulo" style="margin-bottom:5px;">Registro de identificadores</p>
                            <input id="fechaMuestro" type="date" class="registro mayus" style="margin-top:5px;" placeholder="">
                            <p class="textoAyuda" >Fech muestreo</p>
                            <input id="7dias" type="text"class="registro mayus required" placeholder=""  maxlength="5">
                            <p class="textoAyuda">ID 7 días</p>
                            <input id="14dias" type="text"class="registro mayus required" placeholder=""  maxlength="5">
                            <p class="textoAyuda">ID 14 días</p>
                            <input id="28dias" type="text"class="registro mayus required" placeholder=""  maxlength="5">
                            <p class="textoAyuda">ID 28 días</p>
                            <button id="footerGuardar_Boton" style="margin:0px auto; display:block; height:auto; border-radius:5px;" onclick="">Guardar</button>
                    </div>

                    <!-- Información por muestra ============================ -->
                    <div class="tarjetaBlanca">
                            <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 100px 1fr">
                                        <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 45px 1fr">
                                            <p class="textoAyuda">7 días:</p>
                                            <input id="7dias" type="text"class="mayus required"   placeholder="1234"  maxlength="5">
                                        
                                        </div>
                                        <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 40px 1fr">
                                            <p class="textoAyuda" style="text-align:right;">Fecha:</p>
                                            <input id="fechaMuestro" type="date" class="" style="margin-left:1px;" placeholder="">
                                        </div>
                            </div>

                           
                    </div>
                    <div class="tarjetaBlanca">
                            <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 100px 1fr">
                                        <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 45px 1fr">
                                            <p class="textoAyuda">14 días:</p>
                                            <input id="7dias" type="text"class="mayus required"   placeholder="1235"  maxlength="5">
                                        
                                        </div>
                                        <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 40px 1fr">
                                            <p class="textoAyuda" style="text-align:right;">Fecha:</p>
                                            <input id="fechaMuestro" type="date" class="" style="margin-left:1px;" placeholder="">
                                        </div>
                            </div>

                           
                    </div>
                    <div class="tarjetaBlanca">
                            <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 100px 1fr">
                                        <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 45px 1fr">
                                            <p class="textoAyuda">28 días:</p>
                                            <input id="7dias" type="text"class="mayus required"   placeholder="1236"  maxlength="5">
                                        
                                        </div>
                                        <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 40px 1fr">
                                            <p class="textoAyuda" style="text-align:right;">Fecha:</p>
                                            <input id="fechaMuestro" type="date" class="" style="margin-left:1px;" placeholder="">
                                        </div>
                            </div>

                           
                    </div>

                <!-- Registro prueba ============================ -->

                <div class="tarjetaBlanca">
                            <div class="inputEnLinea" style="justify-self:start;  align-items: center; grid-template-columns: 100px 1fr">
                                        <div class="inputEnLinea" style="justify-self:start; grid-template-columns: 45px 1fr">
                                            <p class="textoAyuda" style:"height:20px; align-self:center;">7 días:</p>
                                            <input id="7dias" type="text"class="mayus required" style:"height:20px; align-self:center;"   placeholder="1234"  maxlength="5">
                                        
                                        </div>
                                        <div class="inputEnLinea" style=" align-items:center; grid-template-columns: 40px 1fr">
                                            <p class="textoAyuda" style="text-align:right; height:20px; align-self:center;">Fecha:</p>
                                            <input id="fechaMuestro" type="date" class="" style="margin-left:1px; height:20px; align-self:center;" placeholder="">
                                        </div>
                            </div>

                            <div class="inputEnLinea" style="justify-self:strech; align-items: center; height:40px; grid-template-columns: 1fr 50px;">
                                            
                                            <input id="Prueba7dias" type="text"class=" registro mayus required" style:"height:20px; align-self:center;"  placeholder=""  maxlength="5">
                                            <p class="textoAyuda">kg/cm2</p>
                            </div>
                                        
                                       
                            
                            <button id="footerGuardar_Boton" style="margin:0px auto; display:block; height:auto; border-radius:5px; justify-self:strech;" onclick="">Guardar</button>

                                        
                            

                           
                    </div>


                </div>
            </div>

            
            
    
     <!-- 33333333333333333333333 -->
        </div>


            ';
        }
          // ============================MUESTRAS============================
        if($interfaz == "muestras" ){
            return ' 

            ';
        }
          // ===========================PRINCIPAL=============================
        if($interfaz == "principal" ){
            return ' 

            ';
        }
          // =============================PRUEBAS===========================
        if($interfaz == "pruebas" ){
            return ' 

            ';
        }

      
    }

    // ========================================================
?>
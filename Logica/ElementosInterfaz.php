<?php
    // ========================================================
    session_start();
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        if($_POST["metodo"]=="imprimir_info_elemento"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'scriptHTML'   => imprimir_info_elemento($_POST["layout"])
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    // ========================================================
    function imprimir_info_elemento($interfaz){
    
      
        return ' 
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
                    <div class="tarjetaBlanca" style="font-size:16px; ">
                                            <p class="titulo" >7 Dias</p>

                                            <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                                                    <input id="7dias" type="text"class="mayus required"   placeholder="1234"  maxlength="5" >
                                                    <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                                            </div>
                                        
                                            <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                                                    <p class="textoAyuda" style="">Identificador</p>
                                                    <p class="textoAyuda" style="">Fecha</p>  
                                            </div> 
                    </div>

                    <div class="tarjetaBlanca" style="font-size:16px; ">
                                            <p class="titulo" >14 Dias</p>
                                            <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                                                    <input id="7dias" type="text"class="mayus required"   placeholder="1235"  maxlength="5" >
                                                    <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                                            </div>
                                        
                                            <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                                                    <p class="textoAyuda" style="">Identificador</p>
                                                    <p class="textoAyuda" style="">Fecha</p>  
                                            </div> 
                    </div>

                    <div class="tarjetaBlanca" style="font-size:16px; ">
                                            <p class="titulo" >18 Dias</p>

                                            <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                                                    <input id="7dias" type="text"class="mayus required"   placeholder="1236"  maxlength="5" >
                                                    <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                                            </div>
                                        
                                            <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                                                    <p class="textoAyuda" style="">Identificador</p>
                                                    <p class="textoAyuda" style="">Fecha</p>  
                                            </div> 
                    </div>
                   
                <!-- Registro prueba ============================ -->

                <div class="tarjetaBlanca" style="font-size:16px; ">
               
                                         <p class="titulo" >7 Dias</p>
                                        
                                        <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                                            <input id="7dias" type="text"class="mayus required"   placeholder="1234"  maxlength="5" >
                                            <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                                        </div>
                                    
                                        <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                                            <p class="textoAyuda" style="">Identificador</p>
                                            <p class="textoAyuda" style="">Fecha</p>  
                                        </div> 

                                        <div class="inputEnLinea" style="justify-self:strech; align-items: center; height:40px; grid-template-columns: 1fr 50px;">
                                            <input id="Prueba7dias" type="text"class=" registro mayus required" style:"height:20px; align-self:center;"  placeholder=""  maxlength="5">
                                            <p class="textoAyuda" style="color:white;font-size:16px;">kg/cm2</p>
                                        </div>
                                        <p class="textoAyuda">Resultado prueba</p>
                                        
                                        <button id="footerGuardar_Boton" style="margin:0px auto; display:block; height:auto; border-radius:5px; justify-self:strech;" onclick="">Guardar</button>
                                        
                </div>

                <!-- Información prueba ============================ -->

                <div class="tarjetaBlanca" style="font-size:16px; ">
               
                                         <p class="titulo" >7 Dias</p>
                                        
                                        <div class="inputEnLinea" style="  grid-template-columns: 100px 1fr">
                                            <input id="7dias" type="text"class="mayus required"   placeholder="1234"  maxlength="5" >
                                            <input id="fechaMuestro" type="date" class="" style="justify-self:center; margin-left:1px;" placeholder="">
                                        </div>
                                    
                                        <div class="inputEnLinea" style="grid-template-columns: 100px 1fr">
                                            <p class="textoAyuda" style="">Identificador</p>
                                            <p class="textoAyuda" style="">Fecha</p>  
                                        </div> 

                                        <div class="inputEnLinea" style="justify-self:strech; align-items: center; height:40px; grid-template-columns: 1fr 50px;">
                                            <input id="Prueba7dias" type="text"class=" mayus required" style:"height:20px; align-self:center;"  placeholder=""  maxlength="5">
                                            <p class="textoAyuda" style="color:white;font-size:16px;">kg/cm2</p>
                                        </div>

                                        <p class="textoAyuda">Resultado prueba</p>
                                        
                 </div>

              


            </div>
           
        ';
        
    }
    // ========================================================
?>
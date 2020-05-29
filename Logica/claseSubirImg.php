<?php
    session_start();
    # definimos la carpeta destino
    $carpetaDestino="../".$_SESSION['carpeta']."/".$_SESSION['Nuevo']."/";
    # si hay algun archivo que subir
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0])
    {
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
        {
            #si el tamaño del archivo es correcto
            if ($_FILES["fileToUpload"]["size"] < 500000) {

              
             # si es un formato de imagen
            if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
            {
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {
                        $json[] =  [
                            'respuesta'   => $_FILES["archivo"]["name"][$i],
                            'mensajeDatos'   => "Archivo subido correctamente"
                        ];   
                    }else{
                        $json[] =   [
                            'respuesta'   =>  "NO",
                            'mensajeDatos'   => "No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i]
                            ];
                    }
                }else{
                    $json[] =   [
                        'respuesta'   =>  "NO",
                        'mensajeDatos'   => "No se ha podido crear la carpeta: ".$carpetaDestino
                        ];  
                    
                }
            }else{
                $json[] =   [
                    'respuesta'   =>  "NO",
                    'mensajeDatos'   =>  $_FILES["archivo"]["name"][$i]." - NO es imagen jpg, png o gif"
                    ]; 
            }
        }else{
            $json[] =   [
                'respuesta'   =>  "NO",
                'mensajeDatos'   =>  "Archivo muy grande"
                ]; 

        }
    
    }else{
        $json[] =   [
            'respuesta'   =>  "NO",
            'mensajeDatos'   => "No se pudo subir."
            ]; 

    }
    unset($_SESSION['Nuevo']);
    //#########################################################################################
    $jsonString = json_encode($json);
    echo $jsonString;
?>
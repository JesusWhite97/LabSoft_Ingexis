<?php
    //=============================================================================================
    //=============================================================================================
    class CreacionDirectorios{
        //declaracion de variables
        public function CrearDirectorioUsuario($correoUsuario)
        {
            mkdir ('..\\Usuarios\\'.$correoUsuario, 0700);
            return 'Usuarios\\'.$correoUsuario;
        }
        //#########################################################################################
        public function CrearDirectorioClientes($correoCliente){
            mkdir ('..\\Clientes\\'.$correoCliente, 0700);
            return 'Clientes\\'.$correoCliente;
        }
        //#########################################################################################
        public function EliminarDirectorioConContenido($correoUsuario)
        {
            $cd = new CreacionDirectorios();
            $carpeta = '..\\'.$_SESSION['carpeta'].'\\'.$correoUsuario;
            foreach(glob($carpeta . "/*") as $archivos_carpeta)
            {
                if (is_dir($archivos_carpeta))
                {
                    $cd->EliminarDirectorioConContenido($archivos_carpeta);
                }else 
                {
                    unlink($archivos_carpeta);
                }
            }
            rmdir($carpeta);
        }
        //#########################################################################################
        public function EliminarUnArchivo($correo, $Archivo)
        {
            $elimina =   '..\\'.$_SESSION['carpeta'].'\\'. $correo .'\\'. $Archivo;
            unlink($elimina);
        }
    }
    //=============================================================================================
?>
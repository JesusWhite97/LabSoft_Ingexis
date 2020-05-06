<?php
    class CreacionDirectorios{
        //declaracion de variables
        
        public function CrearDirectorioUsuario($correoUsuario)
        {
            mkdir ('..\\Usuarios\\'.$correoUsuario, 0700);
            return 'Usuarios\\'.$correoUsuario;
        }

        //#########################################################################################
        public function EliminarDirectorioConContenido($correoUsuario)
        {
            $cd = new CreacionDirectorios();
            $carpeta = '..\\Usuarios\\'.$correoUsuario;
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

        public function EliminarUnArchivo($Archivo)
        {
            unlink($Archivo);
        }
    }
?>
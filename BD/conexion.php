<?php
	class conexionMySQLi{
		//declaracion de variables
		//agregar ususarios: login, jefeLAb, admin, lab1, lab2
		//
		//========================
		function conexion()
		{
			$mysqli = new mysqli('localhost', 'root', '', 'databaseingexis');
			if ($mysqli -> connect_errno) 
			{
				die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() . ") " . $mysqli -> mysqli_connect_error());
			}
			else
				return $mysqli;
        }
	}
?>
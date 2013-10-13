<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	switch( $_GET[ "control" ] ){
		case "login":
			require_once( "./controller/loginCtrl.php" );
			$login = new loginCtrl( );
			$login -> run( );
			break;
		case "administrator":
			break;
		default:
			
	}
?>
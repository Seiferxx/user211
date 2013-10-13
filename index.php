<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	switch( $_GET[ "control" ] ){
		case "ygyug":
			break;
		case "main":
			break;
		default:
			require_once( "./controller/loginCtrl.php" );
	}




?>
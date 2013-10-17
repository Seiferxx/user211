<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class cicleCtrl{
		
		public function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "show":
					require_once ("./model/cicleMdl.php");
					$show = new cicleMdl( $singleton );
					$show -> show( );
					break;
				case "create":
					break;
				case "edit":
					break;
				case "delete":
					break;
				default:
					
			} 
		}
	}


?>
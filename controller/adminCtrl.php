<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class adminCtrl{
		
		public function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "index":
					require_once ( "./view/admin_index.html" );
					break;
				case "doc":
					require_once( "./view/doc.html" );
					break;
				default:
					require_once( "./view/404.html" );
			}
		}
		
	}

?>
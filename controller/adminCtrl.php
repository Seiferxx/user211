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
					require_once ( "./view/adminIndex.html" );
					break;
				case "doc":
					require_once( "./view/doc.html" );
					break;
				case "config":
					$content = file_get_contents( "./view/configView.html" );
					$header = file_get_contents( "./view/header.html" );
					$footer = file_get_contents( "./view/footer.html" );
					
					echo $header;
					echo $content;
					echo $footer;
					break;
				default:
					require_once( "./view/404.html" );
			}
		}
		
	}

?>
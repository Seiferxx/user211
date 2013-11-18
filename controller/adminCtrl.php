<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class adminCtrl{
		
		public function run( $singleton ){
			session_start( );
			switch( $_GET[ "action" ] ){
				case "index":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						require_once ( "./view/adminIndex.html" );
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "doc":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						$header = file_get_contents( "./view/header.html" );
						$content = file_get_contents( "./view/doc.html" );
						$footer = file_get_contents( "./view/footer.html" );
						
						$content = str_replace( "{user}", "admin" , $content );
							
						echo $header;
						echo $content;
						echo $footer;
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "config":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						$content = file_get_contents( "./view/configView.html" );
						$header = file_get_contents( "./view/header.html" );
						$footer = file_get_contents( "./view/footer.html" );
						
						$content = str_replace( "{user}", "admin" , $content );
						$content = str_replace( "{name}", "Admin" , $content );
						
						echo $header;
						echo $content;
						echo $footer;
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				default:
					require_once( "./view/404.html" );
			}
		}
		
	}

?>
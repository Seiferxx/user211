<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/


	class teacherCtrl{
		
		public function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "show":
					require_once( "./model/teacherMdl.php" );
					$teacher = new teacherMdl( $singleton );
					$result = $teacher -> show( );
					$content = file_get_contents( "./view/teacherShowView.html" );
					$header = file_get_contents( "./view/header.html" );
					$footer = file_get_contents( "./view/footer.html" );
					
					
					break;
				default:
					require_once( "./view/404.html" );
			}
		}
		
	}
?>
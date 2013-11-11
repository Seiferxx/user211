<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/


	class teacherCtrl{
 
		public function run( $singleton ){
			session_start( );
			switch( $_GET[ "action" ] ){
				case "show":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						require_once( "./model/teacherMdl.php" );
						$teacher = new teacherMdl( $singleton );
						$result = $teacher -> show( );
						$content = file_get_contents( "./view/teacherShowView.html" );
						$header = file_get_contents( "./view/header.html" );
						$footer = file_get_contents( "./view/footer.html" );
					
						$row_start = strrpos( $content,'<tr>' );
						$row_end = strrpos( $content,'</tr>' ) + 5;
						$sRow = substr( $content,$row_start,$row_end-$row_start );
						$rows = "";
						foreach( $result as $row ){
							$nRow = $sRow;
							$dict = array( "{id}" => $row[ "id" ],"{name}" => $row[ "name" ], "{email}" => $row[ "mail" ] );
							$nRow = strtr( $nRow, $dict );
							$rows .= $nRow;
						}
						$content = str_replace( $sRow, $rows, $content );
						echo $header;
						echo $content;
						echo $footer;
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "add":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						$header = file_get_contents( "./view/header.html" );
						$content = file_get_contents( "./view/teacherCreateView.html" );
						$footer = file_get_contents( "./view/footer.html" );
					
						echo $header;
						echo $content;
						echo $footer;
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "register":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						$name = $_POST[ "name" ];
						$phone = $_POST[ "phone" ];
						$code = $_POST[ "code" ];
						$mail = $_POST[ "mail" ];
						$passwd = substr( $name , 0, 1 ).$code;

						//Insertar en la base de datos

						//Enviar correo
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "index":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "phillips" ){
						$header = file_get_contents( "./view/header.html" );
						$content = file_get_contents( "./view/teacherIndex.html" );
						$footer = file_get_contents( "./view/footer.html" );
					
						echo $header;
						echo $content;
						echo $footer;
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "config":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "phillips" ){
						$header = file_get_contents( "./view/header.html" );
						$content = file_get_contents( "./view/configView.html" );
						$footer = file_get_contents( "./view/footer.html" );
					
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

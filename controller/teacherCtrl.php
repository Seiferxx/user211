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
						
						require_once ( "./model/teacherMdl.php" );
						$teacherMdl = new teacherMdl( $singleton );
						$teacherMdl -> addTeacher( $name, $mail, $phone, $code );
						$teacherMdl -> addAcount( $code, sha1( $passwd ) );

						$to = $mail;
						$subject = "Registro de cuenta en SUCE";
						$headers = "From: suceAcounts@sucesys.udg\n\rMIME-Version: 1.0\n\rContent-Type: text/html; charset=UTF-8\n\r";
						$messageContent = file_get_contents( "./view/teacherMail.html" );
						$messageContent = str_replace( "{user}", $code, $messageContent );
						$messageContent = str_replace( "{passwd}", $passwd, $messageContent );
						mail( $to, $subject, $messageContent, $headers );
						
						header( "Location: ./index.php?control=teacher&action=show" );
						
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

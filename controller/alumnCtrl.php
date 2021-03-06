<?php
	
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Mu�oz
	*/

	class alumnCtrl{

		public function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "register":
					
					$name		= $_POST[ "name" ];  
					$phone		= $_POST[ "phone" ];
					$code		= $_POST[ "code" ];
					$mail		= $_POST[ "mail" ];
					$career		= $_POST[ "career" ];
					$password 	= substr( $name , 0, 1 ).$code;
					$status = 1;

					require_once( "./model/alumnMdl.php" );
					$alumnMdl = new alumnMdl( $singleton );
					$alumnMdl -> addAlumn( $name, $phone, $mail, $career, $status, $code );
					$alumnMdl -> addAcount( $code, sha1( $password ) );
					
					if( isset( $_POST[ "git" ] ) ){
						$git = $_POST[ "git" ];
						$alumnMdl -> addExtraValue( $git, $code, 1 );
					}
					if( isset( $_POST[ "web" ] ) ){
						$web = $_POST[ "web" ];
						$alumnMdl -> addExtraValue( $web, $code, 2 );
					}
					if( isset( $_POST[ "cel" ] ) ){
						$cel = $_POST[ "cel" ];
						$alumnMdl -> addExtraValue( $cel, $code, 3 );
					}
					
					
					//Mail composition and sending
					$to = $mail;
					$subject = "Registro de cuenta en SUCE";
					$headers = "From: suceAcounts@sucesys.udg\n\rMIME-Version: 1.0\n\rContent-Type: text/html; charset=UTF-8\n\r";
					$messageContent = file_get_contents( "./view/alumnMail.html" );
					$messageContent = str_replace( "{user}", $code, $messageContent );
					$messageContent = str_replace( "{passwd}", $password, $messageContent );
					mail( $to, $subject, $messageContent, $headers );
					
					header( "Location: ./index.php?control=alumn&action=show" );
					break;
				case "add":
					require_once( "./model/alumnMdl.php" );
					$alumnMdl = new alumnMdl( $singleton );
					$header = file_get_contents( "./view/header.html");
					$content = file_get_contents( "./view/alumnCreateView.html" );
					$footer = file_get_contents( "./view/footer.html" );
					$result = $alumnMdl -> getCareers( );

					$row_start = strrpos( $content,'<option' );
					$row_end = strrpos( $content,'</option>' ) + 9;	
					$sRow = substr( $content,$row_start,$row_end-$row_start );
					$rows = "";
					foreach( $result as $row ){
						$nRow = $sRow;
						$dict = array( "{idVal}" => $row[ "id" ],"{val}" => $row[ "career" ] );
						$nRow = strtr( $nRow."\n\t\t\t\t\t", $dict );
						$rows .= $nRow;
					}
					$content = str_replace( $sRow, $rows, $content );
					
					echo $header;
					echo $content;
					echo $footer; 
					break;
				case "show":
					require_once( "./model/alumnMdl.php" );
					$alumnMdl = new alumnMdl( $singleton );
					$header = file_get_contents( "./view/header.html");
					$content = file_get_contents( "./view/alumnShowView.html" );
					$footer = file_get_contents( "./view/footer.html" );
					$result = $alumnMdl -> getAlumns( );
					
					$row_start = strrpos( $content,'<tr>' );
					$row_end = strrpos( $content,'</tr>' ) + 5;
					$sRow = substr( $content,$row_start,$row_end-$row_start );
					$rows = "";
					foreach( $result as $row ){
						$nRow = $sRow;
						$dict = array( "{id}" => $row[ "id" ],"{name}" => $row[ "name" ],"{mail}" => $row[ "mail" ]);
						$nRow = strtr( $nRow, $dict );
						$rows .= $nRow;
					}
					$content = str_replace( $sRow, $rows, $content );
					
					echo $header;
					echo $content;
					echo $footer;
					break;
				case "index":
					$header = file_get_contents( "./view/header.html" );
					$content = file_get_contents( "./view/alumnIndex.html" );
					$footer = file_get_contents( "./view/footer.html" );
					
					echo $header;
					echo $content;
					echo $footer;	
					break;
				case "config":
					$content = file_get_contents( "./view/configView.html" );
					$header = file_get_contents( "./view/header.html" );
					$footer = file_get_contents( "./view/footer.html" );
					
					$content = str_replace( "{user}", "alumn" , $content );
					$content = str_replace( "{name}", "Alumno" , $content );
					
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

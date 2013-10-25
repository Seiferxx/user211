<?php
	
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class alumnCtrl{

		public function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "register":
					
					$name		= $_GET[ "name" ];  
					$acount		= $_GET[ "acount" ];
					$phone		= $_GET[ "phone" ];
					$code		= $_GET[ "code" ];
					$career		= $_GET[ "career" ];
					$password 	= substring( $name , 0, 5 ).$code;

					require_once( "./model/alumnMdl.php" );
					$alumnMdl = new alumnMdl( $singleton );
					$alumnMdl -> create( sha1( passwd ) , name );
					mail( $to, $subject, $mess, $header ); 
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
						$nRow = strtr( $nRow, $dict );
						$rows .= $nRow;
					}
					$content = str_replace( $sRow, $rows, $content );
					
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

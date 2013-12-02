<?php
	
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class courseCtrl{
		
		public function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "show":
					$header = file_get_contents( "./view/header.html" );
					$content = file_get_contents( "./view/courseShowView.html" );
					$footer = file_get_contents( "./view/footer.html" );
					
					require_once( "./model/courseMdl.php" );
					
					
					echo $header;
					echo $content;
					echo $footer;
					break;
				case "add":
					$header = file_get_contents( "./view/header.html" );
					$content = file_get_contents( "./view/courseCreateView.html" );
					$footer = file_get_contents( "./view/footer.html" );
					
					require_once( "./model/cicleMdl.php" );
					$cicle = new cicleMdl( $singleton );
					$result = $cicle -> getCicle( );

					$row_start = strrpos( $content,'<option' );
					$row_end = strrpos( $content,'</option>' ) + 9;
					$sRow = substr( $content,$row_start,$row_end-$row_start );
					$rows = "";
					foreach( $result as $row ){
						$nRow = $sRow;
						$dict = array( "{cicle}" => $row[ "cicle" ], "{id}" => $row[ "id" ] );
						$nRow = strtr( $nRow."\n\t\t\t\t\t", $dict );
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

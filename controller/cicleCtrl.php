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
					$result = $show -> show( );
					$header = file_get_contents( "./view/header.html" );
					$footer = file_get_contents( "./view/footer.html" );
					$content = file_get_contents( "./view/cicleShowView.html" );
					
					$row_start = strrpos( $content,'<tr>' );
					$row_end = strrpos( $content,'</tr>' ) + 5;	
					$sRow = substr( $content,$row_start,$row_end-$row_start );
					$rows = "";
					foreach( $result as $row ){
						$nRow = $sRow;
						$dict = array( "{id}" => $row[ "id" ],"{cicle}" => $row[ "cicle" ], "{start}" => $row[ "start_date" ], "{end}" => $row[ "end_date" ]  );
						$nRow = strtr( $nRow, $dict );
						$rows .= $nRow;
					}
					$content = str_replace( $sRow, $rows, $content );
					
					
					echo $header;
					echo $content;
					echo $footer;
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
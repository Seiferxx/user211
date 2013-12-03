<?php
	
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class courseCtrl{
		
		public function run( $singleton ){
			session_start( );
			switch( $_GET[ "action" ] ){
				case "show":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "phillips" ){
						$header = file_get_contents( "./view/header.html" );
						$content = file_get_contents( "./view/courseShowView.html" );
						$footer = file_get_contents( "./view/footer.html" );
						
						require_once( "./model/courseMdl.php" );
						$course = new courseMdl( $singleton );
						$result = $course -> show( $_SESSION[ "user" ] );
						
						$row_start = strrpos( $content,'<tr>' );
						$row_end = strrpos( $content,'</tr>' ) + 5;
						$sRow = substr( $content,$row_start,$row_end-$row_start );
						$rows = "";
						foreach( $result as $row ){
							$nRow = $sRow;
							$dict = array( "{id}" => $row[ "id" ],"{cicle}" => $row[ "cicle" ], "{course}" => $row[ "course" ], "{alumns}" => $row[ "alumns" ]  );
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
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "phillips" ){
						$header = file_get_contents( "./view/header.html" );
						$content1 = file_get_contents( "./view/courseCreateView1.html" );
						$content2 = file_get_contents( "./view/courseCreateView2.html" );
						$footer = file_get_contents( "./view/footer.html" );
						
						require_once( "./model/cicleMdl.php" );
						$cicle = new cicleMdl( $singleton );
						$result = $cicle -> getCicle( );
	
						$row_start = strrpos( $content1,'<option' );
						$row_end = strrpos( $content1,'</option>' ) + 9;
						$sRow = substr( $content1,$row_start,$row_end-$row_start );
						$rows = "";
						foreach( $result as $row ){
							$nRow = $sRow;
							$dict = array( "{cicle}" => $row[ "cicle" ], "{id}" => $row[ "id" ] );
							$nRow = strtr( $nRow."\n\t\t\t\t\t", $dict );
							$rows .= $nRow;
						}
						$content1 = str_replace( $sRow, $rows, $content1 );
						
						require_once( "./model/courseMdl.php" );
						$course = new courseMdl( $singleton );
						$result = $course -> getCourse( );
						
						$row_start = strrpos( $content2,'<option' );
						$row_end = strrpos( $content2,'</option>' ) + 9;
						$sRow = substr( $content2,$row_start,$row_end-$row_start );
						$rows = "";
						foreach( $result as $row ){
							$nRow = $sRow;
							$dict = array( "{course}" => $row[ "course" ], "{id}" => $row[ "id" ] );
							$nRow = strtr( $nRow."\n\t\t\t\t\t", $dict );
							$rows .= $nRow;
						}
						$content2 = str_replace( $sRow, $rows, $content2 );
						
						echo $header;
						echo $content1;
						echo $content2;
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

<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class cicleCtrl{
		
		public function run( $singleton ){
			session_start( );
			switch( $_GET[ "action" ] ){
				case "show":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
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
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "create":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						
						$header = file_get_contents( "./view/header.html" );
						$content = file_get_contents( "./view/cicleCreateView.html" );
						$footer = file_get_contents( "./view/footer.html" );
						
						echo $header;
						echo $content;
						echo $footer;
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "save":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						require_once( "./model/cicleMdl.php" );
						$cicleMdl = new cicleMdl( $singleton );
						
						$year = $_POST[ "year" ];
						$ab = $_POST[ "ab" ];
						$init = $_POST[ "init" ];
						$end = $_POST[ "end" ];
						$cicle = $year.$ab;
						$cicleMdl -> addCicle( $cicle, $init, $end );
						
						$cicleId = $cicleMdl -> getCicleId( $cicle );
						echo( $cicleId );
						
						$freeDayCounter = 0;
						while( isset( $_POST[ "reason".$freeDayCounter ] ) ){
							$day = $_POST[ "day".$freeDayCounter ];
							$reason = $_POST[ "reason".$freeDayCounter ];
							$cicleMdl -> addDay( $cicleId, $day, $reason );
							$freeDayCounter = $freeDayCounter + 1;
						}
						header( "Location: ./index.php?control=cicle&action=show" );
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "edit":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
						$header = file_get_contents( "./view/header.html" );
						$content = file_get_contents( "./view/cicleCreateView.html" );
						$footer = file_get_contents( "./view/footer.html" );
					}
					else{
						require_once( "./view/401.html" );
					}
					break;
				case "delete":
					if( isset( $_SESSION[ "key" ] ) && $_SESSION[ "key" ] == "lockpick" ){
					
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

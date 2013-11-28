<?php
	
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	require_once( "../controller/config.inc" );
	if( isset( $_POST[ "id" ] ) ){
		$id = $_POST[ "id" ];
		$connection = new mysqli(  $server, $user, $passwd, $database );
		$query = "";
		$result = $connection -> query( $query ) or die( "dbError: Query" );
		$rows = array( );
		while( $row = $result -> fetch_assoc( ) ){
			$rows[ ] = $row;
		}
		echo json_encode( $rows );
		$connection -> close( );
	}
?>

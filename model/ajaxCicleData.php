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
		$query = "select day, reason from free_days where cicle = $id";
		$result = $connection -> query( $query );
		while( $row = $result -> fetch_assoc( ) ){
			$rows[ ] = $row;
		}
		//echo json_encode( $rows );
		echo $rows;
		$connection -> close( );
	}
?>
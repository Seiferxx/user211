<?php
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class teacherMdl{
		
		private $connection;
		
		function __construct( $singleton ){
			$this ->connection = $singleton;
		}
		
		function show(  ){
			$query = "select * from teacher";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			while( $row = $result -> fetch_assoc( ) ){
				$rows[ ] = $row;
			}
			return $rows;
		}
		
		
	}
?>
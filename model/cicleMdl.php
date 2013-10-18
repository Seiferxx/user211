<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class cicleMdl{
		
		private $connection;
		private $query;
		
		public function __construct( $singleton  ){
			$this -> connection = $singleton;
		}
		
		public function show(  ){
			$this -> query = "select * from cicle";
			$result =  $this -> connection -> query( $this -> query ) or die( "DB Error: Query" );
			while( $row = $result -> fetch_assoc( ) ){
				$rows[ ] = $row;
			}
			return $rows;
		}
	}


?>
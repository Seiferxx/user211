<?php
	
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class alumnMdl{
		
		private $connection;

		public function __construct( $singleton ){
			$this -> connection = $singleton;
		}

		public function getCareers( ){
			$query = "select * from career";
			$result = $this -> connection -> query( $query );
			while( $row = $result -> fetch_assoc( ) ){
				$rows[ ] = $row;
			}
			return $rows;	
		}

	}


?>

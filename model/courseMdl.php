<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class courseMdl{
		
		private $connection;
		private $query;
		
		public function __construct( $singleton  ){
			$this -> connection = $singleton;
		}
		
		public function show( $teacher ){
			$this -> query = "select s1.id, course.course, cicle.cicle, ( select count( * ) from evaluation where course = s1.course ) as alumns from class as s1 inner join cicle on cicle.id = s1.cicle inner join course on s1.course = course.id where teacher = $teacher";
			$result =  $this -> connection -> query( $this -> query ) or die( "DB Error: Query" );
			$rows = array( );
			while( $row = $result -> fetch_assoc( ) ){
				$rows[ ] = $row;
			}
			return $rows;
		}
		
	}


?>
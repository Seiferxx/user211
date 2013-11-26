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
		
		public function addCicle( $cicle, $startDate, $endDate ){
			$this -> query = "insert into cicle( cicle, start_date, end_date ) values( \"".$cicle."\", \"".$startDate."\",\"".$endDate."\")";
			$result = $this -> connection -> query( $this -> query ) or die( "DB Error: Query" );
			return $result;
		}
		
		public function addDay( $cicle, $day, $reason ){
			$this -> query = "insert into free_days( cicle, day, reason ) values ( ".$cicle.", \"".$day."\",\"".$reason."\")";
			$result = $this -> connection -> query( $this -> query ) or die( "DB Error: Query" );
			return $result;
		}
		
		public function getCicleId( $cicleId ){
			$this -> query = "select id from cicle where cicle = \"".$cicleId."\"";
			$result =  $this -> connection -> query( $this -> query ) or die( "DB Error: Query" );
			$row = $result -> fetch_array( );
			return $row[ 0 ];
		}
		
	}


?>
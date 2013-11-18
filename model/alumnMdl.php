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
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			while( $row = $result -> fetch_assoc( ) ){
				$rows[ ] = $row;
			}
			return $rows;	
		}
		
		public function addAlumn( $name, $phone, $mail, $career, $state, $code ){
			$query = "insert into alumn ( id, name, career, mail, state ) values( ".$code.", \"".$name."\", ".$career.", \"".$mail."\", ".$state."  )";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			return $result;
		}

		public function addAcount( $acount, $password ){
			$query = "insert into acount ( type ,acount, password ) values( 3, \"".$acount."\", \"".$password."\" )";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			return $result;
		}
		
		public function addExtraValue( $value, $alumnId, $type ){
			$query = "insert into alumn_extra values( ".$alumnId.", ".$type.", \"".$value."\" )";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			return $result;
		}
		
		public function getAlumns( ){
			$query = "select name, id, mail from alumn";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			while( $row = $result -> fetch_assoc( ) ){
				$rows[ ] = $row;
			}
			return $rows;
		}
	}


?>

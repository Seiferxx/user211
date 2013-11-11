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
		
		public function show(  ){
			$query = "select * from teacher";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			while( $row = $result -> fetch_assoc( ) ){
				$rows[ ] = $row;
			}
			return $rows;
		}
		
		public function addTeacher( $name, $mail, $phone, $code ){
			$query = "insert into teacher ( name, mail, phone, id ) values( \"".$name."\", \"".$mail."\", \"".$phone."\", ".$code .")";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			return $result;
		}
		
		public function addAcount( $acount, $password ){
			$query = "insert into acount ( type ,acount, password ) values( 2, \"".$acount."\", \"".$password."\" )";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query2" );
			return $result;
		}
		
	}
?>
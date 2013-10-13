<?php
	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class loginMdl{
		
		private $connection;
		private $query;
		
		public function __construct( $connection ){
			$this -> connection = $connection;
		}
		
		public function authenticate( $user, $passwd ){
			$this -> query = "select acount.password, acount_type.type from acount inner join acount_type on acount.type = acount_type.id  where acount = \"".$user."\";";
			$result =  $this -> connection -> query( $this -> query ) or die( "DB Error: Query" );
			$row = $result -> fetch_row( );
			$db_key = $row[ 0 ];
			$type = $row[ 1 ];
			if( $db_key === $passwd ){
				echo "vato reatudo";
			}
			else{
				echo "enviar al inicio y mostrar error";
			}
		}
	}
?>
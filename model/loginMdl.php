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
			$dbKey = $row[ 0 ];
			$type = $row[ 1 ];
			if( $dbKey == $passwd ){
				switch( $type ){
					case "ADMINISTRATOR":
						header( "Location: ./index.php?control=admin&action=index" );
						break;
					case "TEACHER":
						break;
					case "ALUMN":
						break;
				}
			}
			else{
				echo "enviar al inicio y mostrar error";
			}
		}
		
		public function passwdRecovery( $mail ){
			$this -> query = "select mail from teacher where mail = ".$mail.";";
			$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
			if( $result ){
				
			}
			else{
				$this -> query = "select mail from alumn where mail = ".$mail.";";
				$result = $this -> connection -> query( $query ) or die( "DB Error: Query" );
				if( $result ){
					
				}
				else{
					
				}
			}
			
		}
	}
?>
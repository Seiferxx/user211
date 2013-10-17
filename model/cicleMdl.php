<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class cicleMdl{
		
		private $connection;
		
		public function __construct( $singleton  ){
			$this -> connection = $singleton;
		}
		
		public function show(  ){
			$query = "select * from cicle ";
			require_once( "./view/empty.html" );
			require_once( "./controller/httpData.php" );
			echo $documentHeader;
			echo $documentFooter;
		}
	}


?>
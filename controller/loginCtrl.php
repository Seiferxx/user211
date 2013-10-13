<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class loginCtrl{
		
		function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "authenticate":
					$user = $_POST[ "user" ];
					$passwd = $_POST[ "passwd" ];
					require_once( "./model/loginMdl.php" );
					$loginM = new loginMdl( $singleton );
					$loginM -> authenticate( $user, sha1( $passwd ) );
					break;
				case "signIn":
					require_once( "./view/loginView.html" );
					break;
				default:	
			}	
		}
	}

?>
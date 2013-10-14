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
					$passwd = sha1( $_POST[ "passwd" ] );
					require_once( "./model/loginMdl.php" );
					$loginM = new loginMdl( $singleton );
					$loginM -> authenticate( $user, $passwd );
					break;
				case "signIn":
					require_once( "./view/loginView.html" );
					break;
				case "passwdRecovery":
					require_once( "./view/passwdRecoveryView.html" );
					break;
				case "sendPasswd":
					$mail = $_POST[ "mail" ];
					require_once( "./model/loginMdl.php" );
					$loginM = new loginMdl( $singleton );
					$loginM -> passwdRecovery( $mail );
					break;
				default:
					require_once( "./view/404.html" );	
			}	
		}
	}

?>
<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/

	class loginCtrl{
		
		public function run( $singleton ){
			switch( $_GET[ "action" ] ){
				case "authenticate":
					$user = $_POST[ "user" ];
					$passwd = sha1( $_POST[ "passwd" ] );
					require_once( "./model/loginMdl.php" );
					$loginM = new loginMdl( $singleton );
					$result = $loginM -> authenticate( $user, $passwd );
					$row = $result -> fetch_row( );
					$dbKey = $row[ 0 ];
					$type = $row[ 1 ];
					if( $dbKey == $passwd ){
						session_start( );
						switch( $type ){
							case "ADMINISTRATOR":
								header( "Location: ./index.php?control=admin&action=index" );
								$_SESSION[ "user" ] = $user;
								$_SESSION[ "key" ] = "lockpick";
								break;
							case "TEACHER":
								header( "Location: ./index.php?control=teacher&action=index" );
								$_SESSION[ "user" ] = $user;
								$_SESSION[ "key" ] = "philips";
								break;
							case "ALUMN":
								header( "Location: ./index.php?control=alumn&action=index" );
								$_SESSION[ "user" ] = $user;
								$_SESSION[ "key" ] = "waxKey";
								break;
						}
					}
					else{
						echo "Implementar pantalla de inicio y error de acceso";
					}
					break;
				case "signIn":
					session_start( );
					if( !isset( $_SESSION[ 'user' ] ) ){
						require_once( "./view/loginView.html" );
					}
					else{
						switch( $_SESSION[ 'key' ] ){
							case "lockpick":
								header( "Location: ./index.php?control=admin&action=index" );
								break;
							case "philips":
								header( "Location: ./index.php?control=teacher&action=index" );
								break;
							case "ALUMN":
								header( "Location: ./index.php?control=alumn&action=index" );
								break;
						}
					}
					break;
				case "passwdRecovery":
					require_once( "./view/passwdRecoveryView.html" );
					break;
				case "sendPasswd":
					$mail = $_POST[ "mail" ];
					require_once( "./model/loginMdl.php" );
					$loginM = new loginMdl( $singleton );
					$result = $loginM -> passwdTeacherRecovery( $mail );
					if( $result ){
						echo "Implementar envio de mensaje a correo electronico";
					}
					else{
						$result = $loginM -> passwdAlumnRecovery( $mail );
						if( $result ){
							echo "Implementar envio de mensaje a correo electronico";
						}
						else{
							echo "Implementar pantalla de error para correo inexistente";	
						}
					}
					break;
				default:
					require_once( "./view/404.html" );	
			}	
		}
	}

?>

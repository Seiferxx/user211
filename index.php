<?php

	/*Universidad de Guadalajara
	*Centro Universitario de Ciencias Exactas e Ingenierias
	*Programacion Web
	*Sistema Universitario de Control Escolar SUCE
	*Cuauhtemoc Herrera Muñoz
	*/
	
	require_once( "./model/dbMan.php" );
	require_once( "./controller/config.inc" );
	$singleton = dbMan::getInstance( $user, $passwd, $database, $server );
	
	switch( $_GET[ "control" ] ){
		case "login":
			require_once( "./controller/loginCtrl.php" );
			$login = new loginCtrl(  );
			$login -> run( $singleton );
			break;
		case "admin":
			require_once( "./controller/adminCtrl.php" );
			$admin = new adminCtrl( );
			$admin -> run( $singleton );
			break;
		case "cicle":
			require_once( "./controller/cicleCtrl.php" );
			$cicle = new cicleCtrl( );
			$cicle -> run( $singleton );
			break;
		case "alumn":
			require_once( "./controller/alumnCtrl.php" );
			$alumn = new alumnCtrl( );
			$alumn -> run( $singleton );
			break;
		case "teacher":
			require_once( "./controller/teacherCtrl.php" );
			$teacher = new teacherCtrl( );
			$teacher -> run( $singleton );
			break;
		default:
			require_once( "./view/404.html" );
	}
?>

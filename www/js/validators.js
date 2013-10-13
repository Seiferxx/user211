/*Universidad de Guadalajara
*Centro Universitario de Ciencias Exactas e Ingenierias
*Programacion Web
*Sistema Universitario de Control Escolar SUCE
*Cuauhtemoc Herrera Muñoz
*/

function login_validator( ){
	if( document.getElementById( "errorLine" ) == null ){
		var title = document.getElementById( "lostPasswd" );
		var cleaner = document.createElement( "div" );
		var err = document.createElement( "p" );
		cleaner.setAttribute( "class", "cleaner" );
		err.setAttribute( "class", "errorLine" );
		err.setAttribute( "id", "errorLine" );
		err.appendChild( document.createTextNode( "" ) );
		title.parentNode.insertBefore( err, title.nextSibling );
		title.parentNode.insertBefore( cleaner, title.nextSibling );
	}
	var errLine = document.getElementById( "errorLine" );
	var usr = document.getElementById( "user" );
	var passwd = document.getElementById( "passwd" );
	var regex = /\w+/;
	var error1 = document.createTextNode( "Usuario invalido" );
	var error2 = document.createTextNode( "Debes especificar un nombre de usuario" );
	var error3 = document.createTextNode( "Debes especificar una contraseña" );
	if ( usr.value.match( regex ) == null){
		if( usr.value.length == 0 ){
			errLine.replaceChild( error2, errLine.firstChild );
		}
		else{
			errLine.replaceChild(  error1, errLine.firstChild );
		}
	}
	else if( passwd.value.length == 0 ){
		errLine.replaceChild( error3, errLine.firstChild );
	}
	else{
		document.fLogin.submit( );
	} 
}
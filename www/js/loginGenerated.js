window.onload = function (){
	var title = document.getElementById( "lostPasswd" );
	var cleaner = document.createElement( "div" );
	var err = document.createElement( "p" );
	cleaner.setAttribute( "class", "cleaner" );
	err.setAttribute( "class", "errorLine" );
	err.setAttribute( "id", "errorLine" );
	err.appendChild( document.createTextNode( "Error de login, usuario o contraseña incorrectos" ) );
	title.parentNode.insertBefore( err, title.nextSibling );
	title.parentNode.insertBefore( cleaner, title.nextSibling );
}

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

function passwdRecoveryValidator( ){
	if( document.getElementById( "errorLine" ) == null ){
		var cleaner = document.createElement( "div" );
		var err = document.createElement( "p" );
		var button = document.getElementById( "endButton" );
		cleaner.setAttribute( "class", "cleaner" );
		err.setAttribute( "class", "errorLine" );
		err.setAttribute( "id", "errorLine" );
		err.appendChild( document.createTextNode( "" ) );
		button.parentNode.appendChild( cleaner );
		button.parentNode.appendChild( err );
	}
	var errLine = document.getElementById( "errorLine" );
	var mail = document.getElementById( "mail" );
	var regex = /(\w+(\.|\-)?)+@(\w+(\.|\-)?)+/;
	var error1 = document.createTextNode( "Correo Invalido" );
	if ( mail.value.match( regex ) == null ){
		errLine.replaceChild(  error1, errLine.firstChild );
	}
	else{
		document.fRecovery.submit( );
	} 
}

function cicleValidatorNew(){	
	var ab = document.getElementById( "ab" );
	var year = document.getElementById( "year" );
	var init = document.getElementById( "init" );
	var end = document.getElementById( "end" );
	var body = document.getElementById( "tableBody" );
	
	//Validacion de fechas
	
	
	if( body != null ){
		
	}
	else{
		
	}
	
	
	//If everything ok do the submit
}

function alumnValidator( ){
	if( document.getElementById( "errorName" ) == null ){
		var errorName = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var name = document.getElementById( "name" );
		cleaner.setAttribute( "class", "cleaner" );
		errorName.setAttribute( "class", "errorLine" );
		errorName.setAttribute( "id", "errorName" );
		errorName.appendChild( document.createTextNode( "" ) );
		name.parentNode.insertBefore( errorName, name.nextSibling );
		name.parentNode.insertBefore( cleaner, name.nextSibling );
	}
	if( document.getElementById( "errorCode" ) == null ){
		var errorCode = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var code = document.getElementById( "code" );
		cleaner.setAttribute( "class", "cleaner" );
		errorCode.setAttribute( "class", "errorLine" );
		errorCode.setAttribute( "id", "errorCode" );
		errorCode.appendChild( document.createTextNode( "" ) );
		code.parentNode.insertBefore( errorCode, code.nextSibling );
		code.parentNode.insertBefore( cleaner, code.nextSibling );
	}
	if( document.getElementById( "errorPhone" ) == null ){
		var errorPhone = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var phone = document.getElementById( "phone" );
		cleaner.setAttribute( "class", "cleaner" );
		errorPhone.setAttribute( "class", "errorLine" );
		errorPhone.setAttribute( "id", "errorPhone" );
		errorPhone.appendChild( document.createTextNode( "" ) );
		phone.parentNode.insertBefore( errorPhone, phone.nextSibling );
		phone.parentNode.insertBefore( cleaner, phone.nextSibling );
	}
	if( document.getElementById( "errorMail" ) == null ){
		var errorMail = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var mail = document.getElementById( "mail" );
		cleaner.setAttribute( "class", "cleaner" );
		errorMail.setAttribute( "class", "errorLine" );
		errorMail.setAttribute( "id", "errorMail" );
		errorMail.appendChild( document.createTextNode( "" ) );
		mail.parentNode.insertBefore( errorMail, mail.nextSibling );
		mail.parentNode.insertBefore( cleaner, mail.nextSibling );
	}
	if( document.getElementById( "errorGit" ) == null ){
		var errorGit = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var git = document.getElementById( "git" );
		cleaner.setAttribute( "class", "cleaner" );
		errorGit.setAttribute( "class", "errorLine" );
		errorGit.setAttribute( "id", "errorGit" );
		errorGit.appendChild( document.createTextNode( "" ) );
		git.parentNode.insertBefore( errorGit, git.nextSibling );
		git.parentNode.insertBefore( cleaner, git.nextSibling );
	}
	if( document.getElementById( "errorWeb" ) == null ){
		var errorWeb = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var web = document.getElementById( "web" );
		cleaner.setAttribute( "class", "cleaner" );
		errorWeb.setAttribute( "class", "errorLine" );
		errorWeb.setAttribute( "id", "errorWeb" );
		errorWeb.appendChild( document.createTextNode( "" ) );
		web.parentNode.insertBefore( errorWeb, web.nextSibling );
		web.parentNode.insertBefore( cleaner, web.nextSibling );
	}
	if( document.getElementById( "errorCel" ) == null ){
		var errorCel = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var cel = document.getElementById( "cel" );
		cleaner.setAttribute( "class", "cleaner" );
		errorCel.setAttribute( "class", "errorLine" );
		errorCel.setAttribute( "id", "errorCel" );
		errorCel.appendChild( document.createTextNode( "" ) );
		cel.parentNode.insertBefore( errorCel, cel.nextSibling );
		cel.parentNode.insertBefore( cleaner, cel.nextSibling );
	}
	
	var name = document.getElementById( "name" );
	var acount = document.getElementById( "acount" );
	var phone = document.getElementById( "phone" );
	var code = document.getElementById( "code" );
	var mail = document.getElementById( "mail" );
	var web = document.getElementById( "webCheck" );
	var git = document.getElementById( "gitCheck" );
	var cel = document.getElementById( "celCheck" );
	
	var nameRegex = /(\w+(\s)?)+/;
	var numberRegex = /\d+/;
	var mailRegex = /(\w+(\.|\-)?)+@(\w+(\.\-)?)+/;
	
	var error1 = "Campo obligatorio";
	var error2 = document.createTextNode( "Nombre invalido" );
	var error4 = document.createTextNode( "Codigo invalido" );
	var error5 = document.createTextNode( "Telefono invalido" );
	var error6 = document.createTextNode( "Correo invalido" );
	var error7 = "Pagina invalida";
	var error8 = "Cuenta invalida, formato <github.com/user>";
	var error9 = "Celular invalido";
	
	var flag = false;
	
	if( name.value.match( nameRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorName" );
		if( name.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild( error2, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorName" );
		err.parentNode.removeChild( err );
	}
	if( phone.value.match( numberRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorPhone" ); 
		if( phone.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild( error5, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorPhone" );
		err.parentNode.removeChild( err );
	}
	if( code.value.match( numberRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorCode" ); 
		if( code.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild( error4, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorCode" );
		err.parentNode.removeChild( err );
	}
	if( mail.value.match( mailRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorMail" ); 
		if( mail.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild(  error6, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorMail" );
		err.parentNode.removeChild( err );
	}
	if( web.checked ){
		var field = document.getElementById( "web" );
		var regex = /(\w+(\.|\/)?)+/;
		var err = document.getElementById( "errorWeb" );
		if( field.value.match( regex ) == null ){
			flag = true;
			err.replaceChild( document.createTextNode( error7 ), err.firstChild );
		}
		else{
			err.parentNode.removeChild( err );
		}
	}
	else{
		var err = document.getElementById( "errorWeb" );
		err.parentNode.removeChild( err );
	}
	if( cel.checked ){
		var field = document.getElementById( "cel" );
		var err = document.getElementById( "errorCel" );
		if( field.value.match( numberRegex ) == null ){
			flag = true;
			err.replaceChild( document.createTextNode( error9 ), err.firstChild );
		}
		else{
			err.parentNode.removeChild( err );
		}
	}
	else{
		var err = document.getElementById( "errorCel" );
		err.parentNode.removeChild( err );
	}
	if( git.checked){
		var regex = /github\.com\/[\w]+/;
		var field = document.getElementById( "git" );
		var err = document.getElementById( "errorGit" );
		if( field.value.match( regex ) == null ){
			flag = true;
			err.replaceChild( document.createTextNode( error8 ), err.firstChild );
		}
		else{
			err.parentNode.removeChild( err );
		}
	}
	else{
		var err = document.getElementById( "errorGit" );
		err.parentNode.removeChild( err );
	}
	if( !flag ){
		document.form.submit( );
	}
}


function teacherValidator( ){
	if( document.getElementById( "errorName" ) == null ){
		var errorName = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var name = document.getElementById( "name" );
		cleaner.setAttribute( "class", "cleaner" );
		errorName.setAttribute( "class", "errorLine" );
		errorName.setAttribute( "id", "errorName" );
		errorName.appendChild( document.createTextNode( "" ) );
		name.parentNode.insertBefore( errorName, name.nextSibling );
		name.parentNode.insertBefore( cleaner, name.nextSibling );
	}
	if( document.getElementById( "errorCode" ) == null ){
		var errorCode = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var code = document.getElementById( "code" );
		cleaner.setAttribute( "class", "cleaner" );
		errorCode.setAttribute( "class", "errorLine" );
		errorCode.setAttribute( "id", "errorCode" );
		errorCode.appendChild( document.createTextNode( "" ) );
		code.parentNode.insertBefore( errorCode, code.nextSibling );
		code.parentNode.insertBefore( cleaner, code.nextSibling );
	}
	if( document.getElementById( "errorPhone" ) == null ){
		var errorPhone = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var phone = document.getElementById( "phone" );
		cleaner.setAttribute( "class", "cleaner" );
		errorPhone.setAttribute( "class", "errorLine" );
		errorPhone.setAttribute( "id", "errorPhone" );
		errorPhone.appendChild( document.createTextNode( "" ) );
		phone.parentNode.insertBefore( errorPhone, phone.nextSibling );
		phone.parentNode.insertBefore( cleaner, phone.nextSibling );
	}
	if( document.getElementById( "errorMail" ) == null ){
		var errorMail = document.createElement( "p" );
		var cleaner = document.createElement( "div" );
		var mail = document.getElementById( "mail" );
		cleaner.setAttribute( "class", "cleaner" );
		errorMail.setAttribute( "class", "errorLine" );
		errorMail.setAttribute( "id", "errorMail" );
		errorMail.appendChild( document.createTextNode( "" ) );
		mail.parentNode.insertBefore( errorMail, mail.nextSibling );
		mail.parentNode.insertBefore( cleaner, mail.nextSibling );
	}
	
	var name = document.getElementById( "name" );
	var phone = document.getElementById( "phone" );
	var code = document.getElementById( "code" );
	var mail = document.getElementById( "mail" );
	
	var nameRegex = /(\w+(\s)?)+/;
	var acountRegex = /\w+\.\w+/;
	var numberRegex = /\d+/;
	var mailRegex = /(\w+(\.|\-)?)+@(\w+(\.\-)?)+/;
	
	var error1 = "Campo obligatorio";
	var error2 = document.createTextNode( "Nombre invalido" );
	var error4 = document.createTextNode( "Codigo invalido" );
	var error5 = document.createTextNode( "Telefono invalido" );
	var error6 = document.createTextNode( "Correo invalido" );
	
	var flag = false;
	
	if( name.value.match( nameRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorName" );
		if( name.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild( error2, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorName" );
		err.parentNode.removeChild( err );
	}
	if( phone.value.match( numberRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorPhone" ); 
		if( phone.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild( error5, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorPhone" );
		err.parentNode.removeChild( err );
	}
	if( code.value.match( numberRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorCode" ); 
		if( code.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild( error4, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorCode" );
		err.parentNode.removeChild( err );
	}
	if( mail.value.match( mailRegex ) == null ){
		flag = true;
		var err = document.getElementById( "errorMail" ); 
		if( mail.value.length == 0 ){
			err.replaceChild( document.createTextNode( error1 ), err.firstChild );
		}
		else{
			err.replaceChild(  error6, err.firstChild );
		}
	}
	else{
		var err = document.getElementById( "errorMail" );
		err.parentNode.removeChild( err );
	}
	if( !flag ){
		document.form.submit( );
	}
}
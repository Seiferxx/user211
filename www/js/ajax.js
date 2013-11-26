/*Universidad de Guadalajara
*Centro Universitario de Ciencias Exactas e Ingenierias
*Programacion Web
*Sistema Universitario de Control Escolar SUCE
*Cuauhtemoc Herrera Muñoz
*/

function createAjax( ){
	var xmlhttp = false;
	try{
		xmlhttp = new ActiveXObject( "Msxml2.XMLHTTP" );
	}
	catch( exception ){
		try{
			xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );
		}
		catch( exception ){
			if( !xmlhttp && typeof( XMLHttpRequest ) != "undefined" ){
				xmlhttp = new XMLHttpRequest( );
			}
		}
	}
	return xmlhttp;
}

function getCicleData( id ){
	var ajax = createAjax( );
	ajax.open( "post", "./model/ajaxCicleData.php", true );
	ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
	ajax.onreadystatechange = function( ){
		if( ajax.readyState == 4 ){
			var json = eval( ajax.responseText );
			alert( json ); 
		}
	}
	ajax.send( "id="+id );
}







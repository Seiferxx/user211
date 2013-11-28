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
			var container = document.getElementById( "dataContainer" );
			var title = document.createElement( "h4" );
			var flag = false;
			title.appendChild( document.createTextNode( "Dias libres" ) );
			container.appendChild( title );
			for( i in json ){
				flag = true;
				container.appendChild( document.createTextNode( "Dia: "+json[ i ].day ) );
				container.appendChild( document.createElement( "br" ) );
				container.appendChild( document.createTextNode( "Razon: "+json[ i ].reason ) );
				container.appendChild( document.createElement( "br" ) );
				container.appendChild( document.createElement( "br" ) );
			}
			if( !flag ){
				container.appendChild( document.createTextNode( "Este Ciclo Escolar no contiene ningun dia libre" ) );
			}
		}
	}
	ajax.send( "id="+id ); 
}

function getCicleEdit( id ){
	var ajax = createAjax( );
	ajax.open( "post", "./model/ajaxCicleEdit.php", true );
	ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
	ajax.onreadystatechange = function( ){
		if( ajax.readyState == 4 ){
			var json = eval( ajax.responseText );
			
		}
	}
	ajax.send( "id="+id ); 
}









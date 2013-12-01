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
			var year = document.getElementById( "year" );
			year.setAttribute( "value", json[ 0 ].cicle.substring( 0, 4 ) );
			var ab = document.getElementById( "ab" );
			if( json[ 0 ].cicle.substring( 4, 5 ) == "B" ){
				ab.selectedIndex = 1;
			}
			else{
				ab.selectedIndex = 0;
			}
			var init = document.getElementById( "init" );
			init.setAttribute( "value", json[ 0 ].start_date );
			var end = document.getElementById( "end" );
			end.setAttribute( "value", json[ 0 ].end_date );
		}
	}
	ajax.send( "id="+id );
	getCicleEdit2( id );
}

function getCicleEdit2( id ){
	var ajax = createAjax( );
	ajax.open( "post", "./model/ajaxCicleEdit2.php", true );
	ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
	ajax.onreadystatechange = function( ){
		if( ajax.readyState == 4 ){
			var json = eval( ajax.responseText );
			for( i in json ){
				if( document.getElementById( "freeDays" ) == null ){
					var button = document.getElementById( "addD" ).parentNode;
					var dayTable = document.createElement( "table" );
					dayTable.setAttribute( "id", "freeDays" );
					var header = document.createElement( "thead" );
					dayTable.appendChild( header );
					var headerRow =  document.createElement( "tr" );
					var headerColumn1 = document.createElement( "th" );
					headerColumn1.appendChild( document.createTextNode( "Dia" ) );
					var headerColumn2 = document.createElement( "th" );
					headerColumn2.appendChild( document.createTextNode( "Razon" ) );
					var headerColumn3 = document.createElement( "th" );
					headerColumn3.appendChild( document.createTextNode( "Eliminar" ) );
					headerRow.appendChild( headerColumn1 );
					headerRow.appendChild( headerColumn2 );
					headerRow.appendChild( headerColumn3 );
					header.appendChild( headerRow );
					button.parentNode.insertBefore( dayTable, button.nextSibling );
					var body = document.createElement( "tbody" );
					body.setAttribute( "id", "tableBody" );
					dayTable.appendChild( body );
				}
				var body = document.getElementById( "tableBody" );
				var tRow = document.createElement( "tr" );
				body.appendChild( tRow );
				tRow.setAttribute( "id",  "row" + $( tRow ).index() );
				var day = document.createElement( "td" );
				tRow.appendChild( day );
				var dayInfo = document.createElement( "input" );
				dayInfo.setAttribute( "type", "date" );
				dayInfo.setAttribute( "class", "inputLess" );
				dayInfo.setAttribute( "id",  "day" + $( tRow ).index() );
				dayInfo.setAttribute( "name",  "day" + $( tRow ).index() );
				dayInfo.setAttribute( "value", json[ i ].day )
				day.appendChild( dayInfo );
				var reason = document.createElement( "td" );
				tRow.appendChild( reason );
				var reasonInfo = document.createElement( "input" );
				reasonInfo.setAttribute( "type", "text" );
				reasonInfo.setAttribute( "class", "inputLess" );
				reasonInfo.setAttribute( "id",  "reason" + $( tRow ).index() );
				reasonInfo.setAttribute( "name",  "reason" + $( tRow ).index() );
				reasonInfo.setAttribute( "value", json[ i ].reason );
				reason.appendChild( reasonInfo );
				var del = document.createElement( "td" );
				tRow.appendChild( del );
				var delAction = document.createElement( "input" );
				delAction.setAttribute( "value", "X" );
				delAction.setAttribute( "type", "button" );
				delAction.setAttribute( "onclick", "delDay(" + $( tRow ).index() + ")" );
				del.appendChild( delAction );
			}
		}
	}
	ajax.send( "id="+id );
}









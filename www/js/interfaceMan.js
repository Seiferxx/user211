/*Universidad de Guadalajara
*Centro Universitario de Ciencias Exactas e Ingenierias
*Programacion Web
*Sistema Universitario de Control Escolar SUCE
*Cuauhtemoc Herrera Muñoz
*/

function selectAll( ){
	var i = 0;
	document.getElementById( "master" );
	if( master.checked ){
		for( i = 0 ; i < document.form.elements.length; i++ ){
			if( document.form.elements[i].type == "checkbox" ){
				document.form.elements[i].checked = 1; 
			}
		}
	}
	else{
		for( i = 0 ; i < document.form.elements.length; i++ ){
			if( document.form.elements[i].type == "checkbox" ){
        		document.form.elements[i].checked = 0; 
			}
		}
	}
}

function getChecked( ){
	var elements = new Array( );
	var x = 0;
	for( i = 0 ; i < document.form.elements.length; i++ ){
		if( document.form.elements[i].type == "checkbox" ){
        	if( document.form.elements[i].checked == 1 ){
				elements[ x ] = document.form.elements[ i ].id;
				x = x + 1; 
			} 
		}
	}
	if( x == 0 ){
		//Mostrar mensaje de error
	}
	else{
		//Validar y eliminar elementos
		var response = confirm( "Realmente desea eliminar esos registros?" );
		alert( response ); 
	}
}

function addDay( ){
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
	day.appendChild( dayInfo );
	var reason = document.createElement( "td" );
	tRow.appendChild( reason );
	var reasonInfo = document.createElement( "input" );
	reasonInfo.setAttribute( "type", "text" );
	reasonInfo.setAttribute( "class", "inputLess" );
	reasonInfo.setAttribute( "id",  "reason" + $( tRow ).index() );
	reasonInfo.setAttribute( "name",  "reason" + $( tRow ).index() );
	reason.appendChild( reasonInfo );
	var del = document.createElement( "td" );
	tRow.appendChild( del );
	var delAction = document.createElement( "input" );
	delAction.setAttribute( "value", "X" );
	delAction.setAttribute( "type", "button" );
	delAction.setAttribute( "onclick", "delDay(" + $( tRow ).index() + ")" );
	del.appendChild( delAction );
}

function delDay( position ){
	var i;
	var body = document.getElementById( "tableBody" );
	var elem = "row" + position;
	body.removeChild( document.getElementById( elem ) );
	for( i = 0; i < body.children.length; i++){
		body.children[ i ].children[ 0 ].setAttribute( "id", "row" + $( body.children[ i ] ).index( ) );
		body.children[ i ].children[ 0 ].children[ 0 ].setAttribute( "id", "day" + $( body.children[ i ] ).index( ) );
		body.children[ i ].children[ 0 ].children[ 1 ].setAttribute( "id", "reason" + $( body.children[ i ] ).index( ) );
		body.children[ i ].children[ 0 ].children[ 2 ].setAttribute( "onclick", "delDay(" + $( body.children[ i ] ).index( ) + ")" );
	}
	if( i == 0 ){
		body.parentNode.parentNode.removeChild( body.parentNode );
	}
}

function activateWeb( ){
	var web = document.getElementById( "webCheck" );
	var field = document.getElementById( "web" );
	if( web.checked ){
		field.disabled = false;
	}
	else{
		field.disabled = true;
		field.value=""
	}
}

function activateCel( ){
	var cel = document.getElementById( "celCheck" );
	var field = document.getElementById( "cel" );
	if( cel.checked ){
		field.disabled = false;
	}
	else{
		field.disabled = true;
		field.value=""
	}
}

function activateGit( ){
	var git = document.getElementById( "gitCheck" );
	var field = document.getElementById( "git" );
	if( git.checked ){
		field.disabled = false;
	}
	else{
		field.disabled = true;
		field.value=""
	}
}

function deleteTeacher( id ){
	var _confirm = confirm( "Esta seguro que desea eliminar a este profesor?" );
	if( _confirm ){
		window.location.href="./index.php?control=teacher&action=delete&id=" + id;
	}
}

function editTeacher( id ){
	window.location.href="./index.php?control=teacher&action=edit&id=" + id;
}

function deleteAlumn( id ){
	var _confirm = confirm( "Esta seguro que desea eliminar a este Alumno?" );
	if( _confirm ){
		window.location.href="./index.php?control=alumn&action=delete&id=" + id;
	}
}

function editAlumn( id ){
	window.location.href="./index.php?control=alumn&action=edit&id=" + id;
}

function editCicle( id ){
	window.location.href="./index.php?control=cicle&action=edit&id=" + id;
}

function showDataAlumn( id ){
	var r = document.getElementById( "dataBox" );
	if( r != null ){
		r.parentNode.removeChild( r );
	}
	var element = document.getElementById( id ).parentNode;
	row = element.parentNode;
	var nrow = document.createElement( "tr" );
	nrow.setAttribute( "id", "dataBox" );
	var nelement = document.createElement( "td" );
	nelement.setAttribute( "colspan", "6" );
	nrow.appendChild( nelement );
	row.parentNode.insertBefore( nrow, row.nextSibling );
}

function showDataTeacher( id ){
	var r = document.getElementById( "dataBox" );
	if( r != null ){
		r.parentNode.removeChild( r );
	}
	var element = document.getElementById( id ).parentNode;
	row = element.parentNode;
	var nrow = document.createElement( "tr" );
	nrow.setAttribute( "id", "dataBox" );
	var nelement = document.createElement( "td" );
	nelement.setAttribute( "colspan", "6" );
	nrow.appendChild( nelement );
	row.parentNode.insertBefore( nrow, row.nextSibling );
}

function showDataCicle( id ){
	var r = document.getElementById( "dataBox" );
	if( r != null ){
		r.parentNode.removeChild( r );
	}
	var element = document.getElementById( id ).parentNode;
	row = element.parentNode;
	var nrow = document.createElement( "tr" );
	nrow.setAttribute( "id", "dataBox" );
	var nelement = document.createElement( "td" );
	nelement.setAttribute( "colspan", "6" );
	nelement.setAttribute( "id", "dataContainer" );
	nrow.appendChild( nelement );
	row.parentNode.insertBefore( nrow, row.nextSibling );
	
	getCicleData( id );
}


function step2( ){
	var val = document.getElementById( "n" );
	var n = val.value;
	if( n == "" ){
		//Proceed to finish
		return -1;
	}
	var table = document.createElement( "table" );
	var thead = document.createElement( "thead" );
	var thRow = document.createElement( "tr" );
	var button = document.getElementById( "endButton" );
	var th1 = document.createElement( "th" );
	th1.appendChild( document.createTextNode( "Rubro" ) );
	var th2 = document.createElement( "th" );
	th2.appendChild( document.createTextNode( "Porcentaje" ) );
	var th3 = document.createElement( "th" );
	th3.appendChild( document.createTextNode( "Hoja Extra?" ) );
	var th4 = document.createElement( "th" );
	th4.appendChild( document.createTextNode( "N" ) );
	thRow.appendChild( th1 );
	thRow.appendChild( th2 );
	thRow.appendChild( th3 );
	thRow.appendChild( th4 );
	table.appendChild( thead );
	thead.appendChild( thRow );
	button.parentNode.insertBefore( table, button.nextSibling );
	var nextButton = document.createElement( "input" );
	nextButton.setAttribute( "type", "button" );
	nextButton.setAttribute( "onclick", "step3( )" );
	nextButton.setAttribute( "value", "Siguiente" );
	nextButton.setAttribute( "class", "endButton" );
	table.parentNode.appendChild( nextButton );
	var tbody = document.createElement( "tbody" );
	for( var i = 0; i < parseInt( n ); i++ ){
		var tRow = document.createElement( "tr" );
		var td1 = document.createElement( "td" );
		var td2 = document.createElement( "td" );
		var td3 = document.createElement( "td" );
		var td4 = document.createElement( "td" );
		var r = document.createElement( "input" );
		r.setAttribute( "id", "r" + i );
		r.setAttribute( "type", "text" );
		var val = document.createElement( "input" );
		val.setAttribute( "id", "val" + i );
		val.setAttribute( "type", "number" );
		val.setAttribute( "min", "0" );
		var extra = document.createElement( "input" );
		extra.setAttribute( "id", "extra" + i );
		extra.setAttribute( "type", "checkbox" );
		extra.setAttribute( "onclick", "activateN( " + i + " )" ); 
		var nr = document.createElement( "input" );
		nr.setAttribute( "id", "nr" + i );
		nr.setAttribute( "type", "number" );
		nr.setAttribute( "min", "0" );
		nr.disabled = true;
		td1.appendChild( r );
		td2.appendChild( val );
		td3.appendChild( extra );
		td4.appendChild( nr );
		tRow.appendChild( td1 );
		tRow.appendChild( td2 );
		tRow.appendChild( td3 );
		tRow.appendChild( td4 );
		tbody.appendChild( tRow );
		table.appendChild( tbody );
		button.parentNode.insertBefore( table, button.nextSibling );
	}
	
}

function step3( ){
	var val = document.getElementById( "n" );
	var n = val.value;
	if( n == "" ){
		//Proceed to finish
		return -1;
	}
	for( var i = 0; i < parseInt( n ); i++ ){
		var elem = document.getElementById( "extra" + i );
		if( elem.checked ){
			var len = document.getElementById( "nr"+ i );
			len = len.value;
			var table = document.createElement( "table" );
			var caption = document.createElement( "caption" );
			caption.appendChild( document.createTextNode( document.getElementById( "r"+ i ).value )   );
			table.appendChild( caption );
    		var thead = document.createElement( "thead" );
    		var thRow = document.createElement( "tr" );
    		var button = document.getElementById( "endButton" );
    		var th1 = document.createElement( "th" );
    		th1.appendChild( document.createTextNode( "Rubro" ) );
    		var th2 = document.createElement( "th" );
    		th2.appendChild( document.createTextNode( "Porcentaje" ) );
    		thRow.appendChild( th1 );
    		thRow.appendChild( th2 );
    		table.appendChild( thead );
    		thead.appendChild( thRow );
    		button.parentNode.appendChild( table );
    		tbody = document.createElement( "tbody" );
    		for( var j = 0; j < len; j++ ){
    			var tRow = document.createElement( "tr" );
    			var td1 = document.createElement( "td" );
    			var td2 = document.createElement( "td" );
    			var sr = document.createElement( "input" );
    			sr.setAttribute( "id", "sr" + j );
    			sr.setAttribute( "type", "text" );
    			var sval = document.createElement( "input" );
    			sval.setAttribute( "id", "sval" + j );
    			sval.setAttribute( "type", "number" );
    			sval.setAttribute( "min", "0" );
    			td1.appendChild( sr );
    			td2.appendChild( sval );
    			tRow.appendChild( td1 );
    			tRow.appendChild( td2 );
    			tbody.appendChild( tRow );
    			table.appendChild( tbody);
    		}
		}
	}
}

function activateN( n ){
	var field = document.getElementById( "nr" + n );
	var check = document.getElementById( "extra" + n );
	if( check.checked ){
		field.disabled = false;
	}
	else{
		field.disabled = true;
	}
}	
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
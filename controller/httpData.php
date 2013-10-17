<?php

$documentHeader = "
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\"> <!--<![endif]-->
<!-- Universidad de Guadalajara  -->
<!-- Centro Universitario de Ciencias Exactas e Ingenierias -->
<!-- Programacion Web -->
<!-- Sistema Universitario de Control Escolar SUCE -->
<!-- Cuauhtemoc Herrera Muñoz -->

    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
        <title>Sistema Universitario de Control Escolar</title>
        <meta name=\"description\" content=\"\">
        <meta name=\"viewport\" content=\"width=device-width\">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel=\"stylesheet\" href=\"./www/css/normalize.css\">
        <link rel=\"stylesheet\" href=\"./www/css/main.css\">
        <script src=\"./www/js/vendor/modernizr-2.6.2.min.js\"></script>
		<script src=\"./www/js/interfaceMan.js\"></script>
		<script src=\"./www/js/validators.js\"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class=\"chromeframe\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade your browser</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <header>
        	<img src=\"./www/img/lion_logo.gif\" id=\"header_image\"/>
        	<h1 id=\"header_1\">SUCE</h1>
        	<h4 id=\"header_2\">Sistema Universitario de Control Escolar</h4>
        	<div class=\"cleaner\"></div>
        </header>";

$documentFooter = "
	<footer>
        		<div class=\"cleaner\"></div>
        		<img id=\"footer_logo\" src=\"./www/img/udg_logo.png\" />
        		<h1 id=\"footer_info\">Universidad de Guadalajara</h1>
        		<div class=\"cleaner\"></div>
        		<h3 id=\"footer_info2\">2013</h3>
	</footer>
        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
        <script>window.jQuery || document.write('<script src=\"./www/js/vendor/jquery-1.9.1.min.js\"><\/script>')</script>
        <script src=\"./www/js/plugins.js\"></script>
        <script src=\"./www/js/main.js\"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>";

$documentCicleShow = "
	<aside class=\"toolBar\">
		<ul>
    		<li><a href=\"\">Agregar Ciclo</a></li>
    		<li><a href=\"\">Admin</a></li>
    	</ul>
	</aside>
        <section class=\"content\">
        	<h1 class=\"contentTitle\">Ciclos Escolares</h1>
        	<div class=\"cleaner\"></div>
        	<p class=\"contentText\">
        		Esta herramienta le permite agregar ciclos escolares para ser usados por
        		profesores, para cada curso se debe indicar la fecha de inicio y
        		termino y los dias en los que no habra clases incluyendo una breve
        		explicacion sobre las causas.
        		<br>
        		<br>
        		A continuacion se muestran los ciclos registrados.
        	</p>
        	<form class=\"form1\" name=\"form\" method=\"post\" action=\"\">
        		<table>
        			<thead>
        				<tr>
        					<th><input type=\"checkbox\" id=\"master\" onclick=\"selectAll( )\"/></th>
        					<th>Ciclo escolar</th>
        					<th>Editar</th>
        					<th>Eliminar</th>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
        					<td class=\"checker\"><input type=\"checkbox\"/></td>
        					<td>2013A</td>
        					<td><input type=\"button\" value=\"Editar\"/></td>
        					<td><input type=\"button\" value=\"Eliminar\"/></td>
        				</tr>
        				<tr>
        					<td class=\"checker\"><input type=\"checkbox\"/></td>
        					<td>2013B</td>
        					<td><input type="button" value="Editar"/></td>
        					<td><input type="button" value="Eliminar"/></td>
        				</tr>
        				<tr>
        					<td class="checker"><input type="checkbox"/></td>
        					<td>2014A</td>
        					<td><input type="button" value="Editar"/></td>
        					<td><input type="button" value="Eliminar"/></td>
        				</tr>
        			</tbody>
        		</table>
        		<div class="inputPair">
        			<input type="button" value="Eliminar marcados"/>
        			<input type="button" value="Editar marcados"/>
        		</div>
        	</form>
        </section>
        <div class="cleaner"></div>
";



?>


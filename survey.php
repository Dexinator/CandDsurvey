<?php
// Output messages
$response = '';
// Check if the form was submitted
/* 
Pregunta 1 -->Tiempo_de_conocer
Pregunta 2 -->Como_conociste
Pregunta 3 -->Frequency
Pregunta 4 -->Juego_Favorito
Pregunta 5 -->position
Pregunta 6 -->game_suggest
Pregunta 7 -->position2
Pregunta 8 -->Platillos_Preferidos
Pregunta 9 -->Bebidas_Preferidas
Pregunta 10 -->Platillos_Sugerencias
Pregunta 11 -->Recommendar
Pregunta 12 -->Satisfaction
Pregunta 13 -->comments
Pregunta 14 -->email
Pregunta 15 -->Sexo
Pregunta 16 -->Ocupacion
Pregunta 17 -->hijos
Pregunta 18 -->CP
Pregunta 19 -->NEstudios
*/

if ($_POST)
{
	// Process form data 
	// Assign POST variables

	$val = "";
	$val = $val.(isSet($_POST['Tiempo_de_conocer']) ? "" : "Falta Tiempo_de_conocer\n");
	$val = $val.(isSet($_POST['Como_conociste']) ? "" : "Falta Como_conociste\n");
	$val = $val.(isSet($_POST['Frequency']) ? "" : "Falta Frequency\n");
	$val = $val.(isSet($_POST['Juego_Favorito']) ? "" : "Falta Juego_Favorito\n");
	$val = $val.(isSet($_POST['position']) ? "" : "Falta position\n");
	$val = $val.(isSet($_POST['game_suggest']) ? "" : "Falta game_suggest\n");
	$val = $val.(isSet($_POST['position2']) ? "" : "Falta position2\n");
	$val = $val.(isSet($_POST['Platillos_Preferidos']) ? "" : "Falta Platillos_Preferidos\n");
	$val = $val.(isSet($_POST['Bebidas_Preferidas']) ? "" : "Falta Bebidas_Preferidas\n");
	$val = $val.(isSet($_POST['Platillos_Sugerencias']) ? "" : "Falta Platillos_Sugerencias\n");
	$val = $val.(isSet($_POST['Recommendar']) ? "" : "Falta Recommendar\n");
	$val = $val.(isSet($_POST['Satisfaction']) ? "" : "Falta Satisfaction\n");
	$val = $val.(isSet($_POST['comments']) ? "" : "Falta Tiempo_de_conocer\n");
	$val = $val.(isSet($_POST['email']) ? "" : "Falta email\n");
	$val = $val.(isSet($_POST['Sexo']) ? "" : "Falta Sexo\n");
	$val = $val.(isSet($_POST['Ocupacion']) ? "" : "Falta Ocupacion\n");
	$val = $val.(isSet($_POST['hijos']) ? "" : "Falta hijos\n");
	$val = $val.(isSet($_POST['CP']) ? "" : "Falta CP\n");
	$val = $val.(isSet($_POST['NEstudios']) ? "" : "Falta NEstudios\n");


	//$val = $val.(isSet(var1) ? "" : "Var 1 not set");
	//$contact_pref = implode(', ', $_POST['contact_pref']);

	$Tiempo_de_conocer = $_POST['Tiempo_de_conocer'];
	$Como_conociste = $_POST['Como_conociste'];
	$Frequency = $_POST['Frequency'];
	$Juego_Favorito = $_POST['Juego_Favorito'];
	$position = $_POST['position'];
	$game_suggest = implode(', ',$_POST['game_suggest']);
	$position2 = $_POST['position2'];
	$Platillos_Preferidos =implode (', ',$_POST['Platillos_Preferidos']);
	$Bebidas_Preferidas =implode (', ',$_POST['Bebidas_Preferidas']);
	$Platillos_Sugerencias =implode (', ',$_POST['Platillos_Sugerencias']);
	$Recommendar = $_POST['Recommendar'];
	$Satisfaction = $_POST['Satisfaction'];
	$comments = $_POST['comments'];
	$email = $_POST['email'];
	$Sexo = $_POST['Sexo'];
	$Ocupacion = $_POST['Ocupacion'];
	$hijos = $_POST['hijos'];
	$CP = $_POST['CP'];
	$NEstudios = $_POST['NEstudios'];

	//$contact_pref = implode(', ', $_POST['contact_pref']);
	// Where to send the mail? It should be your email address
	$to      = 'badillo.delgado.jorge@gmail.com';
	// Mail from
	$from    = 'gutete@gutetesurveys.com';
	// Mail subject
	$subject = 'A user has submitted a survey';
	// Mail headers
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	// Capture the email template file as a string
	ob_start();
	include 'email-template.php';
	$email_template = ob_get_clean();
	echo 'resultado'.$val;
	if (empty($val)){
		if (mail($to, $subject, $email_template, $headers)) {
		// Success
			echo 'mail enviado';
			$response = '<h3>Thank You!</h3><p>With your help, we can improve our services for all our trusted members.</p>';		
		} else {
		// Fail
			$response = '<h3>Error!</h3><p>Message could not be sent! Please check your mail server settings!</a>';
		}
	}
	else{
		$response = "<h3>$val</h3><p><div class='buttons'><a href='#' class='btn alt' data-set-step='5'>Anterior</a></div>";
	}
	
}
else {
	$response = '<h3>Falla</h3>';
	echo 'Acá valió madre XD';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1">
	<title>Encuesta C&D</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form class="survey-form" method="post" action="">
		<h1> <i class="far fa-list-alt"></i>Encuesta C&D</h1>

		<div class="steps">
			<div class="step current"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>	
		</div>
		<!-- Primera Sección -->

		<div class="step-content current" data-step="1">
			<div class="fields">
				<!-- Pregunta 1 -->
				<p>¿Cuánto tiempo has sido cliente de CnD?</p>
				<div class="group">
					<label for="radio1">
						<input type="radio" name="Tiempo_de_conocer" id="radio1" value="Primera Vez" required >
						Es mi primera vez
					</label>
					<label for="radio2">
						<input type="radio" name="Tiempo_de_conocer" id="radio2" value="Menor a 6 meses">
						Menos de 6 meses
					</label>
					<label for="radio3">
						<input type="radio" name="Tiempo_de_conocer" id="radio3" value="Entre 6 meses y un año">
						6 meses a un año
					</label>		
					<label for="radio4">
						<input type="radio" name="Tiempo_de_conocer" id="radio4" value="Uno a dos años">
						1 - 2 años
					</label>		
					<label for="radio5">
						<input type="radio" name="Tiempo_de_conocer" id="radio5" value="Más de 3 años">
						3 años o más
					</label>	
				</div>	
				<!-- Pregunta 2 -->
				<p>¿Cómo conociste CnD?</p>
				<div class="group">
					<label for="radio6">
						<input type="radio" name="Como_conociste" id="radio6" value="Amigo" required>
						Recomendación de un amigo
					</label>
					<label for="radio7">
						<input type="radio" name="Como_conociste" id="radio7" value="Fachada">
						Vi una sucursal y me llamó la atención
					</label>
					<label for="radio8">
						<input type="radio" name="Como_conociste" id="radio8" value="Social Media">
						Lo vi en redes sociales
					</label>
					<label for="radio9">		
						<input type="radio" name="Como_conociste" value="" onclick="setRequired();" id="other">Otro 
						<input id="inputother" type="text" name="othertext" onchange="changeradioother()">
					</label>
				</div>
				<!-- Pregunta 3 -->	
				<p>¿Qué tan frecuente visitas C&D?</p>
				<div class="group">
					<input type="range" name="Frequency" id="Frecuencia" min="1" max="4" value="2" step="1" onChange="change();"> <span id="result" style="text-align: center;">De 2 a 3 veces al mes</span>
				</div>	
				<!-- Pregunta 4 -->	
				<p>De esta lista, ¿cuál es el juego que más te gusta?</p>
				<div>
					<select name="Juego_Favorito" id="JFavorito" style="text-align: center;">

						<option disabled selected value>Pícale acá</option>
						<option value="Catán">Catán</option>
						<option value="Carcassone">Carcassone</option>
						<option value="Azul">Azul</option>
						<option value="Splendor">Splendor</option>
						<option value="Century">Century: la ruta de las especias</option>
						<option value="King">King of Tokio/King of New York</option>
						<option value="Fantasma">Fantasma blitz</option>
						<option value="Sushi">Sushi go</option>
						<option value="Código">Código secreto</option>
					</select>
				</div>

			</div>
			<div class="buttons">
				<a href="#" class="btn" data-set-step="2">Siguiente</a>
			</div>
		</div>
		<!-- Segunda Sección -->
		<!-- Pregunta 5 -->
		<div class="step-content" data-step="2">
			<div class="fields">
				<p>¿Qué tipos de juegos te gusta más? Donde 1 es el que más te gusta</p>
				<div class="group">

					<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
					<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
					<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
					<ol id="sortable">
						<li id="task_1" class="ui-state-default">Juegos de Rol</li>
						<li id="task_2" class="ui-state-default">Party games o juegos familiares</li>
						<li id="task_3" class="ui-state-default">Deck Builder/TCG</li>
						<li id="task_4" class="ui-state-default">War Games o juegos de miniaturas</li>
						<li id="task_5" class="ui-state-default">Juegos largos y con temática</li>
					</ol>
					<input type="hidden" name="position" id="position" />
				</div>
				<!-- Pregunta 6 -->
				<p>¿De qué tipo de juego te gustaría que hubiera más variedad?</p>

				<div class="group">
					<label for="check1">
						<input type="checkbox" name="game_suggest[]" id="check1" value="Rol">
						Juegos de Rol
					</label>
					<label for="check2">
						<input type="checkbox" name="game_suggest[]" id="check2" value="Party">
						Party games o juegos familiares
					</label>
					<label for="check3">
						<input type="checkbox" name="game_suggest[]" id="check3" value="Deck">
						Deck Builder/TCG 
					</label>		
					<label for="check4">
						<input type="checkbox" name="game_suggest[]" id="check4" value="War">
						War Games o juegos de miniaturas
					</label>
					<label for="check5">
						<input type="checkbox" name="game_suggest[]" id="check5" value="Long">
						Juegos largos y con temática
					</label>

				</div>

				<!-- Pregunta 7 -->
				<p>¿Con qué descipción te identificas más?</p>
				<div class="group">

					<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
					<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
					<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
					<ol id="sortable2" style="text-align: justify">
						<li id="task_6" class="ui-state-default">Me gustan juego rápidos y sencillos, donde lo más importante es pasarlo bien con mis amigos o familiares.</li>
						<li id="task_7" class="ui-state-default">Me gustan los juegos con donde cada jugador lleva su propio juego, pero al final compite por la puntuación más alta.</li>
						<li id="task_8" class="ui-state-default">Prefiero juegos donde se forman equipos que compiten entre sí, ya sea para realizar tareas específicas o de roles secretos. Entre más jugadores mejor.</li>
						<li id="task_9" class="ui-state-default">Mis juegos favoritos son juegos de tarjetas o de guerra donde se pueden utilizar miniaturas.</li>
						<li id="task_10" class="ui-state-default">Las decisiones son muy importantes y puede llegar a ser muy competitivo.</li>
						<li id="task_11" class="ui-state-default">Prefiero cualquier tipo de juego de rol donde puedo crear un personaje a mi elección y vivir muchas aventuras diferentes.</li>
					</ol>
					<input type="hidden" name="position2" id="position2" />
				</div>



			</div>
			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="1">Anterior</a>
				<a href="#" class="btn" data-set-step="3">Siguiente</a>
			</div>
		</div>

		<!-- Sección 3 -->
		<!-- Pregunta 8 -->
		<div class="step-content" data-step="3">
			<div class="fields">
				<p>¿Cuáles son tus platillos favoritos de CnD?</p>
				<div class="group">
					<ul class="foodchecks" id="platillos_1">
						<li><label for="check6">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check6" value="Chapata con carne" >
							Chapata con carne (pollo, atún, pierna a la cerveza)
						</label></li>
						<li><label for="check7">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check7" value="Chapata con embutido">
							Chapata con embutido (roast beaf, jamón, pepeonni)
						</label></li>
						<li><label for="check8">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check8" value="Chapatas sin carne">
							Chapatas sin carne (champiñones, quesos)
						</label></li>		
						<li><label for="check9">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check9" value="Chapapizza">
							Chapapizza
						</label></li>
						<li><label for="check10">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check10" value="Hamburguesa">
							Hamburguesa ogro u ogro de las cavernas
						</label></li>
						<li><label for="check11">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check11" value="Dedo de trol">
							Dedo de trol o dedo de momia
						</label></li>
						<li><label for="check12">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check12" value="Papas">
							Papas a la francesa o gajo
						</label>	</li>	
						<li><label for="check13">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check13" value="Pizza">
							Pizza
						</label></li>	
					</ul>
					<a href="#" id="add"  style="text-align: center;">Agregar</a>

					<a href="#" id="remove" style="text-align: center;" >Quitar</a>

					<ul class="foodchecks" style="display:inline-block;" id="platillos_2">
						
					</ul>

					<script>
						$('#add').click(function() {
							return !$('#platillos_1 li :checked').closest('li').appendTo('#platillos_2');
						});
						$('#remove').click(function() {
							return !$('#platillos_2 li :checked').closest('li').appendTo('#platillos_1');
						});

					</script>


				</div>
				<!-- Pregunta 9 -->
				<p>¿Cuáles son tus bebidas favoritas de CnD?</p>
				<div class="group">
					<ul class="foodchecks" id="bebidas_1">
						<li><label for="check14">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check14" value="Sodas italianas" >
							Sodas italianas (varios sabores) o bebida mineralizada (mangada, limonada, naranjada)
						</label></li>
						<li><label for="check15">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check15" value="Sangre goblin">
							Sangre goblin (jugo de uva arándano)
						</label></li>
						<li><label for="check16">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check16" value="Flotantes">
							Flotantes (varios sabores) o chamoyada
						</label></li>		
						<li><label for="check17">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check17" value="Malteadas">
							Malteadas
						</label></li>
						<li><label for="check18">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check18" value="Café">
							Café o capuchino
						</label></li>
						<li><label for="check19">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check19" value="Cervezas Arte">
							Cervezas artesanales
						</label></li>
						<li><label for="check20">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check20" value="Cervezas Comer">
							Cervezas comerciales
						</label>	</li>	
						<li><label for="check21">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check21" value="Refrescos">
							Refrescos (varios sabores)
						</label></li>	
					</ul>

					<a href="#" id="add2"  style="text-align: center;">Agregar</a>

					<a href="#" id="remove2" style="text-align: center;" >Quitar</a>

					<ul class="foodchecks" style="display:inline-block;" id="bebidas_2">
						
					</ul>

					<script>
						$('#add2').click(function() {
							return !$('#bebidas_1 li :checked').closest('li').appendTo('#bebidas_2');
						});
						$('#remove2').click(function() {
							return !$('#bebidas_2 li :checked').closest('li').appendTo('#bebidas_1');
						});

					</script>

				</div>
				<!-- Pregunta  10-->
				<p>¿Qué te gustaría que agregáramos al menú?</p>
				<div class="group">
					<ul class="foodchecks">
						<li><label for="check22">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check22" value="Rol">
							Más opciones de chapatas
						</label></li>
						<li><label for="check23">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check23" value="Deck">
							Hamburguesas de pollo o club sándwich
						</label></li>
						<li><label for="check24">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check24" value="War">
							Más opciones de botana (dedos de queso, aros de cebolla, etc.)
						</label></li>		
						<li><label for="check25">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check25" value="Estrategia">
							Ensaladas o platillos con vegetales
						</label></li>
						<li><label for="check26">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check26" value="Rol">
							Agua/bebida del día
						</label></li>
						<li><label for="check27">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check27" value="Deck">
							Más sabores de sodas italianas
						</label></li>
						<li><label for="check28">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check28" value="War">
							Más opciones de refrescos
						</label>	</li>	
						<li><label for="check29">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check29" value="Estrategia">
							Más opciones de salsas y aderezos para acompañar los platillos
						</label></li>	
					</ul>
				</div>
			</div>
			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="2">Anterior</a>
				<a href="#" class="btn" data-set-step="4">Siguiente</a>
			</div>
		</div>

		<!-- Sección 4-->
		<div class="step-content" data-step="4">
			<div class="fields">
				<!-- Pregunta  9-->
				<p>¿Qué tan probable es que recomiendes CnD a tus amigos?</p>
				<div class="rating">
					<input type="radio" name="Recommendar" id="radio10" value="0">
					<label for="radio10">1</label>
					<input type="radio" name="Recommendar" id="radio11" value="1">
					<label for="radio11">2</label>
					<input type="radio" name="Recommendar" id="radio12" value="2">
					<label for="radio12">3</label>
					<input type="radio" name="Recommendar" id="radio13" value="3">
					<label for="radio13">4</label>
					<input type="radio" name="Recommendar" id="radio14" value="4">
					<label for="radio14">5</label>
				</div>
				<div class="rating-footer">
					<span>No, gracias</span>
					<span>Me encanta, lo amo</span>
				</div>
				<p>¿En general, ¿Qué tan satisfecho estás con los servicios que ofrece CnD?</p>
				<div class="group">

					<label for="radio15">
						<input type="radio" name="Satisfaction" id="radio15" value="0" required>
						Me gusta, pero no pasa nada si no lo visito	
					</label>
					<label for="radio16">
						<input type="radio" name="Satisfaction" id="radio16" value="1">
						Me gusta mucho y prefiero jugar en el C&D
					</label>
					<label for="radio17">
						<input type="radio" name="Satisfaction" id="radio17" value="2">
						Es uno de mis lugares preferidos para jugar y/o comer
					</label>
					<label for="radio18">
						<input type="radio" name="Satisfaction" id="radio18" value="3">
						Es mi lugar favorito para jugar con mis amigos
					</label>
					<label for="radio19">
						<input type="radio" name="Satisfaction" id="radio19" value="4">
						Para mí, no existe mejor lugar
					</label>
				</div>
				<label for="comments">¿En qué podríamos mejorar?</label>
				<div class="field">
					<textarea id="comments" name="comments" placeholder="Dinos lo que que quieras ..."></textarea>
				</div>
			</div>

			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="3">Anterior</a>
				<a href="#" class="btn" data-set-step="5">Siguiente</a>
			</div>

		</div>

		<!-- Sección 5-->
		<div class="step-content" data-step="5">
			<div class="fields">
				<label for="email">Correo Electrónico</label>
				<div class="field">
					<i class="fas fa-envelope"></i>
					<input id="email" type="email" name="email" placeholder="Your Email" required>
				</div>
				<label for="bday">Cuándo es tu cumpleaños ;D</label>
				<input type="date" name="bday">

				<p>Sexo</p>
				<div class="group" style="display:inline-block;">
					<label for="radio20" style="display:inline-block;">
						<input type="radio" name="Sexo" id="radio20" value="H" required >
						Hombre
					</label>
					<label for="radio21" style="display:inline-block;">
						<input type="radio" name="Sexo" id="radio21" value="M">
						Mujer
					</label>
				</div>
				<p>Ocupacion</p>
				<div class="group" style="display:inline-block;">
					<label for="radio22" style="display:inline-block;">
						<input type="radio" name="Ocupacion" id="radio22" value="TC" required >
						Empleado de tiempo completo
					</label>
					<label for="radio23" style="display:inline-block;">
						<input type="radio" name="Ocupacion" id="radio23" value="MT">
						Empleado Parcial
					</label>	
					<label for="radio24" style="display:inline-block;">
						<input type="radio" name="Ocupacion" id="radio24" value="AE">
						Autoempleado
					</label>	
					<label for="radio25" style="display:inline-block;">
						<input type="radio" name="Ocupacion" id="radio25" value="ST">
						Estudiante
					</label>	
					<label for="radio26" style="display:inline-block;">
						<input type="radio" name="Ocupacion" id="radio26" value="JU">
						Jubilado
					</label>	
					<label for="radio27" style="display:inline-block;">
						<input type="radio" name="Ocupacion" id="radio27" value="DE">
						Desempleado
					</label>	
				</div>

				<p></p>
				<div class="CP">
					<ul>
						<li><label for="Hijos">¿Cuántos hijos tienes?
							
							<input type="number" id="hijos" name="hijos" min="0" max="20" rquired>
							
						</label>
					</li>
					<li><label for="CP">Código Postal

						<input type="number" min="01" max="99999"  name="CP" required>
					</label></li>
				</ul>
			</div>

			<p>Máxmio nivel escolar</p>
			<div class="group">
				<label for="radio28">
					<input type="radio" name="NEstudios" id="radio28" value="SinE" required >
					Sin estudios
				</label>
				<label for="radio29">
					<input type="radio" name="NEstudios" id="radio29" value="Primaria">
					Primaria
				</label>	
				<label for="radio30">
					<input type="radio" name="NEstudios" id="radio30" value="Secundaria">
					Secundaria
				</label>	
				<label for="radio31" >
					<input type="radio" name="NEstudios" id="radio31" value="Preparatoria">
					Preparatoria
				</label>	
				<label for="radio32">
					<input type="radio" name="NEstudios" id="radio32" value="Licenciatura/Ingeniería">
					Licenciatura/Ingeniería
				</label>		
				<label for="radio33" >
					<input type="radio" name="NEstudios" id="radio33" value="Maestría">
					Maestría
				</label>	
				<label for="radio33" >
					<input type="radio" name="NEstudios" id="radio33" value="Doctorado">
					Doctorado
				</label>	
			</div>	
			
			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="4">Anterior</a>
				<input type="submit" class="btn" name="submit" value="Submit" id="checkBtn">
			</div>
		</div>
	</div>

	<!-- page 6 -->

	<div class="step-content" data-step="6">
		<div class="result"><?=$response?></div>
	</div>


</form>




<script>
	const setStep = step => {
		document.querySelectorAll(".step-content").forEach(element => element.style.display = "none");
		document.querySelector("[data-step='" + step + "']").style.display = "block";
		document.querySelectorAll(".steps .step").forEach((element, index) => {
			index < step-1 ? element.classList.add("complete") : element.classList.remove("complete");
			index == step-1 ? element.classList.add("current") : element.classList.remove("current");
		});
	};
	document.querySelectorAll("[data-set-step]").forEach(element => {
		element.onclick = event => {
			event.preventDefault();
			setStep(parseInt(element.dataset.setStep));
		};
	});
	<?php if (!empty($_POST)): ?>
		setStep(6);
	<?php endif; ?>
</script>

<script>

	function changeradioother(){
		var other= document.getElementById("other");
		other.value=document.getElementById("inputother").value;
	}
	function setRequired(){

		document.getElementById("inputother").required=true;
	}

	function removeRequired(){
		if(document.getElementById("inputother").required == true){
			document.getElementById("inputother").required=false;
		}
	}
</script>

<script>
	var result = document.getElementById("result");
	var mine = document.getElementById("Frecuencia");
	function change(){
		if (mine.value==1){result.innerText = "1 vez al mes o menos";}
		else if (mine.value==2) { result.innerText = "De 2 a 3 veces al mes";}
		else if (mine.value==3) { result.innerText = "1 vez a la semana";}
		else if (mine.value==4) { result.innerText = "Más de 1 vez a la semana";}
	}
</script>

<script>
	$(function() {
		var $sortable = $("#sortable").sortable({
			update: function(event, ui) {
				var $data = $(this).sortable('toArray');
				$("#position").val(JSON.stringify($data));
			}
		});
		$sortable.disableSelection();
		$("#position2").val(JSON.stringify($sortable.sortable("toArray")));
		$("#frmExample").submit(function(e) {
			e.preventDefault();
			console.log("Form Submit, position:", $("#position").val());
		});
	});
</script>

<script>
	$(function() {
		var $sortable = $("#sortable2").sortable({
			update: function(event, ui) {
				var $data = $(this).sortable('toArray');
				$("#position2").val(JSON.stringify($data));
			}
		});
		$sortable.disableSelection();
		$("#position").val(JSON.stringify($sortable.sortable("toArray")));
		$("#frmExample").submit(function(e) {
			e.preventDefault();
			console.log("Form Submit, position2:", $("#position2").val());
		});
	});
</script>



<script>
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name=game_suggest]:checked').length > 3) {
			$(this).prop('checked', false);
		}
	});
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name=Platillos_Preferidos]:checked').length > 3) {
			$(this).prop('checked', false);
		}
	});
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name=Bebidas_Preferidas]:checked').length > 3) {
			$(this).prop('checked', false);
		}
	});
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name=Platillos_Sugerencias]:checked').length > 3) {
			$(this).prop('checked', false);
		}
	});
</script>

<script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[name='game_suggest[]']:checked").length;

      if(!checked) {
        alert("Selecciona al menos 1 juego");
        return false;
      }
      checked = $("input[name='Platillos_Preferidos[]']:checked").length;

      if(!checked) {
        alert("Selecciona al menos 1 Platillo");
        return false;
      }
      
      checked = $("input[name='Bebidas_Preferidas[]']:checked").length;

      if(!checked) {
        alert("Selecciona al menos 1 Bebida");
        return false;
      }

       checked = $("input[name='Platillos_Sugerencias[]']:checked").length;

      if(!checked) {
        alert("Selecciona al menos 1 Sugerencia");
        return false;
      }    
    });
});

</script>

</body>
</html>
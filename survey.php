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
	$val = $val.(isSet($_POST['position3']) ? "" : "Falta position3\n");
	$val = $val.(isSet($_POST['position4']) ? "" : "Falta position4\n");
	$val = $val.(isSet($_POST['position5']) ? "" : "Falta position5\n");
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
	$position3 = $_POST['position3'];
	$position4 = $_POST['position4'];
	$position5 = $_POST['position5'];
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
	if (empty($val)){


		$messagetxt= $Tiempo_de_conocer . PHP_EOL . $Como_conociste . PHP_EOL . $Frequency . PHP_EOL . $Juego_Favorito . PHP_EOL . $position . PHP_EOL . $game_suggest . PHP_EOL . $position2 . PHP_EOL . $position3 . PHP_EOL . $position4 . PHP_EOL . $position5 . PHP_EOL . $Recommendar . PHP_EOL . $Satisfaction . PHP_EOL . $comments . PHP_EOL . $email . PHP_EOL . $Sexo . PHP_EOL . $Ocupacion . PHP_EOL . $hijos . PHP_EOL . $CP . PHP_EOL . $NEstudios . PHP_EOL ;
		$fp = fopen('data.txt', 'a');

		fwrite($fp,$messagetxt);
		fclose($fp);





		if (mail($to, $subject, $email_template, $headers)) {
		// Success
			$counter = file_get_contents("counter.txt");
			file_put_contents("counter.txt", $counter+1);
			$counter = file_get_contents("counter.txt");
			echo "PREMIO ID $counter";

			$response = '<img src="asf.png" id="imgpremio" class="survey-form">';		
		} else {
		// Fail
			$response = '<h3>Error!</h3><p>Message could not be sent! Please check your mail server settings!</a>';
		}
	}
	else{
		$response = "<h3>$val</h3><p><div class='buttons'><a href='#' class='btn alt' data-set-step='5'>Anterior</a></div>";
	}
	
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
		<h1> <img src="https://scontent.fpbc2-2.fna.fbcdn.net/v/t1.6435-9/86501894_114760190101107_3217102797317079040_n.jpg?_nc_cat=110&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=GucU3KQHORQAX-CACG8&_nc_ht=scontent.fpbc2-2.fna&oh=00_AT-F4uypfl1UAfEj0en_lw8roSF7eWVhevD4j9WbCyFPPg&oe=62A81207" id="imgprinc"></h1>
		<div class="steps">
			<div class="step current"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>	
		</div>
		<!-- Primera Secci??n -->

		<div class="step-content current" data-step="1">
			<div class="fields">
				<!-- Pregunta 1 -->
				<p>??Cu??nto tiempo has sido cliente de C&D?</p>
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
						<input type="radio" name="Tiempo_de_conocer" id="radio3" value="Entre 6 meses y un a??o">
						6 meses a un a??o
					</label>		
					<label for="radio4">
						<input type="radio" name="Tiempo_de_conocer" id="radio4" value="Uno a dos a??os">
						1 - 2 a??os
					</label>		
					<label for="radio5">
						<input type="radio" name="Tiempo_de_conocer" id="radio5" value="M??s de 3 a??os">
						3 a??os o m??s
					</label>	
				</div>	
				<!-- Pregunta 2 -->
				<p>??C??mo conociste C&D?</p>
				<div class="group">
					<label for="radio6">
						<input type="radio" name="Como_conociste" id="radio6" value="Amigo" required>
						Recomendaci??n de un amigo
					</label>
					<label for="radio7">
						<input type="radio" name="Como_conociste" id="radio7" value="Fachada">
						Vi una sucursal y me llam?? la atenci??n
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
				<p>??Qu?? tan frecuente visitas C&D?</p>
				<div class="group">
					<input type="range" name="Frequency" id="Frecuencia" min="1" max="4" value="2" step="1" onChange="change();" > <span id="result" style="text-align: center;">De 2 a 3 veces al mes</span>
				</div>	
				<!-- Pregunta 4 -->	
				<p>De esta lista, ??cu??l es el juego que m??s te gusta?</p>
				<div>
					<select name="Juego_Favorito" id="JFavorito" style="text-align: center;">

						<option disabled selected value>P??cale ac??</option>
						<option value="Cat??n">Cat??n</option>
						<option value="Carcassone">Carcassone</option>
						<option value="Azul">Azul</option>
						<option value="Splendor">Splendor</option>
						<option value="Century">Century: la ruta de las especias</option>
						<option value="King">King of Tokio/King of New York</option>
						<option value="Fantasma">Fantasma blitz</option>
						<option value="Sushi">Sushi go</option>
						<option value="C??digo">C??digo secreto</option>
					</select>
				</div>

			</div>
			<div class="buttons">
				<a href="#" class="btn" data-set-step="2">Siguiente</a>
			</div>
		</div>
		<!-- Segunda Secci??n -->
		<!-- Pregunta 5 -->
		<div class="step-content" data-step="2">
			<div class="fields">
				<p>??Qu?? tipos de juegos te gusta m??s? Ordena, poniendo hasta arriba el que m??s te gusta</p>
				<div class="group">

					<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

					<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
					<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
					<script src="jquery.mobile.customjquery.mobile.custom,js"></script>
					<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

					<ol id="sortable" class="ui-sortable collection">
						<li id="GP1" class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3">Juegos de Rol</li>
						<li id="GP2" class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3">Party games o juegos familiares</li>
						<li id="GP3" class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3">Deck Builder/TCG</li>
						<li id="GP4" class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3">War Games o juegos de miniaturas</li>
						<li id="GP5" class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3">Juegos largos y con tem??tica</li>
					</ol>
					<input type="hidden" name="position" id="position" />
				</div>
				<!-- Pregunta 6 -->
				<p>??De qu?? tipo de juego te gustar??a que hubiera m??s variedad?</p>

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
						Juegos largos y con tem??tica
					</label>

				</div>

				<!-- Pregunta 7 -->
				<p>??Con qu?? descipci??n te identificas m??s? Ordena, poniendo hasta arriba con la que m??s te identificas</p>
				<div class="group">


					<ol id="sortable2" style="text-align: justify" class="ui-sortable collection">
						<li id="Desc1" class="ui-state-default">Me gustan juego r??pidos y sencillos, donde lo m??s importante es pasarlo bien con mis amigos o familiares.</li>
						<li id="Desc2" class="ui-state-default">Me gustan los juegos con donde cada jugador lleva su propio juego, pero al final compite por la puntuaci??n m??s alta.</li>
						<li id="Desc3" class="ui-state-default">Prefiero juegos donde se forman equipos que compiten entre s??, ya sea para realizar tareas espec??ficas o de roles secretos. Entre m??s jugadores mejor.</li>
						<li id="Desc4" class="ui-state-default">Mis juegos favoritos son juegos de tarjetas o de guerra donde se pueden utilizar miniaturas.</li>
						<li id="Desc5" class="ui-state-default">Las decisiones son muy importantes y puede llegar a ser muy competitivo.</li>
						<li id="Desc6" class="ui-state-default">Prefiero cualquier tipo de juego de rol donde puedo crear un personaje a mi elecci??n y vivir muchas aventuras diferentes.</li>
					</ol>
					<input type="hidden" name="position2" id="position2" />
				</div>



			</div>
			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="1">Anterior</a>
				<a href="#" class="btn" data-set-step="3">Siguiente</a>
			</div>
		</div>

		<!-- Secci??n 3 -->
		<!-- Pregunta 8 -->
		<div class="step-content" data-step="3">
			<div class="fields">
				<p>En esta secci??n para cada pregunta puedes escoger hasta 3 elementos, los que m??s te gusten de cada lista. Aprieta agregar y por ??ltimo, ordena estos 3 elementos, siempre poniendo hasta arriba tu favorito</p>


				<p>??Cu??les son tus platillos favoritos de C&D?</p>
				<div class="group">
					<ul class="foodchecks" id="platillos_1">
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat1"><label for="check6">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check6" value="Chapata con carne" >
							Chapata con carne (pollo, at??n, pierna a la cerveza)
						</label> </li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat2"><label for="check7">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check7" value="Chapata con embutido">
							Chapata con embutido (roast beaf, jam??n, pepeonni)
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat3"><label for="check8">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check8" value="Chapatas sin carne">
							Chapatas sin carne (champi??ones, quesos)
						</label></li>	
						<p>	</p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat4"><label for="check9">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check9" value="Chapapizza">
							Chapapizza
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat5"><label for="check10">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check10" value="Hamburguesa">
							Hamburguesa ogro u ogro de las cavernas
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat6"><label for="check11">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check11" value="Dedo de trol">
							Dedo de trol o dedo de momia
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat7"><label for="check12">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check12" value="Papas">
							Papas a la francesa o gajo
						</label>	</li>	
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Plat8"><label for="check13">
							<input type="checkbox" name="Platillos_Preferidos[]" id="check13" value="Pizza">
							Pizza
						</label></li>	
					</ul>
					<div class="buttons" style="text-align: center;">
						<a href="#" id="add" class="btn alt" style="text-align: center;">Agregar</a>
						<a href="#" id="remove" class="btn" style="text-align: center;" >Quitar</a>
					</div>


					<ol class="ui-sortable collection" style="display:inline-block;" id="platillos_2" style="text-align: justify">

					</ol>
					<input type="hidden" name="position3" id="position3"/>


					<script>
						$('#add').click(function() {
							//$('#platillos_1 li :checked').classList.add('ui-state-default ui-sortable-handle collection-item avatar z-depth-3');
							return !$('#platillos_1 li :checked').closest('li').appendTo('#platillos_2');

						});
						$('#remove').click(function() {
							return !$('#platillos_2 li :checked').closest('li').appendTo('#platillos_1');
						});

					</script>


					

				</div>


				<!-- Pregunta 9 -->
				<p>??Cu??les son tus bebidas favoritas de C&D?</p>
				<div class="group">
					<ul class="foodchecks" id="bebidas_1">
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb1"><label for="check14">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check14" value="Sodas italianas" >
							Sodas italianas (varios sabores) o bebida mineralizada (mangada, limonada, naranjada)
						</label> </li>
						<p></p>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb2"><label for="check15">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check15" value="Sangre goblin">
							Sangre goblin (jugo de uva ar??ndano)
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb3"><label for="check16">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check16" value="Flotantes">
							Flotantes (varios sabores) o chamoyada
						</label></li>
						<p>	</p>	
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb4"><label for="check17">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check17" value="Malteadas">
							Malteadas
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb5"><label for="check18">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check18" value="Caf??">
							Caf?? o capuchino
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb6"><label for="check19">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check19" value="Cervezas Arte">
							Cervezas artesanales
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb7"><label for="check20">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check20" value="Cervezas Comer">
							Cervezas comerciales
						</label>	</li>
						<p>	</p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="Fav_Beb8"><label for="check21">
							<input type="checkbox" name="Bebidas_Preferidas[]" id="check21" value="Refrescos">
							Refrescos (varios sabores)
						</label></li>	
					</ul>

					<div class="buttons" style="text-align: center;">
						<a href="#" id="add2" class="btn alt" style="text-align: center;">Agregar</a>
						<a href="#" id="remove2" class="btn" style="text-align: center;" >Quitar</a>
					</div>

					<ol class="ui-sortable collection" style="display:inline-block;" id="bebidas_2">

					</ol>
					<input type="hidden" name="position4" id="position4"/>

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
				<p>??Qu?? te gustar??a que agreg??ramos al men???</p>
				<div class="group">
					<ul class="foodchecks" id="ComSug1">
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug1"><label for="check22">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check22" value="chapatas">
							M??s opciones de chapatas
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug2"><label for="check23">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check23" value="Hamburguesas">
							Hamburguesas de pollo o club s??ndwich
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug3"><label for="check24">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check24" value="botana">
							M??s opciones de botana (dedos de queso, aros de cebolla, etc.)
						</label></li>
						<p>	</p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug4"><label for="check25">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check25" value="vegetales">
							Ensaladas o platillos con vegetales
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug5"><label for="check26">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check26" value="Agua/bebida">
							Agua/bebida del d??a
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug6"><label for="check27">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check27" value="italianas">
							M??s sabores de sodas italianas
						</label></li>
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug7"><label for="check28">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check28" value="refrescos">
							M??s opciones de refrescos
						</label>	</li>	
						<p></p>
						<li class="ui-state-default ui-sortable-handle collection-item avatar z-depth-3" id="PlSug8"><label for="check29">
							<input type="checkbox" name="Platillos_Sugerencias[]" id="check29" value="salsas">
							M??s opciones de salsas y aderezos para acompa??ar los platillos
						</label></li>	
					</ul>

					<div class="buttons" style="text-align: center;">
						<a href="#" id="add3" class="btn alt" style="text-align: center;">Agregar</a>
						<a href="#" id="remove3" class="btn" style="text-align: center;" >Quitar</a>
					</div>

					<ol class="ui-sortable collection" style="display:inline-block;" id="ComSug2">

					</ol>
					<input type="hidden" name="position5" id="position5"/>

					<script>
						$('#add3').click(function() {
							return !$('#ComSug1 li :checked').closest('li').appendTo('#ComSug2');
						});
						$('#remove3').click(function() {
							return !$('#ComSug2 li :checked').closest('li').appendTo('#ComSug1');
						});

					</script>

					<div class="buttons">
						<a href="#" class="btn alt" data-set-step="2">Anterior</a>
						<a href="#" class="btn" data-set-step="4">Siguiente</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Secci??n 4-->
		<div class="step-content" data-step="4">
			<div class="fields">
				<!-- Pregunta  9-->
				<p>??Qu?? tan probable es que recomiendes C&D a tus amigos?</p>
				<div class="rating">
					<input type="radio" name="Recommendar" id="radio10" value="0" required>
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
				<p>??En general, ??Qu?? tan satisfecho est??s con los servicios que ofrece C&D?</p>
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
						Para m??, no existe mejor lugar
					</label>
				</div>
				<label for="comments">??En qu?? podr??amos mejorar?</label>
				<div class="field">
					<textarea id="comments" name="comments" placeholder="Dinos lo que que quieras ..."></textarea>
				</div>
			</div>

			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="3">Anterior</a>
				<a href="#" class="btn" data-set-step="5">Siguiente</a>
			</div>

		</div>

		<!-- Secci??n 5-->
		<div class="step-content" data-step="5">
			<div class="fields">
				<label for="email">Correo Electr??nico</label>
				<div class="field">
					<i class="fas fa-envelope"></i>
					<input id="email" type="email" name="email" placeholder="Your Email" required>
				</div>
				<label for="bday">Cu??ndo es tu cumplea??os ;D</label>
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
						<li><label for="Hijos">??Cu??ntos hijos tienes?

							<input type="number" id="hijos" name="hijos" min="0" max="20" rquired>

						</label>
					</li>
					<li><label for="CP">C??digo Postal

						<input type="number" min="01" max="99999"  name="CP" required>
					</label></li>
				</ul>
			</div>

			<p>M??ximo nivel escolar</p>
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
					<input type="radio" name="NEstudios" id="radio32" value="Licenciatura/Ingenier??a">
					Licenciatura/Ingenier??a
				</label>		
				<label for="radio33" >
					<input type="radio" name="NEstudios" id="radio33" value="Maestr??a">
					Maestr??a
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
		else if (mine.value==4) { result.innerText = "M??s de 1 vez a la semana";}
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
		$("#position1").val(JSON.stringify($sortable.sortable("toArray")));
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
		$("#position2").val(JSON.stringify($sortable.sortable("toArray")));
		$("#frmExample").submit(function(e) {
			e.preventDefault();
			console.log("Form Submit, position2:", $("#position2").val());
		});
	});
</script>

<script>
	$(function() {
		var $sortable = $("#platillos_2").sortable({
			update: function(event, ui) {
				var $data = $(this).sortable('toArray');
				$("#position3").val(JSON.stringify($data));
			}
		});
		$sortable.disableSelection();
		$("#position3").val(JSON.stringify($sortable.sortable("toArray")));
		$("#frmExample").submit(function(e) {
			e.preventDefault();
			console.log("Form Submit, position3:", $("#position3").val());
		});
	});
</script>

<script>
	$(function() {
		var $sortable = $("#bebidas_2").sortable({
			update: function(event, ui) {
				var $data = $(this).sortable('toArray');
				$("#position4").val(JSON.stringify($data));
			}
		});
		$sortable.disableSelection();
		$("#position4").val(JSON.stringify($sortable.sortable("toArray")));
		$("#frmExample").submit(function(e) {
			e.preventDefault();
			console.log("Form Submit, position4:", $("#position4").val());
		});
	});
</script>

<script>
	$(function() {
		var $sortable = $("#ComSug2").sortable({
			update: function(event, ui) {
				var $data = $(this).sortable('toArray');
				$("#position5").val(JSON.stringify($data));
			}
		});
		$sortable.disableSelection();
		$("#position5").val(JSON.stringify($sortable.sortable("toArray")));
		$("#frmExample").submit(function(e) {
			e.preventDefault();
			console.log("Form Submit, position5:", $("#position5").val());
		});
	});
</script>


<script>
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name="game_suggest[]"]:checked').length > 3) {
			$(this).prop('checked', false);
		}
	});
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name="Platillos_Preferidos[]"]:checked').length > 3) {
			$(this).prop('checked', false);
		}
	});
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name="Bebidas_Preferidas[]"]:checked').length > 3) {
			$(this).prop('checked', false);
		}
	});
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[name="Platillos_Sugerencias[]"]:checked').length > 3) {
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
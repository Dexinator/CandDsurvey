<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1">
	<title>Survey</title>
</head>
<body style="background-color:#F5F6F8;font-famliy:-apple-system, BlinkMacSystemFont, 'segoe ui', roboto, oxygen, ubuntu, cantarell, 'fira sans', 'droid sans', 'helvetica neue', Arial, sans-serif;box-sizing:border-box;font-size:16px;">
	<div style="background-color:#fff;margin:30px;box-sizing:border-box;font-size:16px;">
		<h1 style="padding:40px;box-sizing:border-box;font-size:24px;color:#ffffff;background-color:#cb5f51;margin:0;">Survey</h1>
		<p style="padding:40px 40px 20px 40px;margin:0;box-sizing:border-box;font-size:16px;">A user has submitted a survey.</p>
		<h2 style="padding:20px 40px;margin:0;color:#394453;box-sizing:border-box;">Survey Results</h2>
		<div style="box-sizing:border-box;padding:0 40px 20px;">
			<table style="border-collapse:collapse;width:100%;">
				<tbody>

						<!-- 
Pregunta 1 ->Tiempo_de_conocer
Pregunta 2 ->Como_conociste
Othertext
Pregunta 3 ->Frequency
Pregunta 4 ->Juego_Favorito
Pregunta 5 ->position
Pregunta 6 ->game_suggest
Pregunta 7 ->position2
Pregunta 8 ->Platillos_Preferidos
Pregunta 9 ->Bebidas_Preferidas
Pregunta 10 ->Platillos_Sugerencias
Pregunta 11 ->Recommendar
Pregunta 12 ->Satisfaction
Pregunta 13 ->comments
Pregunta 14 ->email
Pregunta 15 ->Sexo
Pregunta 16 ->Ocupacion
Pregunta 17 ->hijos
Pregunta 18 ->CP
--> 
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Tiempo_de_conocer</td>
	<td style="text-align:right;"><?=htmlspecialchars($Tiempo_de_conocer, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Como_conociste</td>
	<td style="text-align:right;"><?=htmlspecialchars($Como_conociste, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Frequency</td>
	<td style="text-align:right;"><?=htmlspecialchars($Frequency, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Juego_Favorito</td>
	<td style="text-align:right;"><?=htmlspecialchars($Juego_Favorito, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">position?</td>
	<td style="text-align:right;"><?=htmlspecialchars($position, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">game_suggest</td>
	<td style="text-align:right;"><?=htmlspecialchars($game_suggest, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">position2</td>
	<td style="text-align:right;"><?=htmlspecialchars($position2, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Platillos_Preferidos</td>
	<td style="text-align:right;"><?=htmlspecialchars($Platillos_Preferidos, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Bebidas_Preferidas</td>
	<td style="text-align:right;"><?=htmlspecialchars($Bebidas_Preferidas, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Platillos_Sugerencias</td>
	<td style="text-align:right;"><?=htmlspecialchars($Platillos_Sugerencias, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Recommendar</td>
	<td style="text-align:right;"><?=htmlspecialchars($Recommendar, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Satisfaction</td>
	<td style="text-align:right;"><?=htmlspecialchars($Satisfaction, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">comments</td>
	<td style="text-align:right;"><?=htmlspecialchars($comments, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Email</td>
	<td style="text-align:right;"><?=$email?></td>

</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Sexo</td>
	<td style="text-align:right;"><?=htmlspecialchars($Sexo, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">Ocupacion</td>
	<td style="text-align:right;"><?=htmlspecialchars($Ocupacion, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">hijos</td>
	<td style="text-align:right;"><?=htmlspecialchars($hijos, ENT_QUOTES)?></td>
</tr>
<tr>
	<td style="padding:15px 0;text-decoration:underline;">CP</td>
	<td style="text-align:right;"><?=htmlspecialchars($CP, ENT_QUOTES)?></td>
</tr>
</tbody>
</table>
</div>
</div>
</body>
</html>
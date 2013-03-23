<?php session_start(); 
include "generale.php";?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="images/style.css">
	<title>Open Tourism | Registrazione</title>
</head>
<body>


<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
		<h1 align="center">Open Tourism | Registrazione</h1>
	<p align="center">Qui puoi registrarti al nostro servizio gratuitamente, potrai creare un evento se ti reputerai in grado di tenere lezioni turistiche come prenotarti per i prossimi eventi in programma!</p>

	<?php if(isset($_GET))
			if($_GET['ok'] == "false")
				echo "<div align=\"center\">Registrazione non effettuata con successo, ricontrolla la correttezza dei dati.</div>"
	?>
	<form action="registrazione.php" method="post">
	<table align="center" border="2">
		<tr>
			<td>Nome utente</td>
			<td><input type="text" name="newname"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="newpass"></td>
		</tr>
		<tr>
			<td>Ripeti la password</td>
			<td><input type="password" name="newpass2"></td>
		</tr>
		<tr>
			<td>Domanda segreta</td>
			<td><input type="text" name="dom"></td>
		</tr>
		<tr>
			<td>Risposta segreta</td>
			<td><input type="text" name="ris"></td>
		</tr>
		<tr>
			<td/>
			<td align="center"><input type="submit" value="Registrati ora!"></td>
		</tr>
	</table>
	</div>
	<div id="sidebar">
		<?php  SideBar();?>
	</div>
	<div id="paypal">
		<?php paypal()?>
	</div>
	<div id= "footer">
		<?php Footer()?>
	</div>
</div>
</body>

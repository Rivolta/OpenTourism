<?php session_start(); 
include "generale.php"?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="images/style.css">
		<title>Open Tourism | Creazione Evento</title>		
</head>
<body>

<div class="wrapper clearfix">
<!-- page content -->


<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
		<h1>Open Tourism | Creazione evento </h1>
		<br><font size="2">Clicca <a href=visualizza.php>qui</a> per visualizzare la mappa oppure <a href=poi.php>qui</a> l'elenco dei codici dei Point Of Interests </font>
			<form action = "action.php?a=ev" method = "POST"><br>
			<table border = "2">
				<tr>
					<td>Nome:</td>
					<td><input type = "text" name = "nme"></td>
				</tr>
				<tr>
					<td>Descrizione:</td>
					<td><input type = "text" name = "desc"></td>
				</tr>
				<tr>
					<td>Data:(gg-mm-aa)</td>
					<td><input type = "date" name = "data"></td>
				</tr>
				<tr>
					<td>Ora inizio:(hh:mm:ss)</td>
					<td><input type = "time" name = "time"></td>
				</tr>
				<tr>
					<td>Durata:</td>
					<td><input type = "text" name = "dur"></td>
				</tr>
				<tr>
					<td>Numero minimo di partecipanti:</td>
					<td><input type = "text" name = "nmin"></td>
				</tr>
				<tr>
					<td>Numero massimo di partecipanti:</td>
					<td><input type = "text" name = "nmax"></td>
				</tr>
				<tr>
					<td>Costo totale:</td>
					<td><input type = "text" name = "costo"></td>
				</tr>
				<tr>
					<td>Id Point Of Interests:</td>
					<td><input type = "text" name = "idpoi" <?php if(isset($_GET['id'])) echo "value = \"".$_GET['id']."\"";?>></td>
				</tr>
			</table>
			<input type = "submit" value = "Crea evento">
			</form>
			
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
</html>

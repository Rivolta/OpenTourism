<?php session_start();
include "generale.php"; ?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="images/style.css">
		<title>Open Tourism | Modifica password</title>		
</head>
<body>

<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
		<?php
			if((isset($_SESSION['nome'])) && ($_GET['t'] == "pwd")) {
		?>
		<table align="center" border=2>
			<tr>
				<td>Sei attualmente connesso come</td>
				<td align="center"><?php echo $_SESSION['nome'] ?></td>
			<tr/>
		<form action="action.php?a=mod" method="post">
			<tr>
				<td>Vecchia password</td>
				<td><input type="password" name="oldpwd"></td>
			</tr>
			<tr>
				<td>Nuova password</td>
				<td><input type="password" name="newpwd"></td>
			</tr>
			<tr>
				<td>Conferma nuova password</td>
				<td><input type="password" name="cfmpwd"></td>
			</tr>
			<tr>
				<td/>
				<td align="center"><input type="submit" value="Cambia password"></td>
			</tr>
		</table>
		</form>
		<?php }

		elseif((isset($_SESSION['nome'])) && ($_GET['t']=="img"))
		{
		?>
		<table align="center" border=2>
			<tr>
				<td>Sei attualmente connesso come</td>
				<td align="center"><?php echo $_SESSION['nome'] ?></td>
			<tr/>
		<form action="action.php?a=modimm" method="post">
			<tr>
				<td>Vecchia immagine</td>
				<td><img src="<?php echo $_SESSION['img']; ?>"/></td>
			</tr>
			<tr>
				<td>Nuovo URL immagine</td>
				<td><input type="text" name="imgurl"></td>
			</tr>
		</table>
		<?php
		}

		else {
		?>

		<div align="center">Non hai ancora effettuato il login. <a href="index.php">Torna alla home page.</a></div>
		<?php } ?>
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

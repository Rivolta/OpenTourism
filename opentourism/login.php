<?php session_start(); 
include "generale.php"?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="images/style.css">
		<title>Open Turism | Login</title>		
</head>

<body>
<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
		<h1 align="center">Open Tourism | Login</h1>
	<br/>

	<form action="action.php?a=login" method="post">
	<table align="center" border=2>
		<tr>
			<td>Nome utente</td>
			<td><input type="text" name="nome"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pwd"></td>
		</tr>
		<tr>
			<td/>
			<td align="center"><input type="submit" value="Effettua login"></td>
		</tr>
	</table>
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

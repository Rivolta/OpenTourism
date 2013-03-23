<?php session_start(); 
include "generale.php"?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="images/style.css">
		<title>Open Tourism | Home</title>		
</head>
<body>

<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
		<font align="center" size="6"><h1>Errore</h1></font>
	<font size="4">Oooops! Si e' verificato un errore ritorna alla <a href=index.php>Home</a></font>
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

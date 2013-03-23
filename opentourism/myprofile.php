<?php session_start();
include "generale.php"; ?>
<?php if(!isset($_SESSION))
	header("location:error.php"); ?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="images/style.css">
		<title>Open Tourism | profilo di <?php echo $_SESSION['nome']?> </title>		
</head>
<body>

<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
	<h1 align="center">Open Tourism | <?php echo $_SESSION['nome']?></h1>
	<a href="modinfo.php?t=pwd">Modifica password</a><br/>
	<!--<a href="modinfo.php?t=img">Modifica immagine</a><br/>-->
	<a href="action.php?a=logout">Logout</a>
	<!--<img align ="right"src =" <?php echo $_SESSION['img']?>" width = "50" height ="50"/>-->
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

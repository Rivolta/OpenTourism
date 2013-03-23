<?php session_start(); ?>
<?php
	$con = mysql_connect("localhost", "opentourism", "busnimodvo54") or die(mysql_error());
	$db = mysql_select_db("my_opentourism") or die(mysql_error());
	$query="SELECT * FROM user WHERE nomeutente == " . $_POST['newname'] . ";";	
	$control = mysql_query($query, $con);

	if(mysql_fetch_object($control) )
		header("location:register.php");
	elseif($_POST['newpass'] == $_POST['newpass2'])
	{
	$qinsert = "INSERT INTO user(nomeutente, password, domandasegreta, rispostasegreta)
		VALUES('".$_POST['newname']."', '".$_POST['newpass']."', '".$_POST['dom']."', '".$_POST['ris']."')";
	
	mysql_query($qinsert, $con);
		header("location:myprofile.php");
	}
?>

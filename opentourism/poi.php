<?php session_start(); 
include "generale.php"?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="images/style.css">
	<title>Open Tourism | Elenco Point Of Interests</title>		
</head>
<body>
<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
<?php
$con = mysql_connect("localhost", "opentourism", "busnimodvo54") or die(mysql_error());
$db = mysql_select_db("my_opentourism") or die(mysql_error());
$result = mysql_query("SELECT * FROM poi", $con);

echo "<br/>";
echo "<table bgcolor=\"lightgray\" width=\"80%\">";
echo "<tr>";
echo "<td>Nome</td>";
echo "<td>ID</td>";
echo "<td>Descrizione</td>";
echo "</tr>";
	while($row = mysql_fetch_object($result))	
	{
	echo "<tr>";
	echo "<td>".$row->nomepoi."</td>";
	echo "<td>".$row->IDPOI."</td>";
	echo "<td>".$row->desc."</td>";
	echo "</tr>";
	}
echo "</table>";
?>
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

<?php session_start(); 
include "generale.php";
include "database.php";?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="images/style.css">
		<title>Open Tourism | Home</title>   
</head>
<body>

<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
		<div>Ecco gli ultimi eventi inseriti:</div>
		<table border = "2">
			<tr>
				<td><b>Nome</b></td>
				<td><b>Data svolgimento</b></td>
				<td><b>Costo</b></td>
			</tr>
		<?php 
			$con=mysql_connect("localhost", "opentourism", "busnimodvo54") or die(mysql_error());
			$db=mysql_select_db("my_opentourism") or die(mysql_error());
			
			$Query = "SELECT * FROM `evento` WHERE IDE > ((SELECT MAX(IDE) FROM evento)-5);";
			$res = mysql_query($Query, $con) or die(mysql_error());
			while($Dati = mysql_fetch_object($res))
			{
				echo "<tr>";
				echo '<td><a href="evento.php?ide='.$Dati->IDE.'">'.$Dati->nomeevento."</td></a>";
				echo "<td>".$Dati->data."</td>";
				echo "<td>".$Dati->costotot."</td>";
				echo "</tr>";
			}	
		mysql_close($con);?>		
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
</html>

<?php session_start() ;
?>
<html>
<head>
	<title>Open Tourism | pagina elaborazione</title>
</head>
<body>
<h1> elaborazione...</h1>
<?php
	$con = mysql_connect("localhost", "opentourism", "busnimodvo54") or die(mysql_error());
	$db = mysql_select_db("my_opentourism") or die(mysql_error());
	
	if(@!$_GET["a"]){$get=false;
	exit("Errore: Non e' stato passato il parametro A delle azione!");}else{ $get= $_GET["a"] ;}

if(($get)==="login")
	//Login
{
	$users = mysql_query("SELECT * FROM user", $con);
	$personas = mysql_query("SELECT * FROM persona", $con);
	
	$found = false;
	$found2 = false;
	while(($user = mysql_fetch_array($users)) && !($found))
	{
		if(($user['nomeutente'] == $_POST['nome'])&&($user['password'] == $_POST['pwd']))
		{
			$_SESSION['id'] = $user['IDU'];
			//echo "login effettuato id=".$_SESSION['id'];
			$found = true;
		}
	}
	/*
	while(($persona = mysql_fetch_array($personas)) && !($found2))
	{
	//tabella vuota e non autocompilata
			$_SESSION['img'] = $persona['img'];
			$found2 = true;
	}*/

	





	if($found)
	{
		$_SESSION['nome'] = $_POST['nome'];
		header("location:myprofile.php");
	}
	else
		{
		header("location:error.php");
		//debug
		//echo "sono caduto nel login";
		}
}

elseif(isset($get) && ($get == "logout"))
	//Logout
{
	session_destroy();
	?>
	<h1 align="center">Open Tourism | Logout</h1>
	<div align="center">Logout effettuato con successo.<br/><a href="index.php">Torna alla home page</a></div>
	<?php
	header("location:index.php");
}

elseif(isset($get) && ($get == "mod"))
	//Modifica password
{
	
	$u = mysql_query("SELECT * FROM user WHERE nomeutente = \"" . $_SESSION['nome'] . "\";", $con) or die (mysql_error());

	$user = mysql_fetch_object($u);

	if(($user->password == $_POST['oldpwd']) && ($_POST['newpwd'] === $_POST['cfmpwd']))
	{
		echo "Password in corso di modifica...";
		mysql_query("UPDATE user SET password = \"" . $_POST['newpwd'] . "\" WHERE nomeutente = \"" . $_SESSION['nome'] . "\";", $con);
		echo "Password di " . $_SESSION['nome'] . " modificata.";
	}
	elseif($_POST['newpwd'] != $_POST['cfmpwd'])
	{
		echo "Utente non trovato...?";
	}
	elseif($_POST['newpwd'] == $user->password)
	{
		echo "La nuova password non può essere uguale alla precedente. Cambiala.";
	}
	else
	{
		echo "Errore immissione dati!";
	}
}

/*elseif(isset($get) && ($get == "modimm"))
	//Modifica immagine
{
	$Query1 = "UPDATE user SET img = \"" . $_POST['imgurl'] . "\" WHERE nomeutente = \"" . $_SESSION['nome'] . \"";";

	mysql_query($Query1, $con);
	header("location:myprofile.php");

}*/

elseif(isset($get) && ($get == "ev"))
	//Creazione nuovo evento
{
	if(!isset($_POST['nme']) || !isset($_POST['desc']) || !isset($_POST['data']) || !isset($_POST['time']) || !isset($_POST['dur']) ||
	   !isset($_POST['nmin']) || !isset($_POST['nmax']) || !isset($_POST['costo']) || !isset($_POST['idpoi']))
	{
		header("location:error.php");
		//echo "if imput post parametri"."<br>";
	}
	
	$con = mysql_connect("localhost", "opentourism", "busnimodvo54") or die(mysql_error());	
	
	if(!isset($_SESSION['id']))
	{
		header("location:error.php");
		//echo "if imput session id parametri"."<br>";
	}
	
	
	$Query = "INSERT INTO my_opentourism.evento
(`IDE` ,`IDP` ,`nomeevento` ,`descrizione` ,`data` ,`orainizio` ,`durata` ,`numminpa` ,`nummaxpa` ,`costotot`,`IDPOI`)
VALUES (NULL , " . $_SESSION['id'] . ", \"".$_POST['nme'] . "\", \"" . $_POST['desc'] . "\", \"".$_POST['data'] . "\", \"".$_POST['time']."\", \"".$_POST['dur']."\", \"".$_POST['nmin']."\", \"".$_POST['nmax']."\", \"".$_POST['costo']."\",\"".$_POST['idpoi']."\")";
	if(strpos($_POST['data'], chr(47)) != false)
	{
		header("location:error.php");
	}
	$evento = mysql_query($Query,$con);
	header("location:index.php");
	//echo "<br>vado all'index"."<br>";
}//else {echo "sono arrivato all'evento, mancano dei parametri".chr(47);}
?>

FINE ELABORAZIONE
</body>

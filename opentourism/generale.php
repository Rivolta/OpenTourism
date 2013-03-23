<?php function SideBar()
{
	echo "<ul>";
	echo "<li><a href=\"index.php\"</a>Home</li>";
	if(isset($_SESSION['nome']))
	{
		echo "<li><a href = \"myprofile.php\">Profilo</a></li>";
	        echo "<li><a href = \"create.php\">Crea evento</a></li>";
	}	
	else
	{
		echo "<li><a href=\"login.php\"</a>Login</li>";
		echo "<li><a href = \"register.php\">Registrati</a></li>";
	}
	echo "<li><a href = \"visualizza.php\">Mappa</a></li>";
	echo "<li><a href = \"poi.php\">Punti di Interesse</a></li>";
	echo "</ul>";
}
function Footer()
{
	echo "Powered by: RiVolta!";
}
function Header2()
{
	echo '<h2 id="rightwrite">OpenTourism</h2>';
	echo '<h2>New way of visiting places</h2>';
}
function paypal()
{?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - Il metodo rapido, affidabile e innovativo per pagare e farsi pagare.">
<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
</form>

<?php	
}

?>

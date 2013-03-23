<?php
if(isset($_GET['minx'])){

	header('contenent-type: application/xml; charset: utf-8');
	Connect(); 
	queryCittaXML($_GET['minx'],$_GET['miny'],$_GET['maxx'],$_GET['maxy']);
	Close();
}




function Connect()
{
	$con=mysql_connect("localhost", "opentourism", "busnimodvo54") or die(mysql_error());
	$db=mysql_select_db("my_opentourism") or die(mysql_error());
}
function Close()
{
	mysql_close();
}

function parseToXML($htmlStr) 
		{ 
		$xmlStr=str_replace('<','&lt;',$htmlStr); 
		$xmlStr=str_replace('>','&gt;',$xmlStr); 
		$xmlStr=str_replace('"','&quot;',$xmlStr); 
		$xmlStr=str_replace("'",'&#39;',$xmlStr); 
		$xmlStr=str_replace("&",'&amp;',$xmlStr);
		$xmlStr=str_replace("à",'a',$xmlStr);
		$xmlStr=str_replace("ù",'u',$xmlStr);
		$xmlStr=str_replace("è",'e',$xmlStr);
		$xmlStr=str_replace("ì",'i',$xmlStr);
		$xmlStr=str_replace("ò",'o',$xmlStr);
 
		return $xmlStr; 
		} 

function queryCittaXML($minx, $miny, $maxx, $maxy)
{
	

	// Select all the rows in the markers table
$query= "SELECT *  FROM poi WHERE coordinatex < " . $maxx . " AND coordinatex > " . $minx . " AND coordinatey > " . $miny . " AND coordinatey < " . $maxy.";";
		$result = mysql_query($query);
		if (!$result) {
		  die('Invalid query: ' . mysql_error());
		}

		header("Content-type: text/xml");

		// Start XML file, echo parent node
		echo '<markers>';

		// Iterate through the rows, printing XML nodes for each
		while ($row = @mysql_fetch_assoc($result)){
		  // ADD TO XML DOCUMENT NODE
		  echo '<marker ';
		  echo 'name="' . htmlentities($row['nomepoi'], ENT_QUOTES , "UTF-8") . '" ';
		  echo 'lat="' . $row['coordinatex'] . '" ';
		  echo 'lng="' . $row['coordinatey'] . '" ';
		  echo 'desc="' . htmlentities($row['desc'], ENT_QUOTES , "UTF-8") . '" ';
		  echo '/>';
		}

		// End XML file
		echo '</markers>';

}
?>

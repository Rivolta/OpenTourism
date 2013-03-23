<?php session_start(); 
include "generale.php";
include "database.php";
$ide = $_GET["ide"];
if(!is_numeric($ide)){die("Ciai provato");}
?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="images/style.css">
		<title>Open Tourism | Home</title>
  <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
      
</head>
<body>

<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">

		<table border = "2">
		<?php 
			$con=mysql_connect("localhost", "opentourism", "busnimodvo54") or die(mysql_error());
			$db=mysql_select_db("my_opentourism") or die(mysql_error());
			
			$Query = "SELECT * FROM `evento` WHERE IDE = ".$ide.";";
			$res = mysql_query($Query, $con) or die(mysql_error());
			while($Dati = mysql_fetch_object($res))
			{
				$idpoi=$Dati->IDPOI;
				echo "<tr>";
				echo "<td><b>Nome</b></td>";
				echo '<td align="center">'.$Dati->nomeevento."</td></a>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><b>Descrizione</b></td>";
				echo '<td align="center">'.$Dati->descrizione."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><b>Data</b></td>";
				echo '<td align="center">'.$Dati->data."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><b>Ora inizio</b></td>";
				echo '<td align="center">'.$Dati->orainizio."</td></a>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><b>Durata</b></td>";
				echo '<td align="center">'.$Dati->durata."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><b>Partecipanti richiesti</b></td>";
				echo '<td align="center">'.$Dati->numminpa."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><b>Partecipanti massimi</b></td>";
				echo '<td align="center">'.$Dati->nummaxpa."</td></a>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><b>Costo Totale</b></td>";
				echo '<td align="center">'.$Dati->costotot."</td>";
				echo "</tr>";
				$dEv=explode('-',$Dati->data);
	
				
			}	
	mysql_close($con);
	$con=mysql_connect("localhost", "opentourism", "busnimodvo54");
	$db=mysql_select_DB("my_opentourism");
	$query= "SELECT * FROM  poi WHERE IDPOI=".$idpoi;
	//echo $query;
	$res=mysql_query($query, $con);
	$i=0;
	while($Dati = mysql_fetch_object($res))
	{
					$meteo = file_get_contents("http://www.andrealittera.it/meteo.php?lat=".$Dati->coordinatex."&lng=".$Dati->coordinatey);
					$meteo= '
					
					
					{"objects": [{"weather": {"status": "partly cloudy", "measured": {"wind_speed": 3.084, "wind_direction": 190.0, "temperature": 290.0, "humidity": 68}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-23T13:48:46.444118", "sun_altitude": 0.6488583087921143, "geo": {"type": "Point", "coordinates": [13.0, 41.0]}, "icon": "https://api.metwit.com/v2/icons/partly_sunny"}, {"sources": ["weatherbug", "wwo", "weather2"], "weather": {"status": "clear", "measured": {"wind_speed": 7, "wind_direction": 140, "temperature": 288, "humidity": 81}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-23T15:00:00", "sun_altitude": 0.44963568449020386, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/sunny"}, {"sources": ["weatherbug", "wwo", "weather2"], "weather": {"status": "clear", "measured": {"wind_speed": 7, "wind_direction": 130, "temperature": 286, "humidity": 78}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-23T18:00:00", "sun_altitude": -0.13215546309947968, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/clear_moon"}, {"sources": ["weatherbug", "wwo", "weather2"], "weather": {"status": "clear", "measured": {"wind_speed": 7, "wind_direction": 120, "temperature": 285, "humidity": 75}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-23T21:00:00", "sun_altitude": -0.6588877439498901, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/clear_moon"}, {"sources": ["weatherbug", "wwo", "weather2"], "weather": {"status": "clear", "measured": {"wind_speed": 7, "wind_direction": 120, "temperature": 285, "humidity": 73}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-24T00:00:00", "sun_altitude": -0.810362696647644, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/clear_moon"}, {"sources": ["weatherbug", "wwo", "weather2"], "weather": {"status": "partly cloudy", "measured": {"wind_speed": 9, "wind_direction": 120, "temperature": 289, "humidity": 76}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-24T06:00:00", "sun_altitude": 0.1668035089969635, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/partly_sunny"}, {"sources": ["weatherbug", "wwo", "weather2"], "weather": {"status": "partly cloudy", "measured": {"wind_speed": 10, "wind_direction": 120, "temperature": 291, "humidity": 77}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-24T12:00:00", "sun_altitude": 0.8612990379333496, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/partly_sunny"}, {"sources": ["weatherbug", "wwo", "weather2"], "weather": {"status": "partly cloudy", "measured": {"wind_speed": 8, "wind_direction": 130, "temperature": 287, "humidity": 82}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-25T00:00:00", "sun_altitude": -0.803374707698822, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/partly_moon"}, {"sources": ["weatherbug", "wwo"], "weather": {"status": "rainy", "measured": {"wind_speed": 5, "wind_direction": 200, "temperature": 287, "humidity": 89}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-25T12:00:00", "sun_altitude": 0.8676713109016418, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/rainy"}, {"sources": ["weatherbug", "wwo"], "weather": {"status": "partly cloudy", "measured": {"wind_speed": 12, "wind_direction": 300, "temperature": 285, "humidity": 81}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-26T00:00:00", "sun_altitude": -0.796397864818573, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/partly_moon"}, {"sources": ["weatherbug"], "weather": {"status": "cloudy", "measured": {"wind_speed": 8, "wind_direction": 320, "temperature": 286, "humidity": 73}}, "location": {"country": "Italy", "locality": "Ponza"}, "timestamp": "2013-03-26T12:00:00", "sun_altitude": 0.8740212917327881, "geo": {"type": "Point", "coordinates": [12.83203125, 40.95703125]}, "icon": "https://api.metwit.com/v2/icons/cloudy"}], "meta": {}}
					';
					
					
					$jsmet = json_decode($meteo, TRUE);
					//var_dump($jsmet["objects"]);
					$a=true;
					for($m = 0; $m <= 10; $m++){
						
						$dEv2=explode('-',($jsmet["objects"][$m]["timestamp"]));
						$dEv2= explode("T",$dEv2[2]);
						//echo $dEv[2]."  ".$dEv2[0];
						if($dEv[2]==$dEv2[0]){ 
						
							if($a){
					
					echo "<td><b>Meteo</b></td>";
					echo '<td align="center">'.'<img src="'.($jsmet["objects"][$m]["icon"]).'" \>'."</td>";
					echo "</tr>";
					$a=false;
						
							}
						}
						
					}
		
		
		
		
		$nomepoi = str_replace("'", "\'",$Dati->nomepoi);
		$desc = str_replace("'", "\'",$Dati->desc);
		$i++;
		$testomappa= "['".$nomepoi."', ".$Dati->coordinatex.", ".$Dati->coordinatey.", ".$i.", '".$desc."', ".$Dati->IDPOI."],";
	}	
	?>		
		</table>

  <div id="map" style="height: 400px; width: 500px;">
</div>
<script type="text/javascript">
    var locations = [
	<?php echo $testomappa;?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i; 

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
	var a=locations[i][5]+'';
  infowindow.setContent(locations[i][0] + '<br>' + locations[i][4] + '<br>'+ '<a href = \"create.php?id=' +a+  '\">Crea evento qua</a>'+ '<a href = \"eventi.php?id=' +a+  '\">&#160;&#160;&#160;&#160;&#160;&#160;&#160;Visualizza Eventi Programmati</a>');
infowindow.disableAutoPan = false;          
infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
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

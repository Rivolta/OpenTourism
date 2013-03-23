<?php include "generale.php"; ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="images/style.css">
  <title>Opentourism | Mappa</title>
  <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

</head>
<body>
<div id="wrapper">
<?php Header2();?>
	<div id ="content-wrap">
  <div id="map" style="height: 600px; width: 600px;">
</div>
<script type="text/javascript">
    var locations = [
      <?php
	$con=mysql_connect("localhost", "opentourism", "busnimodvo54");
	$db=mysql_select_DB("my_opentourism");
	$query= "SELECT * FROM  poi WHERE coordinatex < 45.966425 AND coordinatey > 6.745605 AND coordinatex > 40.313043 AND coordinatey < 18.984375;";
	$res=mysql_query($query, $con);
	$i=0;
	while($Dati = mysql_fetch_object($res))
	{
		$nomepoi = str_replace("'", "\'",$Dati->nomepoi);
		$desc = str_replace("'", "\'",$Dati->desc);
		$i++;
		echo "['".$nomepoi."', ".$Dati->coordinatex.", ".$Dati->coordinatey.", ".$i.", '".$desc."', ".$Dati->IDPOI."],";
	}	
	?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(41.89001,12.489738),
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
  infowindow.setContent(locations[i][0] + '<br>' + locations[i][4] + '<br>'+ '<a href = \"create.php?id=' +a+  '\">Crea evento qua</a>'+ '&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<a href = \"eventi.php?id=' +a+  '\">Visualizza Eventi Programmati</a>');
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

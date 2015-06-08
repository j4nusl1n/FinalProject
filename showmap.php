<!DOCTYPE html>
<?php session_start() ?>
<html>
	<?php
		$lat=$_GET['lat'];
		$lng=$_GET['lng'];
	?>
	<head>
	<title>Geolocation</title>
	<link rel="SHORTCUT ICON" href="123.ico">
	<h1>Geometric Location</h1>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
		html { height: 100% }
		body { height: 100%; margin: 0; padding: 0 }
		map_canvas 
		{ 
			height: 100% 
			margin: 0px auto
		}
	a:link {
		text-decoration: none;
		color: #1e90ff;
	}
	a:visited {
		text-decoration: none;
		color: #ff1493;
		
	}
	a:hover {
		text-decoration: underline;
		color: #ff4500;
		cursor: pointer;
	}
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCnkgFgNMRfMunV1xOlvzwqT99kzG4LtWQ&sensor=false">
    </script>
    <script type="text/javascript">
		
      function initialize() {
		<?php
			echo "var lat=$lat;
				  var lng=$lng;";
		?>
		//console.log(lat);console.log(lng);
		var myLatLng= new google.maps.LatLng(lat, lng);
        var mapOptions = {
          center:myLatLng,
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
			
		var marker= new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Household Position'
		});
      }
	  
	  google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	</head>
	<body onload="initialize()" style="font-family:Arial; font-size: large">
	<section>
		<article><div id="map_canvas" style="width:500px; height:500px"></div></article>
		<article><p><a href=householdinfo.php>Back to Household Information</a></p></article>
	</section>
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Search Alumnis</title>
	<link href="css/bootstrap.css" rel="stylesheet" />
	  
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
	<style>
		.search{
			margin-top: 200px;
		}

		#map{
			width: 100%;
			height: 400px;
			


		}
		.display{
			margin-top: 40px;
			margin-bottom: 100px;
		}
	</style>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top" id="menu">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.html" class="navbar-brand">ABPS_ONLINE</a>

		</div>
		<div class="navbar-collapse collapse move-me">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="about.php">About</a></li>
				<li><a href="search.php">Search</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="">Admin</a></li></ul>

		</div>
	</div>
</div>


<div class="search">
	<div class="container">

	<div class="row">
		
			<div class="col-lg-8 col-lg-offset-2">
				
				<div class="form-group">
					<label for="cityname">Enter Place</label>
					<input type="text" name="search" placeholder="Enter City" id="cityname" class="form-control">		
				</div>
				<button type="submit" id="btn2" class="btn btn-danger">Submit</button>
			</form>
			</div>
			
		
	</div>
	
</div>
	
</div>


<!--Map section-->
<div class="display">
	<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-4 col-md-offset-4 col-sm-12">
			<div id="map"></div>			
		</div>
		
	</div>
	
</div>
	
</div>






<script>
		function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        $('#frm').submit(function(event){
        	event.preventDefault();
        	geocodeAddress(geocoder, map);

        });
        
        }
       
      
      
      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('cityname').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
	</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5qWSDiuxPZ29WGjrNJNBp9YOVGoZqFZM&callback=initMap">
    </script>
  <script src="js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="js/bootstrap.js"></script>
</body>
</html>
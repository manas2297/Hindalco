





<!DOCTYPE html>
<html>
<head>
	<title>Search Alumns</title>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	 
	<link href="css/bootstrap.css" rel="stylesheet" />
	  
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
	<style>
		body{
			background-color: #eee;
			min-height: 100%;
		}
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
		.foot{
    background-color: #2E3436;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}
	</style>
</head>
<body>

	<?php include('navbar.php');?>

	
	<div class="container  search">

		<div class="row">
			
	<div class="form-group">
		
		<label for="inputBatch">Select Batch</label>  							
		<select name="batch" id="inputBatch" class="form-control"></select>
	</div>

		<input type="submit" id="city-submit" value="OK" class="btn btn-success">
			</div>
			
		</div>


		
	</div>
	
	
	<div class="display">
	<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12">
			<div id="map"></div>			
		</div>
		
	</div>
	
</div>
	
</div>

<footer class="foot">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<p>Made By: Manas Yadav. All Rights Reserved</p>
			</div>
		</div>
	</div>
</footer>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script >
  		var address;
		var geocoder;
		var map;
		var marker;
		var infowindow;
		//Global function for info window

		//function bindInfo(marker, map,html){

			//infowindow= new google.maps.InfoWindow({
			//	content:
			//})
		//	console.log(html);
		//	console.log(address[html]['name']);
		//	marker.addListener('click',function(){
				//infowindow.setContent(html);
		//		infowindow.open(map,this);
		//	})
		//}


		function mark(result,map,add){
			infowindow = new google.maps.InfoWindow();
			 var marker1 = new google.maps.Marker({
              map: map,
              position: result[0].geometry.location,
              title: add['name']
            });

			 var contentString ="<div class='panel panel-primary'>"+"<div class='panel-heading'>"+add['name']+"</div>"+"<div class='panel-body'>Facebook Link: <a target='_blank' href='"+decodeURIComponent(add['fb'])+"'>Open Fb Profile</a>"+"<p>Stream: "+add['stream']+"</p><p>Batch: "+add['batch']+"</p></div> "+"</div>";
			 marker1.addListener('click',function(){
			 	infowindow.setContent(contentString);
			 	infowindow.open(map,this);
			 })

		}


  		function initMap() {
        			 map = new google.maps.Map(document.getElementById('map'), {
          							zoom: 8,
          							center: {lat: -34.397, lng: 150.644}
        			});
        		 geocoder = new google.maps.Geocoder();
        }
  	

  	$('#city-submit').on('click',function(){
  		
  		var batch = $('#inputBatch').val();
  		if($.trim(city)!=''|| batch !='' ){
  			$.post('testpost.php',{ batch:batch },function(data){
  				
  				address=new Array(data.length);
  				//marker= new Array(data.length);
  				//infowindow = new Array(data.length);
  				for (var i = 0; i < data.length; i++) {
  					address[i] = data[i];
				}
				
  				geocodeAddress(geocoder, map);

  				
  			},"json");
  		}


  	});

  	
  	function geocodeAddress(geocoder, resultsMap) {
         


        
        geocoder.geocode({'address': address[0]['address']}, function(results, status) {
          if (status === 'OK') {
             

            resultsMap.setCenter(results[0].geometry.location);
            
             mark(results,resultsMap,address[0]);

          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
       
       
        for( var i=1;i<address.length;++i){
        	  
        	let j =i;
        	geocoder.geocode({'address': address[i]['address']}, function(results, status) {
          		
          		if (status === 'OK') {
           			mark(results,resultsMap,address[j]);
                } else {
            		alert('Geocode was not successful for the following reason: ' + status);
          			}
        	});
        }

       
	}//end of geo
  </script>
  <script>
	var start = 1980;
	var end = new Date().getFullYear();
	var options = " ";
	for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("inputBatch").innerHTML = options;
</script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5qWSDiuxPZ29WGjrNJNBp9YOVGoZqFZM&callback=initMap">
    </script>

  
 
</body>
</html>
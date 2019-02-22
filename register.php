
<?php

$servername="localhost";
	$username="id3896410_manas";
	$password="1234567";





	if($_SERVER['REQUEST_METHOD']=="POST"){

	$name=$email=$city=$address1=$address2=$fb=$batch=$stream="";
	
	$name=test_input($_POST['AL_name']);
	$email=test_input($_POST['email']);
	$address= test_input($_POST['address1'].", ".$_POST['address2'].", ".$_POST['city'].", ".$_POST['state']);
	$city=test_input($_POST['city']);
	$fb=urlencode($_POST['url']);
	$fb=test_input($fb);
	$batch=test_input($_POST['batch']);
	$stream=test_input($_POST['stream']);

	
	//echo $address;	

		try {
		$conn = new PDO("mysql:host=$servername;dbname=id3896410_alumni", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$query = "SELECT * from `al_entry` where `email`='$email'";
    	$res = $conn->query($query);
    if($res->fetchColumn()==0){
    	$sql = "INSERT into `al_entry` (`name`, `email`,`address`,`city`,`fb`,`stream`,`batch`) values ('$name','$email','$address','$city','$fb','$stream','$batch')";
		$conn->exec($sql);

    	
    }else{
    	echo "<script>alert('You have Already Registered');</script>";
    }
    
	} catch (Exception $e) {
		 echo  $e->getMessage();

	}

	
	}

	function test_input($data){
		 $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	}









?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	 <link href="css/bootstrap.css" rel="stylesheet" />
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
     CUSTOM STYLE CSS -->-->
   
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />

	<style>
	
	body{
		background-color: #42413b;
		min-height: 100%;
	}


	.centered-form{
    margin-top: 50px;
    margin-bottom: 40px;
}

.centered-form .panel .panel-heaeding{
	
	font-weight: bold;
	text-transform: uppercase;
	

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
				
				<li><a href="exam.php">Search</a></li>
				<li><a href="register.php">Register</a></li>
				

		</div>

	</div>
</div>
	<div class="container">
		<div class="row centered-form">
			<div class="col-xs-12 col-sm-12 col-md-8  col-md-offset-2 ">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">
						Register Here
					</div>
					<div class="panel-body">

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="form-group">
						<label for="name_e">Name</label>
						<input type="text"  class="form-control" name="AL_name" id="username" placeholder="Enter Your Name" required>

					</div>
  					<div class="form-group">
   						 <label for="user">Email address</label>
    					 <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="">
    					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  					</div>
  					<div class="form-row">
  						<div class="form-group col-md-6 col-sm-6 col-xs-6">
  							<label for="inputStream">Stream</label>
  							<select name="stream" id="inputStream" class="form-control">
  								<option value="Commerce">Commerce</option>
  								<option value="Science">Science</option>
  							</select>
  							
  						</div>
  						<div class="form-group col-md-6 col-sm-6 col-xs-6">
  							<label for="inputBatch">Batch</label>  							<select name="batch" id="inputBatch" class="form-control">
  			      				</select>
  						</div>
  					</div>
  					<div class="form-group">
  						<label for="fb">Facebook Link</label>
  						<input type="url" class="form-control" name="url" id="fb" placeholder="Paste Fb link here">
  						
  					</div>
  					<div class="form-group">
    					<label for="inputAddress">Address</label>
    					<input type="text" class="form-control" name="address1" id="inputAddress" placeholder="1234 Main St" required="">
  					</div>
  					<div class="form-group">
    					<label for="inputAddress2">Address 2</label>
    					<input type="text" class="form-control" name="address2" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
  					</div>
  					<div class="form-row">
    					<div class="form-group col-md-6">
     						 <label for="inputCity">City</label>
     						 <input type="text" class="form-control" name="city" id="inputCity" required placeholder="Varanasi">
   						 </div>
   						 <div class="form-group col-md-6 col-sm-6 col-xs-6">
   						 	<label for="inputState">State</label>
   						 	<input type="text" class="form-control" name="state" id="inputState" required placeholder="Gujrat">
   						 	
   						 </div>
					</div>
 					<button type="submit" class="btn btn-success btn-block">Submit</button>
				</form>

						
					</div>
					
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





<script src="js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
         <script src="js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="js/scrollReveal.js"></script>
    <!--  Scroll Scripts -->
    <script src="js/jquery.easing.min.js"></script>
    <!--  Custom Scripts -->
         <script src="js/custom.js"></script>
<script>
	var start = 1980;
	var end = new Date().getFullYear();
	var options = " ";
	for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("inputBatch").innerHTML = options;
</script>

</body>
</html>

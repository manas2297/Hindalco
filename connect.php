<?php 

	$servername="localhost";
	$username="id3896410_manas";
	$password="1234567";

	try{
		$conn = new PDO("mysql:host=$servername;dbname=id3896410_alumni",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
	}catch(Exception $e){
		echo $e->getMessage();

	}



 ?>
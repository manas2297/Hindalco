<?php 

	if((isset($_POST['city']) === true && empty($_POST['city'])===false)||isset($_POST['batch'])===true && empty($_POST['batch'])===false ){
		$batchy = $_POST['batch'];
		$citye = $_POST['city'];
		require 'connect.php';
		if(empty($citye)===false && isset($_POST['batch'])===true)
		{
			$query = "SELECT * from `al_entry` where `city`='$citye' and `batch`='$batchy'";
		$res = $conn->query($query);
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
			if($res===false){
				echo "No result Found";
			}else{
				echo json_encode($row);
			}
		}

		if(empty($citye)===true && isset($_POST['batch'])===true){
			$query = "SELECT * from `al_entry` where `batch`='$batchy'";
		$res = $conn->query($query);
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
			if($res===false){
				echo "No result Found";
			}else{
				echo json_encode($row);
			}
		}

		
		
		
	}

 ?>
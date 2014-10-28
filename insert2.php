<?php 
	session_save_path();
	session_start();

$mysqli = mysqli_connect ("oniddb.cws.oregonstate.edu", "beltramk-db","RdqbDrKgjY7IGBw0","beltramk-db");

if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	} else {

		if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
			$username = mysqli_real_escape_string($mysqli, $_SESSION['username']);
			$password = mysqli_real_escape_string($mysqli, $_SESSION['password']);
		}

		if ((isset($_POST['name'])) && (isset($_POST['address'])))   {
			$name = mysqli_real_escape_string($mysqli,$_POST['name']);
			$address = mysqli_real_escape_string($mysqli,$_POST['address']);
			$city = mysqli_real_escape_string($mysqli,$_POST['city']);
			$state = mysqli_real_escape_string($mysqli,$_POST['state']);
			$ZIP = mysqli_real_escape_string($mysqli,$_POST['ZIP']);
			$email = mysqli_real_escape_string($mysqli,$_POST['email']);
	               $sql = "UPDATE login 
			SET name = '$name',
			    address = '$address',
			    city = '$city',
			    state = '$state',
	                    ZIP = '$ZIP',
			    email = '$email'
			WHERE userid = '$username'";
			 $result = mysqli_query($mysqli, $sql);}
		
		if ($result === TRUE) {
			header("Location: comments4.php");		}
	}
	
	mysqli_close($mysqli);

?>


	



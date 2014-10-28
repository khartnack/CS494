<?php 
session_save_path();
session_start();
$mysqli = mysqli_connect ("oniddb.cws.oregonstate.edu", "beltramk-db","RdqbDrKgjY7IGBw0","beltramk-db");

if (mysqli_connect_error()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
 } else {

	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);



$sql = "SELECT todo1 FROM login WHERE
	userid = '".$username."' AND
	password = '".$password."' ";


$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) == 1) {	

        echo ('valid_combo');
    	 $_SESSION['username']= $username;
        $_SESSION['password']= $password;
	 
} else {
	echo ('invalid_combo');
}
}
mysqli_close($mysqli);

?>

<?php
$mysqli = mysqli_connect ("oniddb.cws.oregonstate.edu", "beltramk-db","RdqbDrKgjY7IGBw0","beltramk-db");

if (mysqli_connect_error()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
 } else {

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $minuser = strlen($username);
    $minpass = strlen($password);
	if (($username == null) || ($minuser < 4 ) || ($minpass < 8 ))
	{
	   echo ('invalid');
          exit();
      }
    $sql = "INSERT INTO login (userid, password)
         VALUES ('".$username."','".$password."')"; 
    $result = mysqli_query($mysqli, $sql);   
    if ($result === TRUE) {
	echo ('new_user');
    } else {
        echo ('user_exists');
    }
}
    mysqli_close($mysqli);
?>

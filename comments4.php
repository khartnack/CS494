<?php 
	session_save_path();
	session_start();
	if ((isset($_SESSION['username'])) && (isset($_SESSION['password'])))
				$username = $_SESSION['username'];
	else
{
	header("Location: photo_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Family Address Book</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="css/layouts/marketing.css">
<script>
$(document).ready(function() {$("form").validate();});
</script>

</head>
<body>




<div class="content">
    <div class="header">
        <div class="pure-menu pure-menu-open pure-menu-fixed pure-menu-horizontal">
            <a class="pure-menu-heading" href="my_slide_test.php">Family Photobook</a>
		<a class="pure-menu-heading" href="">Address Book</a>
            <a class="pure-menu-heading" href="logout.php">Logout</a>



        </div>
    </div>

    <div class="splash">
        <div class="pure-g-r">
            

           
  <div class="pure-u-1-3">

<h1>Family Contact List</h1>


<?php
$mysqli = mysqli_connect ("oniddb.cws.oregonstate.edu", "beltramk-db","RdqbDrKgjY7IGBw0","beltramk-db");

if (mysqli_connect_error()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
 } else {

if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) 
{

	$username = mysqli_real_escape_string($mysqli, $_SESSION['username']);
	$password = mysqli_real_escape_string($mysqli, $_SESSION['password']);
}
$sql = "SELECT *  FROM login";
$res = mysqli_query($mysqli, $sql);
	if ($res) {
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) 
		{
		$username = $newArray['userid'];
               $todo1 = $newArray['todo1'];
		$name = $newArray['name'];
		$address = $newArray['address'];
		$city = $newArray['city'];
		$state = $newArray['state'];
		$ZIP = $newArray['ZIP'];
		$email = $newArray['email'];
		echo "<div class=todo1>".$name."<br>".$address."<br>".$city."<br>".$state." ".$ZIP."<br>".$email."<br><br></div>";}

	} else {echo "Error";}

mysqli_free_result($res);
mysqli_close($mysqli);
}
?>



<script src="http://yui.yahooapis.com/3.12.0/build/yui/yui.js"></script>
<script>
YUI().use('node-base', 'node-event-delegate', function (Y) {
    // This just makes sure that the href="#" attached to the <a> elements
    // don't scroll you back up the page.
    Y.one('body').delegate('click', function (e) {
        e.preventDefault();
    }, 'a[href="#"]');
});
</script>
 
 
 
<script type="text/javascript"> 
function startAjax(){ 
 $("#message").text("Calling server...");
$.ajax({
                type: "POST",
		cache: false,
                data: {
                  username: $('#username').val(),
		    password: $('#password').val()

                },
                url: "addaccount.php",
                success: function(data)
                {
                    if(data === 'user_exists')
                    {
                        $('#message')
                            .css('color', 'red')
                            .html("User Name already in use.  Please choose another.");
                    }
                    else if(data === 'new_user')
                    {
			$('#message')
				 document.location.href="photo_login_welcome.php";
                    }
                    else if(data === 'invalid')
                    {
			$('#message')
                            .css('color', 'red')
                            .html("Error:  Please enter at least 4 characters for User Name and 8 characters for Password.");
                    }
                },
 		   	error: function (request, error, status) {
                 	 $('#message')
                 	.css('color', 'red')
                 	.html(request.responseText);
                }
            })              
        }
</script>


                  





 
                </div>
        




 <div class="pure-u-2-3">
                <div class="l-box splash-text">

         
<h3>Update Your Contact Information</h3>
<form class="pure-form pure-form-aligned" method="POST" action="insert2.php">
    <fieldset>
	 
        <div class="pure-control-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" placeholder="Requires a Name" required>
        </div>
        <div class="pure-control-group">
            <label for="address">Address</label>
            <input id="address" type="text"  name="address"  placeholder="Requires an Address" required>
        </div>
        <div class="pure-control-group">
            <label for="city">City</label>
            <input id="city" type="text"  name="city" placeholder="Requires a City" required>
        </div>
        <div class="pure-control-group">
            <label for="state">State</label>
            <input id="state" type="text"  name="state" placeholder="Requires a State" required>
        </div>
        <div class="pure-control-group">
            <label for="ZIP">ZIP</label>
            <input id="ZIP" type="text"  name="ZIP" placeholder="Requires a ZIP" required>
        </div>
        <div class="pure-control-group">
            <label for="email">email</label>
            <input id="email" type="email" placeholder="email" name="email">
        </div>
       <div class="pure-controls">
            <button type="submit" name="submit" value="insert" class="pure-button pure-button-primary">Update</button>
        </div>
    </fieldset>
</form>



    </div>
        </div>
    </div>
</div>


    <div class="footer">
        View the source of this layout to learn more. Made with love by the YUI Team.
    </div>
</div>

<script src="http://yui.yahooapis.com/3.12.0/build/yui/yui.js"></script>
<script>
YUI().use('node-base', 'node-event-delegate', function (Y) {
    // This just makes sure that the href="#" attached to the <a> elements
    // don't scroll you back up the page.
    Y.one('body').delegate('click', function (e) {
        e.preventDefault();
    }, 'a[href="#"]');
});
</script>




</body>
</html>


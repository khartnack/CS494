<?php 
session_save_path();
session_start();
if ((isset($_SESSION['username'])) && (isset($_SESSION['password'])))
	header("Location: my_slide_test.php");
else
{
	$msg = "";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Family Photobook - Login</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="css/layouts/marketing.css">
</head>
<body>




<div class="content">
    <div class="header">
        <div class="pure-menu pure-menu-open pure-menu-fixed pure-menu-horizontal">
            <a class="pure-menu-heading" href="">Family Photobook</a>


        </div>
    </div>

    <div class="splash">
        <div class="pure-g-r">
            <div class="pure-u-1-3">
                <div class="l-box splash-image">
                    <img src="doubleheader2.jpg"
                         alt="Family Photo">
                </div>
            </div>

            <div class="pure-u-2-3">
                <div class="l-box splash-text">
                    <h1 class="splash-head">
                        Family Photobook
                    </h1>

                    <h2 class="splash-subhead">
                        Come view our family photos in one place and add yours too.  We can now combine all of our photos in one place -- including family trips and fun photos that you take on your own.  Grandma will be very happy! 
                    </h2>


<div>Username: <input type="text" name="username" id="username"></div>
<div>Password: <input type="password" name="password" id="password"></div>


<p>

 
                     <div id="submit" onclick="startAjax()"><a href="#" class="pure-button primary-button">Login</a></div>

<div id="message"></div>
<div><a href="createaccount3.php">Create Account</a></div>
</p>
                

<script type="text/javascript"> 
function startAjax(){ 
 $.ajax({
                type: "POST",
                data: {
                    username: $('#username').val(),
		    password: $('#password').val()
                },
                url: "login.php",
                success: function(data)
                {
                    if(data === 'valid_combo')
                    {
			window.location.href = "my_slide_test.php";
                    }
                    else 
                    {
			   $('#message')
                            .css('color', 'red')
                            .html("ERROR: invalid login.  Try again or create new account.");			
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




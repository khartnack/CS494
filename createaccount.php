<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Family Photobook - Create User Account</title>
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
            <a class="pure-menu-heading" href="">Family Photobook</a>


        </div>
    </div>

    <div class="splash">
        <div class="pure-g-r">
            

            <div class="pure-u-1">
                <div class="l-box splash-text">
          <h1>Create an Account</h1>

                    <h2 class="splash-subhead">
                     Set up your username and password so that you can view our family photos.<br>Choose a username with 4 or more characters and a password with at least 8 characters. 
                    </h2>


<div id="hide_login">
<form  onsubmit="return false;">
User Name:<input id="username" name="username" minlength="4"><BR>
Password: <input id="password" name="password" type="password" minlength="8">
<BR><br>
 <div id="submit" onclick="startAjax()"><a href="#" class="pure-button primary-button">Create Account</a></div>
</form>
</div>
<br>
<div id="message"></div>
<br>
 
 
 
 
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





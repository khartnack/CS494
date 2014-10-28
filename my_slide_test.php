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
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Family Photo Album</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="Page uses SlidesJS and the standard sample code from Nathan Searles and a sample layout using pureio.css.">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="css/layouts/gallery.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="./uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="./uploadify/uploadify.css"/>
<script type="text/javascript">
   <?php $timeStamp = time();?>   
   $(function() {
    $('#file_upload').uploadify({
    'swf'      : './uploadify/uploadify.swf',
    'uploader' : './uploadify/uploadify.php',
    'fileTypeExts' : '*.gif; *.jpg; *.JPG; *.png;',
     'formData'	: {
	'timestamp'	: '<?php echo $timeStamp;?>',
	'token'	: '<?php echo md5('unique_salt' . $timeStamp);?>'
}
});
    });
  </script>

  <!-- SlidesJS Required (if responsive): Sets the page width to the device width. -->
  <meta name="viewport" content="width=device-width">
  <!-- End SlidesJS Required -->

  <!-- CSS for slidesjs.com example -->

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- End CSS for slidesjs.com example -->

  <!-- SlidesJS Optional: If you'd like to use this design -->
  <style>
    body {
      -webkit-font-smoothing: antialiased;
      font: normal 15px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #232525;
//      background-color:#999999;
      background-color:#E6E6E6;


    }

    #slides {
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:3px;
    }

    #slides .slidesjs-previous {
      margin-right: 5px;
      float: left;
    }

    #slides .slidesjs-next {
      margin-right: 5px;
      float: left;
    }

    .slidesjs-pagination {
      margin: 6px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(img/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
  </style>
  <!-- End SlidesJS Optional-->

  <!-- SlidesJS Required: These styles are required if you'd like a responsive slideshow -->
  <style>
    #slides {
      display: none
    }

    .container {
      margin: 0 auto
    }

    /* For tablets & smart phones */
    @media (max-width: 767px) {
      body {
        padding-left: 20px;
        padding-right: 20px;
      }
      .container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px
      }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 1170px
      }
    }
  </style>
  <!-- SlidesJS Required: -->
</head>




<body>






<div>
    <div class="header">
        <div class="pure-menu pure-menu-open pure-menu-horizontal">
            <a class="pure-menu-heading" href="">Family Photobook</a>
	   <a class="pure-menu-heading" href="comments4.php">Address Book</a>

            <ul>
             
		  <li><a href="logout.php">Logout</a></li>

            </ul>
        </div>
    </div>

    <div class="pure-g-r">
        <div class="pure-u-1-3 photo-box">
            <a href="gingie2.jpg">
                <img src="gingie2.jpg"
                     alt="Family Photos">
            </a>

            <aside class="photo-box-caption">
                Gingie comes home to visit.
            </aside>
        </div>

        <div class="pure-u-1-3 text-box">
            <div class="l-box">
                <h1 class="text-box-head">The Hartnack Family</h1>
                <p class="text-box-subhead">A collection of our extended family photos.</p>
            </div>
        </div>


        <div class="pure-u-1-3 text-box pure-hidden-phone">
            <div class="l-box">
 <h2>Add Your Photos</h2>
<input type="file" id="file_upload" name="file_upload"/> 

          </div>
        </div>
       
  <!-- SlidesJS Required: Start Slides -->
  <!-- The container is used to define the width of the slideshow -->
  <div class="container">
    <div id="slides">
<?php
// see http://simplehtmldom.sourceforge.net/manual_api.htm for documentation
require_once( 'simple_html_dom.php' );
 
// Create DOM from URL or file
$html = 
file_get_html('http://web.engr.oregonstate.edu/~beltramk/CS494/final2/uploadify/myuploads/');
foreach($html->find('tr > td > a') as $element)
{
      $url = 
('http://web.engr.oregonstate.edu/~beltramk/CS494/final2/uploadify/myuploads/' . $element->href);	
      echo ('<img alt="family_photo" ' . 'src="' . $url . '">'); }
?>



    </div>
  </div>
  <!-- End SlidesJS Required: Start Slides -->

  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Link to jquery.slides.js -->
  <script src="js/jquery.slides.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 700,
        height: 393,
        navigation: false,
	 start: 2
      });
    });
  </script>

  <!-- End SlidesJS Required -->

        </div>



       </div>

    <div class="footer">
        View the source of this layout to learn more. Made with love by the YUI Team.
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















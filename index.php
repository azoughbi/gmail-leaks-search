<?php
$db_hostname = '';
$db_username = '';
$db_password = '';
$db_database = '';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ahmad Zoughbi Blog | Gmail leaks</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <meta property="og:image" content="https://azoughbi.me/content/uploads/gmail-logo-34666.jpg" />
    <meta property="og:description" content="A list of almost five million Gmail addresses and passwords. You can check if your email is leaked here" />
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
function validateForm() {
    var x = document.forms["leak"]["term"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
</script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" href="#">Ahmad Zoughbi | Gmail leaks</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Search</a></li>
            <li><a href="https://azoughbi.me">Blog</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Check if your email is leaked!</h1>
        <p class="lead">You have to enter your email completely to avoid large list of suggestions</p>
        <p>Example: <span class="label label-success">correct</span> me@azoughbi.me, <span class="label label-danger">wrong</span> ahmad</p>

        <form action="" class="navbar-form navbar-left" role="search" method="post" id="contact-form" onsubmit="return validateForm();" name="leak">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="term">
        </div>
        <button type="submit" class="btn btn-primary" value="Search">Submit</button>
      </form>
	<br />
	</div>
      <?php
      if (!empty($_REQUEST['term'])) {

      $term = mysql_real_escape_string($_REQUEST['term']);     

      $sql = "SELECT * FROM tbl_leaks WHERE Email LIKE '%".$term."%'"; 
      $r_query = mysql_query($sql); 

      if ($row = mysql_fetch_array($r_query)){  
      echo '<div class="alert alert-danger" role="alert">The Email: <strong>'.$row['Email']. '</strong> is leaked, please update your password NOW! </div>';
      }
      else {
	echo '<div class="alert alert-success" role="alert">Your Email is safe!</div>';
      } 

      }
      ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

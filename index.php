<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>
      <?php 
        if (!isset($_GET['page']))
          echo "Kyle's Homepage";
      ?>
    </title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/justified-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted">Welcome to Kyle's homepage</h3>
        <?php 
			include("functions.php");		
		  	include("navigation.php");
		?>
      </div>
        <?php
			$dblink=db_connect("content");
            if (!isset($_GET['page']))
              $page="index";
            else 
              $page=$_GET['page'];
			$pageClean=addslashes($page);
			$sql="Select * from `pages` where `page_name`='$pageClean'";
            $result=$dblink->query($sql) or 
            	die("<p>Something went wrong with: $sql</p>".$dblink->error);
            $data=$result->fetch_array(MYSQLI_ASSOC);
			if($data['content_type']=="data")
				echo $data['content_data'];
			else
				include $data['content_data'];
        ?>
  </body>
</html>
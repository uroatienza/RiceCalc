<?php
	include("user.class.php");
	if(isset($_POST['uName']) && isset($_POST['pass'])){
		$u = new user();
		if($u->register($_POST['uName'],$_POST['pass'],$_POST['fName'],$_POST['lName'],$_POST['email'],$_POST['contact'])){
			header("Location: index.php?registered");	
		}else{
			echo "error";	
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<link rel="shortcut icon" href="images/favicon.ico" />

	<title>Sign Up</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/signin.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>

	<div class="container">
    	<div align="center"><img src="images/irriLogo.png"/></div>
		<div>
	  <form class="form-signin" action="" method="POST">
		<h2 class="form-signin-heading">Create an account</h2>
		<input type="text" name="fName" class="form-control" placeholder="First Name" autofocus>
		<input type="text" name="lName" class="form-control" placeholder="Last Name">
		<input type="text" name="contact" class="form-control" placeholder="Contact Number">
		<input type="email" name="email" class="form-control" placeholder="Email">
		<input type="text" name="uName" class="form-control" placeholder="User Name">
		<input type="password" name="pass" class="form-control" placeholder="Password">
		<label class="checkbox">
		  <input type="checkbox" value="subscribe"> Subscribe to Newsletter
		</label>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
	  </form>
	</div>
	</div> <!-- /container -->
	<div id="footer" align="center">
    <strong>IRRI &copy; 2013 All rights reserved.</strong>
    </div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

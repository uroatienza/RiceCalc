<?php
include("user.class.php");
$u = new user();


if(isset($_POST['fblogin_x']) && $_POST['fblogin_x']!=0 || isset($_GET['code'])){
	$app_id		= "1379135622317669";
	$app_secret	= "86a1aef2ac1270f1731b9611b1c03976";
	$site_url	= "http://ricecalc.dionyfguillen.info/";
	//$site_url	= "http://localhost/ricecalc/";
	 
	try{
		include_once "fbsdk/facebook.php";
	}catch(Exception $e){
		error_log($e);
	}
	$facebook = new Facebook(array(
		'appId'		=> $app_id,
		'secret'	=> $app_secret,
	));
	 
	$user = $facebook->getUser();
	 
	if($user){
		try{
	 		$user_profile = $facebook->api('/me');
		}catch(FacebookApiException $e){
			error_log($e);
			$user = NULL;
		}
	}

	if($user){
		// Get logout URL
		$logoutUrl = $facebook->getLogoutUrl();
	}else{
		// Get login URL
		$loginUrl = $facebook->getLoginUrl(array(
			'scope'		=> 'read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
			'redirect_uri'	=> $site_url,
		));
	}
		
	if($user){
		$queries = array(
			array('method' => 'GET', 'relative_url' => '/'.$user),
			array('method' => 'GET', 'relative_url' => '/'.$user.'/home?limit=50'),
			array('method' => 'GET', 'relative_url' => '/'.$user.'/friends'),
			array('method' => 'GET', 'relative_url' => '/'.$user.'/photos?limit=6'),
		);
	 
		try{
			$batchResponse = $facebook->api('?batch='.json_encode($queries), 'POST');
		}catch(Exception $o){
			error_log($o);
		}
	 
		$user_info		= json_decode($batchResponse[0]['body'], TRUE);
		$feed			= json_decode($batchResponse[1]['body'], TRUE);
		$friends_list	= json_decode($batchResponse[2]['body'], TRUE);
		$photos			= json_decode($batchResponse[3]['body'], TRUE);
		$_SESSION['name'] = $user_info['first_name']." ".$user_info['last_name'];
	}else{
		header("Location: ".$loginUrl);
		exit();
	}
}

echo isset($_GET['registered'])?"<script>alert('You can now log-in')</script>":0;

if(isset($_SESSION['name'])){
	header("Location: home.php");
	exit();
}
if(isset($_POST['user']) && isset($_POST['pass'])){
	if($u->login($_POST['user'],$_POST['pass'])){
		header("Location: home.php");
		exit();	
	}else{
		echo "<script>alert('Wrong username or password!')</script>";	
	}
}

if($u->checkAuth()){
	header("Location: home.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<link rel="shortcut icon" href="images/favicon.ico" />

	<title>Log In</title>

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
	  <form class="form-signin" method="POST" id="frmfb">
		<h2 class="form-signin-heading">Log in</h2>
		<input type="text" name="user" class="form-control" placeholder="Username" autofocus>
		<input type="password" name="pass" class="form-control" placeholder="Password">
		<label class="checkbox">
		  <input type="checkbox" value="remember-me"> Remember me <a href="signup.php" style="margin-left:130px">Sign Up</a>
		</label>
		
		<input type="image" onClick="document.getElementById('frmfb').submit()" src="images/login_fb.png" name="fblogin">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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

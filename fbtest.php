<?php
	$app_id		= "1379135622317669";
	$app_secret	= "86a1aef2ac1270f1731b9611b1c03976";
	$site_url	= "http://localhost/irri/";
	 
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
		echo "<a href='".$logoutUrl."' >Logout</a>";
	}else{
		// Get login URL
		$loginUrl = $facebook->getLoginUrl(array(
			'scope'		=> 'read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
			'redirect_uri'	=> $site_url,
		));
		echo "<a href='".$loginUrl."'>Login</a>";
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
	}
?>
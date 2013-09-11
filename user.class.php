<?php
	session_start();
	error_reporting(E_ALL);
	ini_set( 'display_errors','1');
	$db = new PDO("mysql:host=localhost;dbname=ricecalcdb","root","sniper");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	

	class user{

		function __construct(){
			//-- Construct ? --
		}

		function register($username,$password,$fn,$ln,$em,$contact){
			global $db;
			if($this->checkDup($username)){
				return 99;
			}else{
				$s = $db->prepare("INSERT INTO irri_users (username, password, first_name, last_name, email, contact) VALUES (?,?,?,?,?,?)");
				$arr = array($username,md5($password),$fn,$ln,$em,$contact);
				$e = $s->execute($arr);
				if($e === false):
					return 0;;
				else:
					return 1;
				endif;
			}
		}

		function login($uName, $pass){
			global $db;
			$s = $db->prepare("SELECT * FROM irri_users WHERE userName=?");
			$arr = array($uName);
			$e = $s->execute($arr);
			$f = $s->fetch();
			if($f['password'] == md5($pass)){
				$_SESSION['logged']=true;
				$_SESSION['username'] = $f['username'];
				$_SESSION['name'] = $f['first_name']." ".$f['last_name'];
				return 1;
			}else{
				return 0;
			}
		}

		function checkDup($username){
			global $db;
			$s = $db->prepare("SELECT * FROM irri_users WHERE userName=?");
			$arr = array($username);
			$e = $s->execute($arr);
			if($s->rowCount > 0){
				return 1;
			}else{
				return 0;
			}
		}

		function logout(){
			session_destroy();
			foreach($_SESSION as $key=>$value){
				unset($_SESSION['key']);
			}
			header("Location: index.php");
			exit();
		}

		function checkAuth(){
			return isset($_SESSION['name'])?1:0;
		}

		function changePassword($user, $password){
			global $db;
			$s = $db->prepare("SELECT * FROM irri_users WHERE username=?");
			$arr = array($user);
			$e = $s->execute($arr);
			$f = $s->fetch();
			if(md5($password) == $f['password']){
				if(updatePass($user,$pass)){
					return 1;
				}else{
					return 0;
				}
			}
		}

		function updatePass($user, $pass){
			global $db;
			$s = $db->prepare("UPDATE irri_users SET password=? WHERE username=?");
			$arr = array(md5($pass),$user);
			$e = $s->execute($arr);
			if($e === false){
				return 0;
			}else{
				return 1;
			}
		}
		

		function getVariety($in){
			global $db;
			$s = $db->prepare("SELECT variety,averageYield,maxYield,maturity,height,tillers,id FROM rice_varieties WHERE ecosystem=?");
			$arr = array($in);
			$e = $s->execute($arr);
			if($s->rowCount() > 0){
				return $s->fetchAll();
			}else{
				return 0;
			}
		}

		function getAllVariety(){
			global $db;
			$s = $db->prepare("SELECT variety,averageYield,maxYield,maturity,height,tillers,id FROM rice_varieties");
			$e = $s->execute();
			if($s->rowCount() > 0){
				return $s->fetchAll();
			}else{
				return 0;
			}
		}
		
		function getItemInfo($id){
			global $db;
			$s = $db->prepare("SELECT variety,averageYield,maxYield,maturity,height,tillers,blast,blb,tungro,bph,glh,stemborerDH,stemborerDHWSB,deadheartswhiteWSB,YSB FROM rice_varieties WHERE id=?");
			$arr = array($id);
			$e = $s->execute($arr);
			if($s->rowCount() > 0){
				return $s->fetch();
			}else{
				return 0;
			}
		}
	}

?>
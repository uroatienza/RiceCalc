<?php
	include("user.class.php");
	$u = new user();
	$arr = isset($_GET['id'])?$u->getItemInfo($_GET['id']):1;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rice Calculator</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="assets/css/flatly.css" rel="stylesheet" media="screen">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/functions.js"></script>
		<style>
			body{
				background-image: url("assets/img/bg2.jpg");
				background-position: center;
				background-repeat: no-repeat;
				background-position: fixed;
				background-color: #3faa3c;
				left: 0px;
				top: 0px;
			}
			.panel-default{
				opacity: 0.8;
			}
		</style>
	</head>
	
	<body>

	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"><img src="assets/img/rice.png" width="40px" style="margin-top:-7px;"> Calculator</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="#about"><span class="glyphicon glyphicon-question-sign"></span> About</a></li>
					<li><a href="#contact"><span class="glyphicon glyphicon-map-marker"></span> Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>

	<br><br><br><br>

	<div class="container">
		<table class="table table-bordered" style="background-color:#FFF;opacity:0.8;">
			<tr>
				<td class="col-md-3"><strong>Variety</strong></td>
				<td><?php echo $arr['variety']; ?></td>
			</tr>
			<tr>
				<td><strong>Average Yield</strong></td>
				<td><?php echo $arr['averageYield']; ?></td>
			</tr>
			<tr>
				<td><strong>Maximum Yield</strong></td>
				<td><?php echo $arr['maxYield']; ?></td>
			</tr>
			<tr>
				<td><strong>Maturity</strong></td>
				<td><?php echo $arr['maturity']; ?></td>
			</tr>
			<tr>
				<td><strong>Height</strong></td>
				<td><?php echo $arr['height']; ?></td>
			</tr>
			<tr>
				<td><strong>Tillers</strong></td>
				<td><?php echo $arr['tillers']; ?></td>
			</tr>
			<tr>
				<td><strong>Blast</strong></td>
				<td><?php echo $arr['blast']; ?></td>
			</tr>
			<tr>
				<td><strong>BLB</strong></td>
				<td><?php echo $arr['blb']; ?></td>
			</tr>
			<tr>
				<td><strong>Tungro</strong></td>
				<td><?php echo $arr['tungro']; ?></td>
			</tr>
			<tr>
				<td><strong>BPH</strong></td>
				<td><?php echo $arr['bph']; ?></td>
			</tr>
			<tr>
				<td><strong>GLH</strong></td>
				<td><?php echo $arr['glh']; ?></td>
			</tr>
			<tr>
				<td><strong>Stem Borer</strong></td>
				<td><?php echo $arr['stemborerDH']; ?></td>
			</tr>
			<tr>
				<td><strong>Dead Hearts</strong></td>
				<td><?php echo $arr['stemborerDHWSB']; ?></td>
			</tr>
			<tr>
				<td><strong>White Heads</strong></td>
				<td><?php echo $arr['deadheartswhiteWSB']; ?></td>
			</tr>
			<tr>
				<td><strong>YSB</strong></td>
				<td><?php echo $arr['YSB']; ?></td>
			</tr>
		</table>
	</div> <!-- /container -->

	</body>
</html>
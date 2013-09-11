<?php
	include("user.class.php");
	$u = new user();
	
	if(!$u->checkAuth()){
		header("Location: index.php");
		exit();	
	}
	
	if(isset($_GET['variety'])){
		if($_GET['variety'] == 1){
			$arr = $u->getVariety("Cool Elevated");
		}elseif($_GET['variety'] == 2){
			$arr = $u->getVariety("SALINE PRONE IRRIGATED LOWLAND");
		}elseif($_GET['variety'] == 3){
			$arr = $u->getVariety("UPLAND");		
		}elseif($_GET['variety'] == 4){
			$arr = $u->getVariety("IRRIGATED LOWLAND");		
		}elseif($_GET['variety'] == 5){
			$arr = $u->getVariety("IRRIGATED LOWLAND (HYBRID)");		
		}elseif($_GET['variety'] == 6){
			$arr = $u->getVariety("IRRIGATED LOWLAND (GLUTINOUS)");		
		}elseif($_GET['variety'] == 7){
			$arr = $u->getVariety("RAINFED LOWLAND (TRANSPLANTED)");		
		}elseif($_GET['variety'] == 8){
			$arr = $u->getVariety("RAINFED LOWLAND (DROUGHT PRONE)");
		}elseif($_GET['variety'] == 9){
			$arr = $u->getVariety("RAINFED LOWLAND (Dry Seeded)");		
		}else{
			$arr = $u->getAllVariety();		
		}
	}else{
		$arr = $u->getAllVariety();	
	}
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
				left: 0px;
				top: 0px;
			}
			.panel-default{
				opacity: 0.8;
			}
		</style>
		<style type="text/css" title="currentStyle">
			@import "css/demo_page.css"; @import "/css/header.ccss";
			@import "css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
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
		<div class="text-center">
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    Ecosystem Variety &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="variety.php?variety=1">Cool Elevated</a></li>
			    <li><a href="variety.php?variety=2">SALINE PRONE IRRIGATED LOWLAND</a></li>
			    <li><a href="variety.php?variety=3">UPLAND</a></li>
			    <li><a href="variety.php?variety=4">IRRIGATED LOWLAND</a></li>
			    <li><a href="variety.php?variety=5">IRRIGATED LOWLAND (HYBRID)</a></li>
			    <li><a href="variety.php?variety=6">IRRIGATED LOWLAND (GLUTINOUS)</a></li>
			    <li><a href="variety.php?variety=7">RAINFED LOWLAND (TRANSPLANTED)</a></li>
			    <li><a href="variety.php?variety=8">RAINFED LOWLAND (Drought Prone)</a></li>
			    <li><a href="variety.php?variety=9">RAINFED LOWLAND (Dry Seeded)</a></li>
			  </ul>
			</div>
		</div>
		<table cellpadding="0" cellspacing="0" border="0" class="display table" id="example" width="100%">
			<thead>
				<tr>
					<th>Variety</th>
					<th>Ave. Yield</th>
					<th>Max. Yield</th>
					<th>Maturity</th>
					<th>Height</th>
					<th>Tillers</th>
					<th>View</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($arr as $key=>$value){
						echo "<tr>";
							foreach($value as $key2=>$value2){
								if(is_numeric($key2)){		
									if($key2 == 6){
										echo "<td><a href='view.php?id={$value2}'>View</a></td>";									
									}else{						
										echo "<td>".$value2."</td>";
									}
								}
							}
						
						echo "</tr>";
					}
				?>
			</tbody>
		</table>

	</div> <!-- /container -->

	</body>
</html>
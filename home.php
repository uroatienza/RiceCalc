<?php
	include("user.class.php");
	$u = new user();
	if(!$u->checkAuth()){
		header("Location: index.php");
		exit();	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rice Calculator</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="assets/css/flatly.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/favicon.ico" />

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
					<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>  Hello <?php echo htmlentities($_SESSION['name']); ?>!</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>

	<br><br><br><br>

	<div class="container">
		<div class="col-md-3 well" style="opacity:0.9;">
			<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
				<li><a href="#" onClick="navCloseAll();$('#dryWeightLoss').slideDown('slow');">Drying weight loss</a></li>
				<li><a href="#" onClick="navCloseAll();$('#qualityOfMilledRice').slideDown('slow');">Quality of milled rice</a></li>
				<li><a href="#" onClick="navCloseAll();$('#qualityOfPaddyGrain').slideDown('slow');">Quality of paddy grain</a></li>
				<li><a href="#" onClick="navCloseAll();$('#calibration').slideDown('slow');">Calibration</a></li>
				<li><a href="#" onClick="navCloseAll();$('#establishmentRate').slideDown('slow');">Establishment rate</a></li>
				<li><a href="#" onClick="navCloseAll();$('#seedingRateHandBroadcasting').slideDown('slow');">Seeding rate<br><i><small>Hand broadcasting</small></i></a></li>
				<li><a href="#" onClick="navCloseAll();$('#seedingRateDrumSeeder').slideDown('slow');">Seeding rate<br><i><small>Drum seeder</small></i></a></li>
				<li><a href="#" onClick="navCloseAll();$('#seedLotPurity').slideDown('slow');">Seed lot purity</a></li>
                <li><a href="variety.php" >Variety Selector</a></li>
			</ul>
		</div>

		<div class="col-md-9">
			<div id="chooseWaterMark" ><img src="assets/img/choose.png" style="opacity:0.3;margin-top:-50px;margin-left:50px;"></div>
			<div id="dryWeightLoss" style="display:none;">
				<div class="panel panel-default">
					<div class="panel-heading text-center">Drying weight loss</div>
					<div class="panel-body">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="wetWeight" class="col-md-5 control-label">Wet weight of paddy?</label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="wetWeight">
									</div>
								</div>
								<div class="form-group">
									<label for="MCWet" class="col-md-5 control-label">Moisture content of wet paddy?</label>
									<div class="col-md-7">
										<div class="input-group">
											<input onKeyUp="update()"  onChange="update()" type="number" min="0" max="100" step="0" value="0" class="form-control" id="MCWet" >
											<span class="input-group-addon">%</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="MCDry" class="col-md-5 control-label">Moisture content of dry paddy?</label>
									<div class="col-md-7">
										<div class="input-group">
											<input onKeyUp="update()"  onChange="update()" type="number" min="0" max="100" step="0" value="0" class="form-control" id="MCDry" >
											<span class="input-group-addon">%</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="total" class="col-md-5 control-label"> Weight of dried paddy</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="text" class="form-control" id="total" disabled>
											<span class="input-group-addon">kg</span>
										</div>
									</div>
								</div>
							</div>
						<br><br><br>
						</form>
					</div>
				</div>
			</div><!-- /dryWeightLost -->

			<div id="qualityOfMilledRice" style="display:none;">

				<!-- Milling Recovery Body -->
				<div class="panel panel-default">
				  <div class="panel-heading" onClick="$('#millingRecoveryBody').slideToggle()">Milling Recovery</div>
				  <div class="panel-body" style="display:none;" id="millingRecoveryBody">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="MRB_PaddyWeight" class="col-md-5 control-label">Weight of Rice Paddy</label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="MRB_PaddyWeight">
									</div>
								</div>
								<div class="form-group">
									<label for="MRB_MilledWeight" class="col-md-5 control-label">Weight of Milled Rice</label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="MRB_MilledWeight">
									</div>
								</div>
								<div class="form-group">
									<label for="MRB_total" class="col-md-5 control-label"> Weight of Milling Recovery</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="text" class="form-control" id="MRB_total" disabled >
											<span class="input-group-addon">%</span>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /Milling Recovery Body -->

				<!-- Head Rice Recovery Body -->
				<div class="panel panel-default">
			  	<div class="panel-heading" onClick="$('#headRiceBody').slideToggle()">Head rice recovery</div>
			  	<div class="panel-body" style="display:none;" id="headRiceBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="HRR_BrokenGrain" class="col-md-5 control-label">Weight of broken grains</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="HRR_BrokenGrain">
								</div>
							</div>
							<div class="form-group">
								<label for="HRR_Milled" class="col-md-5 control-label">Weight of milled sample</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="HRR_Milled">
								</div>
							</div>
							<div class="form-group">
								<label for="HRR_Total" class="col-md-5 control-label"> Head rice recovery</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="HRR_Total" disabled>
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Head Rice Recovery Body -->

			<!-- Milling Degree Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#millingDegree').slideToggle()">Milling degree</div>
			  <div class="panel-body" style="display:none;" id="millingDegree">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="MD_Milled" class="col-md-5 control-label">Weight of milled rice</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="MD_Milled">
								</div>
							</div>
							<div class="form-group">
								<label for="MD_Brown" class="col-md-5 control-label">Weight of brown rice</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="MD_Brown">
								</div>
							</div>
							<div class="form-group">
								<label for="MD_Total" class="col-md-5 control-label"> Milling degree</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="MD_Total" disabled>
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Milling Degree Body -->

			<!-- Dockage(mr) Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#dockageBody').slideToggle()">Dockage(mr)</div>
			  <div class="panel-body" style="display:none;" id="dockageBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="DMR_Dockage" class="col-md-5 control-label">Weight of dockage</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="DMR_Dockage">
								</div>
							</div>
							<div class="form-group">
								<label for="DMR_Milled" class="col-md-5 control-label">Weight of milled rice</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="DMR_Milled">
								</div>
							</div>
							<div class="form-group">
								<label for="DMR_Total" class="col-md-5 control-label"> Dockage(mr)</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="DMR_Total" disabled >
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Dockage(mr) Body -->

			<!-- Chalk grains Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#ChalkGBody').slideToggle()">Chalk grains</div>
			  <div class="panel-body" style="display:none;" id="ChalkGBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="CG_ChalkyG" class="col-md-5 control-label">Weight of chalky grains</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="CG_ChalkyG">
								</div>
							</div>
							<div class="form-group">
								<label for="CG_Milled" class="col-md-5 control-label">Weight of milled rice</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="CG_Milled">
								</div>
							</div>
							<div class="form-group">
								<label for="CG_Total" class="col-md-5 control-label"> Chalk Grains</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="CG_Total" disabled >
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="CG_Chalkiness" class="col-md-5 control-label"> Chalkiness meter</label>
								<div class="col-md-7">
									<input type="text" class="form-control" id="CG_Chalkiness" disabled >
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Chalkiness Body -->

			<!-- Whiteness Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#whitenessBody').slideToggle()">Whiteness</div>
			  <div class="panel-body" style="display:none;" id="whitenessBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="W_YelloyG" class="col-md-5 control-label">Weight of yellow grains</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="W_YelloyG">
								</div>
							</div>
							<div class="form-group">
								<label for="W_Milled" class="col-md-5 control-label">Weight of milled rice</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="W_Milled">
								</div>
							</div>
							<div class="form-group">
								<label for="W_Total" class="col-md-5 control-label"> Dockage(mr)</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="W_Total" disabled >
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Whiteness Body -->

			<!-- Grain Shape Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#grainShapeBody').slideToggle()">Grain Shape</div>
			  <div class="panel-body" style="display:none;" id="grainShapeBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="GS_length" class="col-md-5 control-label">Avg length of rice </label>
								<div class="col-md-7">
									<div class="input-group">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="GS_length">
										<span class="input-group-addon">mm</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="GS_width" class="col-md-5 control-label">Avg width of rice </label>
								<div class="col-md-7">
									<div class="input-group">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="GS_width">
										<span class="input-group-addon">mm</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="GS_total" class="col-md-5 control-label"> Grain shape L/W ratio</label>
								<div class="col-md-7">
									<input type="text" class="form-control" id="GS_total" >
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Grain Shape Body -->

			<!-- Grain Grader Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#grainGraderBody').slideToggle()">Grain Grader</div>
			  <div class="panel-body" style="display:none;" id="grainGraderBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="GG_Broken" class="col-md-5 control-label">Weight of broken grains</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="GG_Broken">
								</div>
							</div>
							<div class="form-group">
								<label for="GG_Whole" class="col-md-5 control-label">Weight of whole grains</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="GG_Whole">
								</div>
							</div>
							<div class="form-group">
								<label for="GG_Samples" class="col-md-5 control-label">Weight of samples</label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="GG_Samples">
								</div>
							</div>
							<div class="form-group">
								<label for="GG_Total" class="col-md-5 control-label"> Brokens</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="GG_Total" disabled >
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="GG_Total2" class="col-md-5 control-label"> Head Rice</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="GG_Total2" disabled>
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Grain Grader Body -->

			<!-- Brewer's rice Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#brewerBody').slideToggle()">Brewer's rice</div>
			  <div class="panel-body" style="display:none;" id="brewerBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="BR_Weight" class="col-md-5 control-label">Weight brewers </label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="BR_Weight">
								</div>
							</div>
							<div class="form-group">
								<label for="BR_Samples" class="col-md-5 control-label">Weight of samples </label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="BR_Samples">
								</div>
							</div>
							<div class="form-group">
								<label for="BR_Total" class="col-md-5 control-label"> Brewer's rice</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="BR_Total" disabled>
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Brewer's rice Body -->

			<!-- Broken grains Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#brokenGrainsBody').slideToggle()">Broken Grains</div>
			  <div class="panel-body" style="display:none;" id="brokenGrainsBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="DG_Damage" class="col-md-5 control-label">Weight of damaged grains </label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="DG_Damage">
								</div>
							</div>
							<div class="form-group">
								<label for="DG_Samples" class="col-md-5 control-label">Weight of samples </label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="DG_Samples">
								</div>
							</div>
							<div class="form-group">
								<label for="DG_Total" class="col-md-5 control-label"> Damaged grains</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="DG_Total" disabled>
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Broken Grains Body -->

			<!-- Red and re-streaked grains Body -->
			<div class="panel panel-default">
			  <div class="panel-heading" onClick="$('#rARBody').slideToggle()">Broken Grains</div>
			  <div class="panel-body" style="display:none;" id="rARBody">
					<form class="bs-example form-horizontal">
						<div>
							<div class="form-group">
								<label for="RAR_Red" class="col-md-5 control-label">Weight of red grains </label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="RAR_Red">
								</div>
							</div>
							<div class="form-group">
								<label for="RAR_Samples" class="col-md-5 control-label">Weight of samples </label>
								<div class="col-md-7">
									<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="RAR_Samples">
								</div>
							</div>
							<div class="form-group">
								<label for="RAR_Total" class="col-md-5 control-label"> Red and re-streaked grains</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" id="RAR_Total" disabled>
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- /Red and re-streaked grains Body -->
			</div> <!-- /qualityOfMilledRice -->


			<div id="qualityOfPaddyGrain" style="display:none;">

				<!-- cracked grains Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading" onClick="$('#crackedGrainsBody').slideToggle()">Cracked Grains</div>
				  	<div class="panel-body" style="display:none;" id="crackedGrainsBody">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="CRKG_Crack" class="col-md-5 control-label">Number of cracked grain</label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="CRKG_Crack">
									</div>
								</div>
								<div class="form-group">
									<label for="CRKG_Total" class="col-md-5 control-label"> Cracked grains</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="text" class="form-control" id="CRKG_Total" disabled>
											<span class="input-group-addon">%</span>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /cracked grains grains Body -->

				<!-- Grain Dimension L/W Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading" onClick="$('#grainDimensionBody').slideToggle()">Grain Dimension L/W </div>
				  	<div class="panel-body" style="display:none;" id="grainDimensionBody">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="GD_length" class="col-md-5 control-label">Avg paddy length </label>
									<div class="col-md-7">
										<div class="input-group">
											<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="GD_length">
											<span class="input-group-addon">mm</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="GD_width" class="col-md-5 control-label">Avg paddy width </label>
									<div class="col-md-7">
										<div class="input-group">
											<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="GD_width">
											<span class="input-group-addon">mm</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="GD_Total" class="col-md-5 control-label"> Grain Dimension L/W </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="GD_Total" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /Grain Dimension L/W Body -->

				<!-- Immature Grains Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading" onClick="$('#immatureGrainsBody').slideToggle()"> Immature Grains </div>
				  	<div class="panel-body" style="display:none;" id="immatureGrainsBody">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="IG_Immatures" class="col-md-5 control-label">Weight of immature grains </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="IG_Immatures">
									</div>
								</div>
								<div class="form-group">
									<label for="IG_Samples" class="col-md-5 control-label">Weight of samples </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="IG_Samples">
									</div>
								</div>
								<div class="form-group">
									<label for="IG_Total" class="col-md-5 control-label"> Immature grains </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="IG_Total" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /Immature Grains Body -->

				<!-- Dockage Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading" onClick="$('#dockage2Body').slideToggle()"> Dockage </div>
				  	<div class="panel-body" style="display:none;" id="dockage2Body">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="DCKG_Weight" class="col-md-5 control-label">Weight of dockage </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="DCKG_Weight">
									</div>
								</div>
								<div class="form-group">
									<label for="DCKG_Samples" class="col-md-5 control-label">Weight of samples </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="DCKG_Samples">
									</div>
								</div>
								<div class="form-group">
									<label for="DCKG_Total" class="col-md-5 control-label"> Dockage </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="DCKG_Total" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /Dockage Body -->

			</div><!-- /qualityOfPaddyGrain -->

			<div id="calibration" style="display:none;">

				<!-- Calibration Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading"> Calibration </div>
				  	<div class="panel-body">
						<form class="bs-example form-horizontal">
							<div>
								<ol>
									<li>Measure off 100 meters in the field to be sprayed.</li>
									<li>Drive over the 100 meters with the sprayer and equipment that will be<br>
										used during the time of spraying.  This will most nearly simulate the<br>
										conditions during the time that the chemical is actually being applied. <br>
										Record the time required to travel the 100 meters at the speed which will be<br>
										used when spraying.</li>
									<li>With the sprayer stationary and an operating pressure of 280kPa (40psi) at the pump, <br>
										collect the volume of water discharged from at least 4 nozzles in the length of time<br>
										it took to travel over the 100 meters.</li>
									<li>Record the volume caught from the nozzles and calculate how much would have been<br>
										delivered from all nozzles using the following formula:</li>
								<div class="form-group">
									<label for="CAL_litters" class="col-md-3 control-label">Liters </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="CAL_litters">
									</div>
								</div>
								<div class="form-group">
									<label for="CAL_spraynozzles" class="col-md-3 control-label">Spray nozzles </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="CAL_spraynozzles">
									</div>
								</div>
								<div class="form-group">
									<label for="CAL_samplenozzles" class="col-md-3 control-label">Sample nozzles </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="CAL_samplenozzles">
									</div>
								</div>
								<div class="form-group">
									<label for="CAL_Total" class="col-md-3 control-label"> Liters applied over 100 meters </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="CAL_Total" disabled>
									</div>
								</div>
								<li>Record the volume caught from the nozzles and calculate how much would have been<br>
										delivered from all nozzles using the following formula:</li>
								</ol>
								<div class="form-group">
									<label for="CAL_Swath" class="col-md-3 control-label">Swath </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="CAL_Swath">
									</div>
								</div>
								<div class="form-group">
									<label for="CAL_Total2" class="col-md-3 control-label"> Liters/Hectare </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="CAL_Total2" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /Calibration Body -->

			</div> <!-- /calibration -->

			<div id="establishmentRate" style="display:none;">

				<!-- establishmentRate Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading"> Establishment Rate </div>
				  	<div class="panel-body">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="EB_Plants" class="col-md-3 control-label">Number of Plants </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="EB_Plants">
									</div>
								</div>
								<div class="form-group">
									<label for="EB_Area" class="col-md-3 control-label"> Area </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="EB_Area">
									</div>
								</div>
								<div class="form-group">
									<label for="EB_Total" class="col-md-3 control-label"> Establishment Rate </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="EB_Total" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /establishmentRate Body -->

			</div> <!-- /establishmentRate -->

			<div id="seedingRateHandBroadcasting" style="display:none;">

				<!-- seedingRateHandBroadcasting Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading"> Seeding Rate Hand Broadcasting </div>
				  	<div class="panel-body">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="SRHB_Length" class="col-md-3 control-label">Length </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="SRHB_Length">
									</div>
								</div>
								<div class="form-group">
									<label for="SRHB_Width" class="col-md-3 control-label"> Width </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="SRHB_Width">
									</div>
								</div>
								<div class="form-group">
									<label for="SRHB_Total" class="col-md-3 control-label"> Seed rate (kg/section) </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="SRHB_Total" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /seedingRateHandBroadcasting Body -->

			</div> <!-- /seedingRateHandBroadcasting -->

			<div id="seedingRateDrumSeeder" style="display:none;">

				<!-- seedingRateDrumSeeder Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading"> Seeding Rate Drum Seeder </div>
				  	<div class="panel-body">
						<form class="bs-example form-horizontal">
							<div>
								<ol>
									<li>Determine required planting rate and set machine settings on that rate.</li>
									<li>Measure width of machine (W).</li>
									<li>Determine distance traveled for 50 revolutions of metering drive wheel of the seeder. 
										This is best done on the surface to be planted by driving the planter across the seedbed 
										for 50 revolutions of metering drive wheel and then measuring distance covered (D).</li>
									<li>Place seed in seed bin.</li>
									<li>Either in static position with drive wheel above the ground turn drive wheel 50 turns
										and collect seed from at least five outlets, or drive planter across seedbed for 50 
										revs of meter wheel and collect seed from at least five outlets (T)</li>
									<li>Weigh seed in grams (A).</li>
									<li>Calculate seeding rate.</li>
								</ol>
								<div class="form-group">
									<label for="SRDS_Seed" class="col-md-3 control-label">Seed </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="SRDS_Seed">
									</div>
								</div>
								<div class="form-group">
									<label for="SRDS_Total" class="col-md-3 control-label">Total </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="SRDS_Total">
									</div>
								</div>
								<div class="form-group">
									<label for="SRDS_Tubes" class="col-md-3 control-label">Tubes </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="SRDS_Tubes">
									</div>
								</div>
								<div class="form-group">
									<label for="SRDS_Distance" class="col-md-3 control-label"> Distance </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="SRDS_Distance" >
									</div>
								</div>
								<div class="form-group">
									<label for="SRDS_Width" class="col-md-3 control-label">Width </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="SRDS_Width">
									</div>
								</div>
								<div class="form-group">
									<label for="SRDS_Total2" class="col-md-3 control-label"> Seeding rate(kg/ha) </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="SRDS_Total2" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /seedingRateDrumSeeder Body -->

			</div> <!-- /seedingRateDrumSeeder -->

			<div id="seedLotPurity" style="display:none;">

				<!-- Percent of Weed seeds Body -->
				<div class="panel panel-default">
				  	<div class="panel-heading" > Percent of Weed seeds </div>
				  	<div class="panel-body">
						<form class="bs-example form-horizontal">
							<div>
								<div class="form-group">
									<label for="POW_ExactW" class="col-md-5 control-label">Exact weight </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="POW_ExactW">
									</div>
								</div>
								<div class="form-group">
									<label for="POW_TotalW" class="col-md-5 control-label">Total Weight </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()" type="number" min="0" step="0.01" value="0.00" class="form-control" id="POW_TotalW">
									</div>
								</div>
								<div class="form-group">
									<label for="POW_innert" class="col-md-5 control-label">Weight of innert matter </label>
									<div class="col-md-7">
										<input onKeyUp="update()" onChange="update()"  type="number" min="0" step="0.01" value="0.00" class="form-control" id="POW_innert">
									</div>
								</div>
								<div class="form-group">
									<label for="POW_Total" class="col-md-5 control-label"> Percent of weeds </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="POW_Total" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="POW_TotalInnert" class="col-md-5 control-label"> Percent of innert matter </label>
									<div class="col-md-7">
										<input type="text" class="form-control" id="POW_TotalInnert" disabled>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- /Percent Body -->

			</div> <!-- /seedLotPurity -->

		</div>
	</div> <!-- /container -->

	</body>
</html>
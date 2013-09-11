function round(val){
	return Math.round(val*100)/100;
}
function wlossdrycalc(wetp, mwp, mdp){
	var val = wetp*(100-mwp)/(100-mdp);
	return round(val);
}

/********************************************************************************************/
/****************************** Measuring Quality Milled Rice *******************************/
/********************************************************************************************/

function compmillrec(wmr, wsu){		//Compute Milling Recovery
	var val = (wmr/wsu)*100;
	return round(val);
}

function compheadricerec(wbg, wms){		//Compute Head Rice Recovery
	var val = ((wbg/wms)*100)-100;
	return round(val);
}

function compmilldegree(wmr, wbr){		//Compute Milling Degree
	var val = (wmr/wbr)*100;
	return round(val);
}

function compdockage(wd, wmr){			//Compute Dockage
	var val = (wd/wmr)*100;
	return round(val);
}

function compchalkgrains(wcg, wmr){		//Compute Chalk Grains
	var val = (wcg/wmr)*100;
	return round(val);
}

function compchalkiness(chalkgrain){	//Compute Chalkiness Meter
	if(chalkgrain == 0){
		return 0;
	}else if(chalkgrain < 10){
		return 1;
	}else if(chalkgrain < 20){
		return 5;
	}else if(chalkgrain < 100){
		return 9;
	}else{
		return "Error";
	}
}

function compwhiteness(wyg, wmr){		//Compute Whiteness
	var val = (wyg/wmr)*100;
	return round(val);
}

function compgrainshape(length, width){	//Compute Grain Shape
	var val = (length/width)*100;
	return round(val);
}

function compbrokens(broken, paddy){	//Compute Percentage of Brokens
	var val = (broken/paddy)*100;
	return round(val);
}

function compheadrice(whole, sample){	//Compute Percentage of Head Rice
	var val = (whole/sample)*100;
	return round(val);
}

function compbrewrice(wbrew, sample){	//Compute Brewers Rice
	var val = (wbrew/sample)*100;
	return round(val);
}

function compdamagedgrains(damaged, sample){	//Compute Damaged Grains
	var val = (damaged/sample)*100;
	return round(val);
}

function compredstreak(redgrain, sample){		//Compute Red Streak Grains
	var val = (redgrain/sample)*100;
	return round(val);
}

/********************************************************************************************/

/********************************************************************************************/
/***************************** Measuring Quality of Paddy Grain *****************************/
/********************************************************************************************/

function compcrackedgrains(cracked){		//Compute Cracked Grains
	var val = (cracked/100)*100;
	return round(val);
}

function compgraindimensions(length, width){	//Compute Grain Dimensions
	var val = (length/width);
	return round(val);
}

function compimmaturegrains(weight, sample){	//Compute Immature Grains
	var val = (weight/sample)*100;
	return round(val);
}

function comppaddydockage(weight, sample){		//Compute Paddy Dockage
	var val = (weight/sample)*100;
	return round(val);
}

/********************************************************************************************/

/********************************************************************************************/
/**************************************** Calibration ***************************************/
/********************************************************************************************/

function compprayinmeters(litters, spraynozzles, samplenozzles){	//Compute Boom/Knapsack Spray Litters applied over 100 meters
	var val = (litters*spraynozzles)/samplenozzles;
	return val;
}

function compsprayinhec(litters, swath){	//Compute Boom/Knapsack Spray Litters per hectare
	var val = (litters*100)/swath;
	return round(val);
}

/********************************************************************************************/

function compestablishmentrate(plants, area){
	var val = plants/area;
	return round(val);
}

/********************************************************************************************/
/**************************** Seeding Rate and Hand Broadcasting ****************************/
/********************************************************************************************/

function comphectare(length, length){
	var ha = (length*length)/10000;
	return round(ha);
}

function compseedreq(area){
	return round(80*area);
}

/********************************************************************************************/
/******************************** Seeding rate-drum seeder **********************************/
/********************************************************************************************/
function compseedratedrum(seed, total, tubres, distance, width){
	var val = (seed*total*10000)/(tubres*distance*width);
	return round(val);
}

/********************************************************************************************/
/************************************ Seed Lot Purity ***************************************/
/********************************************************************************************/
function compwoodweeds(exactweight, totalweight){
	var val = (totalweight/exactweight)*100;
	return round(val);
}

function compinnermatter(exactweight, innertweight){
	var val = (innertweight/exactweight)*100;
	return round(val);
}
/********************************************************************************************/
/************************************ Seed Lot Purity ***************************************/
/********************************************************************************************/
function update(){
	//Dry Weight Loss
	var wetWeight =document.getElementById('wetWeight').value;
	var MCWet =document.getElementById('MCWet').value;
	var MCDry =document.getElementById('MCDry').value;
	document.getElementById('total').value=wlossdrycalc(wetWeight,MCWet,MCDry);

	//Quality of Milled Rice
	var MRB_PaddyWeight = document.getElementById('MRB_PaddyWeight').value;
	var MRB_MilledWeight = document.getElementById('MRB_MilledWeight').value;
	document.getElementById('MRB_total').value =compmillrec(MRB_PaddyWeight,MRB_MilledWeight);

	//Head Rice Recovery Rice
	var HRR_BrokenGrain = document.getElementById('HRR_BrokenGrain').value;
	var HRR_Milled = document.getElementById('HRR_Milled').value;
	document.getElementById('HRR_Total').value =compheadricerec(HRR_BrokenGrain,HRR_Milled);

	//Milling Degree
	var MD_Milled = document.getElementById('MD_Milled').value;
	var MD_Brown = document.getElementById('MD_Brown').value;
	document.getElementById('MD_Total').value =compmilldegree(MD_Milled,MD_Brown);

	//Dockage(mr) 
	var DMR_Dockage = document.getElementById('DMR_Dockage').value;
	var DMR_Milled = document.getElementById('DMR_Milled').value;
	document.getElementById('DMR_Total').value =compdockage(DMR_Dockage,DMR_Milled);

	//Chalk Grain 
	var CG_ChalkyG = document.getElementById('CG_ChalkyG').value;
	var CG_Milled = document.getElementById('CG_Milled').value;
	document.getElementById('CG_Total').value =compchalkgrains(CG_ChalkyG,CG_Milled);
	document.getElementById('CG_Chalkiness').value = compchalkiness(compchalkgrains(CG_ChalkyG,CG_Milled));
	
	//Whiteness 
	var W_YelloyG = document.getElementById('W_YelloyG').value;
	var W_Milled = document.getElementById('W_Milled').value;
	document.getElementById('W_Total').value =compwhiteness(W_YelloyG,W_Milled);

	//Grain Shape 
	var GS_length = document.getElementById('GS_length').value;
	var GS_width = document.getElementById('GS_width').value;
	document.getElementById('GS_total').value =compgrainshape(GS_length,GS_width);

	//Grain Shape 
	var GG_Broken = document.getElementById('GG_Broken').value;
	var GG_Whole = document.getElementById('GG_Whole').value;
	var GG_Samples = document.getElementById('GG_Samples').value;
	document.getElementById('GG_Total').value =compbrokens(GG_Broken,GG_Samples);
	document.getElementById('GG_Total2').value =compheadrice(GG_Whole,GG_Samples);

	//Brewer's Rice 
	var BR_Weight = document.getElementById('BR_Weight').value;
	var BR_Samples = document.getElementById('BR_Samples').value;
	document.getElementById('BR_Total').value =compbrewrice(BR_Weight,BR_Samples);

	//Damage Grains 
	var DG_Damage = document.getElementById('DG_Damage').value;
	var DG_Samples = document.getElementById('DG_Samples').value;
	document.getElementById('DG_Total').value =compdamagedgrains(DG_Damage,DG_Samples);

	//Red and re-streaked grains
	var RAR_Red = document.getElementById('RAR_Red').value;
	var RAR_Samples = document.getElementById('RAR_Samples').value;
	document.getElementById('RAR_Total').value =compredstreak(RAR_Red,RAR_Samples);

	//Cracked grains
	var CRKG_Crack = document.getElementById('CRKG_Crack').value;
	document.getElementById('CRKG_Total').value =compcrackedgrains(CRKG_Crack);

	//Grain Shape 
	var GD_length = document.getElementById('GD_length').value;
	var GD_width = document.getElementById('GD_width').value;
	document.getElementById('GD_Total').value =compgraindimensions(GD_length,GD_width);

	//Immature grains
	var IG_Immatures = document.getElementById('IG_Immatures').value;
	var IG_Samples = document.getElementById('IG_Samples').value;
	document.getElementById('IG_Total').value =compimmaturegrains(IG_Immatures,IG_Samples);

	//Dockage grains
	var DCKG_Weight = document.getElementById('DCKG_Weight').value;
	var DCKG_Samples = document.getElementById('DCKG_Samples').value;
	document.getElementById('DCKG_Total').value =comppaddydockage(DCKG_Weight,DCKG_Samples);

	//Calibration grains
	var CAL_litters = document.getElementById('CAL_litters').value;
	var CAL_spraynozzles = document.getElementById('CAL_spraynozzles').value;
	var CAL_samplenozzles = document.getElementById('CAL_samplenozzles').value;
	var CAL_Swath = document.getElementById('CAL_Swath').value;
	document.getElementById('CAL_Total').value =compprayinmeters(CAL_litters,CAL_spraynozzles,CAL_samplenozzles);
	document.getElementById('CAL_Total2').value =compsprayinhec(compprayinmeters(CAL_litters,CAL_spraynozzles,CAL_samplenozzles),CAL_Swath);

	//Establishment rate
	var EB_Plants = document.getElementById('EB_Plants').value;
	var EB_Area = document.getElementById('EB_Area').value;
	document.getElementById('EB_Total').value =compestablishmentrate(EB_Plants,EB_Area);

	//seedingRateHandBroadcasting rate
	var SRHB_Length = document.getElementById('SRHB_Length').value;
	var SRHB_Width = document.getElementById('SRHB_Width').value;
	document.getElementById('SRHB_Total').value = compseedreq(comphectare(SRHB_Length,SRHB_Width));

	//Seeding Rate Drum Seeder rate
	var SRDS_Seed = document.getElementById('SRDS_Seed').value;
	var SRDS_Total = document.getElementById('SRDS_Total').value;
	var SRDS_Tubes = document.getElementById('SRDS_Tubes').value;
	var SRDS_Distance = document.getElementById('SRDS_Distance').value;
	var SRDS_Width = document.getElementById('SRDS_Width').value;
	document.getElementById('SRDS_Total2').value = compseedratedrum(SRDS_Seed,SRDS_Total,SRDS_Tubes,SRDS_Distance,SRDS_Width);

	//POW_ExactW rate
	var POW_ExactW = document.getElementById('POW_ExactW').value;
	var POW_TotalW = document.getElementById('POW_TotalW').value;
	var POW_innert = document.getElementById('POW_innert').value;
	document.getElementById('POW_Total').value = compwoodweeds(POW_ExactW,POW_TotalW);
	document.getElementById('POW_TotalInnert').value = compinnermatter(POW_ExactW,POW_innert);
}

function navCloseAll(){
	$("#dryWeightLoss").slideUp("slow");
	$("#qualityOfMilledRice").slideUp("slow");
	$("#qualityOfPaddyGrain").slideUp("slow");
	$("#calibration").slideUp("slow");
	$("#establishmentRate").slideUp("slow");
	$("#seedingRateHandBroadcasting").slideUp("slow");
	$("#seedingRateDrumSeeder").slideUp("slow");
	$("#seedLotPurity").slideUp("slow");
	$("#chooseWaterMark").fadeOut("slow");
}
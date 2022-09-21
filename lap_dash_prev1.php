<?php

include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vbulan = date("m");
$vtahun = date("Y");

if ($vbulan == "01" or $vbulan == "02" or $vbulan == "03")
{
  $tgl1 = $vtahun."-01-01";	
  $tgl2 = date("Y-m-d");
  $triwulan = "Triwulan-1";
}

if ($vbulan == "04" or $vbulan == "05" or $vbulan == "06")
{
  $tgl1 = $vtahun."-01-04";	
  $tgl2 = date("Y-m-d");
  $triwulan = "Triwulan-2";
}

if ($vbulan == "07" or $vbulan == "08" or $vbulan == "09")
{
  $tgl1 = $vtahun."-01-07";	
  $tgl2 = date("Y-m-d");
  $triwulan = "Triwulan-3";
}

if ($vbulan == "10" or $vbulan == "11" or $vbulan == "12")
{
  $tgl1 = $vtahun."-01-10";	
  $tgl2 = date("Y-m-d");
  $triwulan = "Triwulan-4";
}


$slaac1=0;
$slaac2=0;
$slatds1=0;
$slatds2=0;
$slaapar1=0;
$slaapar2=0;
$slalift1=0;
$slalift2=0;
$slapanel1=0;
$slapanel2=0;
$slapump1=0;
$slapump2=0;
$slaboster1=0;
$slaboster2=0;
$slatransfer1=0;
$slatransfer2=0;
$slatoilet1=0;
$slatoilet2=0;
$slakelas1=0;
$slakelas2=0;


    $rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev1_ac where tglkerja >='$tgl1'", $mainlib->ocn);
	while ($row = $mainlib->dbfetcharray($rs))
	{
	   $vbarang = $row["barang"]; 
	    if ($vbarang == "AC")
	     {
	        $slaac1 = $slaac1 + 1; 
	     }
	    if ($vbarang == "Dispenser")
	     {
	        $slatds1 = $slatds1 + 1; 
	     }
	    if ($vbarang == "Apar")
	     {
	        $slaapar1 = $slaapar1 + 1; 
	     }
	    if ($vbarang == "Lift")
	     {
	        $slalift1 = $slalift1 + 1; 
	     }
	    if ($vbarang == "Panel")
	     {
	        $slapanel1 = $slapanel1 + 1; 
	     }
	    if ($vbarang == "Diesel Pump")
	     {
	        $slapump1 = $slapump1 + 1; 
	     }
	    if ($vbarang == "Pompa Boster")
	     {
	        $slaboster1 = $slaboster1 + 1; 
	     }
	    if ($vbarang == "Pompa Transfer")
	     {
	        $slatransfer1 = $slatransfer1 + 1; 
	     }
	    if ($vbarang == "Toilet")
	     {
	        $slatoilet1 = $slatoilet1 + 1; 
	     }
	    if ($vbarang == "Kelas")
	     {
	        $slakelas1 = $slakelas1 + 1; 
	     }
	}
 
 
    $rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev1_ac where tglselesai >='$tgl1' and apv='Y'", $mainlib->ocn);
	while ($row = $mainlib->dbfetcharray($rs))
	{
	   $vbarang = $row["barang"]; 
	    if ($vbarang == "AC")
	     {
	        $slaac2 = $slaac2 + 1; 
	     }
	    if ($vbarang == "Dispenser")
	     {
	        $slatds2 = $slatds2 + 1; 
	     }
	    if ($vbarang == "Apar")
	     {
	        $slaapar2 = $slaapar2 + 1; 
	     }
	    if ($vbarang == "Lift")
	     {
	        $slalift2 = $slalift2 + 1; 
	     }
	    if ($vbarang == "Panel")
	     {
	        $slapanel2 = $slapanel2 + 1; 
	     }
	    if ($vbarang == "Diesel Pump")
	     {
	        $slapump2 = $slapump2 + 1; 
	     }
	    if ($vbarang == "Pompa Boster")
	     {
	        $slaboster2 = $slaboster2 + 1; 
	     }
	    if ($vbarang == "Pompa Transfer")
	     {
	        $slatransfer2 = $slatransfer2 + 1; 
	     }
	    if ($vbarang == "Toilet")
	     {
	        $slatoilet2 = $slatoilet2 + 1; 
	     }
	    if ($vbarang == "Kelas")
	     {
	        $slakelas2 = $slakelas2 + 1; 
	     }
	}


    $rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev1_ac where tglselesai >='$tgl1' and status='Pending'", $mainlib->ocn);
	while ($row = $mainlib->dbfetcharray($rs))
	{
	   $vbarang = $row["barang"]; 
	    if ($vbarang == "AC")
	     {
	        $slaac3 = $slaac3 + 1; 
	     }
	    if ($vbarang == "Dispenser")
	     {
	        $slatds3 = $slatds3 + 1; 
	     }
	    if ($vbarang == "Apar")
	     {
	        $slaapar3 = $slaapar3 + 1; 
	     }
	    if ($vbarang == "Lift")
	     {
	        $slalift3 = $slalift3 + 1; 
	     }
	    if ($vbarang == "Panel")
	     {
	        $slapanel3 = $slapanel3 + 1; 
	     }
	    if ($vbarang == "Diesel Pump")
	     {
	        $slapump3 = $slapump3 + 1; 
	     }
	    if ($vbarang == "Pompa Boster")
	     {
	        $slaboster3 = $slaboster3 + 1; 
	     }
	    if ($vbarang == "Pompa Transfer")
	     {
	        $slatransfer3 = $slatransfer3 + 1; 
	     }
	    if ($vbarang == "Toilet")
	     {
	        $slatoilet3 = $slatoilet3 + 1; 
	     }
	    if ($vbarang == "Kelas")
	     {
	        $slakelas3 = $slakelas3 + 1; 
	     }
	}


$dataPoints1 = array(
	array("label"=> "AC", "y"=> $slaac1),
	array("label"=> "TDS", "y"=> $slatds1),
	array("label"=> "Apar", "y"=> $slaapar1),
	array("label"=> "Lift", "y"=> $slalift1),
	array("label"=> "Panel", "y"=> $slapanel1),
	array("label"=> "Diesel Pump", "y"=> $slapump1),
	array("label"=> "Pompa Boster", "y"=> $slaboster1),
	array("label"=> "Pompa transfer", "y"=> $slatransfer1),
	array("label"=> "Toilet", "y"=> $slatoilet1),
	array("label"=> "Kelas", "y"=> $slakelas1)
);

$dataPoints2 = array(
	array("label"=> "AC", "y"=> $slaac2),
	array("label"=> "TDS", "y"=> $slatds2),
	array("label"=> "Apar", "y"=> $slaapar2),
	array("label"=> "Lift", "y"=> $slalift2),
	array("label"=> "Panel", "y"=> $slapanel2),
	array("label"=> "Diesel Pump", "y"=> $slapump2),
	array("label"=> "Pompa Boster", "y"=> $slaboster2),
	array("label"=> "Pompa transfer", "y"=> $slatransfer2),
	array("label"=> "Toilet", "y"=> $slatoilet2),
	array("label"=> "Kelas", "y"=> $slakelas2)
);

$dataPoints3 = array(
	array("label"=> "AC", "y"=> $slaac3),
	array("label"=> "TDS", "y"=> $slatds3),
	array("label"=> "Apar", "y"=> $slaapar3),
	array("label"=> "Lift", "y"=> $slalift3),
	array("label"=> "Panel", "y"=> $slapanel3),
	array("label"=> "Diesel Pump", "y"=> $slapump3),
	array("label"=> "Pompa Boster", "y"=> $slaboster3),
	array("label"=> "Pompa transfer", "y"=> $slatransfer3),
	array("label"=> "Toilet", "y"=> $slatoilet3),
	array("label"=> "Kelas", "y"=> $slakelas3)
);

	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>

<?php
 if ($triwulan == "Triwulan-1")
 {
?>     

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Preventive - Jobs Progress vs Done - Triwulan 1"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Jobs Progress",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Done",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Pending",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});

<?php
 }

 if ($triwulan == "Triwulan-2")
 {
?>     

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Preventive - Jobs Progress vs Done - Triwulan 2"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Jobs Progress",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Done",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Pending",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});

<?php
 }

 if ($triwulan == "Triwulan-3")
 {
?>     

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Preventive - Jobs Progress vs Done - Triwulan 3"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Jobs Progress",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Done",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Pending",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});

<?php
 }

 if ($triwulan == "Triwulan-4")
 {
?>     

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Preventive - Jobs Progress vs Done - Triwulan 4"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Jobs Progress",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Done",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Jobs Pending",
		indexLabel: "{y}",
		yValueFormatString: "##0",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});

<?php
 }
?>     

chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
 }
}

</script>
</head>
<body>
<div id="chartContainer" style="height: 670px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkblue; color:white">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='main.php?pgret=1';">
   </td>
</tr>
</table>

</html> 
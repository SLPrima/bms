<?php
include("inc/class.mainlib.inc.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];
$vtgl_hrini = date("d-m-Y H:i:s");
$vtahun = substr($vtgl_hrini,6,5);

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$userid."'", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{
	$vusrlevel = $row["level"];
	$vusrnama = $row["usernama"];
}


//		$vtglreg = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d");
		$vtekanan1 = $_POST["txtTekanan1"];
		$vtekanan2 = $_POST["txtTekanan2"];
		$vtekanan3 = $_POST["txtTekanan3"];
		$vtekanan4 = $_POST["txtTekanan4"];
		$vrst1 = $_POST["txtRst1"];
		$vrst2 = $_POST["txtRst2"];
		$vrssttr1 = $_POST["txtRssttr1"];
		$vrssttr2 = $_POST["txtRssttr2"];
		$vfreq = $_POST["txtFreq"];
		$vwire1 = $_POST["txtWire1"];
		$vwire2 = $_POST["txtWire2"];
		$vrem1 = $_POST["txtrem1"];
		$vrem2 = $_POST["txtrem2"];
		$vtds1 = $_POST["txtTds1"];
		$vtds2 = $_POST["txtTds2"];
		$vapar1 = $_POST["txtApar1"];
		$vapar2 = $_POST["txtApar2"];


     $mainlib->dbquery("UPDATE settegangan set apar1 = '".$vapar1."', apar2 = '".$vapar2."', tds1 = '".$vtds1."', tds2 = '".$vtds2."', tekanan4101 = '".$vtekanan1."', tekanan4102 = '".$vtekanan2."', tekanan4071 = '".$vtekanan3."', tekanan4072 = '".$vtekanan4."', rst1 = '".$vrst1."', rst2 = '".$vrst2."', rssttr1 = '".$vrssttr1."', rssttr2 = '".$vrssttr2."', freq = '".$vfreq."', wire1 = '".$vwire1."', wire2 = '".$vwire2."', rem1 = '".$vrem1."', rem2 = '".$vrem2."'  WHERE cabang ='SLP'", $mainlib->ocn);


$mainlib->closedb();
$mainlib->redirect("main.php?pgret=1");
?>
<?php
include("inc/class.mainlib.inc.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];
$vtgl_hrini = date("d-m-Y H:i:s");
$vtahun = substr($vtgl_hrini,6,5);


if (isset($_POST['btnPilih'])) 
 {

    $vnoreg = $_POST["txtNoreg"];
    $vtgl = $mainlib->changedateformat($_POST["txtTgljadwal"], DATE_FORMAT, "y-m-d");
    $vjob = $_POST["txtJob"];
    $vno = 0;

    $rs = $mainlib->dbquery("SELECT * FROM jadwal WHERE noreg = '".$vnoreg."' order by no", $mainlib->ocn);
    while ($row = $mainlib->dbfetcharray($rs))
    {	
	  $vno = $row["no"];
	}
	
	$vno = $vno + 1;
	 
	$mainlib->dbquery("INSERT INTO jadwal(noreg,no,tanggal,job) VALUES ('".$vnoreg."','".$vno."','".$vtgl."','".$vjob."')", $mainlib->ocn);

	$mainlib->closedb();
    $mainlib->redirect("planedit.php?id=".$vnoreg);

 }	
 
 
 if (isset($_POST['Simpan'])) 
 {

    $vnoreg = $_POST["txtNoreg"];

	$mainlib->dbquery("update register set plan='Y' where noreg = '".$vnoreg."'", $mainlib->ocn);

	$mainlib->closedb();
	$mainlib->redirect("planlist.php?pgret=1");

 }	
?>
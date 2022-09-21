<?php
include("inc/class.mainlib.inc.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];
$vtgl_hrini = date("d-m-Y H:i:s");
$vthn = date("Y");


if (isset($_POST['btnPilih'])) 
 {

    $vnounit = $_POST["txtNounit"];
//    $vtgl = $mainlib->changedateformat($_POST["txtTgljadwal"], DATE_FORMAT, "y-m-d");
    $vbln = $_POST["txtBulan"];
    $vtds = $_POST["txtTds"];
    $vno = 0;

   if ($vbln == "Jan")
   {
	$mainlib->dbquery("UPDATE dispenser set jan='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'" , $mainlib->ocn);
   }
   if ($vbln == "Feb")
   {
	$mainlib->dbquery("UPDATE dispenser set Feb='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Mar")
   {
	$mainlib->dbquery("UPDATE dispenser set Mar='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Apr")
   {
	$mainlib->dbquery("UPDATE dispenser set Apr='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Mei")
   {
	$mainlib->dbquery("UPDATE dispenser set mei='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Jun")
   {
	$mainlib->dbquery("UPDATE dispenser set jun='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Jul")
   {
	$mainlib->dbquery("UPDATE dispenser set jul='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Ags")
   {
	$mainlib->dbquery("UPDATE dispenser set ags='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Sep")
   {
	$mainlib->dbquery("UPDATE dispenser set sep='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Okt")
   {
	$mainlib->dbquery("UPDATE dispenser set okt='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Nov")
   {
	$mainlib->dbquery("UPDATE dispenser set nov='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   if ($vbln == "Des")
   {
	$mainlib->dbquery("UPDATE dispenser set des='".$vtds."' WHERE nounit = '".$vnounit."' and tahun = '".$vthn."'", $mainlib->ocn);
   }
   
	$mainlib->closedb();
    $mainlib->redirect("checklist_tds_dispenser_edit.php?pgret=1");

 }	
 
?>
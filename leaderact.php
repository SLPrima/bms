<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();

$mainlib = new mainlib();
$mainlib->opendb();

$act = trim($_REQUEST["act"]);
switch($act)
{
	case "add":
		break;

	case "edit":
		$vuserid = $_POST["txtUserid"];
		$vusernama = $_POST["txtUsernama"];
		$vjabatan = $_POST["txtJabatan"];
		$vlevel = $_POST["txtLevel"];
		$vleader = $_POST["txtLeader"];
		$vcabang = "SLP";


		$mainlib->dbquery("UPDATE Tbluser SET leader = '".$vleader."' WHERE userid = '".$vuserid."'", $mainlib->ocn);
		break;

	case "del":
	
		break;
}

$mainlib->closedb();
$mainlib->redirect("leaderlist.php?pgret=1");
?>
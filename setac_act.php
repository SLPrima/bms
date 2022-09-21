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

$act = trim($_REQUEST["act"]);
switch($act)
{
    case "add":
		$vpk = $_POST["txtPk"];
		$vamp = $_POST["txtAmp"];
		$vgol = $_POST["txtGol"];

		if ($mainlib->rowexists("SELECT * FROM setac WHERE pk = '".$vpk."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("KAPASITAS AC SUDAH ADA")."&url=");
		}

    $mainlib->dbquery("INSERT INTO setac(pk,amp,gol) VALUES ('".$vpk."','".$vamp."','".$vgol."')", $mainlib->ocn);
		

    break;
	case "edit":
//		$vtglreg = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d");
		$vpk = $_POST["txtPk"];
		$vamp = $_POST["txtAmp"];
		$vgol = $_POST["txtGol"];

		if (!$mainlib->rowexists("SELECT * FROM setac WHERE pk = '".$vpk."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("KAPASITAS AC TIDAK ADA")."&url=");
		}

		
     $mainlib->dbquery("UPDATE setac set gol = '".$vgol."', amp = '".$vamp."' WHERE pk = '".$vpk."'", $mainlib->ocn);


		break;
		case "del":
	  
		break;
}

$mainlib->closedb();
$mainlib->redirect("setac_list.php?pgret=1");
?>
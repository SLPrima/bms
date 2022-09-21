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
		$vtanggal = $mainlib->changedateformat($_POST["txtTgllibur"], DATE_FORMAT, "y-m-d");
		$vketerangan = $_POST["txtKeterangan"];

		if ($mainlib->rowexists("SELECT * FROM Tbllibur WHERE tanggal = '".$vtanggal."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("TANGGAL TERSEBUT SUDAH ADA")."&url=");
		}

    $mainlib->dbquery("INSERT INTO Tbllibur(tanggal,keterangan) VALUES ('".$vtanggal."','".$vketerangan."')", $mainlib->ocn);
		

    break;
	case "edit":
		$vtanggal = $mainlib->changedateformat($_POST["txtTgllibur"], DATE_FORMAT, "y-m-d");
		$vketerangan = $_POST["txtKeterangan"];

		if (!$mainlib->rowexists("SELECT * FROM Tbllibur WHERE tanggal = '".$vtanggal."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("TANGGAL TERSEBUT TIDAK ADA")."&url=");
		}

		
     $mainlib->dbquery("UPDATE Tbllibur set tanggal = '".$vtanggal."', keterangan = '".$vketerangan."' WHERE tanggal = '".$vtanggal."'", $mainlib->ocn);


		break;
		case "del":
		if (isset($_REQUEST["hidIDs"]))
		{
			if (trim($_REQUEST["hidIDs"]) != "")
			{
				$ids = stripslashes(trim($_REQUEST["hidIDs"]));
				$ids = str_replace("'", "", $ids);
				$arids = split(',', $ids);
				$sql = "";
				for ($i=0; $i<count($arids); $i++)
				{
					if ($sql != "")
					{
						$sql .= " or ";
					}
					$sql .= "tanggal='".$arids[$i]."'";
				}
				
				$sql = "delete from Tbllibur WHERE ".$sql;
				$mainlib->dbquery($sql, $mainlib->ocn);
			}
		}
		break;
}

$mainlib->closedb();
$mainlib->redirect("libur_list.php?pgret=1");
?>
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
		$vbarang = $_POST["txtBarang"];
		$vsla = $_POST["txtSla"];

		if ($mainlib->rowexists("SELECT * FROM sla WHERE barang = '".$vbarang."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("BARANG SUDAH ADA")."&url=");
		}

    $mainlib->dbquery("INSERT INTO sla(barang,sla) VALUES ('".$vbarang."','".$vsla."')", $mainlib->ocn);
		

    break;
	case "edit":
//		$vtglreg = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d");
		$vbarang = $_POST["txtBarang"];
		$vsla = $_POST["txtSla"];

		if (!$mainlib->rowexists("SELECT * FROM sla WHERE barang = '".$vbarang."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("BARANG TIDAK ADA")."&url=");
		}

		
     $mainlib->dbquery("UPDATE sla set sla = '".$vsla."' WHERE barang = '".$vbarang."'", $mainlib->ocn);


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
					$sql .= "barang='".$arids[$i]."'";
				}
				$sql = "delete from sla WHERE ".$sql;
				$mainlib->dbquery($sql, $mainlib->ocn);
			}
		}
		break;
}

$mainlib->closedb();
$mainlib->redirect("sla_list.php?pgret=1");
?>
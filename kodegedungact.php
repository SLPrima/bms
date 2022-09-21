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
		$vgedung = $_POST["txtGedung"];

		if ($mainlib->rowexists("SELECT * FROM gedungid WHERE gedung = '".$vgedung."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("KODE TOWER/GEDUNG sudah ada")."&url=");
		}

		$mainlib->dbquery("INSERT INTO gedungid(gedung) VALUES ('".$vgedung."')", $mainlib->ocn);
		break;

	case "edit":
		$vgedungold = $_POST["txtGedungold"];
		$vgedung = $_POST["txtGedung"];

		$mainlib->dbquery("UPDATE gedungid set gedung = '".$vgedung."' WHERE gedung = '".$vgedungold."'", $mainlib->ocn);
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
					$sql .= "gedung='".$arids[$i]."'";
				}
				
				$sql = "delete from gedungid WHERE ".$sql;
				$mainlib->dbquery($sql, $mainlib->ocn);
			}
		}
		break;
}

$mainlib->closedb();
$mainlib->redirect("kodegedunglist.php?pgret=1");
?>
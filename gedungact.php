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

		if ($mainlib->rowexists("SELECT * FROM gedung WHERE gedung = '".$vgedung."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("TOWER / GEDUNG sudah ada")."&url=");
		}

		$mainlib->dbquery("INSERT INTO gedung(gedung) VALUES ('".$vgedung."')", $mainlib->ocn);
		break;

	case "edit":
		$vgedung = $_POST["txtGedung"];
		$vgedungold = $_POST["txtGedungold"];

		$mainlib->dbquery("UPDATE gedung set gedung = '".$vgedung."' WHERE gedung = '".$vgedungold."'", $mainlib->ocn);
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
				
				$sql = "delete from gedung WHERE ".$sql;
				$mainlib->dbquery($sql, $mainlib->ocn);
			}
		}
		break;
}

$mainlib->closedb();
$mainlib->redirect("gedunglist.php?pgret=1");
?>
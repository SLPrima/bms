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
		$vuserid = $_POST["txtUserid"];
		$vusernama = $_POST["txtUsernama"];
		$vjabatan = $_POST["txtJabatan"];
		$vlevel = $_POST["txtLevel"];
		$vleader = $_POST["txtLeader"];
		$vgedung = $_POST["txtGedung"];

		if ($mainlib->rowexists("SELECT userid FROM Tbluser WHERE userid = '".$vuserid."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("User ID sudah ada")."&url=");
		}

        if(!empty($_POST['level'])) {
		  foreach($_POST['level'] as $selected) {
		    if ($selected=="1")
		     {	
        		$vlevel="1";
		     }
		    if ($selected=="2")
		     {	
        		$vlevel="2";
		     }
		    if ($selected=="3")
		     {	
        		$vlevel="3";
		     }
		    if ($selected=="4")
		     {	
        		$vlevel="4";
		     }
		    if ($selected=="5")
		     {	
        		$vlevel="5";
		     }
		    if ($selected=="6")
		     {	
        		$vlevel="6";
		     }
		    if ($selected=="7")
		     {	
        		$vlevel="7";
		     }
		    if ($selected=="8")
		     {	
        		$vlevel="8";
		     }
		    if ($selected=="9")
		     {	
        		$vlevel="9";
		     }
		  }
		 }
		$mainlib->dbquery("INSERT INTO Tbluser(userid, usernama, jabatan, pass, level, leader, gedung) VALUES ('".$vuserid."', '".$vusernama."', '".$vjabatan."', '123456', '".$vlevel."', '".$vleader."', '".$vgedung."')", $mainlib->ocn);
		break;

	case "edit":
		$vuserid = $_POST["txtUserid"];
		$vusernama = $_POST["txtUsernama"];
		$vjabatan = $_POST["txtJabatan"];
		$vlevel = $_POST["txtLevel"];
		$vleader = $_POST["txtLeader"];
		$vgedung = $_POST["txtGedung"];

        if(!empty($_POST['level'])) {
		  foreach($_POST['level'] as $selected) {
		    if ($selected=="1")
		     {	
        		$vlevel="1";
		     }
		    if ($selected=="2")
		     {	
        		$vlevel="2";
		     }
		    if ($selected=="3")
		     {	
        		$vlevel="3";
		     }
		    if ($selected=="4")
		     {	
        		$vlevel="4";
		     }
		    if ($selected=="5")
		     {	
        		$vlevel="5";
		     }
		    if ($selected=="6")
		     {	
        		$vlevel="6";
		     }
		    if ($selected=="7")
		     {	
        		$vlevel="7";
		     }
		    if ($selected=="8")
		     {	
        		$vlevel="8";
		     }
		    if ($selected=="9")
		     {	
        		$vlevel="9";
		     }		  }
		 }

		$mainlib->dbquery("UPDATE Tbluser SET usernama = '".$vusernama."', jabatan = '".$vjabatan."', level = '".$vlevel."', leader = '".$vleader."', gedung = '".$vgedung."'  WHERE userid = '".$vuserid."'", $mainlib->ocn);
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
					$sql .= "userid='".$arids[$i]."'";
				}
				$sql = "delete from Tbluser WHERE ".$sql;
				$mainlib->dbquery($sql, $mainlib->ocn);
			}
		}
		break;
}

$mainlib->closedb();
$mainlib->redirect("userlist.php?pgret=1");
?>
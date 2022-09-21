<?php

include("inc/class.mainlib.inc.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();

	$vuser = $_POST["txtUserid"];
	$vpasslama = $_POST["txtPasslama"];
	$vpassbaru1 = $_POST["txtPassbaru1"];
	$vpassbaru2 = $_POST["txtPassbaru2"];

    if ($vpassbaru1 <> $vpassbaru2)
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("PASSWORD BARU PERTAMA <> KEDUA")."&url=");
		}
		
    $rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
	    if ($row = $mainlib->dbfetcharray($rs))
	    {		
	      $vpass = $row["pass"];     
	      if ($vpasslama <> $vpass)
		   {
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("PASSWORD LAMA SALAH")."&url=");
		   }
	    }
		
		
		$mainlib->dbquery("UPDATE Tbluser set pass='".$vpassbaru1."' WHERE userid = '".$vuser."'", $mainlib->ocn);



$mainlib->closedb();
$mainlib->redirect("main.php?pgret=1");
?>
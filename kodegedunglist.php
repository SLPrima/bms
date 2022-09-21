<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();

$mainlib = new mainlib();
$mainlib->opendb();

 	$vuser = $_SESSION["userid"];
 	$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
 	
	if ($row = $mainlib->dbfetcharray($rs))
 	{
	 $vusrlevel = $row["level"];
	 $vusrnama = $row["usernama"];
 	}

	 mysql_free_result($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?=APP_TITLE?></title>
</head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<body class="bodymargin">

<form name="frm" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" name="hidID1" value="<?php echo $vlevelmemo; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td>
		<?php
		echo "User : ".$vusrnama."<br>";
		$idcol = "gedung";
		$listtitle = "TABEL KODE TOWER / GEDUNG";
    	$listmenupage = "main.php";
		$listeditpage = "kodegedungedit.php";
		$listactionpage = "kodegedungact.php";

  		$allow_delete= true;
  		$allow_logout= false;
		
		$arcolcaption = array("KODE TOWER/GEDUNG");
		$arcolname = array("gedung");
		$arcolwidth = array("15%");
		
		$initsortcol = "gedung"; //When the list is first time opened, the sort order column will be $initsortcol
		$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)
		
		$arfiltercolcaption = array("Kode Tower/Gedung");
		$arfiltercolname = array("gedung");

		$sql = "SELECT * FROM gedungid";
		
		include("inc/listformbase.inc.php");
		?>
	</td>
</tr>
</table>
</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
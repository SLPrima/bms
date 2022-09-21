<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();

$mainlib = new mainlib();
$mainlib->opendb();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=APP_TITLE?></title>
</head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<body class="bodymargin">
<?php 
//	include("toppanel.php");
 	$vuser = $_SESSION["userid"];
 	$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
 	
	if ($row = $mainlib->dbfetcharray($rs))
 	{
	 $vusrlevel = $row["level"];
	 $vusrnama = $row["usernama"];
 	}

	 mysql_free_result($rs);
?>
	
	<form name="frm" method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<input type="hidden" name="hidID1" value="<?php echo $vusrnama; ?>">
	<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">
	<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
	 <td>
		<?php
		$idcol = "noreg";
        $listtitle = "JOB PLANNING";
    	$listeditpage = "planedit.php";
   	    $listmenupage = "main.php";
		$listactionpage = "planact.php";
		
  		$allow_addnew= false;
  		$allow_delete= false;
		$allow_delete2= false;

		$arcolcaption = array("NO.REGISTER","TGL.REGISTER","NAMA PELAPOR","DIVISI/BIRO","PERMINTAAN","PERSON IN CHARGE","PLAN SCHEDULE");
		$arcolname = array("noreg","tglreg|date","pelapor","divisi","permintaan","pic","plan");
		$arcolwidth = array("7%","10%","15%","10%","25%","10%","7%");
		
		$initsortcol = "noreg"; //When the list is first time opened, the sort order column will be $initsortcol
		$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)
		
		$arfiltercolcaption = array("No.Register","Nama Pelapor","Divisi/Biro","PIC");
		$arfiltercolname = array("noreg","pelapor","divisi","pic");
    
  		$sql = "SELECT * from register where status = 'B' and pic <> ''";

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
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
		$idcol = "pk";
        $listtitle = "SET AMPERE AC";
    	$listmenupage = "main.php";
		$listeditpage = "setac_edit.php";
		$listactionpage = "setac_act.php";
		
		$allow_addnew= true;
  		$allow_logout= false;
  		$allow_delete= false;
		$allow_delete2= false;

		$arcolcaption = array("PK","AMPERE","GOL");
		$arcolname = array("pk","amp","gol");
		$arcolwidth = array("3%","5%","5%");
		
		$initsortcol = "pk"; //When the list is first time opened, the sort order column will be $initsortcol
		$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)
		
		$arfiltercolcaption = array("PK");
		$arfiltercolname = array("pk");
    
  		$sql = "SELECT * from setac";

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
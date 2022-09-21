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
		$idcol = "userid";
		$listtitle = "TABEL USERS";
    	$listmenupage = "main.php";
		$listeditpage = "useredit.php";
		$listactionpage = "useract.php";
		

  		$allow_logout= false;
  		$allow_delete= true;
		
		
		$arcolcaption = array("USER ID","NAMA USER","JABATAN","LEVEL","LEADER HOUSEKEEPING","GEDUNG","#Login");
		$arcolname = array("userid","usernama", "jabatan", "level","leader","gedung","login|number");
		$arcolwidth = array("10%", "12%", "12%", "7%", "10%", "7%", "5%");
		
		$initsortcol = "userid"; //When the list is first time opened, the sort order column will be $initsortcol
		$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)
		
		$arfiltercolcaption = array("User ID", "Nama User","jabatan","Leader","Gedung");
		$arfiltercolname = array("userid", "usernama","Jabatan","leader","gedung");

		$sql = "SELECT * FROM Tbluser";
		
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
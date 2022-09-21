<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();

$mainlib = new mainlib();
$mainlib->opendb();
$tgl1    =date("Y-m-d");
$tgl     =$tgl1." 23:59:00";

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
	 $vgedung = $row["gedung"];
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
		echo "User : ".$vusrnama."<br>";
		$idcol = "gedung";
	    $idcol2 = "lantai";
		$idcol3 = "lokasi";
		$idcol4 = "jenis";
		$idcol5 = "tglkerja";
        $listtitle = "PROGRESS HOUSEKEEPING";
    	$listmenupage = "main.php";
		$listeditpage = "prog_prev2_leader_edit.php";
		$listactionpage = "prog_prev2_leader_act.php";
		
  		$allow_addnew= false;
  		$allow_logout= false;
  		$allow_delete= false;
		$allow_delete2= false;

		$arcolcaption = array("TOWER","LANTAI","LOKASI","BARANG","JENIS","TGL.DIKERJAKAN","PERIODE","OPERATOR-1","OPERATOR-2","OPERATOR-3","STATUS UNIT","LEADER","APV LEADER");
		$arcolname = array("gedung","lantai","lokasi","barang","jenis","tglkerja|date","periode","teknisi","teknisi2","teknisi3","statusunit","leader","apvleader");
		$arcolwidth = array("7%","7%","7%","7%","10%","10%","7%","7%","7%","7%","7%","10%","7%");
		
		$initsortcol = "gedung"; //When the list is first time opened, the sort order column will be $initsortcol
		$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)
		
		$arfiltercolcaption = array("Barang","Gedung","Lantai","Lokasi","Jenis","Operator-1","Tgl.Dikerjakan","Leader","APV Status");
		$arfiltercolname = array("barang","gedung","lantai","lokasi","Jenis","teknisi","tglkerja","Leader","apvleader");
    
	    $sql = "SELECT * from jadwal_prev2_ac where tglkerja <='$tgl' and apvleader = 'N' and gedung like '".$vgedung.'%'."'";

		include("inc/listformbase3.inc.php");
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
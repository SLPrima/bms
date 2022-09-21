<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();

$mainlib = new mainlib();
$mainlib->opendb();
$tgl1    =date("Y-m-d");
$tgl     =$tgl1." 23:59:00";
$tgl2     ="2000-01-01 23:59:00";


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
        $listtitle = "PROGRESS ENGINEERING";
    	$listmenupage = "main.php";
		$listeditpage = "prog_prev_ac_edit.php";
		$listactionpage = "prog_prev_ac_act.php";
		
  		$allow_addnew= false;
  		$allow_logout= false;
  		$allow_delete= false;
		$allow_delete2= false;

		$arcolcaption = array("TOWER","LANTAI","LOKASI","BARANG","JENIS","KAPASITAS","TGL.DIKERJAKAN","PERIODE","TEKNISI-1","TEKNISI-2","TEKNISI-3","KONDISI UNIT","STATUS","APPROVAL");
		$arcolname = array("gedung","lantai","lokasi","barang","jenis","kapasitas","tglkerja|date","periode","teknisi","teknisi2","teknisi3","statusunit","status","apv");
		$arcolwidth = array("7%","7%","10%","10%","10%","10%","10%","7%","7%","7%","7%","7%","7%","7%");
		
		$initsortcol = "gedung"; //When the list is first time opened, the sort order column will be $initsortcol
		$initsortcolascending = true; //Determines whether $initsortcol sort direction is ascending (true) or descending (false)
		
		$arfiltercolcaption = array("Barang","Gedung","Lantai","Lokasi","Jenis","Teknisi-1","Tgl.Dikerjakan","Leader","Status");
		$arfiltercolname = array("barang","gedung","lantai","lokasi","jenis","teknisi","tglkerja","leader","status");
    
//  		$sql = "SELECT * from jadwal_prev1_ac where tglkerja <='$tgl' and tglkerja >'$tgl2'  and (status <> 'Done' or statusunit='Tidak Baik') and apv <>'Y'";
  		$sql = "SELECT * from jadwal_prev1_ac where tglkerja <='$tgl' and tglkerja >'$tgl2'  and apv <>'Y' and gedung like '".$vgedung.'%'."'";

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
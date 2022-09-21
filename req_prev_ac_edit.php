<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vuser = $_SESSION["userid"];
$so_date = date("d-m-Y");
// $vjam = date("H:i:s");

//include("toppanel.php");

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{	
    $vusrlevel = $row["level"];
    $vmenu = $row["menu"];
	$vusrnama = $row["usernama"];
}

if (isset($_REQUEST["id"]))
{
	$id = $_REQUEST["id"];
	$id1 = explode(";", $id);
	$act = "edit";
}
else
{
	$act = "add";
}

if (trim($id) != "")
{
	$rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev1 WHERE gedung = '".$id1[0]."' and lantai = '".$id1[1]."' and lokasi = '".$id1[2]."' and jenis = '".$id1[3]."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vgedung = $row["gedung"];
		$vlantai = $row["lantai"];
		$vlokasi = $row["lokasi"];
		$vbarang = $row["barang"];
		$vsn = $row["sn"];
		$vjenis = $row["jenis"];
		$vstatus = $row["status"];
		$vperiode = $row["periode"];
		$vkapasitas = $row["kapasitas"];
		$vfreon = $row["freon"];
		$vteknisi = $row["teknisi"];
		$vteknisi2 = $row["teknisi2"];
		$vteknisi3 = $row["teknisi3"];
		
	if (strlen($vstatus) > 5)
	 {
 		$so_date = date(DATE_FORMAT_ID,strtotime($row["tglakhir"]));
		$vjam = date("H:i:s",strtotime($row["tglakhir"]));
	 }
		
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=APP_TITLE?></title>
<link rel="stylesheet" type="text/css" href="css/spiffyCal_v2_1.css">
<script language="JavaScript" src="js/spiffyCal_v2_1.js"></script>
<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script language="JavaScript">

<?php
include("inc/jscript.inc.php");
?>

var calTgl1 = new ctlSpiffyCalendarBox("calTgl1","frm","txtSODate","btnTgl1","",scBTNMODE_CALBTN);

function validateForm()
{
	with (document.frm)
	{
		if (isBlank(txtLokasi, 'Lokasi harus diisi'))
			return false;
		if (isBlank(txtPekerjaan, 'Pekerjaan harus diisi'))
			return false;
		if (isBlank(txtJam, 'Jam harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtLokasi.focus();
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body onLoad="bodyOnload();" class="bodymargin">

<div id="spiffycalendar" class="text"></div>
    
<form name="frm" method="post" action="req_prev_ac_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">
<input type="hidden" name="txtStatus" value="<?php echo $vstatus; ?>">
<input type="hidden" name="txtGedungold" value="<?php echo $vgedung; ?>">
<input type="hidden" name="txtLantaiold" value="<?php echo $vlantai; ?>">
<input type="hidden" name="txtLokasiold" value="<?php echo $vlokasi; ?>">
<input type="hidden" name="txtJenisold" value="<?php echo $vjenis; ?>">

<?php
echo "User : ".$vusrnama."<br>";
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkblue; color:white">SCHEDULE ENGINEERING</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
    <td>.</td>
    <td>.</td>
</tr>   

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TOWER / GEDUNG</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtGedung" id="gedung" >
		<option><?=$vgedung?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT gedung FROM gedung order by gedung", $mainlib->ocn);
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[gedung]\">$p[gedung]</option>\n";
			}
		?>
 	</select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">LANTAI</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtLantai" class="InputText" style="padding-left:1px; maxlength="10" size="10" value="<?=$vlantai?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">LOKASI</td>
	<td class="tablecoldetail" height="23">
	 <input type="text" name="txtLokasi" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vlokasi?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">BARANG</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtBarang" class="InputText" style="padding-left:1px; maxlength="20" size="20" value="<?=$vbarang?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">SN</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtSn" class="InputText" style="padding-left:1px; maxlength="20" size="20" value="<?=$vsn?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">JENIS</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtJenis" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vjenis?>" >
	</td>
</tr>

<?php

if ($act == "add")
{
?>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">KAPASITAS</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtKapasitas" class="InputText" style="padding-left:1px; maxlength="20" size="20" value="<?=$vkapasitas?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">FREON</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtFreon" class="InputText" style="padding-left:1px; maxlength="7" size="7" value="<?=$vfreon?>" >
	</td>
</tr>

<?php
} else {
    
if (strtoupper($vbarang) == "AC" or strtoupper($vbarang) == "APAR" or strtoupper($vbarang) == "GENSET" or strtoupper($vbarang) == "DIESEL PUMP" or strtoupper($vbarang) == "POMPA BOSTER" or strtoupper($vbarang) == "POMPA TRANSFER" or strtoupper($vbarang) == "TOILET")
{
?> 

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">KAPASITAS</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtKapasitas" class="InputText" style="padding-left:1px; maxlength="20" size="20" value="<?=$vkapasitas?>" >
	</td>
</tr>

<?php
}

if ($vbarang == "AC")
{
?>    

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">FREON</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtFreon" class="InputText" style="padding-left:1px; maxlength="7" size="7" value="<?=$vfreon?>" >
	</td>
</tr>

<?php 
 }}

 if ($vusrlevel == "O" and $vmenu == "Engineering")
  {
?>      

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TGL.DIKERJAKAN </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtSODate" class="InputText" style="padding-left:1px; maxlength="10" size="10" value="<?=$so_date?>">
		&nbsp;JAM :&nbsp;&nbsp; 
		<input type="text" name="txtJam" class="InputText" style="padding-left:1px; maxlength="8" size="8" value="<?=$vjam?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">PERIODE </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtPeriode" class="inputtext2" style="padding-left:1px; maxlength="12" size="12" value="<?=$vperiode?>" readonly>
	</td>
</tr>

<?php
 } else {
?>      

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TGL.DIKERJAKAN </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtSODate" class="InputText" style="padding-left:1px; maxlength="10" size="10" value="<?=$so_date?>">
		<script language="javascript">
			calTgl1.writeControl();calTgl1.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
		&nbsp;JAM :&nbsp;&nbsp; 
		<input type="text" name="txtJam" class="inputtext" style="padding-left:1px; maxlength="8" size="8" value="<?=$vjam?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">PERIODE </td>
	<td class="tablecoldetail" height="23">
	 <select name="txtPeriode" id="periode" >
		<option><?=$vperiode?></option>
		<?php
			echo "<option value=\"\"></option>\n";
			echo "<option value=\"Harian\">Harian</option>\n";
			echo "<option value=\"Bulanan\">Bulanan</option>\n";
			echo "<option value=\"Triwulan\">Triwulan</option>\n";
			echo "<option value=\"Semester\">Semester</option>\n";
			echo "<option value=\"Tahunan\">Tahunan</option>\n";
		?>
 	</select>
	</td>
</tr>

<?php
 }
?>      

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TEKNISI-1</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtTeknisi" id="teknisi" >
		<option><?=$vteknisi?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT usernama,userid FROM Tbluser where level ='5' or level='7' order by usernama", $mainlib->ocn);
				echo "<option value=\"\"></option>\n";
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[usernama]\">$p[usernama] ($p[userid])</option>\n";
			}
		?>
 	</select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TEKNISI-2</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtTeknisi2" id="teknisi2" >
		<option><?=$vteknisi2?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT usernama,userid FROM Tbluser where level ='5' or level='7'  order by usernama", $mainlib->ocn);
				echo "<option value=\"\"></option>\n";
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[usernama]\">$p[usernama] ($p[userid])</option>\n";
			}
		?>
 	</select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TEKNISI-3</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtTeknisi3" id="teknisi3" >
		<option><?=$vteknisi3?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT usernama,userid FROM Tbluser where level ='5' or level='7'  order by usernama", $mainlib->ocn);
				echo "<option value=\"\"></option>\n";
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[usernama]\">$p[usernama] ($p[userid])</option>\n";
			}
		?>
 	</select>
	</td>
</tr>

</table>

<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkblue; color:white">

<?php
  if ($vusrlevel=="2")
  {
?>

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='req_prev_ac_list.php?pgret=1';">

<?php
 } else {
?>

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Submit  " class="button">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='req_prev_ac_list.php?pgret=1';">

<?php
 }
?>

   </td>
</tr>
</table>

<div id="pop_overlay" class="pop_dialog_overlay"></div>
<div id="pop_dialog" class="pop_dialog"><iframe id="pop_frame" width="100%" height="100%" scrolling="no" /></div>

</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
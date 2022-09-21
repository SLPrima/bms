<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vuser = $_SESSION["userid"];

//include("toppanel.php");

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{	
    $vusrlevel = $row["level"];
	$vusrnama = $row["usernama"];
}

if (isset($_REQUEST["id"]))
{
	$id = $_REQUEST["id"];
	$id1 = explode(";", $id);	
	$act = "edit";
	$so_date = date("d-m-Y");
	$vjam = date("H:i:s");
}
else
{
	$act = "add";
	$so_date = date("d-m-Y");
}

if (trim($id) != "")
{
	$rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev2_ac WHERE gedung = '".$id1[0]."' and lantai = '".$id1[1]."' and lokasi = '".$id1[2]."' and jenis = '".$id1[3]."'  and substr(tglkerja,1,10) = '".substr($id1[4],0,10)."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vlokasi = $row["lokasi"];
		$vgedung = $row["gedung"];
		$vlantai = $row["lantai"];
		$vbarang = $row["barang"];
		$vjenis = $row["jenis"];
		$vperiode = $row["periode"];
		$vkapasitas = $row["kapasitas"];
		$vgolac = $row["gol"];
        $vso_date2 = date(DATE_FORMAT,strtotime($row["tglkerja"]));
		$vteknisi = $row["teknisi"];
		$vteknisi2 = $row["teknisi2"];
		$vteknisi3 = $row["teknisi3"];
		$vleader = $row["leader"];
		$vapvleader = $row["apvleader"];
		$vnormal= $row["normal"];
		$vduakali= $row["duakali"];
		$vstatus= $row["status"];
		$vstatusunit= $row["statusunit"];
		$vketunit= $row["ketunit"];
		$vkethasil= $row["kethasil"];
		$vketerangan= $row["keterangan"];
		$vpcek1= $row["pcek1"];
		$vket1= $row["ket1"];
		$vpcek2= $row["pcek2"];
		$vket2= $row["ket2"];
		$vpcek3= $row["pcek3"];
		$vket3= $row["ket3"];
		$vpcek4= $row["pcek4"];
		$vket4= $row["ket4"];
		$vpcek5= $row["pcek5"];
		$vket5= $row["ket5"];
		$vpcek6= $row["pcek6"];
		$vket6= $row["ket6"];
		$vpcek7= $row["pcek7"];
		$vket7= $row["ket7"];
		$vpcek8= $row["pcek8"];
		$vket8= $row["ket8"];
		$vpcek9= $row["pcek9"];
		$vket9= $row["ket9"];
		$vpcek10= $row["pcek10"];
		$vket10= $row["ket10"];
		$vpcek11= $row["pcek11"];
		$vket11= $row["ket11"];
		$vpcek12= $row["pcek12"];
		$vket12= $row["ket12"];
		$vpcek13= $row["pcek13"];
		$vket13= $row["ket13"];
		$vpcek14= $row["pcek14"];
		$vket14= $row["ket14"];
		$vpcek15= $row["pcek15"];
		$vket15= $row["ket15"];
		$vpcek16= $row["pcek16"];
		$vket16= $row["ket16"];
		$vpcek17= $row["pcek17"];
		$vket17= $row["ket17"];

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

var calTgl1 = new ctlSpiffyCalendarBox("calTgl1","frm","txtTglselesai","btnTgl1","",scBTNMODE_CALBTN);
var calTgl2 = new ctlSpiffyCalendarBox("calTgl2","frm","txtTgllampu","btnTgl2","",scBTNMODE_CALBTN);

function validateForm()
{
	with (document.frm)
	{
		if (isBlank(txtLokasi, 'Lokasi harus diisi'))
			return false;
		if (isBlank(txtBarang, 'Barang harus diisi'))
			return false;
		if (isBlank(txtPeriode, 'Periode harus dipilih'))
			return false;
			
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtPeriode.focus();
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body onLoad="bodyOnload();" class="bodymargin">
    
<div id="spiffycalendar" class="text"></div>

<form name="frm" method="post" action="prog_prev2_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">
<input type="hidden" name="txtSODate" value="<?php echo $so_date; ?>">

<?php
echo "User : ".$vusrnama."<br>";
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkblue; color:white">PROGRESS HOUSEKEEPING</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
    <td>.</td>
    <td>.</td>
</tr>   

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TOWER / LANTAI</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtGedung" class="inputtext2" style="padding-left:1px; maxlength="15" size="15" value="<?=$vgedung?>" readonly>
        &nbsp;/&nbsp;
		<input type="text" name="txtLantai" class="inputtext2" style="padding-left:1px; maxlength="15" size="15" value="<?=$vlantai?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LOKASI</td>
	<td class="tablecoldetail" height="23">
	 <input type="text" name="txtLokasi" class="inputtext2" style="padding-left:1px; maxlength="50" size="50" value="<?=$vlokasi?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">BARANG</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtBarang" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vbarang?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">JENIS</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtJenis" class="inputtext2" style="padding-left:1px; maxlength="50" size="50" value="<?=$vjenis?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">ITEM YANG DIBERSIHKAN</td>
	<td class="tablecoldetail" height="23">
      <textarea name="txtKapasitas" style = "background:khaki; color:black" cols="50" rows="5" readonly><?=$vkapasitas?></textarea>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TGL.DIKERJAKAN </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtSODate2" class="inputtext2" style="padding-left:1px; maxlength="16" size="16" value="<?=$vso_date2?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PERIODE</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtPeriode" class="inputtext2" style="padding-left:1px; maxlength="12" size="12" value="<?=$vperiode?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">OPERATOR-1 / LEADER</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtTeknisi" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vteknisi?>" readonly >
        &nbsp;/&nbsp;
 		<input type="text" name="txtLeader" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vleader?>" readonly >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">OPERATOR-2</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtTeknisi2" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vteknisi2?>" readonly >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">OPERATOR-3</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtTeknisi3" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vteknisi3?>" readonly >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LEADER</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtLeader" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vleader?>" readonly >
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkcyan; color:white">STATUS</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TGL./JAM SELESAI </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTglselesai" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$so_date?>" readonly>
		<script language="javascript">
			calTgl1.writeControl();calTgl1.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
		&nbsp;/&nbsp;
		<input type="text" name="txtJam" class="InputText" style="padding-left:1px; maxlength="7" size="7" value="<?=$vjam?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STATUS PEKERJAAN</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtStatus" class="InputText" style="padding-left:1px; maxlength="12" size="12" value="<?=$vstatus?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETERANGAN </td>
	<td class="tablecoldetail" height="23">
     <textarea name="txtKeterangan" cols="50" rows="3"><?=$vketerangan?></textarea>
	</td>
</tr>

</table>
<br />

<?php
 if (strtoupper(trim($vjenis)) == "PEMELIHARAAN TOILET" or strtoupper(trim($vjenis)) == "GALERY")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">CLEANING 7X / HARI:</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Trash Can</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    
	    
  		<input type="text" name="txtKetl" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket1?>" >
 	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Floor</td>
	<td class="tablecoldetail" height="23">


	<?php
      if (strlen(strpos($vpcek2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet2" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket2?>" >
 	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Ceiling</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    
  		<input type="text" name="txtKet3" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket3?>" >

 	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Wall</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet4" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket4?>" >

 	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Air Freshner</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet5" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket5?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Sanitizer Urinoir</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet6" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket6?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Mirror</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet7" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket7?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Wastafel</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek8[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet8" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket8?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Hand Dryer</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet9" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket9?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Closet</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet10" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket10?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Urinoir</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek11,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek11[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek11[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek11,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek11[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek11[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet11" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket11?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Jet Shower</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek12,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek12[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek12[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek12,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek12[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek12[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet12" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket12?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Tissue</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek13,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek13[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek13[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek13,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek13[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek13[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet13" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket13?>" >

	</td>
</tr>


<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Hand Soap</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek14,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek14[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek14[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek14,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek14[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek14[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet14" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket14?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Smell</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek15,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek15[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek15[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek15,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek15[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek15[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet15" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket15?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Floor Drain</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek16,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek16[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek16[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek16,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek16[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek16[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet16" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket16?>" >

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Lamp</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek17,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek17[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek17[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek17,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek17[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek17[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    

  		<input type="text" name="txtKet17" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vket17?>" >

	</td>
</tr>


</table>
<br />

<?php
 }

 if (strtoupper($vjenis) == "PEMELIHARAAN AREA")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">SETELAH DILAKUKAN CLEANING</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">HASIL CLEANING : </td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vpcek1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcek1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpcek1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcek1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcek1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>		    
 	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETERANGAN HASIL CLEANING : </td>
	<td class="tablecoldetail" height="23">
        <textarea name="txtKethasil" cols="50" rows="5"><?=$vkethasil?></textarea>
 	</td>
</tr>

</table>
<br />

<?php
 }
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:royalblue; color:white">RESULT</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STATUS UNIT</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtStatusunit" class="inputtext3" style="padding-left:1px; maxlength="12" size="12" value="<?=$vstatusunit?>" readonly >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETERANGAN UNIT</td>
	<td class="tablecoldetail" height="23">
     <textarea name="txtKetunit" cols="50" rows="3"><?=$vketunit?></textarea>
	</td>
</tr>

</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkblue; color:white">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="save" style="cursor:pointer" value="  Submit  " class="button">
       
<?php
   if ($vstatusunit == "Baik")
    {
 ?> 
  	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="checked" style="cursor:pointer" value="  Checked  " class="button">
 <?php
    }
 ?>    

  	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="    Back    " class="button" onClick="window.location='prog_prev2_list.php?pgret=1';">
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
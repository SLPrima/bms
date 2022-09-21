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
	$rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev1_ac WHERE gedung = '".$id1[0]."' and lantai = '".$id1[1]."' and lokasi = '".$id1[2]."' and jenis = '".$id1[3]."' and substr(tglkerja,1,10) = '".substr($id1[4],0,10)."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{

		$vlokasi = $row["lokasi"];
		$vgedung = $row["gedung"];
		$vlantai = $row["lantai"];
		$vbarang = $row["barang"];
		$vjenis = $row["jenis"];
		$vperiode = $row["periode"];
		$vkapasitas = $row["kapasitas"];
		$vfreon = $row["freon"];
        $vso_date2 = date(DATE_FORMAT,strtotime($row["tglkerja"]));
		$vteknisi = $row["teknisi"];
		$vteknisi2 = $row["teknisi2"];
		$vteknisi3 = $row["teknisi3"];
		$vpindoor1 = $row["pindoor1"];
		$vpindoor2 = $row["pindoor2"];
		$vpindoor3 = $row["pindoor3"];
		$vpindoor4 = $row["pindoor4"];
		$vpindoor5 = $row["pindoor5"];
		$vtegangan = $row["tegangan"];
		$vpoutdoor1 = $row["poutdoor1"];
		$vpoutdoor2 = $row["poutdoor2"];
		$vrs= $row["rs"];
		$vst= $row["st"];
		$vtr= $row["tr"];
		$vr= $row["r"];
		$vampere= $row["ampere"];
		$vtekanan= $row["tekanan"];
		$vstatus= $row["status"];
		$vketerangan= $row["keterangan"];
		$vclean= $row["clean"];
		$vlampu= $row["lampuhorse"];
		$vtgllampu= $row["tgllamp"];
		$vteknisilampu= $row["teknisilamp"];
        $vstatusunit = $row["statusunit"]; 
		$vketunit= $row["ketunit"];
        $vtglperbaikan = date(DATE_FORMAT,strtotime($row["tglperbaikan"]));
		$vketperbaikan= $row["ketperbaikan"];

		
		$vtds= $row["tds"];
		$vpdispenser1 = $row["pdispenser1"];
		$vpdispenser2 = $row["pdispenser2"];
		
		$vapar= $row["apar"];
		
	    $vteganganpanel1= $row["teganganpanel1"];
	    $vteganganpanel2= $row["teganganpanel2"];
	    $vmcbpanel= $row["mcbpanel"];
	    $vmcbamppanel= $row["mcbamppanel"];

		$vpmesin1 = $row["pmesin1"];
		$vpmesin2 = $row["pmesin2"];
		$vpmesin3 = $row["pmesin3"];
		$vpmesin4 = $row["pmesin4"];
		$vpmesin5 = $row["pmesin5"];
		$vpmesin6 = $row["pmesin6"];
		$vpmesin7 = $row["pmesin7"];
		$vpmesin8 = $row["pmesin8"];
		$vpmesin9 = $row["pmesin9"];
		$vpmesin10 = $row["pmesin10"];
		$vphoistway1 = $row["phoistway1"];
		$vphoistway2 = $row["phoistway2"];
		$vphoistway3 = $row["phoistway3"];
		$vphoistway4 = $row["phoistway4"];
		$vphoistway5 = $row["phoistway5"];
		$vphoistway6 = $row["phoistway6"];
		$vphoistway7 = $row["phoistway7"];
		$vpcar1 = $row["pcar1"];
		$vpcar2 = $row["pcar2"];
		$vpcar3 = $row["pcar3"];
		$vpcar4 = $row["pcar4"];
		$vpcar5 = $row["pcar5"];
		$vpcar6 = $row["pcar6"];
		$vppit1 = $row["ppit1"];
		$vppit2 = $row["ppit2"];
		$vppit3 = $row["ppit3"];
		$vppit4 = $row["ppit4"];
		$vppit5 = $row["ppit5"];
		$vppit6 = $row["ppit6"];
		
		$vketerangan1 = $row["keterangan1"];
		$vketerangan2 = $row["keterangan2"];
		$vketerangan3 = $row["keterangan3"];
		$vketerangan4 = $row["keterangan4"];
		$vketerangan5 = $row["keterangan5"];
		$vketerangan6 = $row["keterangan6"];
		$vketerangan7 = $row["keterangan7"];
		$vketerangan8 = $row["keterangan8"];
		$vketerangan9 = $row["keterangan9"];
		$vketerangan10 = $row["keterangan10"];
		$vketerangan11 = $row["keterangan11"];
		$vketerangan12 = $row["keterangan12"];
		$vketerangan13 = $row["keterangan13"];
		$vketerangan14 = $row["keterangan14"];
		$vketerangan15 = $row["keterangan15"];
		$vketerangan16 = $row["keterangan16"];
		$vketerangan17 = $row["keterangan17"];
		$vketerangan18 = $row["keterangan18"];
		$vketerangan19 = $row["keterangan19"];
		$vketerangan20 = $row["keterangan20"];
		$vketerangan21 = $row["keterangan21"];
		$vketerangan22 = $row["keterangan22"];
		$vketerangan23 = $row["keterangan23"];
		$vketerangan24 = $row["keterangan24"];
		$vketerangan25 = $row["keterangan25"];
		$vketerangan26 = $row["keterangan26"];
		$vketerangan27 = $row["keterangan27"];
		$vketerangan28 = $row["keterangan28"];
		$vketerangan29 = $row["keterangan29"];
		$vketerangan30 = $row["keterangan30"];

		if (strlen($vperalatan) < 5)
		{
		   $vperalatan = "standard"; 
		}
		
	}
	
	$rs1 = $mainlib->dbquery("SELECT * FROM setac WHERE pk = '".$vkapasitas."'", $mainlib->ocn);
	if ($row1 = $mainlib->dbfetcharray($rs1))
	{
	 $vampac = $row1["amp"];
	 $vgolac = $row1["gol"];
	}    

	$rs2 = $mainlib->dbquery("SELECT * FROM settegangan WHERE cabang = 'SLP'", $mainlib->ocn);
	if ($row2 = $mainlib->dbfetcharray($rs2))
	{
	 $vtekanan1 = $row2["tekanan4101"];
	 $vtekanan2 = $row2["tekanan4102"];
	 $vtekanan3 = $row2["tekanan4071"];
	 $vtekanan4 = $row2["tekanan4072"];
	 $vr1 = $row2["rst1"];
	 $vr2 = $row2["rst2"];
	 $vrst1 = $row2["rssttr1"];
	 $vrst2 = $row2["rssttr2"];
	 $vtds1 = $row2["tds1"];
	 $vtds2 = $row2["tds2"];
	 $vapar1 = $row2["apar1"];
	 $vapar2 = $row2["apar2"];
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
		if (isBlank(txtPekerjaan, 'Pekerjaan harus diisi'))
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

<form name="frm" method="post" action="prog_prev1_teknisi_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">
<input type="hidden" name="txtSODate" value="<?php echo $so_date; ?>">

<?php
echo "User : ".$vusrnama."<br>";
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkblue; color:white">PROGRESS ENGINEERING</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
    <td>.</td>
    <td>.</td>
</tr>   

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TOWER (GEDUNG) / LANTAI</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtGedung" class="inputtext2" style="padding-left:1px; maxlength="5" size="5" value="<?=$vgedung?>" readonly>
        &nbsp;/&nbsp;
		<input type="text" name="txtLantai" class="inputtext2" style="padding-left:1px; maxlength="5" size="5" value="<?=$vlantai?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LOKASI</td>
	<td class="tablecoldetail" height="23">
	 <input type="text" name="txtLokasi" class="inputtext2" style="padding-left:1px; maxlength="50" size="50" value="<?=$vlokasi?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">BARANG / JENIS</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtBarang" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vbarang?>" readonly>
        &nbsp;/&nbsp;
		<input type="text" name="txtJenis" class="inputtext2" style="padding-left:1px; maxlength="30" size="30" value="<?=$vjenis?>" readonly>
	</td>
</tr>

<?php
 if ($vbarang == "AC" or $vbarang == "Apar")
 {

  if ($vbarang == "AC")
  {
?>     

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KAPASITAS / FREON </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtKapasitas" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$vkapasitas?>" readonly>
        &nbsp;/&nbsp;
		<input type="text" name="txtFreon" class="inputtext2" style="padding-left:1px; maxlength="5" size="5" value="<?=$vfreon?>" readonly>
	</td>
</tr>	

<?php
  } else {
?>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KAPASITAS</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtKapasitas" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$vkapasitas?>" readonly>
	</td>
</tr>	

<?php
  }
 }
?>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TGL.DIKERJAKAN / PERIODE</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtSODate2" class="inputtext2" style="padding-left:1px; maxlength="16" size="16" value="<?=$vso_date2?>" readonly>
        &nbsp;/&nbsp;
		<input type="text" name="txtPeriode" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$vperiode?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEKNISI-1 / TEKNISI-2 / TEKNISI-3</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtTeknisi" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vteknisi?>" readonly >
        &nbsp;/&nbsp;
 		<input type="text" name="txtTeknisi2" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vteknisi2?>" readonly >
        &nbsp;/&nbsp;
 		<input type="text" name="txtTeknisi3" class="inputtext2" style="padding-left:1px; maxlength="20" size="20" value="<?=$vteknisi3?>" readonly >
	</td>
</tr>

</table>
<br />



<?php
 if (strtoupper($vbarang) == "AC")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">INDOOR UNIT</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">FILTER UDARA </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpindoor1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pindoor1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

     if (strlen(strpos($vpindoor1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pindoor1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">MODUL CONTROL </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpindoor2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pindoor2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpindoor2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pindoor2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">REMOTE CONTROL</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpindoor3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pindoor3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

      if (strlen(strpos($vpindoor3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pindoor3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KISI-KISI EVAPURATOR & KIPAS BLOWER</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpindoor4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pindoor4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

      if (strlen(strpos($vpindoor4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pindoor4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI TIDAK ADA NOISE</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpindoor5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pindoor5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

      if (strlen(strpos($vpindoor5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pindoor5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pindoor5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEGANGAN PADA INDOOR UNIT</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTegangan" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vtegangan?>" >
    	&nbsp;Volt
	</td>
</tr>

</table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">OUTDOOR UNIT</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">MOTOR FAN </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpoutdoor1,"A"))>0)
      {
	?>	
	  <input type="radio" name="poutdoor1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="poutdoor1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

      if (strlen(strpos($vpoutdoor1,"B"))>0)
      {
	?>	
	  <input type="radio" name="poutdoor1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="poutdoor1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
			<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">BEARING KIPAS FAN</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpoutdoor2,"A"))>0)
      {
	?>	
	  <input type="radio" name="poutdoor2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="poutdoor2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

      if (strlen(strpos($vpoutdoor2,"B"))>0)
      {
	?>	
	  <input type="radio" name="poutdoor2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="poutdoor2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
				<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">

	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:grey; color:white">MEASUREMENT</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<?php
 if ($vgolac == "1")
 {
?>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEGANGAN / AMPERE R-N </td>
	<td class="tablecoldetail" height="23">
<?php
 if ($vr >= $vr1 and $vr <= $vr2 or $vr == 0)
 {
?>
    <input type="text" name="txtR" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vr?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmpere" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vampere?>" >
	&nbsp;AMPERE
<?php
 } else {
?>
    <input type="text" name="txtR" class="InputText" style="text-align:left; color:red " maxlength="4" size="4" value="<?=$vr?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmpere" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vampere?>" >
	&nbsp;AMPERE
<?php
 }
?> 
	</td>
</tr>

<?php
 }
 
 if ($vgolac == "2")
 {
?>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEGANGAN / AMPERE RS </td>
	<td class="tablecoldetail" height="23">
<?php
 if ($vrs >= $vrst1 and $vrs <= $vrst2 or $vrs == 0 )
 {
?>
		<input type="text" name="txtRs" class="InputText" style="text-align:left" maxlength="4" size="4" value="<?=$vrs?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmpere" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vampere?>" >
	&nbsp;AMPERE
<?php
 } else {
?>
		<input type="text" name="txtRs" class="InputText" style="text-align:left; color:red" maxlength="4" size="4" value="<?=$vrs?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmpere" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vampere?>" >
	&nbsp;AMPERE
<?php
 }
?>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEGANGAN / AMPERE ST</td>
	<td class="tablecoldetail" height="23">
<?php
 if ($vst >= $vrst1 and $vst <= $vrst2 or $vst == 0 )
 {
?>
		<input type="text" name="txtSt" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vst?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmperecomp" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vamperecomp?>" >
	&nbsp;AMPERE
<?php
 } else {
?>
    	<input type="text" name="txtSt" class="InputText" style="text-align:left; color:red" maxlength="4" size="4" value="<?=$vst?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmperecomp" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vamperecomp?>" >
	&nbsp;AMPERE
<?php
 }
?>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEGANGAN / AMPERE TR</td>
	<td class="tablecoldetail" height="23">
<?php
 if ($vst >= $vrst1 and $vst <= $vrst2 or $vst == 0 )
 {
?>
    <input type="text" name="txtTr" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vtr?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmperephase" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vamperephase?>" >
	&nbsp;AMPERE
<?php
 } else {
?>
    <input type="text" name="txtTr" class="InputText" style="text-align:left; color:red" maxlength="4" size="4" value="<?=$vtr?>" >
	&nbsp;Volt
	&nbsp;/&nbsp;
		<input type="text" name="txtAmperephase" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vamperephase?>" >
	&nbsp;AMPERE
<?php
 }
?>
	</td>
</tr>

<?php
 }
?>

<?php
 if ($vfreon == "R 410")
 {
?>     
 
<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEKANAN REFIGRAN (R 410)</td>
	<td class="tablecoldetail" height="23">
<?php
if ($vtekanan >= $vtekanan1 and $vtekanan <= $vtekanan2)
 {
?>
		<input type="text" name="txtTekanan" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vtekanan?>" >
<?php
 } else {
?>     
		<input type="text" name="txtTekanan" class="InputText" style="text-align:left; color:red" maxlength="4" size="4" value="<?=$vtekanan?>" >
<?php
 }
?>     
	</td>
</tr>

<?php
 } else {
?>     
 
<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEKANAN REFIGRAN (R 407)</td>
	<td class="tablecoldetail" height="23">
<?php
if ($vtekanan >= $vtekanan3 and $vtekanan <= $vtekanan4)
 {
?>
		<input type="text" name="txtTekanan" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vtekanan?>" >
<?php
 } else {
?>     
		<input type="text" name="txtTekanan" class="InputText" style="text-align:left; color:red" maxlength="4" size="4" value="<?=$vtekanan?>" >
<?php
 }
?>     
	</td>
</tr>

<?php
 }
?>     

</table>
<br />


<?php
 }

 if (strtoupper($vbarang) == "DISPENSER")
 {
?> 

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">CHECKING</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KEJERNIHAN AIR</td>
	<td class="tablecoldetail" height="23">
 <?php
  if (strlen(strpos($vpdispenser1,"A"))>0)
  {
 ?>
	  <input type="radio" name="pdispenser1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pdispenser1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }

    if (strlen(strpos($vpdispenser1,"B"))>0)
    {
   ?>
	  <input type="radio" name="pdispenser1[]" value="B" checked="Yes">Tidak Baik &nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pdispenser1[]" value="B">Tidak Baik &nbsp;&nbsp;
	<?php
     }
	?>		
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PRE FILTER</td>
	<td class="tablecoldetail" height="23">
 <?php
  if (strlen(strpos($vpdispenser2,"A"))>0)
  {
 ?>
	  <input type="radio" name="pdispenser2[]" value="A" checked="Yes">Dibersihkan &nbsp;&nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pdispenser2[]" value="A">Dibersihkan &nbsp;&nbsp;&nbsp;&nbsp;
	<?php
     }

     if (strlen(strpos($vpdispenser2,"B"))>0)
     {
   ?>
	  <input type="radio" name="pdispenser2[]" value="B" checked="Yes">Diganti &nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pdispenser2[]" value="B">Diganti &nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TDS</td>
	<td class="tablecoldetail" height="23">
<?php
 if ((int)$vtds >= (int)$vtds1 and (int)$vtds <= (int)$vtds2 )
 {
?>
		<input type="text" name="txtTds" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vtds?>" >
<?php
 } else {
?>
    	<input type="text" name="txtTds" class="InputText" style="text-align:left; color:red" maxlength="4" size="4" value="<?=$vtds?>" >
<?php
 }
?>
	</td>
</tr>

</table>
<br />

<?php
 }

 if (strtoupper($vbarang) == "LIFT")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">MESIN ROOM</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">SUHU RUANG & KEBERSIHAN</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin1,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PENERANGAN RUANG MESIN</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin2,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEGANGAN SUPPLY UTAMA (RST)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin3,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">JARAK KONTAK BRAKE & SWITCH</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin4,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETEBALAN LAPISAN KANVAS BRAKE</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin5,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI DAN BATAS LEVEL OIL GEAR BOX</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin6,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">MOTOR TRAKSI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin7,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEGANGAN & ARUS AKI UNTUK ARD/UPSL</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin8,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan8?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">OPERASIONAL ARD/UPSL</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin9,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan9?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONTROL PANEL (KONTAKTOR,RELAY,TIMER,SEKRING,ETC)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"C"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpmesin10,"D"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp; 
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan10?>">

	</td>
</tr>

</table>


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:INDIANRED; color:white">HOISTWAY & TOP CAR</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI DI ATAS SANGKAR, E STOP & EXIT SWITCH</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway1,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"C"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vphoistway1,"D"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan11" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan11?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">JARAK INTERLOCK SWITCH PENGAIT TERHADAP PENYANGGA</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway2,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway2,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway2,"C"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vphoistway2,"D"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan12" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan12?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TOMBOL LUAR INDIKATOR, HALL LANTERN</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway3,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway3,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway3,"C"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vphoistway3,"D"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan13" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan13?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI BOX OIL PADA RAIL SANGKAR & RAIL CWT</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway4,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway4,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway4,"C"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vphoistway4,"D"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan14" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan14?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETERANGAN MAIN WIRE RAPE</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway5,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway5,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway5,"C"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vphoistway5,"D"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan15" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan15?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI BATTERY ESD & PC BOARD</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway6,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway6,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway6,"C"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vphoistway6,"D"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan16" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan16?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI LCD & BENDERA SENSOR</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway7,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway7,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway7,"C"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vphoistway7,"D"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan17" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan17?>">

	</td>
</tr>

</table>



<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkgrey; color:white">CAR STATION</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">CAR OPERATION PANEL / OPB</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar1,"C"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpcar1,"D"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan18" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan18?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">FUNGSI LAMPU EMERGENCY, INTERPHONE</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar2,"C"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpcar2,"D"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan19" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan19?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">SENSOR SAFETY RAY, MUNTIBEAM, SAF T-EDGE</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar3,"C"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpcar3,"D"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan20" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan20?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">FAN SANGKAR / AIR CONDITIONING</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar4,"C"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpcar4,"D"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan21" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan21?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LAMPU PENERANGAN SANGKAR (KOMPLIT SET)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar5[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar5[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar5,"C"))>0)
      {
	?>	
	  <input type="radio" name="pcar5[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar5[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpcar5,"D"))>0)
      {
	?>	
	  <input type="radio" name="pcar5[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar5[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan22" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan22?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">SANGKAR & MATERIAL PENDUKUNG</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar6[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar6[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar6,"C"))>0)
      {
	?>	
	  <input type="radio" name="pcar6[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar6[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vpcar6,"D"))>0)
      {
	?>	
	  <input type="radio" name="pcar6[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar6[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan23" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan23?>">

	</td>
</tr>

</table>


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkyellow; color:white">PIT</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI PIT (PIT SWITCH, LAMPU PIT & BERSIH)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit1,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit1,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit1[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit1[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit1,"C"))>0)
      {
	?>	
	  <input type="radio" name="ppit1[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit1[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vppit1,"D"))>0)
      {
	?>	
	  <input type="radio" name="ppit1[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit1[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan24" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan24?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">JARAK COMPENSATING SHEAVE</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit2,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit2,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit2[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit2[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit2,"C"))>0)
      {
	?>	
	  <input type="radio" name="ppit2[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit2[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vppit2,"D"))>0)
      {
	?>	
	  <input type="radio" name="ppit2[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit2[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan25" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan25?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">FUNGSI BUFFER / COMPENS / GOV</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit3,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit3,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit3[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit3[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit3,"C"))>0)
      {
	?>	
	  <input type="radio" name="ppit3[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit3[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vppit3,"D"))>0)
      {
	?>	
	  <input type="radio" name="ppit3[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit3[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan26" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan26?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KONDISI DUMPING ROLLER</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit4,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit4,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit4[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit4[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit4,"C"))>0)
      {
	?>	
	  <input type="radio" name="ppit4[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit4[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vppit4,"D"))>0)
      {
	?>	
	  <input type="radio" name="ppit4[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit4[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan27" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan27?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETEGANGAN GOVERNOOR YANG DIIJINKAN</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit5,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit5,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit5[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit5[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit5,"C"))>0)
      {
	?>	
	  <input type="radio" name="ppit5[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit5[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vppit5,"D"))>0)
      {
	?>	
	  <input type="radio" name="ppit5[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit5[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan28" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan28?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">JARAK CWT TERHADAP BUFFER (SANGKAR DI TOP FLOOR)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit6,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit6,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit6[]" value="B" checked="Yes">Perlu Perhatian &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit6[]" value="B">Perlu Perhatian &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit6,"C"))>0)
      {
	?>	
	  <input type="radio" name="ppit6[]" value="C" checked="Yes">Rusak/Repair &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit6[]" value="C">Rusak/Repair &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vppit6,"D"))>0)
      {
	?>	
	  <input type="radio" name="ppit6[]" value="D" checked="Yes">Ganti Segera &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit6[]" value="D">Ganti Segera &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan29" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan29?>">

	</td>
</tr>

</table>

<?php
 }

 if (strtoupper($vbarang) == "GENSET")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">SEBELUM PEMANASAN GENSET</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan AIR AKI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

    </td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan Amper AKI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengeceken OLI(RST)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
    <?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengeceken Air Radiator</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan Solar</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">
	
	</td>
</tr>

</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">SAAT PEMANASAN GENSET</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Standard Voltage 3 phasa (rs,st,tr)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KVA</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">% KW</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan8?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PF COS</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan9?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Oil Press (PSI)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan10?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KWH</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway1,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan11" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan11?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEMP Oil (C)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway2,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway2,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan12" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan12?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEMP Coolant (C)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway3,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway3,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan13" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan13?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEMP Exhaust (C)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway4,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway4,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan14" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan14?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">FREQ (Hz)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway5,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway5,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan15" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan15?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">SPEED RPM</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway6,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway6,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan16" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan16?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">BATT.VOLT DC</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway7,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway7,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan17" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan17?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">DAILY TANK (%)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan18" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan18?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STORAGE TANK</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan19" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan19?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TOTAL FUEL</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="B" checked="Yes">Tidak Baik <&nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan20" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan20?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">ENGINE HOURS</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan21" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan21?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">BREAKER POSITION</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan22" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan22?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">GST STATUS</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar6[]" value="B" checked="Yes">Tidak Baik <&nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan23" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan23?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">SWITCH POSITION</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit1,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit1,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit1[]" value="B" checked="Yes">Tidak Baik <br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit1[]" value="B">Tidak Baik <br />
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan24" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan24?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PARALEL MODE</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit2,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit2,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit2[]" value="B" checked="Yes">Tidak Baik <br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit2[]" value="B">Tidak Baik <br />
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan25" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan25?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan solar setelah pemanasan</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vppit3,"A"))>0)
      {
	?>	
	  <input type="radio" name="ppit3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vppit3,"B"))>0)
      {
	?>	
	  <input type="radio" name="ppit3[]" value="B" checked="Yes">Tidak Baik <br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="ppit3[]" value="B">Tidak Baik <br />
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan26" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan26?>">
	
	</td>
</tr>
</table>

<?php
 }

 if (strtoupper($vbarang) == "DIESEL PUMP")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">SEBELUM PEMANASAN DIESEL PUMP</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan AIR AKI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Tidak Baik <br /> 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Tidak Baik <br />
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">
    
    </td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan Amper AKI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengeceken OLI(RST)</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
    <?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengeceken Air Radiator</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan Solar</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">
	
	</td>
</tr>

</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">SAAT PEMANASAN DIESEL PUMP</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Stand By</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PSI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">CRANK 1</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Tidak Baik <&nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan8?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">CRANK 2</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan9?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Engine Coolant</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan10?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">RPM</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway1,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan11" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan11?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STATUS RUNNING</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway2,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway2,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan12" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan12?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">HOURS</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway3,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway3,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan13" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan13?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PSI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway4,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway4,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan14" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan14?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">CRANK 1</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway5,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway5,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan15" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan15?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">CRANK 2</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway6,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway6,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan16" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan16?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Engine coolant</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway7,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway7,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan17" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan17?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">RPM</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan18" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan18?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pengecekan solar setelah pemanasan</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan19" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan19?>">
	
	</td>
</tr>
</table>

<?php
 }
 
 if (strtoupper($vbarang) == "INFOCUS")
 {
?> 

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">CHECKING</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LAMP HOURSE</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtLampu" class="InputText" style="padding-left:1px; maxlength="20" size="20" value="<?=$vlampu?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TGL.PELAKSANAAN </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTgllampu" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$vtgllampu?>">
		<script language="javascript">
			calTgl2.writeControl();calTgl2.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TEKNISI PELAKSANA</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTeknisilampu" class="InputText" style="padding-left:1px; maxlength="30" size="30" value="<?=$vteknisilampu?>" >
	</td>
</tr>

</table>
<br />


<?php
 }

if (strtoupper($vbarang) == "POMPA BOSTER")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">MOTOR & POMPA BOSTER</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek mounting pondasi pada pompa dan motor</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">
    
    </td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek kipas motor fan pendingin pastikan berfungsi dengan baik</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek keadaan suara noise bering pada motor dan pompa </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
    <?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pastikan kelurusan poros pompa dan Motor</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Periksa kebocoran pada impeler</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek Tegangan Beban :  ( R - S ) , ( S - T ) , ( T - R ) </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek Arus Beban : ( R ) :  A  ( S ) :   A  ( T ) :   A</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">
	
	</td>
</tr>


</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">INSTALASI PIPA & VALVE POMPA BOSTER</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pastikan Tekanan Pressure Gauge berfungsi dengan baik </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan8?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Bersihkan Instalasi Pipa Pompa Transfer dan Pipa Pompa transfer </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan9?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek keadaan fleksible join pastikan berfungsi baik</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan10?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pastikan Geat valve keadaan yang benar open/close</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway1,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan11" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan11?>">
	
	</td>
</tr>

</table>

<?php
 }
 
if (strtoupper($vbarang) == "POMPA TRANSFER")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">MOTOR & POMPA BOSTER</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek mounting pondasi pada pompa dan motor</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">
    
    </td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek kipas motor fan pendingin pastikan berfungsi dengan baik</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek keadaan suara noise bering pada motor dan pompa </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
    <?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pastikan kelurusan poros pompa dan Motor</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Periksa kebocoran pada impeler</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek Tegangan Beban :  ( R - S ) , ( S - T ) , ( T - R ) </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek Arus Beban : ( R ) :  A  ( S ) :   A  ( T ) :   A</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">
	
	</td>
</tr>


</table>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">INSTALASI PIPA & VALVE POMPA BOSTER</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pastikan Tekanan Pressure Gauge berfungsi dengan baik </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan8?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Bersihkan Instalasi Pipa Pompa Transfer dan Pipa Pompa transfer </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan9?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Cek keadaan fleksible join pastikan berfungsi baik</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan10?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">Pastikan Geat valve keadaan yang benar open/close</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway1,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan11" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan11?>">
	
	</td>
</tr>

</table>


<?php
 }

if (strtoupper($vbarang) == "TOILET")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">ITEM PENGECEKAN</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">1. Periksa engsel engsel pintu </td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">
    
    </td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">2. Periksa slot pintu</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">3. Pastikan tidak ada suara bising pada gesekan engsel</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
    <?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">4. Cek door closer yg terpasang pada pintu</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">5. Periksa baut dan cashing pintu serta handle</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">6.Pengecekan Closet</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">7. Periksa Jet Shower</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">8.Periksa Wastafel</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan8?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">9.Periksa kondisi pintu kubikel</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan9?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">10. Pengecekan Urinoir</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan10?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">11. Lampu Toilet</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway1,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan11" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan11?>">
	
	</td>
</tr>

</table>


<?php
 }

 if (strtoupper($vbarang) == "APAR")
 {
?> 

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">CHECKING</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PRESURE BAR APAR</td>
	<td class="tablecoldetail" height="23">
<?php
 if ($vapar >= $vapar1 and $vapar <= $vapar2 or $vapar == 0 )
 {
?>
		<input type="text" name="txtApar" class="InputText" style="padding-left:1px; maxlength="4" size="4" value="<?=$vapar?>" >
<?php
 } else {
?>
    	<input type="text" name="txtApar" class="InputText" style="text-align:left; color:red" maxlength="4" size="4" value="<?=$vapar?>" >
<?php
 }
?>
	</td>
</tr>

</table>
<br />


<?php
 }

 if ($vbarang == "Panel")
 {
?> 

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">I. URAIAN PEKERJAAN PEMERIKSAAN</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">1. Periksa & Pastikan ruangan dan panel dalam kondisi bersih</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">2. Bersihkan debu/kotoran yang ada pada semua jaringan di dalam panel</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">3. Pastikan exhaust fan ruangan kerja</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">4. Periksa dan pastikan MCB / MCCB tidak panas / rusak</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">5. Periksa dan pastikan contactor tidak panas dan berisik</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">6. Periksa dan pastikan Indikator kontrol semua berfungsi baik</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">7. Periksa dan pastikan Instalasi kabel tidak panas dan tersusun rapi</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">8. Kencangkan terminasi kabel yang ada di dalam panel</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">9. Pastikan semua fuse tidak putus</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">10. Pastikan setingan Timer sesuai waktu On / Off dan berfungsi baik</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp; 
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">

	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:indianred; color:white">II. URAIAN PEKERJAAN PENGUKURAN</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">1. Tegangan 1 Phase</td>
	<td class="tablecoldetail" height="23">
	    &nbsp;&nbsp;R-
		<input type="text" name="txtTeganganpanel1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vteganganpanel1?>" >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S-
		<input type="text" name="txtTeganganpanel1b" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vteganganpanel1b?>" >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-
		<input type="text" name="txtTeganganpanel1c" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vteganganpanel1c?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">2. Tegangan 3 Phase</td>
	<td class="tablecoldetail" height="23">
	RS-
		<input type="text" name="txtTeganganpanel2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vteganganpanel2?>" >
    &nbsp;&nbsp;&nbsp;ST-
		<input type="text" name="txtTeganganpanel2b" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vteganganpanel2b?>" >
    &nbsp;&nbsp;&nbsp;TR-
		<input type="text" name="txtTeganganpanel2c" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vteganganpanel2c?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">3. Kapasitas MCCB / MCB yang terpasang </td>
	<td class="tablecoldetail" height="23">
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="txtMcbpanel" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vmcbpanel?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">4. Ampere R - S - T</td>
	<td class="tablecoldetail" height="23">
	    &nbsp;&nbsp;R-
		<input type="text" name="txtMcbamppanel" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vmcbamppanel?>" >
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S-
		<input type="text" name="txtMcbamppanel2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vmcbamppanel2?>" >
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T-
		<input type="text" name="txtMcbamppanel3" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vmcbamppanel3?>" >
	</td>
</tr>

</table>
<br />


<?php
 }
 
 if (strtoupper($vbarang) == "KELAS")
 {
?>

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:olive; color:white">ITEM PENGECEKAN</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">MEJA</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan1" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan1?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KURSI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan2" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan2?>">

	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">MEJA PODIUM</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan3" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan3?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KURSI PODIUM</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan4" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan4?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PINTU</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin5,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin5,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan5" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan5?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">ENGSEL PINTU</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin6,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin6,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan6" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan6?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">HANDEL PINTU</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin7,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin7,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan7" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan7?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KUNCI PINTU</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin8,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin8,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin8[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin8[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan8" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan8?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">DINDING</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin9,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin9,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin9[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin9[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan9" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan9?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">VERTIKAL BLIND</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpmesin10,"A"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpmesin10,"B"))>0)
      {
	?>	
	  <input type="radio" name="pmesin10[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pmesin10[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan10" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan10?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PLAFON / AKUSTIK</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway1,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway1,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan11" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan11?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LANTAI / KARPET</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway2,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway2,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan12" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan12?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LAMPU</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway3,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway3,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan13" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan13?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">SAKLAR</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway4,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway4,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan14" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan14?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STOP KONTAK</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway5,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway5,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway5[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway5[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan15" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan15?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">GLASS BOARD</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway6,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway6,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway6[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway6[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan16" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan16?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">CRADENSA</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vphoistway7,"A"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vphoistway7,"B"))>0)
      {
	?>	
	  <input type="radio" name="phoistway7[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="phoistway7[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan17" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan17?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PLINT LANTAI</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar1,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar1,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar1[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar1[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan18" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan18?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KAP LAMPU</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar2,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar2,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar2[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar2[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan19" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan19?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">E-PODIUM</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar3,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar3,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar3[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar3[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan20" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan20?>">
	
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">PROJECTOR</td>
	<td class="tablecoldetail" height="23">
	<?php
      if (strlen(strpos($vpcar4,"A"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="A" checked="Yes">Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="A">Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vpcar4,"B"))>0)
      {
	?>	
	  <input type="radio" name="pcar4[]" value="B" checked="Yes">Tidak Baik &nbsp;&nbsp;&nbsp;
  	<?php
     } else {
	?>	  
	  <input type="radio" name="pcar4[]" value="B">Tidak Baik &nbsp;&nbsp;&nbsp;
	<?php
     }
	?>	
		<input type="text" name="txtKeterangan21" class="InputText" style="padding-left:1px; maxlength="60" size="60" value="<?=$vketerangan21?>">
	
	</td>
</tr>

</table>

<?php
 }
?> 


<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:slateblue; color:white">KONDISI UNIT</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STATUS UNIT</td>
	<td class="tablecoldetail" height="23">
 <?php
  if ($vstatusunit == "Baik")
   {
 ?>      
		<input type="text" name="txtStatusunit" class="InputText" style="padding-left:1px; maxlength="10" size="10" value="<?=$vstatusunit?>" readonly>
 <?php
   } else {
 ?>      
		<input type="text" name="txtStatusunit" class="InputText" style="text-align:left; color:red" maxlength="10" size="10" value="<?=$vstatusunit?>" readonly>
 <?php
   }
 ?>      
   
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETERANGAN UNIT</td>
	<td class="tablecoldetail" height="23">
     <textarea name="txtKetunit" cols="50" rows="3"><?=$vketunit?></textarea>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STATUS PROGRESS</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtStatusprogress" class="InputText" style="padding-left:1px; maxlength="40" size="40" value="<?=$vstatusprogress?>" >
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
	  <td class="tablecoltitle" colspan="2" style = "background:darkcyan; color:white">RESULT</td>
   </tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">TGL / JAM SELESAI </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTglselesai" class="inputtext3" style="padding-left:1px; maxlength="10" size="10" value="<?=$so_date?>">
       &nbsp;/&nbsp;
		<input type="text" name="txtJam" class="inputtext3" style="padding-left:1px; maxlength="7" size="7" value="<?=$vjam?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">STATUS PEKERJAAN</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtStatus" class="inputtext3" style="padding-left:1px; maxlength="10" size="10" value="<?=$vstatus?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETERANGAN STATUS</td>
	<td class="tablecoldetail" height="23">
     <textarea name="txtKeterangan" cols="50" rows="3"><?=$vketerangan?></textarea>
	</td>
</tr>

</table>
<br />


<?php
  if ($vstatusunitold=="Tidak Baik" or strlen($vketperbaikan) > 3)
  {
?>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:Dodgerblue; color:white">DATA PERBAIKAN</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TGL.SELESAI UNIT DIPERBAIKI </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTglperbaikan" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$vtglperbaikan?>" readonly>
		<script language="javascript">
			calTgl3.writeControl();calTgl3.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
		&nbsp;JAM :&nbsp;&nbsp; 
		<input type="text" name="txtJam" class="inputtext2" style="padding-left:1px; maxlength="8" size="8" value="<?=$vjam?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">KETERANGAN PERBAIKAN UNIT</td>
	<td class="tablecoldetail" height="23">
     <textarea name="txtKetperbaikan" cols="50" rows="3"><?=$vketperbaikan?></textarea>
	</td>
</tr>

</table>
<br />

<?php
} 
?>


</table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkblue; color:white">
  	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Submit  " class="button">
  	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='prog_prev1_teknisi_list.php?pgret=1';">
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
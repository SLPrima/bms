<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vuser = $_SESSION["userid"];

//include("toppanel.php");


	$rs = $mainlib->dbquery("SELECT * FROM  settegangan WHERE cabang='SLP'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vtekanan1 = $row["tekanan4101"];
		$vtekanan2 = $row["tekanan4102"];
		$vtekanan3 = $row["tekanan4071"];
		$vtekanan4 = $row["tekanan4072"];
//		$so_date = date(DATE_FORMAT,strtotime($row["tglreg"]));
		$vrst1 = $row["rst1"];
		$vrst2 = $row["rst2"];
		$vrssttr1 = $row["rssttr1"];
		$vrssttr2 = $row["rssttr2"];
		$vfreq = $row["freq"];
		$vwire1 = $row["wire1"];
		$vwire2 = $row["wire2"];
		$vrem1 = $row["rem1"];
		$vrem2 = $row["rem2"];
		$vtds1 = $row["tds1"];
		$vtds2 = $row["tds2"];
		$vapar1 = $row["apar1"];
		$vapar2 = $row["apar2"];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=APP_TITLE?></title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script language="JavaScript">
<?php
include("inc/jscript.inc.php");
?>
function validateForm()
{
	with (document.frm)
	{
		if (isBlank(txtTekanan1, 'Tekanan harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtTekanan.focus();
	}
}
</script>
</head>
<body onLoad="bodyOnload();" class="bodymargin">
<form name="frm" method="post" action="settegangan_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkblue; color:white">AC</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">FREON 410 - TEKANAN REFRIGRANT</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTekanan1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vtekanan1?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtTekanan2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vtekanan2?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">FREON 407 - TEKANAN REFRIGRANT</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTekanan3" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vtekanan3?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtTekanan4" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vtekanan4?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TEGANGAN 1 PHASE (R-S-T)</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtRst1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vrst1?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtRst2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vrst2?>" >
	&nbsp;Volt
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TEGANGAN 3 PHASE (RS-ST-TR)</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtRssttr1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vrssttr1?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtRssttr2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vrssttr2?>" >
	&nbsp;Volt
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">FREQUENSI</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtFreq" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vfreq?>" >
	&nbsp;Hz
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:slateblue; color:white">LIFT ELEVATOR</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">SELING WIRE LIFT</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtWire1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vwire1?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtWire2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vwire2?>" >
	&nbsp;mm
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">KANVAS REM LIFT</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtRem1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vrem1?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtRem2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vrem2?>" >
	&nbsp;cm
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkgreen; color:white">DISPENSER</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">STANDARD TDS DISPENSER</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTds1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vtds1?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtTds2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vtds2?>" >
	</td>
</tr>


</table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkcyan; color:white">APAR</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">STANDARD PRESURE BAR</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtApar1" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vapar1?>" >
        &nbsp;-&nbsp;
		<input type="text" name="txtApar2" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vapar2?>" >
	</td>
</tr>


</table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">

<?php
  if ($vusrlevel=="V")
  {
?>

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='main.php?pgret=1';">

<?php
 } else {
?>

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Save  " class="button">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='main.php?pgret=1';">

<?php
 }
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
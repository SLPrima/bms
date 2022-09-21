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
	$act = "edit";
}
else
{
	$act = "add";
	$so_date = date("d-m-Y");
}

if (trim($id) != "")
{
	$rs = $mainlib->dbquery("SELECT * FROM Tgllibur WHERE tanggal = '".$id."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vketerangan = $row["keterangan"];
//		$so_date = date(DATE_FORMAT,strtotime($row["tglreg"]));
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

var calTgl1 = new ctlSpiffyCalendarBox("calTgl1","frm","txtTgllibur","btnTgl1","",scBTNMODE_CALBTN);

function validateForm()
{
	with (document.frm)
	{
		if (isBlank(txtTanggal, 'Tanggal Libur harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtTanggal.focus();
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body onLoad="bodyOnload();" class="bodymargin">

<div id="spiffycalendar" class="text"></div>

<form name="frm" method="post" action="libur_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:brown; color:white">SET HARI LIBUR</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TANGGAL HARI LIBUR</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTgllibur" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$tgllibur?>" readonly>
		<script language="javascript">
			calTgl1.writeControl();calTgl1.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:brown">KETERANGAN</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtKeterangan" class="InputText" style="padding-left:1px; maxlength="100" size="100" value="<?=$vketerangan?>" >
	&nbsp;A
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

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='libur_list.php?pgret=1';">

<?php
 } else {
?>

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Save  " class="button">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='libur_list.php?pgret=1';">

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
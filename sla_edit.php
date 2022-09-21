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
	$rs = $mainlib->dbquery("SELECT * FROM  sla WHERE barang = '".$id."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vbarang = $row["barang"];
//		$so_date = date(DATE_FORMAT,strtotime($row["tglreg"]));
		$vsla = $row["sla"];
	}
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
		if (isBlank(txtSla, 'SLA harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtSla.focus();
	}
}
</script>
</head>
<body onLoad="bodyOnload();" class="bodymargin">
<form name="frm" method="post" action="sla_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:brown; color:white">SET SLA</td>
</tr>

<tr>
	<td>.</td>
	<td>.</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:brown">BARANG</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtBarang" id="sla" >
		<option><?=$vbarang?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT distinct barang FROM jadwal_prev1 order by barang", $mainlib->ocn);
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[barang]\">$p[barang]</option>\n";
			}
		?>
 	</select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:brown">SLA</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtSla" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vsla?>" >
	&nbsp;Menit
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

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='sla_list.php?pgret=1';">

<?php
 } else {
?>

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Save  " class="button">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='sla_list.php?pgret=1';">

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
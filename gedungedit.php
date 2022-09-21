<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();

$mainlib = new mainlib();
$mainlib->opendb();

if (isset($_REQUEST["id"]))
{
	$id = $_REQUEST["id"];
	$act = "edit";
}
else
{
	$act = "add";
}

if (trim($id)!="")
{
	$rs = $mainlib->dbquery("SELECT * FROM gedung WHERE gedung = '".$id."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vgedung = $row["gedung"];
	}
	mysql_free_result($rs);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?=APP_TITLE?></title>
<script language="JavaScript">

function validateForm()
{
	with (document.frm)
	{
		if (act.value=='add')
		{
			if (isBlank(txtGedung, 'TOWER/GEDUNG harus diisi'))
				return false;
		}
	}
	idrn true;
}

function bodyOnload()
{
	with (document.frm)
	{
		if (act.value=='add')
		{
			txtGedung.focus();
		}
	}
}
</script>
</head>
<LINK rel="stylesheet" type="text/css" href="css/main.css">
<body class="bodymargin" onLoad="bodyOnload();">

<form name="frm" method="post" action="gedungact.php" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="txtGedungold" value="<?php echo $vgedung; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="color:red"><?php echo strtoupper($act); ?> TABEL GEDUNG</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">GEDUNG </td>
	<td class="tablecoldetail" height="23">
		<input type="input" name="txtGedung" class="InputText" maxlength="15" size="15" value="<?=$vgedung?>" >
	</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

</table>
<br />
<br />

<table width="100%" cellpadding="0" cellspacing="0">
 <td class="tablecoltitle" colspan="2">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="   Save   " class="button">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="   Back   " class="button" onClick="window.location='gedunglist.php?pgret=1';">
 </td>
</tr>
</table>

</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
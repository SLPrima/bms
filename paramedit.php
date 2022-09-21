<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();
$mainlib = new mainlib();
$mainlib->opendb();
$vuser = $_SESSION["userid"];

// include("toppanel.php");

$rs = $mainlib->dbquery("SELECT * FROM Tblnomor WHERE 1", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{
    $vnoreg = $row["noreg"];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?=APP_TITLE?></title>
<link rel="stylesheet" type="text/css" href="css/spiffyCal_v2_1.css">
<script language="JavaScript" src="js/spiffyCal_v2_1.js"></script>
<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script language="JavaScript">

<?php
include("inc/jscript.inc.php");
?>
function validateForm()
{
	with (document.frm)
	{
		if (isBlank(txtNo, 'Nomor harus diisi'))
			return false;

	}

}

function bodyOnload()
{
	with (document.frm)
	{
		txtNo.focus();
	}
}


</script>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body class="bodymargin" onLoad="bodyOnload();">

<div id="spiffycalendar" class="text"></div>

<form name="frm" method="post" action="paramact.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:brown; color:white">SET PARAMETER</td>
</tr>

<tr>
	<td>.</td>
	<td>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:darkgreen">NO.REGISTER</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtNo" class="InputText" style="padding-left:1px; maxlength="5" size="5" value="<?=$vnoreg?>">
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">

    	&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Simpan" style="cursor:pointer" value="     Save     " class="button">
    	&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Batal"  style="cursor:pointer" value="     Back     " class="button">

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


<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vuser = $_SESSION["userid"];

// include("toppanel.php");

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{
	$vusrlevel = $row["level"];
	$vusrnama = $row["usernama"];
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
		if (isBlank(txtNama, 'Nama harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtNama.focus();
	}
}
</script>
</head>
<body onLoad="bodyOnload();" class="bodymargin">
<form name="frm" method="post" action="gantipassact.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:brown; color:white">CHANGE PASSWORD</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:darkorange">USER ID </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtUserid" class="inputtext2" style="padding-left:1px; maxlength="12" size="12" value="<?=$vuser?>" readonly>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:darkorange">NAMA USER</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtNamauser" class="inputtext2" style="padding-left:1px; maxlength="30" size="30" value="<?=$vusrnama?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">PASSWORD LAMA </td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtPasslama" class="InputText" style="padding-left:1px; maxlength="12" size="12" value="<?=$vpasslama?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">PASSWORD BARU </td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtPassbaru1" class="InputText" style="padding-left:1px; maxlength="12" size="12" value="<?=$vpassbaru1?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">PASSWORD BARU </td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtPassbaru2" class="InputText" style="padding-left:1px; maxlength="12" size="12" value="<?=$vpassbaru2?>" >
	</td>
</tr>


</table>

<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Save  " class="button">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='main.php?pgret=1';">

   </td>
</tr>
</table>
</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vuser = $_SESSION["userid"];

//include("toppanel.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=APP_TITLE?></title>

<script language="JavaScript">

<?php
include("inc/jscript.inc.php");
?>

function validateForm()
{
	with (document.frm)
	{
		if (isBlank(txtLink, 'Link Address harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtLink.focus();
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body onLoad="bodyOnload();" class="bodymargin">

<form name="frm" method="post" action="QRcode_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkblue; color:white">QR Code Link Address</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
    <td>.</td>
    <td>.</td>
</tr>   

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">LINK ADDRESS</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtLink" class="InputText" style="padding-left:1px; maxlength="50" size="50" value="<?=$vlink?>" >
	</td>
</tr>

</table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkblue; color:white">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  View  " class="button">
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
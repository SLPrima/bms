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
	$rs = $mainlib->dbquery("SELECT * FROM  setac WHERE pk = '".$id."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vpk = $row["pk"];
//		$so_date = date(DATE_FORMAT,strtotime($row["tglreg"]));
		$vamp = $row["amp"];
		$vgol = $row["gol"];
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
		if (isBlank(txtPk, 'PK harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtPk.focus();
	}
}
</script>
</head>
<body onLoad="bodyOnload();" class="bodymargin">
<form name="frm" method="post" action="setac_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:brown; color:white">SET AMPERE AC</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:brown">PK</td>
	<td class="tablecoldetail" height="23">
	<select name="txtPk" id="pk" >
		<option><?=$vpk?></option>
		<?php
				echo "<option value=\"1 PK\">1 PK</option>\n";
				echo "<option value=\"1.5 PK\">1.,5 PK</option>\n";
				echo "<option value=\"1,5 PK\">1,5 PK</option>\n";
				echo "<option value=\"2 PK\">2 PK</option>\n";
				echo "<option value=\"2.5 PK\">2.5 PK</option>\n";
				echo "<option value=\"2,5 PK\">2,5 PK</option>\n";
				echo "<option value=\"3 PK\">3 PK</option>\n";
				echo "<option value=\"4 PK\">4 PK</option>\n";
				echo "<option value=\"5 PK\">5 PK</option>\n";
				echo "<option value=\"5.5 PK\">5.5 PK</option>\n";
				echo "<option value=\"5,5 PK\">5,5 PK</option>\n";
				echo "<option value=\"6 PK\">6 PK</option>\n";
				echo "<option value=\"6.5 PK\">6.5 PK</option>\n";
				echo "<option value=\"6,5 PK\">6,5 PK</option>\n";
				echo "<option value=\"7 PK\">7 PK</option>\n";
				echo "<option value=\"8 PK\">8 PK</option>\n";
				echo "<option value=\"9 PK\">9 PK</option>\n";
				echo "<option value=\"10 PK\">10 PK</option>\n";
				echo "<option value=\"11 PK\">11 PK</option>\n";
		?>
 	</select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:brown">AMPERE</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtAmp" class="InputText" style="padding-left:1px; maxlength="3" size="3" value="<?=$vamp?>" >
	&nbsp;A
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:brown">GOL</td>
	<td class="tablecoldetail" height="23">
	<select name="txtGol" id="gol" >
		<option><?=$vgol?></option>
		<?php
				echo "<option value=\"1\">1</option>\n";
				echo "<option value=\"2\">2</option>\n";
		?>
 	</select>
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

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='setac_list.php?pgret=1';">

<?php
 } else {
?>

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Save  " class="button">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='setac_list.php?pgret=1';">

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
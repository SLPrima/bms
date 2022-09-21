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
	$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$id."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vuserid = $row["userid"];
		$vusernama = $row["usernama"];
		$vlevel = $row["level"];
		$vjabatan = $row["jabatan"];
		$vmenu = $row["menu"];
		$vleader = $row["leader"];
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
			if (isBlank(txtUsernama, 'Nama User harus diisi'))
				return false;
		}
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		if (act.value=='add')
		{
			txtUserid.focus();
		}
		if (act.value=='edit')
		{
			txtUsernama.focus();
		}
	}
}
</script>
</head>
<LINK rel="stylesheet" type="text/css" href="css/main.css">
<body class="bodymargin" onLoad="bodyOnload();">

<form name="frm" method="post" action="leaderact.php" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="color:red"><?php echo strtoupper($act); ?>TABEL LEADER</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">USER ID </td>
	<td class="tablecoldetail" height="23">
 <?php
  if ($act =="add")
   {
 ?>       
		<input type="input" name="txtUserid" class="InputText" maxlength="15" size="15" value="<?=$vuserid?>" >
 <?php
   } else {
 ?>       
		<input type="input" name="txtUserid" class="inputtext2" maxlength="15" size="15" value="<?=$vuserid?>" readonly>
 <?php
  }
 ?>       
	</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">NAMA USER </td>
	<td class="tablecoldetail" height="23">
		<input type="input" name="txtUsernama" class="inputtext2" maxlength="30" size="30" value="<?=$vusernama?>" readonly>
	</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" style="color:blue">JABATAN </td>
	<td class="tablecoldetail" height="23">
	  <input type="input" name="txtJabatan" class="inputtext2" maxlength="20" size="20" value="<?=$vjabatan?>" readonly>
	</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LEVEL</td>
	<td class="tablecoldetail" height="23">
	  <input type="input" name="txtLevel" class="inputtext2" maxlength="20" size="20" value="Operator Housekeeping" readonly>
	</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">LEADER OPERATOR HOUSEKEEPING</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtLeader" id="leader" >
		<option><?=$vleader?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT usernama FROM Tbluser where level ='6' and gedung = '".$vgedung."' order by usernama", $mainlib->ocn);
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[usernama]\">$p[usernama]</option>\n";
			}
		?>
 	</select>
	</td>
</tr>

</table>
<br />
<br />
<br />

<table width="100%" cellpadding="0" cellspacing="0">
 <td class="tablecoltitle" colspan="2">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="   Save   " class="button">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="   Back   " class="button" onClick="window.location='leaderlist.php?pgret=1';">
 </td>
</tr>
</table>

</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
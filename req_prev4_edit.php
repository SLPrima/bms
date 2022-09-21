<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vuser = $_SESSION["userid"];
$so_date = date("d-m-Y");
$vjam = date("H:i:s");
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

var calTgl1 = new ctlSpiffyCalendarBox("calTgl1","frm","txtSODate","btnTgl1","",scBTNMODE_CALBTN);

function validateForm()
{

}

function bodyOnload()
{
	with (document.frm)
	{
		txtGedung.focus();
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body onLoad="bodyOnload();" class="bodymargin">

<div id="spiffycalendar" class="text"></div>
    
<form name="frm" method="post" action="req_prev4_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkblue; color:white">STATUS PROGRESS SCHEDULE HOUSEKEEPING</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
    <td>.</td>
    <td>.</td>
</tr>   

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TOWER / GEDUNG</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtGedung" id="gedung" >
		<option><?=$vgedung?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT gedung FROM gedung order by gedung", $mainlib->ocn);
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[gedung]\">$p[gedung]</option>\n";
			}
		?>
 	</select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">LANTAI</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtLantai" class="InputText" style="padding-left:1px; maxlength="10" size="10" value="<?=$vlantai?>" >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">LOKASI</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtLokasi" class="InputText" style="padding-left:1px; maxlength="20" size="20" value="<?=$vlokasi?>" >
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkblue; color:white">
  	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="  Submit  " class="button">
  	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='req_prev3_edit.php?pgret=1';">
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
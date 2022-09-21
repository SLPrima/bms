<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();
$vuser = $_SESSION["userid"];
// include("toppanel.php");
$vtgl1 = date("d-m-Y");
$vtgl2 = date("d-m-Y");

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

var calTgl1 = new ctlSpiffyCalendarBox("calTgl1","frm","txtTgl1","btnTgl1","",scBTNMODE_CALBTN);
var calTgl2 = new ctlSpiffyCalendarBox("calTgl2","frm","txtTgl2","btnTgl2","",scBTNMODE_CALBTN);

function bodyOnload()
{
	with (document.frm)
	{
		txtDivisi.focus();
	}
}
</script>
</head>
<body onLoad="bodyOnload();" class="bodymargin">
<link rel="stylesheet" type="text/css" href="css/main.css">

<div id="spiffycalendar" class="text"></div>

<form name="frm" method="post" action="lappending.php" enctype="multipart/form-data" onSubmit="return validateForm();">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:slateblue; color:white">INQUIRY JOB PENDING</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:darkblue">.</td>
	<td class="tablecoldetail" height="23">
</tr>
<tr>
	<td class="tablecolcaption" width="20%" style="color:darkblue">TANGGAL REGISTER DARI</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTgl1" class="InputText" style="padding-left:1px; maxlength="12" size="12" value="<?=$vtgl1?>" >
		<script language="javascript">
			calTgl1.writeControl();calTgl1.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
		&nbsp;&nbsp;S/D&nbsp;&nbsp;
		<input type="text" name="txtTgl2" class="InputText" style="padding-left:1px; maxlength="12" size="12" value="<?=$vtgl2?>" >
		<script language="javascript">
			calTgl2.writeControl();calTgl2.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
</tr>

<tr>	  		
  <td class="tablecolcaption" width="20%" style="color:darkblue">DIVISI / BIRO (BLANK = ALL)</td>
  <td class="tablecoldetail" height="23">
	<select name="txtDivisi" id="txtDivisi" >
		<option><?=$vcust?></option>
		<?php
				echo "<option value=\"\"></option>\n";
				echo "<option value=\"SLP\">SLP</option>\n";
				echo "<option value=\"BCA\">BCA</option>\n";
				echo "<option value=\"DPP\">DPP</option>\n";
		?>
 	</select>
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">

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
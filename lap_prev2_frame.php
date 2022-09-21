<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();
$vuser = $_SESSION["userid"];
// include("toppanel.php");
$so_date = date("d-m-Y");
$so_date1 = "01".substr(date("d-m-Y"),2,8);
 	$vuser = $_SESSION["userid"];
 	$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
 	
	if ($row = $mainlib->dbfetcharray($rs))
 	{
	 $vusrlevel = $row["level"];
	 $vusrnama = $row["usernama"];
	 $vgedung = $row["gedung"];
 	}

		echo "User : ".$vusrnama."<br>";
 	
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
</script>

</head>

<body onLoad="bodyOnload();" class="bodymargin">
<div id="spiffycalendar" class="text"></div>
    
<link rel="stylesheet" type="text/css" href="css/main.css">

<form name="frm" method="post" action="lap_prev2_ac.php" enctype="multipart/form-data" onSubmit="return validateForm();">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:slateblue; color:white">INQUIRY PROGRESS ENGINEERING</td>
</tr>

<tr>	  		
  <td class="tablecolcaption" width="7%" style="color:darkblue">.</td>
  <td class="tablecoldetail" height="23">
  </td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TGL.DIKERJAKAN DARI</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTgl1" class="InputText" style="padding-left:1px; maxlength="8" size="8" value="<?=$so_date1?>" readonly>
		<script language="javascript">
			calTgl1.writeControl();calTgl1.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
        &nbsp;&nbsp;&nbsp;S/D&nbsp;&nbsp;&nbsp;
		<input type="text" name="txtTgl2" class="InputText" style="padding-left:1px; maxlength="8" size="8" value="<?=$so_date?>" readonly>
		<script language="javascript">
			calTgl2.writeControl();calTgl2.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
	</td>
</tr>

<tr>	  		
  <td class="tablecolcaption" width="7%" style="color:darkblue">TOWER / GEDUNG</td>
  <td class="tablecoldetail" height="23">
		<input type="text" name="txtGedung" class="InputText" style="padding-left:1px; maxlength="8" size="8" value="<?=$vgedung?>" readonly>
  </td>
</tr>

<tr>
	<td class="tablecolcaption" width="7%" style="color:blue">JENIS </td>
	<td class="tablecoldetail" height="23">
	  <input type="radio" name="jenis[]" value="B" checked>Pemeliharaan Area<br />
	  <input type="radio" name="jenis[]" value="A" >Pemeliharaan Toilet <br />
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="7%" style="color:blue">STATUS </td>
	<td class="tablecoldetail" height="23">
	  <input type="radio" name="status[]" value="1" checked>All &nbsp;&nbsp
	  <input type="radio" name="status[]" value="2">Progress &nbsp;&nbsp
	  <input type="radio" name="status[]" value="3">Pending &nbsp;&nbsp;
	  <input type="radio" name="status[]" value="4">Done <br />
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="7%" style="color:blue">TYPE </td>
	<td class="tablecoldetail" height="23">
	  <input type="radio" name="type[]" value="1" checked>Complete &nbsp;&nbsp;
	  <input type="radio" name="type[]" value="2">Simple <br />
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="7%" style="color:blue">PRINT TO</td>
	<td class="tablecoldetail" height="23">
	  <input type="radio" name="cetak[]" value="1" checked>Screen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="radio" name="cetak[]" value="2">File Excell <br />
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

<div id="pop_overlay" class="pop_dialog_overlay"></div>
<div id="pop_dialog" class="pop_dialog"><iframe id="pop_frame" width="100%" height="100%" scrolling="no" /></div>

</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vuser = $_SESSION["userid"];
$vtgl_hrini = date("d-m-Y");

// include("toppanel.php");

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{	$vusrlevel = $row["level"];
	$vusrnama = $row["usernama"];
}


    $so_date = date("d-m-Y");
    $vthn = date("Y");
    $vnounit = "";

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

var calTgl1 = new ctlSpiffyCalendarBox("calTgl1","frm","txtTgljadwal","btnTgl1","",scBTNMODE_CALBTN);

function validateForm()
{
	with (document.frm)
	{
		if (isBlank(txtNounit, 'No. Unit dispenser harus diisi'))
			return false;
	}
	return true;
}

function bodyOnload()
{
	with (document.frm)
	{
		txtNounit.focus();
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body onLoad="bodyOnload();" class="bodymargin">

<div id="spiffycalendar" class="text"></div>

<form name="frm" method="post" action="checklist_tds_dispenser_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:brown; color:white">CHECKLIST TDS DISPENSER</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">NO.UNIT DISPENSER</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtNounit" id="nounit" >
		<option><?=$vnounit?></option>
		<?php
			$rs = $mainlib->dbquery("SELECT nounit FROM dispenser order by nounit", $mainlib->ocn);
				echo "<option value=\"\"></option>\n";
 			while($p=$mainlib->dbfetcharray($rs))
			{
				echo "<option value=\"$p[nounit]\">$p[nounit]</option>\n";
			}
		?>
  	 </select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">BULAN</td>
	<td class="tablecoldetail" height="23">
	 <select name="txtBulan" id="bulan" >
		<option><?=$vbulan?></option>
		<?php
			echo "<option value=\"Jan\">Jan</option>\n";
			echo "<option value=\"Feb\">Feb</option>\n";
			echo "<option value=\"Mar\">Mar</option>\n";
			echo "<option value=\"Apr\">Apr</option>\n";
			echo "<option value=\"Mei\">Mei</option>\n";
			echo "<option value=\"Jun\">Jun</option>\n";
			echo "<option value=\"Jul\">Jul</option>\n";
			echo "<option value=\"Ags\">Ags</option>\n";
			echo "<option value=\"Sep\">Sep</option>\n";
			echo "<option value=\"Okt\">Okt</option>\n";
			echo "<option value=\"Nov\">Nov</option>\n";
			echo "<option value=\"Des\">Des</option>\n";
		?>
 	 </select>
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TDS </td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtTds" class="InputText" style="padding-left:1px; maxlength="6" size="6" value="<?=$vtds?>" >
	    &nbsp;&nbsp;==>&nbsp;&nbsp;
        <input name="btnPilih" align="right" type="submit" style="cursor:pointer; color:white; background:indianred" value="SUBMIT" />
	</td>
</tr>

</table>
<br />


<table width="80%" border="0" cellpadding="2" cellspacing="1" class="table-list">     

  <tr>
    <th colspan="14" style="color:blue">ooO- TDS DISPENSER -Ooo</th>
  </tr>

   <tr>
    <td width="2%" align="left" bgcolor="#CCCCCC"><b>NO</b></td>
    <td width="12%" align="center" bgcolor="#CCCCCC"><b>NO.UNIT DISPENSER</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>LANTAI</b></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><b>LOKASI</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>CLEAN</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>JAN</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>FEB</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>MAR</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>APR</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>MEI</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>JUN</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>JUL</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>AGS</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>SEP</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>OKT</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>NOV</b></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><b>DES</b></td>
  </tr>
  
<?php
 $nomor=0;
 $rs = $mainlib->dbquery("SELECT * FROM dispenser WHERE tahun = '".$vthn."'", $mainlib->ocn);
 while ($row = $mainlib->dbfetcharray($rs))
 {
 $nomor++; 

if (($nomor%2)==0)
 {
?>     

  <tr>
    <td align="left" bgcolor="snow"><b><?php echo $nomor; ?></b></td>
    <td align="center" bgcolor="snow"><?php echo $row['nounit']; ?></td>
    <td align="left" bgcolor="snow"><?php echo $row['lantai']; ?></td>
    <td align="left" bgcolor="snow"><?php echo $row['lokasi']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['clean']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['jan']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['feb']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['mar']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['apr']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['mei']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['jun']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['jul']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['ags']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['sep']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['okt']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['nov']; ?></td>
    <td align="center" bgcolor="snow"><?php echo $row['des']; ?></td>
  </tr>

<?php
 } else {     
?>

  <tr>
    <td align="left" bgcolor="moccasin"><b><?php echo $nomor; ?></b></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['nounit']; ?></td>
    <td align="left" bgcolor="moccasin"><?php echo $row['lantai']; ?></td>
    <td align="left" bgcolor="moccasin"><?php echo $row['lokasi']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['clean']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['jan']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['feb']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['mar']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['apr']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['mei']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['jun']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['jul']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['ags']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['sep']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['okt']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['nov']; ?></td>
    <td align="center" bgcolor="moccasin"><?php echo $row['des']; ?></td>
  </tr>


<?php
   }     
 }
?>

   <tr>
    <td width="2%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="12%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="10%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="5%" align="left" bgcolor="#CCCCCC">.</td>
  </tr>

</table>
<br />

 
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="      Back      " class="button" onClick="window.location='main.php?pgret=1';">
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
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
	$rs = $mainlib->dbquery("SELECT * FROM  register WHERE noreg = '".$id."'", $mainlib->ocn);
	if ($row = $mainlib->dbfetcharray($rs))
	{
		$vnoreg = $row["noreg"];
		$so_date = date(DATE_FORMAT,strtotime($row["tglreg"]));
		$vnama = $row["pelapor"];
		$vdivisi = $row["divisi"];
		$vpermintaan = $row["permintaan"];
		$vpic = $row["pic"];
	}
	
	if(trim($_GET['Act'])=="Delete"){
	# Hapus Tmp jika datanya sudah ipindah,
	    $mainlib->dbquery("DELETE from jadwal WHERE noreg = '".$_GET['id']."' and no = '".$_GET['idx']."'", $mainlib->ocn);
	}
}
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
		if (isBlank(txtNama, 'Nama Pelapor harus diisi'))
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
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body onLoad="bodyOnload();" class="bodymargin">

<div id="spiffycalendar" class="text"></div>

<form name="frm" method="post" action="planact.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">
<input type="hidden" name="hidID2" value="<?php echo $vusrlevel; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:brown; color:white">JOB PLANNING</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">NO.REGISTER</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtNoreg" class="inputtext2" style="padding-left:1px; maxlength="6" size="6" value="<?=$vnoreg?>" readonly >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">TGL.REGISTER </td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtSODate" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$so_date?>" readonly>
	</td>
</tr>
<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">NAMA PELAPOR </td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtNama" class="inputtext2" style="padding-left:1px; maxlength="60" size="60" value="<?=$vnama?>" readonly >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">DIVISI / BIRO</td>
	<td class="tablecoldetail" height="23">
 		<input type="text" name="txtDivisi" class="inputtext2" style="padding-left:1px; maxlength="10" size="10" value="<?=$vdivisi?>" readonly >
	</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">PERMINTAAN </td>
	<td class="tablecoldetail" height="23">
	    <textarea name="txtPermintaan" cols="80" rows="5" style="background-color:khaki" readonly><?=$vpermintaan?></textarea>
	</td>
</tr>

<tr>	  		
  <td class="tablecolcaption" width="20%" style="color:blue">PERSON IN CHARGE</td>
  <td class="tablecoldetail" height="23">
 		<input type="text" name="txtPic" class="inputtext2" style="padding-left:1px; maxlength="50" size="50" value="<?=$vpic?>" readonly >
	</td>
</tr>

</table>
<br />

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkgreen; color:white">** PLAN SCHEDULE JOB **</td>
</tr>

<tr>
	<td>.</td>
</tr>

<tr>
	<td class="tablecolcaption" width="20%" style="color:darkblue">TANGGAL</td>
	<td class="tablecoldetail" height="23">
		<input type="text" name="txtTgljadwal" class="InputText" style="padding-left:1px; maxlength="12" size="12" value="<?=$vtgl_hrini?>" >
		<script language="javascript">
			calTgl1.writeControl();calTgl1.dateFormat='<?php echo DATE_FORMAT_JS; ?>';
		</script>
  
	</td>
</tr>

<tr>	  		
  <td class="tablecolcaption" width="20%" style="color:darkblue">JOB</td>
  <td class="tablecoldetail" height="23">
	   <input type="text" name="txtJob" class="InputText" style="padding-left:1px; maxlength="70" size="70" value="">
	   &nbsp;&nbsp;==>&nbsp;&nbsp;
       <input name="btnPilih" align="right" type="submit" style="cursor:pointer; color:white; background:indianred" value="To SCHEDULE JOB" />

	</td>
</tr>

 </table>
 <br />
 
 <table width="80%" border="0" cellpadding="2" cellspacing="1" class="table-list">     

  <tr>
    <th colspan="14" style="color:blue">ooO- JOB SCHEDULE -Ooo</th>
  </tr>

   <tr>
    <td width="2%" align="left" bgcolor="#CCCCCC"><b>NO</b></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><b>TANGGAL</b></td>
    <td width="50%" align="center" bgcolor="#CCCCCC"><b>PEKERJAAN</b></td>
    <td width="3%" align="center" bgcolor="#CCCCCC"><b>Del</b></td>
  </tr>
  
<?php
 $nomor=0;
 $rs = $mainlib->dbquery("SELECT * FROM jadwal WHERE noreg = '".$vnoreg."'", $mainlib->ocn);
 while ($row = $mainlib->dbfetcharray($rs))
 {
 $nomor++; 
 $vjobdel = $row['no'];
 $vtgl = date(DATE_FORMAT,strtotime($row["tanggal"]));

if (($nomor%2)==0)
 {
?>     

  <tr>
    <td align="left" bgcolor="azure"><b><?php echo $nomor; ?></b></td>
    <td align="center" bgcolor="azure"><?php echo $vtgl; ?></td>
    <td align="left" bgcolor="azure"><?php echo $row['job']; ?></td>
    <td align="center" bgcolor="azure"><a href="?page=planedit.php&Act=Delete&id=<?php echo $id; ?>&idx=<?php echo $vjobdel; ?>"target="_self" ><img src="images/btn_batal.jpg" width="16" height="16" border="0" /></a></td>
  </tr>

<?php
 } else {     
?>

  <tr>
    <td align="left" bgcolor="lightblue"><b><?php echo $nomor; ?></b></td>
    <td align="center" bgcolor="lightblue"><?php echo $vtgl; ?></td>
    <td align="left" bgcolor="lightblue"><?php echo $row['job']; ?></td>
    <td align="center" bgcolor="lightblue"><a href="?page=planedit.php&Act=Delete&id=<?php echo $id; ?>&idx=<?php echo $vjobdel; ?>"target="_self" ><img src="images/btn_batal.jpg" width="16" height="16" border="0" /></a></td>
  </tr>


<?php
   }     
 }
?>

   <tr>
    <td width="2%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="10%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="50%" align="left" bgcolor="#CCCCCC">.</td>
    <td width="3%" align="center" bgcolor="#CCCCCC">.</td>
  </tr>

</table>
<br />

 
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Simpan" style="cursor:pointer" value="     Save     " class="button">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="      Back      " class="button" onClick="window.location='planlist.php?pgret=1';">
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
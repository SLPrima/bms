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
			if (isBlank(txtUserid, 'User ID harus diisi'))
				return false;
			if (isBlank(txtUsernama, 'Nama User harus diisi'))
				return false;
	}
}

function bodyOnload()
{
	with (document.frm)
	{
			txtUserid.focus();
	}
}
</script>
</head>
<LINK rel="stylesheet" type="text/css" href="css/main.css">
<body class="bodymargin" onLoad="bodyOnload();">

<form name="frm" method="post" action="useract.php" onSubmit="return validateForm();">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="hidID" value="<?php echo $id; ?>">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="color:red"><?php echo strtoupper($act); ?> PEMELIHARAAN USER-ID</td>
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
		<input type="input" name="txtUsernama" class="InputText" maxlength="30" size="30" value="<?=$vusernama?>">
	</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" style="color:blue">JABATAN </td>
	<td class="tablecoldetail" height="23">
	  <input type="input" name="txtJabatan" class="InputText" maxlength="20" size="20" value="<?=$vjabatan?>">
	</td>
</tr>

<tr>
    <td>. </td>
    <td> </td>
</tr>

<tr>
	<td class="tablecolcaption" width="23%" style="color:blue">LEVEL</td>
	<td class="tablecoldetail" height="23">

	<?php
      if (strlen(strpos($vlevel,"1"))>0)
      {
	?>	
	  <input type="radio" name="level[]" value="1" checked="Yes">1 - Administrator<br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="level[]" value="1">1 - Administrator<br />
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vlevel,"2"))>0)
      {
	?>	
	  <input type="radio" name="level[]" value="2" checked="Yes">2 - Manager<br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="level[]" value="2">2 - Manager<br />
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vlevel,"3"))>0)
      {
	?>	
	        <input type="radio" name="level[]" value="3" checked="Yes">3 - Building Management(BM)<br />
    <?php
       } else {
    ?>	  
	        <input type="radio" name="level[]" value="3">3 - Building Management(BM)<br />
    <?php
       }

      if (strlen(strpos($vlevel,"4"))>0)
      {
	?>	
	        <input type="radio" name="level[]" value="4" checked="Yes">4 - Supervisor Engineering<br />
    <?php
      } else {
	?>	  
	        <input type="radio" name="level[]" value="4">4 - Supervisor Engineering<br />
	<?php
      }
      
      if (strlen(strpos($vlevel,"5"))>0)
      {
	?>	
	        <input type="radio" name="level[]" value="5" checked="Yes">5 - Senior Teknisi<br />
  	<?php
      } else {
	?>	  
	        <input type="radio" name="level[]" value="5">5 - Senior Teknisi<br />
    <?php
        }
    ?>	

	<?php
      if (strlen(strpos($vlevel,"6"))>0)
      {
	?>	
	  <input type="radio" name="level[]" value="6" checked="Yes">6 - Leader Housekeeping<br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="level[]" value="6">6 - Leader Housekeeping<br />
	<?php
     }
	?>	

	<?php
      if (strlen(strpos($vlevel,"7"))>0)
      {
	?>	
	  <input type="radio" name="level[]" value="7" checked="Yes">7 - Teknisi Engineering<br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="level[]" value="7">7 - Teknisi Engineering<br />
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vlevel,"8"))>0)
      {
	?>	
	  <input type="radio" name="level[]" value="8" checked="Yes">8 - Operator Housekeeping<br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="level[]" value="8">8 - Operator Housekeeping<br />
	<?php
     }
	?>	
	
	<?php
      if (strlen(strpos($vlevel,"9"))>0)
      {
	?>	
	  <input type="radio" name="level[]" value="9" checked="Yes">9 - Supervisor Housekeeping<br />
  	<?php
     } else {
	?>	  
	  <input type="radio" name="level[]" value="9">9 - Supervisor Housekeeping<br />
	<?php
     }
	?>		

	</td>
</tr>

<tr>
	<td>.</td>
	<td>.</td>
</tr>


<tr>
	<td class="tablecolcaption" width="20%" style="color:blue">KODE GEDUNG </td>
	<td class="tablecoldetail" height="23">
	 <select name="txtGedung" id="vgedung" >
		<option><?=$vgedung?></option>
		<?php
		  $rs = $mainlib->dbquery("SELECT * FROM gedungid", $mainlib->ocn);
		   while ($row = $mainlib->dbfetcharray($rs))
		    {
			  echo "<option value=\"".$row["gedung"]."\">".$row["gedung"]."</option>";
		    }
		      mysql_free_result($rs);
		?>
 	</select>
	</td>
</tr>

</table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
 <td class="tablecoltitle" colspan="2">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer" value="   Save   " class="button">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="   Back   " class="button" onClick="window.location='userlist.php?pgret=1';">
 </td>
</tr>
</table>

</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
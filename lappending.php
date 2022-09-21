<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();

$vtgl11 = isset($_GET['tgl1']) ?  $_GET['tgl1'] : $_POST['txtTgl1']; 
$vtgl22 = isset($_GET['tgl2']) ?  $_GET['tgl2'] : $_POST['txtTgl2'];
$vdivisi = isset($_GET['divisi']) ?  $_GET['divisi'] : $_POST['txtDivisi'];
$vtgl1 = $mainlib->changedateformat($vtgl11, "d-m-y","y-m-d");
$vtgl2 = $mainlib->changedateformat($vtgl22, "d-m-y","y-m-d");
	        	
if (strlen($vdivisi) > 2)
{

  $sql = "SELECT * from register where tglreg between '".$vtgl1."' and '".$vtgl2."' and divisi = '".$vdivisi."' and status = 'B'  order by noreg";
  
} else {  

  $sql = "SELECT * from register where tglreg between '".$vtgl1."' and '".$vtgl2."' and status = 'B'  order by noreg";
  
} 


$hasil = $mainlib->dbquery($sql, $mainlib->ocn);

if (!$hasil)
 return FALSE;

$no = 0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>


 <style type="text/css">
	
		/* Table Body */
		.data-table tbody td {
			color: #252525;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(5),
		.data-table tbody td:last-child {
			text-align: left;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: cornsilk;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

	</style>
</head>


<table  width="1100" border="0" cellspacing="1" cellpadding="2">
   
  <tr>
	<td style = "background:linen; color:darkblue">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-oO JOB PENDING REPORT Oo-</td>
  </tr>
  
</table>

<table  width="1100" border="0" cellspacing="1" cellpadding="2">

<?php
 echo "Tanggal Register dari :  ".$vtgl11." s/d ".$vtgl22."<br>";  

 if (strlen($vdivisi) > 3)
 {
 echo "Divisi/Biro :  ".$vdivisi."<br>";  
 } 


?>

</table>
<br />

 <table class="data-table" width="1100" border="0" cellspacing="1" cellpadding="2">
      
<tr>
    <td style="width:20 ; text-align:center; background-color:olive ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:20 ; text-align:center; background-color:olive ;color:white ; font-size:12px"><b>No.Register</b></td>
    <td style="width:30 ; text-align:center; background-color:olive ;color:white ; font-size:12px"><b>Tgl.Register </b></td>
    <td style="width:80 ; text-align:center; background-color:olive ;color:white ; font-size:12px"><b>Nama Pelapor</b></td>
    <td style="width:20 ; text-align:center; background-color:olive ;color:white; ; font-size:12px"><b>Divisi/Biro</b></td>
    <td style="width:300 ; text-align:center; background-color:olive ;color:white; ; font-size:12px"><b>Permintaan</b></td>
    <td style="width:30 ; text-align:center; background-color:olive ;color:white; ; font-size:12px"><b>Progress(%)</b></td>
    <td style="width:20 ; text-align:center; background-color:olive ;color:white; ; font-size:12px"><b>View Detail</b></td>
  </tr>
 
 <tbody>
 
  
<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vnoreg = $baris["noreg"];
  $vtglreg = date("d-m-Y", strtotime($baris["tglreg"]));
  $vnama = $baris["pelapor"];
  $vdivisi2 = $baris["divisi"];
  $vpermintaan = $baris["permintaan"];
  $vprogress = $baris["progress"];
  $no += 1;

 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vnoreg; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglreg; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vnama; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vdivisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vpermintaan; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vprogress; ?> </td>
    <td style="text-align:center"><a href="lappendingdetail.php?noreg=<?php echo $vnoreg; ?>&tgl1=<?php echo $vtgl11; ?>&tgl2=<?php echo $vtgl22; ?>&divisi=<?php echo $vdivisi; ?>" target="_self" alt="Detail Pending"><img src="images/btn_view.png" width="20" height="20" border="0" /></a></td>


  </tr>
  
  <?php  
  }
  ?>
  
  <tr>
    <td width="20" align="left" bgcolor="#CCCCCC"></td>
    <td width="20" align="left" bgcolor="#CCCCCC"></td>
    <td width="30" align="left" bgcolor="#CCCCCC"></td>
    <td width="80" align="left" bgcolor="#CCCCCC"></td>
    <td width="20" align="center" bgcolor="#CCCCCC"></td>
    <td width="300" align="center" bgcolor="#CCCCCC"></td>
    <td width="30" align="center" bgcolor="#CCCCCC"></td>
    <td width="20" align="center" bgcolor="#CCCCCC"></td>

  </tr>

</tbody>
</table>
<br />

<table width="1100" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='lappendingframe.php?pgret=1';">
<!-- 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Print  " class="button" onClick="window.location='lappendingcetak.php?tgl1=<?php echo $vtgl11; ?>&tgl2=<?php echo $vtgl22; ?>&divisi=<?php echo $vdivisi; ?>'">
-->
   </td>
</tr>
</table>
</html>

 <?php
 $mainlib->closedb();
 ?>
<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();


$vnoreg = $_GET['noreg'];
$vtgl11 = $_GET['tgl1'];
$vtgl22 = $_GET['tgl2'];
$vdivisi = $_GET['divisi'];

 $sql2 = "SELECT * from register where noreg = '".$vnoreg."'";
 $hasil2 = $mainlib->dbquery($sql2, $mainlib->ocn);

if ($row = $mainlib->dbfetcharray($hasil2))
{
  $vtglreg = date(DATE_FORMAT,strtotime($row["tglreg"]));
  $vnama = $row["pelapor"];
  $vdivisi2 = $row["divisi"];
  $vpermintaan = $row["permintaan"];
}    

 $sql = "SELECT * from jadwal where noreg = '".$vnoreg."' order by no";
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
			background-color: lightyellow;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

	</style>
</head>


<table  width="700" border="0" cellspacing="1" cellpadding="2">
   
  <tr>
	<td style = "background:lemonchiffon; color:brown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-oO DETAIL JOB PENDING Oo-</td>
  </tr>
  
</table>

<table  width="700" border="0" cellspacing="1" cellpadding="2">

<?php
 echo "<br>";  
 echo "No.Register&nbsp;&nbsp;&nbsp;&nbsp; :  ".$vnoreg."<br>";  
 echo "Tgl.Register&nbsp;&nbsp;&nbsp;      :  ".$vtglreg."<br>";  
 echo "Nama Pelapor   :  ".$vnama."<br>";  
 echo "Divisi/Biro &nbsp;&nbsp;&nbsp;&nbsp;   :  ".$vdivisi2."<br>";  
 echo "Permintaan &nbsp;&nbsp;&nbsp;&nbsp;    :  ".$vpermintaan."<br>";  
?>

</table>
<br />

 <table class="data-table" width="700" border="0" cellspacing="1" cellpadding="2">
      
<tr>
    <td style="width:20 ; text-align:center; background-color:sienna ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:50 ; text-align:center; background-color:sienna ;color:white ; font-size:12px"><b>Tanggal</b></td>
    <td style="width:300 ; text-align:center; background-color:sienna ;color:white ; font-size:12px"><b>Pekerjaan </b></td>
    <td style="width:30 ; text-align:center; background-color:sienna ;color:white ; font-size:12px"><b>Status</b></td>
  </tr>
 
 <tbody>
 
  
<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vno = $baris["no"];
  $vtanggal = date(DATE_FORMAT,strtotime($baris["tanggal"]));
  $vjob = $baris["job"];
  $vstatus = $baris["status"];
 ?>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo $vno; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vtanggal; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjob; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatus; ?> </td>

  </tr>
  <?php  
  }
  ?>
  
  <tr>
    <td width="20" align="left" style="background-color:sienna">.</td>
    <td width="50" align="left" style="background-color:sienna"></td>
    <td width="300" align="left" style="background-color:sienna"></td>
    <td width="30" align="center" style="background-color:sienna"></td>

  </tr>

</tbody>
</table>
<br />

<table width="700" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkkhaki; color:white">

  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='lappending.php?tgl1=<?php echo $vtgl11; ?>&tgl2=<?php echo $vtgl22; ?>&divisi=<?php echo $vdivisi; ?>'">

   </td>
</tr>
</table>
</html>

 <?php
 $mainlib->closedb();
 ?>
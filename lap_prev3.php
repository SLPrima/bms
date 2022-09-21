<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();
// $tgl1    =date("Y-m-d");
// $tgl     =$tgl1." 23:59:00";


 	$vuser = $_SESSION["userid"];

    $vtgl = $mainlib->changedateformat("01/01/2000", DATE_FORMAT, "Y-m-d");

    $vtgl1 = $mainlib->changedateformat($_POST["txtTgl1"], DATE_FORMAT, "Y-m-d")." 00:00:01";
    $vtgl2 = $mainlib->changedateformat($_POST["txtTgl2"], DATE_FORMAT, "Y-m-d")." 23:59:55";

    $vxtgl1 = $mainlib->changedateformat($_POST["txtTgl1"], DATE_FORMAT, "d-m-Y");
    $vxtgl2 = $mainlib->changedateformat($_POST["txtTgl2"], DATE_FORMAT, "d-m-Y");

    $vteknisi = isset($_GET['teknisi']) ?  $_GET['teknisi'] : $_POST['txtTeknisi']; 

    if(!empty($_POST['area'])) {
		  foreach($_POST['area'] as $selected) {
		    if ($selected=="A")
		     {	
		        $vjenis2 = "Engineering"; 
        		$vjudul="-ooO  INQUIRY WORK SCHEDULE ENGINEERING  Ooo-";
		     }
		    if ($selected=="B")
		     {	
		        $vjenis2 = "Housekeeping"; 
        		$vjudul="-ooO  INQUIRY PROGRESS HOUSEKEEPING  Ooo-";
		     }
		  }
       }
		 

if ($vjenis2 == "Engineering")
{
  if (strlen($vteknisi) > 3)
   {
      $sql = "SELECT * from jadwal_prev1_ac where teknisi = '$vteknisi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' order by gedung,lantai,lokasi,jenis";
   } else {
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' order by gedung,lantai,lokasi,jenis";
   }      
}

if ($vjenis2 == "Housekeeping")
{
  if (strlen($vteknisi) > 3)
   {
      $sql = "SELECT * from jadwal_prev2_ac where teknisi = '$vteknisi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' order by gedung,lantai,lokasi,jenis";
   } else {
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' order by gedung,lantai,lokasi,jenis";
   }      
}


    if(!empty($_POST['cetak'])) {
		  foreach($_POST['cetak'] as $selected) {
		    if ($selected=="2")
		     {	
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=hasil.xls");
		     }
		  }
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

 <tbody>

<table  width="1100" border="0" cellspacing="1" cellpadding="2">
   
  <tr>
	<td style = "color:darkblue">&nbsp;&nbsp;&nbsp;<?php echo $vjudul; ?></td>
  </tr>
  
</table>

<br />

<?php
echo "Tgl. Dikerjakan dari : ",$vxtgl1." s/d ".$vxtgl2."<br>";
if (strlen($vteknisi)>5)
 {
   echo "Worker   : ".$vteknisi."<br>";
 } 
?>

 <table class="data-table" width="1500" border="0" cellspacing="1" cellpadding="2">
      
<tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Dikerjakan</b></td>
<?php
 if ($vjenis2 == "Engineering")
 {
?> 
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-1</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
<?php
 } else {
?>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-1</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-2</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-3</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Leader</b></td>
<?php
 }
?>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>


<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vlokasi = $baris["lokasi"];
  $vlantai = $baris["lantai"];
  $vtgl = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vstatus = $baris["status"];
  $vleader = $baris["leader"];
  $no += 1;

 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtgl; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
<?php
 if ($vjenis2 == "Housekeeping")
 {
?> 
    <td style="text-align:left ; font-size:12px"><?php echo $vleader; ?> </td>
<?php
 }
?>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatus; ?> </td>


  </tr>
  
  <?php  
  }
  ?>
  
  <tr>
    <td width="30" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    
<?php
 if ($vjenis2 == "Housekeeping")
 {
?> 
    <td width="150" align="center" bgcolor="lightblue">.</td>
<?php
 }
?>
    <td width="70" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />


</tbody>


<tr>
	<td class="tablecoltitle" colspan="2" style="color:white">
  	&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='lap_prev3_frame.php?pgret=1';">
   </td>
</tr>
</table>
</html>

 <?php
 $mainlib->closedb();
 ?>
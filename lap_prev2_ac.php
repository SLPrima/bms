<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();
// $tgl1    =date("Y-m-d");
// $tgl     =$tgl1." 23:59:00";


 	$vuser = $_SESSION["userid"];
 	$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
 	
	if ($row = $mainlib->dbfetcharray($rs))
 	{
	 $vusrlevel = $row["level"];
	 $vusrnama = $row["usernama"];
 	}

    $vtgl = $mainlib->changedateformat("01/01/2000", DATE_FORMAT, "Y-m-d");

    $vtgl1 = $mainlib->changedateformat($_POST["txtTgl1"], DATE_FORMAT, "Y-m-d")." 00:00:01";
    $vtgl2 = $mainlib->changedateformat($_POST["txtTgl2"], DATE_FORMAT, "Y-m-d")." 23:59:55";

    $vxtgl1 = $mainlib->changedateformat($_POST["txtTgl1"], DATE_FORMAT, "d-m-Y");
    $vxtgl2 = $mainlib->changedateformat($_POST["txtTgl2"], DATE_FORMAT, "d-m-Y");

    $vgedung = isset($_GET['gedung']) ?  $_GET['gedung'] : $_POST['txtGedung']; 

    if(!empty($_POST['status'])) {
		  foreach($_POST['status'] as $selected) {
		    if ($selected=="1")
		     {	
        		$vstatus="all";
		     }
		    if ($selected=="2")
		     {	
        		$vstatus="progress";
		     }
		    if ($selected=="3")
		     {	
				$vstatus="pending";
		     }
		    if ($selected=="4")
		     {	
				$vstatus="done";
		     }
		  }
		 }

        if(!empty($_POST['type'])) {
		  foreach($_POST['type'] as $selected) {
		    if ($selected=="1")
		     {	
        		$vtipe="Complete";
		     }
		    if ($selected=="2")
		     {	
        		$vtipe="Simple";
		     }
 	      }
        }  

    if(!empty($_POST['jenis'])) {
		  foreach($_POST['jenis'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vjenis1="Pemeliharaan Toilet";
        		$vjenis2="Pemeliharaan Toilet";
        		$vjudul="-ooO  INQUIRY PROGRESS HOUSEKEEPING (Pemeliharaan Toilet)  Ooo-";
		     }
		    if ($selected=="B")
		     {	
        		$vjenis1="Pemeliharaan Area";
        		$vjenis2="Pemeliharaan Area";
        		$vjudul="-ooO  INQUIRY PROGRESS HOUSEKEEPING (Pemeliharaan Area)  Ooo-";
		     }
		  }
		 }
		 
		 
	$rs = $mainlib->dbquery("SELECT * FROM jadwal_prev2 WHERE jenis = '".$vjenis2."'", $mainlib->ocn);
 	
	if ($row = $mainlib->dbfetcharray($rs))
 	{
	 $vitem = $row["kapasitas"];
 	}
		 

if ($vjenis1 == "Pemeliharaan Toilet")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and jenis = 'Pemeliharaan Toilet' order by gedung,lantai,lokasi,jenis";
    } 
 }
}

if ($vjenis1 == "Pemeliharaan Area")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev2_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev2_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and jenis = 'Pemeliharaan Area' order by gedung,lantai,lokasi,jenis";
    } 
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
echo "Status : ".strtoupper($vstatus)."<br>";
if (strlen($vitem)>5)
 {
   echo "User   : ".$vusrnama."<br>";
   echo "Item   : ".$vitem."<br><br>";
 } else {
   echo "User   : ".$vusrnama."<br><br>";
 }
 
if ($vstatus == "progress" )
{
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
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-1</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-2</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-3</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Leader</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>


<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vlokasi = $baris["lokasi"];
  $vlantai = $baris["lantai"];
  $vtgl = date("d-m-Y H:i:s", strtotime($baris["tglakhir"]));
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
    <td style="text-align:left ; font-size:12px"><?php echo $vleader; ?> </td>
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
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

<?php
}

if ($vstatus == "all" and $vjenis1 == "Pemeliharaan Toilet" or $vstatus == "done" and $vjenis1 == "Pemeliharaan Toilet" or $vstatus == "pending" and $vjenis1 == "Pemeliharaan Toilet")
{
    if ($vtipe == "Complete")
     {
?>

 <table class="data-table" width="3000" border="0" cellspacing="1" cellpadding="2">
      
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-1</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-2</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-3</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Leader</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Pekerjaan</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Trash Can</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Floor</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Ceiling</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Wall</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Air Freshner</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Sanitizer Urinoir</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Mirror</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Wastafel</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Hand Dryer</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Closet</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Urinoir</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Jet Shower</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b></b>Tissue</td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b></b>Hand Soap</td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b></b>Smell</td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b></b>Floor Drain</td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Lamp</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    
  </tr>
 
 <tbody>
 
  
<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vlokasi = $baris["lokasi"];
  if ($baris["tglselesai"]>$vtgl)
  {
   $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  } else {
   $vtglselesai = "";         
  } 
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vleader = $baris["leader"];
  $vstatus = $baris["status"];
  $vketerangan = $baris["keterangan"];
  $vcek1 = $baris["cek1"];
  $vket1 = $baris["ket1"];
  $vcek2 = $baris["cek2"];
  $vket2 = $baris["ket2"];
  $vcek3 = $baris["cek3"];
  $vket3 = $baris["ket3"];
  $vcek4 = $baris["cek4"];
  $vket4 = $baris["ket4"];
  $vcek5 = $baris["cek5"];
  $vket5 = $baris["ket5"];
  $vcek6 = $baris["cek6"];
  $vket6 = $baris["ket6"];
  $vcek7 = $baris["cek7"];
  $vket7 = $baris["ket7"];
  $vcek8 = $baris["cek8"];
  $vket8 = $baris["ket8"];
  $vcek9 = $baris["cek9"];
  $vket9 = $baris["ket9"];
  $vcek10 = $baris["cek10"];
  $vket10 = $baris["ket10"];
  $vcek11 = $baris["cek11"];
  $vket11 = $baris["ket11"];
  $vcek12 = $baris["cek12"];
  $vket12 = $baris["ket12"];
  $vcek13 = $baris["cek13"];
  $vket13 = $baris["ket13"];
  $vcek14 = $baris["cek14"];
  $vket14 = $baris["ket14"];
  $vcek15 = $baris["cek15"];
  $vket15 = $baris["ket15"];
  $vcek16 = $baris["cek16"];
  $vket16 = $baris["ket16"];
  $vcek17 = $baris["cek17"];
  $vket17 = $baris["ket17"];
  $vstatusunit = $baris["statusunit"];
  $vketunit = $baris["ketunit"];
  $no += 1;

 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vleader; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcekl; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek2; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek4; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek5; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek6; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek7; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek8; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek9; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek10; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek11; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek12; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek13; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek14; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek15; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek16; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcek17; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketunit; ?> </td>


  </tr>
  
  <?php  
  }
  ?>
  
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

  <?php  
  } else { 
  ?>
  
 <table class="data-table" width="1500" border="0" cellspacing="1" cellpadding="2">
      
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-1</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-2</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-3</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Leader</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Pekerjaan</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
  </tr>
 <tbody>

<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vlokasi = $baris["lokasi"];
  if ($baris["tglselesai"]>$vtgl)
  {
   $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  } else {
   $vtglselesai = "";         
  } 
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vleader = $baris["leader"];
  $vstatus = $baris["status"];
  $vketerangan = $baris["keterangan"];
  $vstatusunit = $baris["statusunit"];
  $vketunit = $baris["ketunit"];
  $no += 1;

 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vleader; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketunit; ?> </td>
  </tr>
  
  <?php  
  }
  ?>
  
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

  <?php  
  }
} else {
  ?>


 <table class="data-table" width="2200" border="0" cellspacing="1" cellpadding="2">
      
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-1</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-2</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Operator-3</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Leader</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Pekerjaan</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Hasil</b></td>
    
  </tr>
 
 <tbody>
 
  
<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vlokasi = $baris["lokasi"];
  if ($baris["tglselesai"]>$vtgl)
  {
   $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  } else {
   $vtglselesai = "";         
  } 
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vleader = $baris["leader"];
  $vstatus = $baris["status"];
  $vketerangan = $baris["keterangan"];
  $vcek1 = $baris["cek1"];
  $vket1 = $baris["ket1"];
  $vstatusunit = $baris["statusunit"];
  $vketunit = $baris["ketunit"];
  $vkethasil = $baris["kethasil"];
  $no += 1;

 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vleader; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vkethasil; ?> </td>


  </tr>
  
  <?php  
  }
  ?>
  
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

  <?php  
  } 
  ?>



</tbody>


<tr>
	<td class="tablecoltitle" colspan="2" style="color:white">

  	&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='lap_prev2_frame.php?pgret=1';">
<!-- 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Print  " class="button" onClick="window.location='lappending_prev_cetak.php?gedung=<?php echo $vgedung; ?>'">
-->
   </td>
</tr>
</table>
</html>

 <?php
 $mainlib->closedb();
 ?>
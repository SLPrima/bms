<?php

include_once("konekdb.php");
session_start();

/*  $tglfaktur = isset($_GET['tgfaktur']) ?  $_GET['tgfaktur'] : $_POST['tgfaktur'] ;
	$tglfaktur1 = substr($tglfaktur,0,10);
	$tglfaktur2 = substr($tglfaktur,11,10);
	$vuser = substr($tglfaktur,21,10);
*/	
	$vuser = $_GET["userid"];
	
// Inquiry data

  $sql = "SELECT noreg,tglreg,pelapor, permintaan,divisi,TO_DAYS(now())-TO_DAYS(tglreg) as hari from register where userid = '".$vuser."' and status = 'B' order by noreg";
  $hasil = mysqli_query($koneksi, $sql);

if (!$hasil)
 return FALSE;

$no = 0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title><"SLA REPORT"></title>
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
			background-color: gold;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

	</style>
</head>

<body>

<table class="data-table" cellpadding="2" cellspacing="1" width="600">

  <tr>
    <td  width ="10" style="text-align:center; background-color:slateblue ; color:white ; font-size:10px"><b>No</b></td>
    <td width = "12" style="text-align:center; background-color:slateblue ; color:white ; font-size:10px"><b>NO.REG </b></td>
    <td width="15" style="text-align:center; background-color:slateblue ; color:white ;font-size:10px"><b>TGL.REG </b></td>
    <td width="100" style="text-align:center; background-color:slateblue ; color:white ;font-size:10px"><b>NAMA PELAPOR </b></td>
    <td width="120" style="text-align:center; background-color:slateblue ; color:white ;font-size:10px"><b>PERMINTAAN </b></td>
     <td width="15" style="text-align:center; background-color:slateblue ; color:white ;font-size:10px"><b>DIVISI/BIRO </b></td>
    <td width="15" style="text-align:center; background-color:slateblue ; color:white ;font-size:10px"><b>HARI PENDING </b></td>
                                   
  </tr>	

<tbody>
<?php

while ($baris = mysqli_fetch_row($hasil))
{
  
  $vnoreg = $baris[0];
  $vpelapor = $baris[2];
  $vpermintaan = $baris[3];
  $vdivisi = $baris[4];
  $vhari = $baris[5];
  $tglreg1 = substr($baris[1],8,2);
  $tglreg2 = substr($baris[1],5,2);
  $tglreg3 = substr($baris[1],0,4);
  $vtglreg = $tglreg1."-".$tglreg2."-".$tglreg3;

  $no += 1;

?>

 <tr>
	<td style="text-align:left; font-size:9px"><?php echo $no; ?></td>
	<td style="text-align:left; font-size:9px"><?php echo $vnoreg; ?></td>
	<td style="text-align:center; font-size:9px"><?php echo $vtglreg; ?></td>
	<td style="text-align:left; font-size:9px"><?php echo $vpelapor; ?></td>
	<td style="text-align:left; font-size:9px"><?php echo $vpermintaan; ?></td>
	<td style="text-align:left; font-size:9px"><?php echo $vdivisi; ?></td>
	<td style="text-align:center; font-size:9px"><?php echo $vhari; ?></td>
</tr>


<?php
} 
?>

  <tr>
    <td width ="10" style="background-color:slateblue ; color:white ; font-size:10px">.</td>
    <td width ="12" style="background-color:slateblue ; color:white ; font-size:10px">.</td>
    <td width ="15" style="background-color:slateblue ; color:white ;font-size:10px">.</td>
    <td width ="100" style="background-color:slateblue ; color:white ;font-size:10px">.</td>
    <td width ="120" style="background-color:slateblue ; color:white ;font-size:10px">.</td>
    <td width ="15" style="background-color:slateblue ; color:white ;font-size:10px">.</td>
    <td width ="15" style="background-color:slateblue ; color:white ;font-size:10px">.</td>
  </tr>	

</tbody>
</table>
</body>
</html>

 <?php
mysqli_close($koneksi);
 ?>
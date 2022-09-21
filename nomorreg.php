<?php

include_once("konekdb.php");


if (isset($_POST["noreg"]))
	$vnoreg = $_POST["noreg"];

$date = date("d/m/Y");

// cari nomor

$sql = "select noreg from Tblnomor ";

$hasil = mysqli_query($koneksi, $sql);

while ($baris = mysqli_fetch_row($hasil))
 {
   $noreg = sprintf("%04s",$baris[0]);
    
   $prt = "\"$noreg\"".","."\"$date\"";
   print($prt);
 } 

// counter noreg

$sql2 = "select noreg from Tblnomor ";
$hasil2 = mysqli_query($koneksi, $sql2);

while ($baris2 = mysqli_fetch_row($hasil2))
 {
   $noreg = $baris2[0] + 1;
 } 

$sql3 = "update Tblnomor set noreg = '".$noreg."'";
$hasil2 = mysqli_query($koneksi, $sql3);


mysqli_close($koneksi);


?>
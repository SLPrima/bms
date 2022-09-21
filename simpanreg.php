<?php

include_once("konekdb.php");

if (isset($_POST["noreg"]))
	$vnoreg = $_POST["noreg"];

if (isset($_POST["tglreg"]))
	$vtglreg = $_POST["tglreg"];	

if (isset($_POST["permintaan"]))
	$vpermintaan = $_POST["permintaan"];	

if (isset($_POST["pelapor"]));
	$vpelapor = $_POST["pelapor"];	
	
if (isset($_POST["divisi"]))
	$vdivisi = $_POST["divisi"];

if (isset($_POST["userid"]))
	$vuserid = $_POST["userid"];
	
	$vtglreg2 = substr($vtglreg,6,4)."-".substr($vtglreg,3,2)."-".substr($vtglreg,0,2);


// Penambahan data

$sql = "INSERT INTO register (noreg,tglreg,permintaan,pelapor,divisi,userid)" .
       "values ('".$vnoreg."','".$vtglreg2."','".$vpermintaan."','".$vpelapor."'," .
       "'".$vdivisi."','".$vuserid."')";

$hasil = mysqli_query($koneksi, $sql);

if ($hasil)
{
	print("Data sudah disimpan");
}

mysqli_close($koneksi);


?>
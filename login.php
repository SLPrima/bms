<?php
include_once("konekdb.php");


if ((!isset($_POST["vuserid"])) or (!isset($_POST["vpass"])))
{
	die("Salah Pemanggilan");
	return FALSE;
} else { 
	$vuser = $_POST["vuserid"];
	$vpassword = $_POST["vpass"];
}


$sql = "Select * from Tbluser where userid = '".$vuser."' and pass = '".$vpassword."'";
$hasil = mysqli_query($koneksi,$sql);

if (!$hasil)
	return FALSE;

if ($baris = mysqli_fetch_row($hasil))
{
    print("OK");
}
 

mysqli_close($koneksi);

?>
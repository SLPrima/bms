<?php
	DEFINE ('DBPEMAKAI', 'root');
	DEFINE ('DBPASSWORD', '');
	DEFINE ('DBHOST', 'localhost');
	DEFINE ('DBNAMA', 'dtrenzc1_BLI');
	
	$koneksi = mysqli_connect(DBHOST, DBPEMAKAI, DBPASSWORD, DBNAMA);
	
	if (mysqli_connect_error())
	{
		die("koneksi gagal : ". mysqli_connect_error());
	}
	
?>
		
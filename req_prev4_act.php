<?php
include("inc/class.mainlib.inc.php");
$mainlib = new mainlib();
$mainlib->opendb();

		$vgedung = $_POST["txtGedung"];
		$vlantai = $_POST["txtLantai"];
		$vlokasi = $_POST["txtLokasi"];

        $rs = $mainlib->dbquery("SELECT * FROM jadwal_prev2 where gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."'", $mainlib->ocn);
        if ($row = $mainlib->dbfetcharray($rs))
		{
		    $vgedung = $row["gedung"];
		    $vlantai = $row["lantai"];
		    $vlokasi = $row["lokasi"];
		    $vjenis = $row["jenis"];
		    $vbarang = $row["barang"];
		    $vkapasitas = $row["kapasitas"];
            $vtglakhir = $row["tglakhir"];
            $vperiode = $row["periode"];
            $vteknisi = $row["teknisi"];
            $vteknisi2 = $row["teknisi2"];
            $vteknisi3 = $row["teknisi3"];
            $vstatus = $row["status"];
            $vleader = $row["leader"];
		}
		
		       $mainlib->dbquery("UPDATE jadwal_prev2 set status ='Progress' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and  lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);


$mainlib->closedb();
$mainlib->redirect("req_prev4_edit.php?pgret=1");

?>
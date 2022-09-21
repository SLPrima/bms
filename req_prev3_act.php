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
		
            $mainlib->dbquery("DELETE From jadwal_prev2 WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."'", $mainlib->ocn);
            $mainlib->dbquery("INSERT INTO jadwal_prev2(gedung,lantai,lokasi,barang,jenis,kapasitas,leader,periode,teknisi,teknisi2,teknisi3,tglakhir,status) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vjenis."','".$vkapasitas."','".$vleader."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','".$vstatus."')", $mainlib->ocn);



$mainlib->closedb();
$mainlib->redirect("req_prev3_edit.php?pgret=1");

?>
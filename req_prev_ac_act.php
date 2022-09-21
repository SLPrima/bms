<?php
include("inc/class.mainlib.inc.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];
$vtgl = date("y-m-d 23:59:00");
$vtahun = substr($vtgl,0,2);

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$userid."'", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{
	$vusrlevel = $row["level"];
	$vusrnama = $row["usernama"];
}

$act = trim($_REQUEST["act"]);
switch($act)
{
    case "add":
		$vjam = $_POST["txtJam"];
		$vtglakhir = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d")." ".$vjam;
		$vgedung = $_POST["txtGedung"];
		$vlantai = $_POST["txtLantai"];
		$vlokasi = $_POST["txtLokasi"];
		$vbarang = $_POST["txtBarang"];
		$vsn     = $_POST["txtSn"];
		$vjenis = $_POST["txtJenis"];
		$vgedungold = $_POST["txtGedungold"];
		$vlantaiold = $_POST["txtLantaiold"];
		$vlokasiold = $_POST["txtLokasiold"];
		$vjenisold = $_POST["txtJenisold"];
		$vkapasitas = $_POST["txtKapasitas"];
		$vfreon = $_POST["txtFreon"];
		$vperiode = $_POST["txtPeriode"];
		$vteknisi = $_POST["txtTeknisi"];
		$vteknisi2 = $_POST["txtTeknisi2"];
		$vteknisi3 = $_POST["txtTeknisi3"];
		

		if ($mainlib->rowexists("SELECT * FROM jadwal_prev1 WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("Lokasi sudah ada")."&url=");
		}
		
		$rs1 = $mainlib->dbquery("SELECT * FROM setac WHERE pk = '".$vkapasitas."'", $mainlib->ocn);
	     if ($row1 = $mainlib->dbfetcharray($rs1))
	     {
	       $vgol = $row1["gol"];
	     } else {
	       $vgol = "";
	     }   

    $mainlib->dbquery("INSERT INTO jadwal_prev1(gedung,lantai,lokasi,barang,jenis,kapasitas,freon,periode,teknisi,teknisi2,teknisi3,tglakhir,status,sn) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vjenis."','".$vkapasitas."','".$vfreon."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','Progress','".$vsn."')", $mainlib->ocn);
    $mainlib->dbquery("INSERT INTO jadwal_prev1_ac(gedung,lantai,lokasi,barang,jenis,kapasitas,freon,gol,periode,teknisi,teknisi2,teknisi3,tglkerja,status,apv,sn) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vjenis."','".$vkapasitas."','".$vfreon."','".$vgol."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','Progress','N','".$vsn."')", $mainlib->ocn);

    
    break;
	case "edit":
		$vjam = $_POST["txtJam"];
		$vtglakhir = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d")." ".$vjam;
		$vtglakhir2 = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d");
		$vgedung = $_POST["txtGedung"];
		$vlantai = $_POST["txtLantai"];
		$vlokasi = $_POST["txtLokasi"];
		$vbarang = $_POST["txtBarang"];
		$vsn     = $_POST["txtSn"];
		$vjenis = $_POST["txtJenis"];
		$vgedungold = $_POST["txtGedungold"];
		$vlantaiold = $_POST["txtLantaiold"];
		$vlokasiold = $_POST["txtLokasiold"];
		$vjenisold = $_POST["txtJenisold"];
		$vkapasitas = $_POST["txtKapasitas"];
		$vfreon = $_POST["txtFreon"];
		$vperiode = $_POST["txtPeriode"];
		$vteknisi = $_POST["txtTeknisi"];
		$vteknisi2 = $_POST["txtTeknisi2"];
		$vteknisi3 = $_POST["txtTeknisi3"];
		$vstatus = $_POST["txtStatus"];

		if (!$mainlib->rowexists("SELECT * FROM jadwal_prev1 WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("DATA TIDAK ADA")."&url=");
		}

		$rs1 = $mainlib->dbquery("SELECT * FROM setac WHERE pk = '".$vkapasitas."'", $mainlib->ocn);
	     if ($row1 = $mainlib->dbfetcharray($rs1))
	     {
	       $vgol = $row1["gol"];
	     } else {
	       $vgol = "";
	     }   



		 $mainlib->dbquery("UPDATE jadwal_prev1 set tglakhir = '".$vtglakhir."', sn = '".$vsn."' , kapasitas = '".$vkapasitas."' , freon = '".$vfreon."' , periode ='".$vperiode."', teknisi ='".$vteknisi."', teknisi2 ='".$vteknisi2."', teknisi3 ='".$vteknisi3."' WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."'", $mainlib->ocn);

		 $mainlib->dbquery("UPDATE jadwal_prev1_ac set tglkerja = '".$vtglakhir."', sn = '".$vsn."' , kapasitas = '".$vkapasitas."' , freon = '".$vfreon."' , periode ='".$vperiode."', teknisi ='".$vteknisi."', teknisi2 ='".$vteknisi2."', teknisi3 ='".$vteknisi3."' WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."' and apv <> 'Y'", $mainlib->ocn);

//		 $mainlib->dbquery("UPDATE jadwal_prev1 set tglakhir = '".$vtglakhir."', lokasi = '".$vlokasi."' , sn = '".$vsn."' , barang = '".$vbarang."' , jenis = '".$vjenis."' , kapasitas = '".$vkapasitas."' , freon = '".$vfreon."' , gedung = '".$vgedung."', lantai = '".$vlantai."', periode ='".$vperiode."', teknisi ='".$vteknisi."', teknisi2 ='".$vteknisi2."', teknisi3 ='".$vteknisi3."' WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."'", $mainlib->ocn);

//-        $mainlib->dbquery("DELETE From jadwal_prev1_ac WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."' and substr(tglkerja,1,10)='".$vtglakhir2."'", $mainlib->ocn);
//         $mainlib->dbquery("INSERT INTO jadwal_prev1_ac(gedung,lantai,lokasi,barang,gol,jenis,kapasitas,freon,periode,teknisi,teknisi2,teknisi3,tglkerja,status,apv,sn) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vgol."','".$vjenis."','".$vkapasitas."','".$vfreon."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','Progress','N','".$vsn."')", $mainlib->ocn);

		break;
		case "del":
	  
		if (isset($_REQUEST["hidIDs"]))
		{
			if (trim($_REQUEST["hidIDs"])!="")
			{
				$vlevelmemo = $_POST["hidID1"];
				$vusrlevel = $_POST["hidID2"];
		
				$ids = stripslashes(trim($_REQUEST["hidIDs"]));
				$ids = str_replace("'", "", $ids);
				$arids = split(',', $ids);
				$sql = "";
				for ($i = 0; $i < count($arids); $i++)
				{
					if ($sql != "")
					{
						$sql .= " or ";
					}
					$sql .= "lokasi ='".$arids[$i]."'";
  		        }

		        $sql = "DELETE FROM jadwal_prev1 WHERE ".$sql;
				$mainlib->dbquery($sql, $mainlib->ocn);

	  	
		   }
		}
		break;
}

$mainlib->closedb();
$mainlib->redirect("req_prev_ac_list.php?pgret=1");
?>
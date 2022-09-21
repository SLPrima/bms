<?php
include("inc/class.mainlib.inc.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];
$vtgl_hrini = date("Y-m-d H:i:s");
$vtahun = substr($vtgl_hrini,0,4);

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
		$vjenis = $_POST["txtJenis"];
		$vkapasitas = $_POST["txtKapasitas"];
		$vperiode = $_POST["txtPeriode"];
		$vteknisi = $_POST["txtTeknisi"];
		$vteknisi2 = $_POST["txtTeknisi2"];
		$vteknisi3 = $_POST["txtTeknisi3"];
		$vstatus = $_POST["txtStatus"];
		
	    $vgedung2 = explode(" ", $vgedung);

		if ($mainlib->rowexists("SELECT * FROM jadwal_prev2 WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and  lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("Data Toilet sudah ada")."&url=");
		}
		
        $rs1 = $mainlib->dbquery("SELECT * FROM Tbluser WHERE usernama = '".$vteknisi."' and gedung = '".$vgedung2[0]."'", $mainlib->ocn);
        if ($row1 = $mainlib->dbfetcharray($rs1))
         {
	        $vleader = $row1["leader"];
         }

        $mainlib->dbquery("INSERT INTO jadwal_prev2(gedung,lantai,lokasi,barang,jenis,leader,periode,teknisi,teknisi2,teknisi3,tglakhir,status) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vjenis."','".$vleader."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','".$vstatus."')", $mainlib->ocn);
        $mainlib->dbquery("INSERT INTO jadwal_prev2_ac(gedung,lantai,lokasi,barang,jenis,leader,gol,periode,teknisi,teknisi2,teknisi3,tglkerja,leader,status) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vjenis."','".$vleader."','".$vgol."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','".$vleader."','".$vstatus."')", $mainlib->ocn);

    
    break;
	case "edit":
		$vjam = $_POST["txtJam"];
		$vtglakhir = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d")." ".$vjam;
		$vtglakhir2 = $mainlib->changedateformat($_POST["txtSODate"], DATE_FORMAT, "y-m-d");
		$vgedungold = $_POST["txtGedungold"];
		$vlantaiold = $_POST["txtLantaiold"];
		$vlokasiold = $_POST["txtLokasiold"];
		$vjenisold = $_POST["txtJenisold"];
		$vgedung = $_POST["txtGedung"];
		$vlantai = $_POST["txtLantai"];
		$vlokasi = $_POST["txtLokasi"];
		$vbarang = $_POST["txtBarang"];
		$vjenis = $_POST["txtJenis"];
		$vkapasitas = $_POST["txtKapasitas"];
		$vperiode = $_POST["txtPeriode"];
		$vteknisi = $_POST["txtTeknisi"];
		$vteknisi2 = $_POST["txtTeknisi2"];
		$vteknisi3 = $_POST["txtTeknisi3"];
		$vstatus = $_POST["txtStatus"];

	    $vgedung2 = explode(" ", $vgedung);

		if (!$mainlib->rowexists("SELECT * FROM jadwal_prev2 WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenis."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("DATA TIDAK ADA")."&url=");
		}


        $rs1 = $mainlib->dbquery("SELECT * FROM Tbluser WHERE usernama = '".$vteknisi."' and gedung = '".$vgedung2[0]."'", $mainlib->ocn);
        if ($row1 = $mainlib->dbfetcharray($rs1))
         {
	        $vleader = $row1["leader"];
         }

       if ($vtglakhir > $vtgl_hrini)
        {
		 $mainlib->dbquery("UPDATE jadwal_prev2 set tglakhir = '".$vtglakhir."', kapasitas = '".$vkapasitas."' ,leader = '".$vleader."' , periode ='".$vperiode."', teknisi ='".$vteknisi."', teknisi2 ='".$vteknisi2."', teknisi3 ='".$vteknisi3."', status ='Progress' WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."'", $mainlib->ocn);
        } else {
		 $mainlib->dbquery("UPDATE jadwal_prev2 set tglakhir = '".$vtglakhir."', kapasitas = '".$vkapasitas."' ,leader = '".$vleader."' , periode ='".$vperiode."', teknisi ='".$vteknisi."', teknisi2 ='".$vteknisi2."', teknisi3 ='".$vteknisi3."' WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."'", $mainlib->ocn);
		 $mainlib->dbquery("UPDATE jadwal_prev2_ac set tglkerja = '".$vtglakhir."', kapasitas = '".$vkapasitas."' ,leader = '".$vleader."' , periode ='".$vperiode."', teknisi ='".$vteknisi."', teknisi2 ='".$vteknisi2."', teknisi3 ='".$vteknisi3."' WHERE gedung = '".$vgedungold."' and lantai = '".$vlantaiold."' and  lokasi = '".$vlokasiold."' and jenis = '".$vjenisold."' and apvleader <> 'Y'", $mainlib->ocn);
        }


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
$mainlib->redirect("req_prev2_leader_list.php?pgret=1");
?>
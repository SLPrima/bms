<?php
include("inc/class.mainlib.inc.php");
// include("FPDI/fpdf.php");
// include("FPDI/fpdi.php");
// include("phpqrcode/qrlib.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];
$vtgl_hrini = date("d-m-Y H:i:s");
$vtahun = substr($vtgl_hrini,6,5);

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$userid."'", $mainlib->ocn);
if ($row = $mainlib->dbfetcharray($rs))
{
	$vusrlevel = $row["level"];
	$vusrnama = $row["usernama"];
}


if (isset($_POST['checked'])) 
{
		$vtglkerja = $mainlib->changedateformat($_POST["txtSODate2"], DATE_FORMAT, "d-m-Y");
		$vtglkerja2 = substr($vtglkerja,6,4)."-".substr($vtglkerja,3,2)."-".substr($vtglkerja,0,2);
		$vtglselesai1 = $mainlib->changedateformat($_POST["txtTglselesai"], DATE_FORMAT, "y-m-d");
		$vlokasi = $_POST["txtLokasi"];
		$vgedung = $_POST["txtGedung"];
        $vlantai = $_POST["txtLantai"];
        $vperiode = $_POST["txtPeriode"];
        $vjenis = $_POST["txtJenis"];
		$vbarang = $_POST["txtBarang"];
		$vtglapv = date("Y-m-d H:i:s");
		$vteknisi = $_POST["txtTeknisi"];

        $vgedung2 = explode(" ", $vgedung);

        $rs1 = $mainlib->dbquery("SELECT * FROM Tbluser WHERE usernama = '".$vteknisi."' and gedung = '".$vgedung2[0]."'", $mainlib->ocn);
        if ($row1 = $mainlib->dbfetcharray($rs1))
         {
	        $vleader2 = $row1["leader"];
         }

		if (!$mainlib->rowexists("SELECT lokasi FROM jadwal_prev2_ac WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("DATA TIDAK ADA")."&url=");
		}

     $mainlib->dbquery("UPDATE jadwal_prev2_ac set apvleader = 'Y', tglapv = '".$vtglapv."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);


 if ($vperiode == 'Mingguan')
  {
    $tambah_tanggal = mktime(0,0,0,substr($vtglkerja,3,2),substr($vtglkerja,0,2)+7,substr($vtglkerja,6,4)); 
    $vtglbaru = date("y-m-d",$tambah_tanggal)." 08:00:00";
    $vtglbaru2 = date("y-m-d",$tambah_tanggal);
  }

 if ($vperiode == 'Bulanan')
  {
    $tambah_tanggal = mktime(0,0,0,substr($vtglkerja,3,2)+1,substr($vtglkerja,0,2),substr($vtglkerja,6,4)); 
    $vtglbaru = date("y-m-d",$tambah_tanggal)." 08:00:00";
    $vtglbaru2 = date("y-m-d",$tambah_tanggal);
  }

 if ($vperiode == 'Harian')
  {
    $tambah_tanggal = mktime(0,0,0,substr($vtglkerja,3,2),substr($vtglkerja,0,2)+1,substr($vtglkerja,6,4)); 
    $vtglbaru = date("y-m-d",$tambah_tanggal)." 08:00:00";
    $vtglbaru2 = date("y-m-d",$tambah_tanggal);
  }

     $mainlib->dbquery("DELETE From jadwal_prev2_ac WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglbaru2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev2 set tglakhir = '".$vtglbaru."', status = 'Progress', leader = '".$vleader2."'  WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);

}


if (isset($_POST['save'])) 
{
		$vtglkerja = $mainlib->changedateformat($_POST["txtSODate2"], DATE_FORMAT, "d-m-Y");
		$vtglkerja2 = substr($vtglkerja,6,4)."-".substr($vtglkerja,3,2)."-".substr($vtglkerja,0,2);
		$vtglselesai1 = $mainlib->changedateformat($_POST["txtTglselesai"], DATE_FORMAT, "y-m-d");
		$vlokasi = $_POST["txtLokasi"];
		$vgedung = $_POST["txtGedung"];
        $vlantai = $_POST["txtLantai"];
		$vjenis = $_POST["txtJenis"];
		$vbarang = $_POST["txtBarang"];
		$vstatus = $_POST["txtStatus"];
		$vleader = $_POST["txtLeader"];
		$vperiode = $_POST["txtPeriode"];
		$vkethasil = $_POST["txtKethasiil"];
		$vteknisi = $_POST["txtTeknisi"];
		$vjam = $_POST["txtJam"];
		$vtglselesai = $vtglselesai1." ".$vjam;
		$vketerangan = $_POST["txtKeterangan"];
		$vpcek1 = implode("",$_POST["pcek1"]);
		$vpcek2 = implode("",$_POST["pcek2"]);
		$vpcek3 = implode("",$_POST["pcek3"]);
		$vpcek4 = implode("",$_POST["pcek4"]);
		$vpcek5 = implode("",$_POST["pcek5"]);
		$vpcek6 = implode("",$_POST["pcek6"]);
		$vpcek7 = implode("",$_POST["pcek7"]);
		$vpcek8 = implode("",$_POST["pcek8"]);
		$vpcek9 = implode("",$_POST["pcek9"]);
		$vpcek10 = implode("",$_POST["pcek10"]);
		$vpcek11 = implode("",$_POST["pcek11"]);
		$vpcek12 = implode("",$_POST["pcek12"]);
		$vpcek13 = implode("",$_POST["pcek13"]);
		$vpcek14 = implode("",$_POST["pcek14"]);
		$vpcek15 = implode("",$_POST["pcek15"]);
		$vpcek16 = implode("",$_POST["pcek16"]);
		$vpcek17 = implode("",$_POST["pcek17"]);
        $vket1 = $_POST["txtKet1"];
        $vket2 = $_POST["txtKet2"];
        $vket3 = $_POST["txtKet3"];
        $vket4 = $_POST["txtKet4"];
        $vket5 = $_POST["txtKet5"];
        $vket6 = $_POST["txtKet6"];
        $vket7 = $_POST["txtKet7"];
        $vket8 = $_POST["txtKet8"];
        $vket9 = $_POST["txtKet9"];
        $vket10 = $_POST["txtKet10"];
        $vket11 = $_POST["txtKet11"];
        $vket12 = $_POST["txtKet12"];
        $vket13 = $_POST["txtKet13"];
        $vket14 = $_POST["txtKet14"];
        $vket15 = $_POST["txtKet15"];
        $vket16 = $_POST["txtKet16"];
        $vket17 = $_POST["txtKet17"];

        $vcnt = 0;


if (strtoupper($vjenis) == "PEMELIHARAAN AREA")
{
  if ($vpcek1 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpcek1 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 


        if(!empty($_POST['pcek1'])) {
		  foreach($_POST['pcek1'] as $selected) {
		    if ($selected=="A")
		     {	
	    		$vcek1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcek1="Tidak Baik";
		     }
		  }
		 }
}


		if (!$mainlib->rowexists("SELECT lokasi FROM jadwal_prev2_ac WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn))
		  {
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("DATA TIDAK ADA")."&url=");
		  }


     $mainlib->dbquery("UPDATE jadwal_prev2_ac set cek1 = '".$vcek1."', cek2 = '".$vcek2."', cek3 = '".$vcek3."', cek4 = '".$vcek4."', cek5 = '".$vcek5."', cek6 = '".$vcek6."', cek7 = '".$vcek7."', cek8 = '".$vcek8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev2_ac set cek9 = '".$vcek9."', cek10 = '".$vcek10."', cek11 = '".$vcek11."', cek12 = '".$vcek12."', cek13 = '".$vcek13."', cek14 = '".$vcek14."', cek15 = '".$vcek15."', cek16 = '".$vcek16."', cek17 = '".$vcek17."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev2_ac set pcek1 = '".$vpcek1."', pcek2 = '".$vpcek2."', pcek3 = '".$vpcek3."', pcek4 = '".$vpcek4."', pcek5 = '".$vpcek5."', pcek6 = '".$vpcek6."', pcek7 = '".$vpcek7."', pcek8 = '".$vpcek8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev2_ac set pcek9 = '".$vpcek9."', pcek10 = '".$vpcek10."', pcek11 = '".$vpcek11."', pcek12 = '".$vpcek12."', pcek13 = '".$vpcek13."', pcek14 = '".$vpcek14."', pcek15 = '".$vpcek15."', pcek16 = '".$vpcek16."', pcek17 = '".$vpcek17."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev2_ac set ket1 = '".$vket1."', ket2 = '".$vket2."', ket3 = '".$vket3."', ket4 = '".$vket4."', ket5 = '".$vket5."', ket6 = '".$vket6."', ket7 = '".$vket7."', ket8 = '".$vket8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev2_ac set ket9 = '".$vket9."', ket10 = '".$vket10."', ket11 = '".$vket11."', ket12 = '".$vket12."', ket13 = '".$vket13."', ket14 = '".$vket14."', ket15 = '".$vket15."', ket16 = '".$vket16."', ket17 = '".$vket17."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev2_ac set ketunit = '".$vketunit."',kethasil = '".$vkethasil."',statusunit = '".$vstatusunit."', status = '' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);


      if ($vstatusunit == "Baik")
      {
//        $mainlib->dbquery("UPDATE jadwal_prev2_ac set apvleader = 'C' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
      } else {
        $mainlib->dbquery("UPDATE jadwal_prev2_ac set apvleader = 'N' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
      }    

}


 $mainlib->closedb();
 $mainlib->redirect("prog_prev2_list.php?pgret=1");
?>
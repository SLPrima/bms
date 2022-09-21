<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();
$userid = trim($_POST["txtUserid"]);
$password = trim($_POST["txtPassword"]);
$login_success = false;

$userid = mysql_real_escape_string($userid);
$password = mysql_real_escape_string($password);

$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$userid."' and pass = '".$password."'", $mainlib->ocn);
if($row = $mainlib->dbfetcharray($rs))
{
	$_SESSION["userid"] = $userid;
	$_SESSION["username"] = $row["usernama"];
	$_SESSION["level"] = $row["level"];
	$_SESSION["menu"] = $row["menu"];
	$vlevel = $row["level"];

         
          if($vlevel == "7")
           {
             echo "<script language=\"javascript\">
	     	 window.location = 'prog_prev1_teknisi_list.php';
		     </script>";
           }
           
          if($vlevel == "8")
           {
             echo "<script language=\"javascript\">
	     	 window.location = 'prog_prev2_operator_list.php';
		     </script>";
           }


   $vtglini = date("Y-m-d 23:55:00");	
   $vtglmulai = date("Y-m-d 00:00:01");	
   
 
 if ($vlevel=="4")
{
 
   $mainlib->dbquery("UPDATE jadwal_prev1 set status = 'Progress' WHERE tglakhir <= '$vtglini' and tglakhir > '$vtglmulai'", $mainlib->ocn);

	$rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev1 WHERE status = 'Progress' ", $mainlib->ocn);
	while ($row = $mainlib->dbfetcharray($rs))
	{
		$vlokasi = $row["lokasi"];
		$vgedung = $row["gedung"];
		$vlantai = $row["lantai"];
		$vbarang = $row["barang"];
		$vjenis = $row["jenis"];
		$vperiode = $row["periode"];
		$vkapasitas = $row["kapasitas"];
		$vperiode = $row["periode"];
        $vtglakhir = $row["tglakhir"];
        $vtglakhir2 = substr($row["tglakhir"],0,10);
		$vteknisi = $row["teknisi"];
		$vteknisi2 = $row["teknisi2"];
		$vteknisi3 = $row["teknisi3"];
		$vstatus = $row["status"];
		$vjalan = 0;

		$rs1 = $mainlib->dbquery("SELECT * FROM setac WHERE pk = '".$vkapasitas."'", $mainlib->ocn);
	     if ($row1 = $mainlib->dbfetcharray($rs1))
	     {
	       $vgol = $row1["gol"];
	     } else {
	       $vgol = "";
	     }   

		if (!$mainlib->rowexists("SELECT * FROM jadwal_prev1_ac WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and  lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10) = '".$vtglakhir2."'", $mainlib->ocn))
		{
		    if (strlen($vteknisi) > 3)
		     {
                $mainlib->dbquery("INSERT INTO jadwal_prev1_ac(gedung,lantai,lokasi,barang,gol,jenis,kapasitas,periode,teknisi,teknisi2,teknisi3,tglkerja,status) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vgol."','".$vjenis."','".$vkapasitas."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','".$vstatus."')", $mainlib->ocn);
		     }       
		}
		
		        $mainlib->dbquery("UPDATE jadwal_prev1 set status ='' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and  lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglakhir,1,10) = '".$vtglakhir2."'", $mainlib->ocn);
	}

}


 if ($vlevel=="9")
{

	$rs = $mainlib->dbquery("SELECT * FROM  jadwal_prev2 WHERE status = 'Progress' ", $mainlib->ocn);
	while ($row = $mainlib->dbfetcharray($rs))
	{
		$vlokasi = $row["lokasi"];
		$vgedung = $row["gedung"];
		$vlantai = $row["lantai"];
		$vbarang = $row["barang"];
		$vjenis = $row["jenis"];
		$vkapasitas = $row["kapasitas"];
		$vperiode = $row["periode"];
        $vtglakhir = $row["tglakhir"];
        $vtglakhir2 = substr($row["tglakhir"],0,10);
		$vteknisi = $row["teknisi"];
		$vteknisi2 = $row["teknisi2"];
		$vteknisi3 = $row["teknisi3"];
		$vleader = $row["leader"];
		$vstatus = $row["status"];
		$vjalan = 0;

		if (!$mainlib->rowexists("SELECT * FROM jadwal_prev2_ac WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and  lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10) = '".$vtglakhir2."'", $mainlib->ocn))
		{
		    if (strlen($vteknisi) > 3 )
		     {
               $mainlib->dbquery("INSERT INTO jadwal_prev2_ac(gedung,lantai,lokasi,barang,jenis,kapasitas,periode,teknisi,teknisi2,teknisi3,tglkerja,status,leader) VALUES ('".$vgedung."','".$vlantai."','".$vlokasi."','".$vbarang."','".$vjenis."','".$vkapasitas."','".$vperiode."','".$vteknisi."','".$vteknisi2."','".$vteknisi3."','".$vtglakhir."','".$vstatus."','".$vleader."')", $mainlib->ocn);
		     }   
		}
		
		       $mainlib->dbquery("UPDATE jadwal_prev2 set status ='' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and  lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglakhir,1,10) = '".$vtglakhir2."'", $mainlib->ocn);
	}

}
	    $login_success = true;
        $mainlib->dbquery("UPDATE Tbluser set login = login + 1 WHERE userid = '".$userid."'", $mainlib->ocn);
	    

        echo "<script language=\"javascript\">
		window.location = 'main.php';
		</script>";

} else {
    
	header("Location: msg.php?msg=".urlencode("Invalid UserId or Password")."&url=");

}

  mysql_free_result($rs);
  $mainlib->closedb();
?>
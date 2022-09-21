<?php
include("inc/class.mainlib.inc.php");

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

$act = trim($_REQUEST["act"]);
switch($act)
{
    case "add":
   
    break;
	case "edit":

		$vtglkerja = $mainlib->changedateformat($_POST["txtSODate2"], DATE_FORMAT, "d-m-Y");
		$vtglkerja2 = substr($vtglkerja,6,4)."-".substr($vtglkerja,3,2)."-".substr($vtglkerja,0,2);
		$vtglselesai1 = $mainlib->changedateformat($_POST["txtTglselesai"], DATE_FORMAT, "y-m-d");
		$vtglperbaikan = $mainlib->changedateformat($_POST["txtTglperbaikan"], DATE_FORMAT, "y-m-d");
		$vlokasi = $_POST["txtLokasi"];
		$vgedung = $_POST["txtGedung"];
        $vlantai = $_POST["txtLantai"];
		$vjenis = $_POST["txtJenis"];
		$vkapasitas = $_POST["txtKapasitas"];
		$vfreon = $_POST["txtFreon"];
		$vbarang = $_POST["txtBarang"];
		$vperiode = $_POST["txtPeriode"];
		$vjam = $_POST["txtJam"];
		$vpindoor1 = implode("",$_POST["pindoor1"]);
		$vpindoor2 = implode("",$_POST["pindoor2"]);
		$vpindoor3 = implode("",$_POST["pindoor3"]);
		$vpindoor4 = implode("",$_POST["pindoor4"]);
		$vpindoor5 = implode("",$_POST["pindoor5"]);
		$vtegangan = $_POST["txtTegangan"];
		$vpoutdoor1 = implode("",$_POST["poutdoor1"]);
		$vpoutdoor2 = implode("",$_POST["poutdoor2"]);
		$vtglselesai = $vtglselesai1." ".$vjam;
		$vstatus = $_POST["txtStatus"];
		$vketerangan = $_POST["txtKeterangan"];
		$vtekanan = $_POST["txtTekanan"];
		$vampere = $_POST["txtAmpere"];
		$vamperecomp = $_POST["txtAmperecomp"];
		$vrs = $_POST["txtRs"];
		$vst = $_POST["txtSt"];
		$vtr = $_POST["txtTr"];
		$vr = $_POST["txtR"];
		$vlampu = $_POST["txtLampu"];
		$vtgllampu = $mainlib->changedateformat($_POST["txtTgllampu"], DATE_FORMAT, "y-m-d");
		$vteknisilampu = $_POST["txtTeknisilampu"];
		$vteknisikelas = $_POST["txtTeknisikelas"];
		$vstatusunit = $_POST["txtStatusunit"];
		$vstatusprogress = $_POST["txtStatusprogress"];
		$vketunit = $_POST["txtKetunit"];
		$vketperbaikan = $_POST["txtKetperbaikan"];
		
		$vpdispenser1 = implode("",$_POST["pdispenser1"]);
		$vpdispenser2 = implode("",$_POST["pdispenser2"]);
		$vtds = $_POST["txtTds"];
		
		$vapar = $_POST["txtApar"];

        $vteganganpanel1 = $_POST["txtTeganganpanel1"];
		$vteganganpanel1b = $_POST["txtTeganganpanel1b"];
		$vteganganpanel1c = $_POST["txtTeganganpanel1c"];
		$vteganganpanel2 = $_POST["txtTeganganpanel2"];
		$vteganganpanel2b = $_POST["txtTeganganpanel2b"];
		$vteganganpanel2c = $_POST["txtTeganganpanel2c"];
		$vmcbpanel = $_POST["txtMcbpanel"];
		$vmcbamppanel = $_POST["txtMcbamppanel"];
		$vmcbamppanel2 = $_POST["txtMcbamppanel2"];
		$vmcbamppanel3 = $_POST["txtMcbamppanel3"];

		$vpmesin1 = implode("",$_POST["pmesin1"]);
		$vpmesin2 = implode("",$_POST["pmesin2"]);
		$vpmesin3 = implode("",$_POST["pmesin3"]);
		$vpmesin4 = implode("",$_POST["pmesin4"]);
		$vpmesin5 = implode("",$_POST["pmesin5"]);
		$vpmesin6 = implode("",$_POST["pmesin6"]);
		$vpmesin7 = implode("",$_POST["pmesin7"]);
		$vpmesin8 = implode("",$_POST["pmesin8"]);
		$vpmesin9 = implode("",$_POST["pmesin9"]);
		$vpmesin10 = implode("",$_POST["pmesin10"]);
		$vphoistway1 = implode("",$_POST["phoistway1"]);
		$vphoistway2 = implode("",$_POST["phoistway2"]);
		$vphoistway3 = implode("",$_POST["phoistway3"]);
		$vphoistway4 = implode("",$_POST["phoistway4"]);
		$vphoistway5 = implode("",$_POST["phoistway5"]);
		$vphoistway6 = implode("",$_POST["phoistway6"]);
		$vphoistway7 = implode("",$_POST["phoistway7"]);
		$vpcar1 = implode("",$_POST["pcar1"]);
		$vpcar2 = implode("",$_POST["pcar2"]);
		$vpcar3 = implode("",$_POST["pcar3"]);
		$vpcar4 = implode("",$_POST["pcar4"]);
		$vpcar5 = implode("",$_POST["pcar5"]);
		$vpcar6 = implode("",$_POST["pcar6"]);
		$vppit1 = implode("",$_POST["ppit1"]);
		$vppit2 = implode("",$_POST["ppit2"]);
		$vppit3 = implode("",$_POST["ppit3"]);
		$vppit4 = implode("",$_POST["ppit4"]);
		$vppit5 = implode("",$_POST["ppit5"]);
		$vppit6 = implode("",$_POST["ppit6"]);

        $vketerangan1 = $_POST["txtKeterangan1"];
        $vketerangan2 = $_POST["txtKeterangan2"];
        $vketerangan3 = $_POST["txtKeterangan3"];
        $vketerangan4 = $_POST["txtKeterangan4"];
        $vketerangan5 = $_POST["txtKeterangan5"];
        $vketerangan6 = $_POST["txtKeterangan6"];
        $vketerangan7 = $_POST["txtKeterangan7"];
        $vketerangan8 = $_POST["txtKeterangan8"];
        $vketerangan9 = $_POST["txtKeterangan9"];
        $vketerangan10 = $_POST["txtKeterangan10"];
        $vketerangan11 = $_POST["txtKeterangan11"];
        $vketerangan12 = $_POST["txtKeterangan12"];
        $vketerangan13 = $_POST["txtKeterangan13"];
        $vketerangan14 = $_POST["txtKeterangan14"];
        $vketerangan15 = $_POST["txtKeterangan15"];
        $vketerangan16 = $_POST["txtKeterangan16"];
        $vketerangan17 = $_POST["txtKeterangan17"];
        $vketerangan18 = $_POST["txtKeterangan18"];
        $vketerangan19 = $_POST["txtKeterangan19"];
        $vketerangan20 = $_POST["txtKeterangan20"];
        $vketerangan21 = $_POST["txtKeterangan21"];
        $vketerangan22 = $_POST["txtKeterangan22"];
        $vketerangan23 = $_POST["txtKeterangan23"];
        $vketerangan24 = $_POST["txtKeterangan24"];
        $vketerangan25 = $_POST["txtKeterangan25"];
        $vketerangan26 = $_POST["txtKeterangan26"];
        $vketerangan27 = $_POST["txtKeterangan27"];
        $vketerangan28 = $_POST["txtKeterangan28"];
        $vketerangan29 = $_POST["txtKeterangan29"];
        $vketerangan30 = $_POST["txtKeterangan30"];


	    $rs1 = $mainlib->dbquery("SELECT * FROM setac WHERE pk = '".$vkapasitas."'", $mainlib->ocn);
	    if ($row1 = $mainlib->dbfetcharray($rs1))
	    {
	      $vampac = $row1["amp"];
	      $vgolac = $row1["gol"];
	    }    

	    $rs2 = $mainlib->dbquery("SELECT * FROM settegangan WHERE cabang = 'SLP'", $mainlib->ocn);
	    if ($row2 = $mainlib->dbfetcharray($rs2))
	    {
	      $vtekanan1 = $row2["tekanan4101"];
	      $vtekanan2 = $row2["tekanan4102"];
	      $vtekanan3 = $row2["tekanan4071"];
	      $vtekanan4 = $row2["tekanan4072"];
	      $vr1 = $row2["rst1"];
	      $vr2 = $row2["rst2"];
	      $vrst1 = $row2["rssttr1"];
	      $vrst2 = $row2["rssttr2"];
	      $vtds1 = $row2["tds1"];
	      $vtds2 = $row2["tds2"];
	      $vapar1 = $row2["apar1"];
	      $vapar2 = $row2["apar2"];
	    }  

if ($vbarang == "AC")
{
  if ($vpindoor1 == "A" or $vpindoor2 == "A" or $vpindoor3 == "A" or $vpindoor3 == "A" or $vpindoor4 == "A" or $vpindoor5 == "A" or $vpoutdoor1 == "A" or $vpoutdoor2 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpindoor1 == "B" or $vpindoor2 == "B" or $vpindoor3 == "B" or $vpindoor3 == "B" or $vpindoor4 == "B" or $vpindoor5 == "B" or $vpoutdoor1 == "B" or $vpoutdoor2 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
    
if ($vfreon == "R 410")
 {
    if ($vtekanan < $vtekanan1 or $vtekanan > $vtekanan2) 
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
 } else {
    if ($vtekanan < $vtekanan3 or $vtekanan > $vtekanan4) 
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
 }

if ($vampere > $vampac)
 {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
 }

if ($vgolac == "1")
 {
    if ($vr < $vr1 or $vr > $vr2) 
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
 } else {
    if ($vrs < $vrst1 or $vrs > $vrst2) 
     {
       $vstatusunit = "Tidak Baik"; 
       $vstatus = "Pending"; 
     }
    if ($vst < $vrst1 or $vst > $vrst2) 
     {
       $vstatusunit = "Tidak Baik"; 
       $vstatus = "Pending"; 
     }
    if ($vtr < $vrst1 or $vtr > $vrst2) 
     {
       $vstatusunit = "Tidak Baik"; 
       $vstatus = "Pending"; 
     }
 }
     
}


if (strtoupper($vbarang) == "DISPENSER")
{
  if ($vpdispenser1 == "A" or $vpdispenser2 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpdispenser1 == "B" or $vpdispenser2 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ((int)$vtds >= (int)$vtds1 and (int)$vtds <= (int)$vtds2 )
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } else {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
}


if (strtoupper($vbarang) == "APAR")
{
  if ($vapar >= $vapar1 and $vapar <= $vapar2 )
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } else {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
}



if (strtoupper($vbarang) == "PANEL")
{
  if ($vpmesin1 == "A" or $vpmesin2 == "A" or $vpmesin3 == "A" or $vpmesin4 == "A" or $vpmesin5 == "A" or $vpmesin6 == "A" or $vpmesin7 == "A" or $vpmesin8 == "A" or $vpmesin9 == "A" or $vpmesin10 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpmesin1 == "B" or $vpmesin2 == "B" or $vpmesin3 == "B" or $vpmesin4 == "B" or $vpmesin5 == "B" or $vpmesin6 == "B" or $vpmesin7 == "B" or $vpmesin8 == "B" or $vpmesin9 == "B" or $vpmesin10 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
}


if (strtoupper($vbarang) == "TOILET")
{
  if ($vpmesin1 == "A" or $vpmesin2 == "A" or $vpmesin3 == "A" or $vpmesin4 == "A" or $vpmesin5 == "A" or $vpmesin6 == "A" or $vpmesin7 == "A" or $vpmesin8 == "A" or $vpmesin9 == "A" or $vpmesin10 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "A" or $vhoistway2 == "A" or $vphoistway3 == "A" or $vphoistway4 == "A" or $vphoistway5 == "A" or $vphoistway6 == "A" or $vhoistway7 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpcar1 == "A" or $vpcar2 == "A" or $vpcar3 == "A" or $vpcar4 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpmesin1 == "B" or $vpmesin2 == "B" or $vpmesin3 == "B" or $vpmesin4 == "B" or $vpmesin5 == "B" or $vpmesin6 == "B" or $vpmesin7 == "B" or $vpmesin8 == "B" or $vpmesin9 == "B" or $vpmesin10 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vphoistway1 == "B" or $vhoistway2 == "B" or $vphoistway3 == "B" or $vphoistway4 == "B" or $vphoistway5 == "B" or $vphoistway6 == "B" or $vhoistway7 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpcar1 == "B" or $vpcar2 == "B" or $vpcar3 == "B" or $vpcar4 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
}


if (strtoupper($vbarang) == "LIFT")
{
  if ($vpmesin1 == "A" or $vpmesin2 == "A" or $vpmesin3 == "A" or $vpmesin4 == "A" or $vpmesin5 == "A" or $vpmesin6 == "A" or $vpmesin7 == "A" or $vpmesin8 == "A" or $vpmesin9 == "A" or $vpmesin10 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "A" or $vhoistway2 == "A" or $vphoistway3 == "A" or $vphoistway4 == "A" or $vphoistway5 == "A" or $vphoistway6 == "A" or $vhoistway7 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpcar1 == "A" or $vpcar2 == "A" or $vpcar3 == "A" or $vpcar4 == "A" or $vpcar5 == "A" or $vpcar6 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vppit1 == "A" or $vppit2 == "A" or $vppit3 == "A" or $vppit4 == "A" or $vppit5 == "A" or $vppit6 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vppit1 == "B" or $vppit2 == "B" or $vppit3 == "B" or $vppit4 == "B" or $vppit5 == "B" or $vppit6 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vppit1 == "C" or $vppit2 == "C" or $vppit3 == "C" or $vppit4 == "C" or $vppit5 == "C" or $vppit6 == "C")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vppit1 == "D" or $vppit2 == "D" or $vppit3 == "D" or $vppit4 == "D" or $vppit5 == "D" or $vppit6 == "D")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpmesin1 == "B" or $vpmesin2 == "B" or $vpmesin3 == "B" or $vpmesin4 == "B" or $vpmesin5 == "B" or $vpmesin6 == "B" or $vpmesin7 == "B" or $vpmesin8 == "B" or $vpmesin9 == "B" or $vpmesin10 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vpmesin1 == "C" or $vpmesin2 == "C" or $vpmesin3 == "C" or $vpmesin4 == "C" or $vpmesin5 == "C" or $vpmesin6 == "C" or $vpmesin7 == "C" or $vpmesin8 == "C" or $vpmesin9 == "C" or $vpmesin10 == "C")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vpmesin1 == "D" or $vpmesin2 == "D" or $vpmesin3 == "D" or $vpmesin4 == "D" or $vpmesin5 == "D" or $vpmesin6 == "D" or $vpmesin7 == "D" or $vpmesin8 == "D" or $vpmesin9 == "D" or $vpmesin10 == "D")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vphoistway1 == "B" or $vhoistway2 == "B" or $vphoistway3 == "B" or $vphoistway4 == "B" or $vphoistway5 == "B" or $vphoistway6 == "B" or $vhoistway7 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vphoistway1 == "C" or $vhoistway2 == "C" or $vphoistway3 == "C" or $vphoistway4 == "C" or $vphoistway5 == "C" or $vphoistway6 == "C" or $vhoistway7 == "C")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vphoistway1 == "D" or $vhoistway2 == "D" or $vphoistway3 == "D" or $vphoistway4 == "D" or $vphoistway5 == "D" or $vphoistway6 == "D" or $vhoistway7 == "D")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpcar1 == "B" or $vpcar2 == "B" or $vpcar3 == "B" or $vpcar4 == "B" or $vpcar5 == "B" or $vpcar6 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpcar1 == "C" or $vpcar2 == "C" or $vpcar3 == "C" or $vpcar4 == "C" or $vpcar5 == "C" or $vpcar6 == "C")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpcar1 == "D" or $vpcar2 == "D" or $vpcar3 == "D" or $vpcar4 == "D" or $vpcar5 == "D" or $vpcar6 == "D")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
}


if (strtoupper($vbarang) == "GENSET")
{
  if ($vpmesin1 == "A" or $vpmesin2 == "A" or $vpmesin3 == "A" or $vpmesin4 == "A" or $vpmesin5 == "A" or $vpmesin6 == "A" or $vpmesin7 == "A" or $vpmesin8 == "A" or $vpmesin9 == "A" or $vpmesin10 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "A" or $vhoistway2 == "A" or $vphoistway3 == "A" or $vphoistway4 == "A" or $vphoistway5 == "A" or $vphoistway6 == "A" or $vhoistway7 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpcar1 == "A" or $vpcar2 == "A" or $vpcar3 == "A" or $vpcar4 == "A" or $vpcar5 == "A" or $vpcar6 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vppit1 == "A" or $vppit2 == "A" or $vppit3 == "A" )
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpmesin1 == "B" or $vpmesin2 == "B" or $vpmesin3 == "B" or $vpmesin4 == "B" or $vpmesin5 == "B" or $vpmesin6 == "B" or $vpmesin7 == "B" or $vpmesin8 == "B" or $vpmesin9 == "B" or $vpmesin10 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vphoistway1 == "B" or $vhoistway2 == "B" or $vphoistway3 == "B" or $vphoistway4 == "B" or $vphoistway5 == "B" or $vphoistway6 == "B" or $vhoistway7 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpcar1 == "B" or $vpcar2 == "B" or $vpcar3 == "B" or $vpcar4 == "B" or $vpcar5 == "B" or $vpcar6 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vppit1 == "B" or $vppit2 == "B" or $vppit3 == "B" )
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
}

if (strtoupper($vbarang) == "DIESEL PUMP")
{
  if ($vpmesin1 == "A" or $vpmesin2 == "A" or $vpmesin3 == "A" or $vpmesin4 == "A" or $vpmesin5 == "A" or $vpmesin6 == "A" or $vpmesin7 == "A" or $vpmesin8 == "A" or $vpmesin9 == "A" or $vpmesin10 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "A" or $vhoistway2 == "A" or $vphoistway3 == "A" or $vphoistway4 == "A" or $vphoistway5 == "A" or $vphoistway6 == "A" or $vhoistway7 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpcar1 == "A" or $vpcar2 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "B" or $vhoistway2 == "B" or $vphoistway3 == "B" or $vphoistway4 == "B" or $vphoistway5 == "B" or $vphoistway6 == "B" or $vhoistway7 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpmesin1 == "B" or $vpmesin2 == "B" or $vpmesin3 == "B" or $vpmesin4 == "B" or $vpmesin5 == "B" or $vpmesin6 == "B" or $vpmesin7 == "B" or $vpmesin8 == "B" or $vpmesin9 == "B" or $vpmesin10 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vpcar1 == "B" or $vpcar2 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
}


if (strtoupper($vbarang) == "KELAS")
{
  if ($vpmesin1 == "A" or $vpmesin2 == "A" or $vpmesin3 == "A" or $vpmesin4 == "A" or $vpmesin5 == "A" or $vpmesin6 == "A" or $vpmesin7 == "A" or $vpmesin8 == "A" or $vpmesin9 == "A" or $vpmesin10 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "A" or $vhoistway2 == "A" or $vphoistway3 == "A" or $vphoistway4 == "A" or $vphoistway5 == "A" or $vphoistway6 == "A" or $vhoistway7 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpcar1 == "A" or $vpcar2 == "A" or $vpcar3 == "A" or $vpcar4 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "B" or $vhoistway2 == "B" or $vphoistway3 == "B" or $vphoistway4 == "B" or $vphoistway5 == "B" or $vphoistway6 == "B" or $vhoistway7 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
  if ($vpmesin1 == "B" or $vpmesin2 == "B" or $vpmesin3 == "B" or $vpmesin4 == "B" or $vpmesin5 == "B" or $vpmesin6 == "B" or $vpmesin7 == "B" or $vpmesin8 == "B" or $vpmesin9 == "B" or $vpmesin10 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vpcar1 == "B" or $vpcar2 == "B" or $vpcar3 == "B" or $vpcar4 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
}


if (strtoupper($vbarang) == "POMPA BOSTER" or strtoupper($vbarang) == "POMPA TRANSFER" or strtoupper($vbarang) == "TOILET")
{
  if ($vpmesin1 == "A" or $vpmesin2 == "A" or $vpmesin3 == "A" or $vpmesin4 == "A" or $vpmesin5 == "A" or $vpmesin6 == "A" or $vpmesin7 == "A" or $vpmesin8 == "A" or $vpmesin9 == "A" or $vpmesin10 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vphoistway1 == "A")
    {
      $vstatusunit = "Baik"; 
      $vstatus = "Done"; 
    } 
  if ($vpmesin1 == "B" or $vpmesin2 == "B" or $vpmesin3 == "B" or $vpmesin4 == "B" or $vpmesin5 == "B" or $vpmesin6 == "B" or $vpmesin7 == "B" or $vpmesin8 == "B" or $vpmesin9 == "B" or $vpmesin10 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    }
  if ($vphoistway1 == "B")
    {
      $vstatusunit = "Tidak Baik"; 
      $vstatus = "Pending"; 
    } 
}


        if(!empty($_POST['pindoor1'])) {
		  foreach($_POST['pindoor1'] as $selected) {
		    if ($selected=="A")
		     {	
	    		$vindoor1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vindoor1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pindoor2'])) {
		  foreach($_POST['pindoor2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vindoor2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vindoor2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pindoor3'])) {
		  foreach($_POST['pindoor3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vindoor3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vindoor3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pindoor4'])) {
		  foreach($_POST['pindoor4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vindoor4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vindoor4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pindoor5'])) {
		  foreach($_POST['pindoor5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vindoor5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vindoor5="Tidak Baik";
		     }
		  }
		 }

        
        if(!empty($_POST['poutdoor1'])) {
		  foreach($_POST['poutdoor1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$voutdoor1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$voutdoor1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['poutdoor2'])) {
		  foreach($_POST['poutdoor2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$voutdoor2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$voutdoor2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pdispenser1'])) {
		  foreach($_POST['pdispenser1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vdispenser1="Baik";
		     }
		  }
		 }

        if(!empty($_POST['pdispenser1'])) {
		  foreach($_POST['pdispenser1'] as $selected) {
		    if ($selected=="B")
		     {	
        		$vdispenser1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pdispenser2'])) {
		  foreach($_POST['pdispenser2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vdispenser2="Dibersihkan";
		     }
		  }
		 }

        if(!empty($_POST['pdispenser2'])) {
		  foreach($_POST['pdispenser2'] as $selected) {
		    if ($selected=="B")
		     {	
        		$vdispenser2="Diganti";
		     }
		  }
		 }


  if (strtoupper($vbarang) == "LIFT")
     {
         
        if(!empty($_POST['pmesin1'])) {
		  foreach($_POST['pmesin1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin1="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin1="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin1="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin2'])) {
		  foreach($_POST['pmesin2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin2="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin2="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin2="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin3'])) {
		  foreach($_POST['pmesin3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin3="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin3="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin3="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin4'])) {
		  foreach($_POST['pmesin4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin4="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin4="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin4="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin5'])) {
		  foreach($_POST['pmesin5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin5="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin5="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin5="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin6'])) {
		  foreach($_POST['pmesin6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin6="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin6="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin6="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin7'])) {
		  foreach($_POST['pmesin7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin7="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin7="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin7="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin8'])) {
		  foreach($_POST['pmesin8'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin8="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin8="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin8="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin8="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin9'])) {
		  foreach($_POST['pmesin9'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin9="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin9="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin9="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
			    $vmesin9="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pmesin10'])) {
		  foreach($_POST['pmesin10'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin10="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin10="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vmesin10="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vmesin10="Ganti Segera";
		     }
		  }
		 }


        if(!empty($_POST['phoistway1'])) {
		  foreach($_POST['phoistway1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway1="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vhoistway1="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vhoistway1="Ganti Segera";
		     }
		  }
		 }


        if(!empty($_POST['phoistway2'])) {
		  foreach($_POST['phoistway2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway2="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vhoistway2="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vhoistway2="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['phoistway3'])) {
		  foreach($_POST['phoistway3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway3="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vhoistway3="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vhoistway3="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['phoistway4'])) {
		  foreach($_POST['phoistway4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway4="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vhoistway4="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vhoistway4="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['phoistway5'])) {
		  foreach($_POST['phoistway5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway5="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vhoistway5="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vhoistway5="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['phoistway6'])) {
		  foreach($_POST['phoistway6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway6="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vhoistway6="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vhoistway6="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['phoistway7'])) {
		  foreach($_POST['phoistway7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway7="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vhoistway7="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vhoistway7="Ganti Segera";
		     }
		  }
		 }


        if(!empty($_POST['pcar1'])) {
		  foreach($_POST['pcar1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar1="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vcar1="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vcar1="Ganti Segera";
		     }
		  }
		 }


        if(!empty($_POST['pcar2'])) {
		  foreach($_POST['pcar2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar2="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vcar2="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vcar2="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pcar3'])) {
		  foreach($_POST['pcar3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar3="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vcar3="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vcar3="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pcar4'])) {
		  foreach($_POST['pcar4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar4="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vcar4="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vcar4="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pcar5'])) {
		  foreach($_POST['pcar5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar5="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vcar5="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vcar5="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['pcar6'])) {
		  foreach($_POST['pcar6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar6="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vcar6="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vcar6="Ganti Segera";
		     }
		  }
		 }


        if(!empty($_POST['ppit1'])) {
		  foreach($_POST['ppit1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit1="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vpit1="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vpit1="Ganti Segera";
		     }
		  }
		 }


        if(!empty($_POST['ppit2'])) {
		  foreach($_POST['ppit2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit2="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vpit2="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vpit2="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['ppit3'])) {
		  foreach($_POST['ppit3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit3="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vpit3="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vpit3="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['ppit4'])) {
		  foreach($_POST['ppit4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit4="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vpit4="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vpit4="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['ppit5'])) {
		  foreach($_POST['ppit5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit5="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vpit5="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vpit5="Ganti Segera";
		     }
		  }
		 }

        if(!empty($_POST['ppit6'])) {
		  foreach($_POST['ppit6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit6="Perlu Perhatian";
		     }
		    if ($selected=="C")
		     {	
				$vpit6="Rusak/Repair";
		     }
		    if ($selected=="D")
		     {	
				$vpit6="Ganti Segera";
		     }
		  }
		 }

     }


  if (strtoupper($vbarang) == "GENSET")
     {
         
        if(!empty($_POST['pmesin1'])) {
		  foreach($_POST['pmesin1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin2'])) {
		  foreach($_POST['pmesin2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin3'])) {
		  foreach($_POST['pmesin3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin4'])) {
		  foreach($_POST['pmesin4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin5'])) {
		  foreach($_POST['pmesin5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin6'])) {
		  foreach($_POST['pmesin6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin7'])) {
		  foreach($_POST['pmesin7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin7="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin8'])) {
		  foreach($_POST['pmesin8'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin8="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin8="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin9'])) {
		  foreach($_POST['pmesin9'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin9="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin9="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin10'])) {
		  foreach($_POST['pmesin10'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin10="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin10="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway1'])) {
		  foreach($_POST['phoistway1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway2'])) {
		  foreach($_POST['phoistway2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway3'])) {
		  foreach($_POST['phoistway3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway4'])) {
		  foreach($_POST['phoistway4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway5'])) {
		  foreach($_POST['phoistway5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway6'])) {
		  foreach($_POST['phoistway6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway7'])) {
		  foreach($_POST['phoistway7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway7="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['pcar1'])) {
		  foreach($_POST['pcar1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['pcar2'])) {
		  foreach($_POST['pcar2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pcar3'])) {
		  foreach($_POST['pcar3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pcar4'])) {
		  foreach($_POST['pcar4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pcar5'])) {
		  foreach($_POST['pcar5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pcar6'])) {
		  foreach($_POST['pcar6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar6="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['ppit1'])) {
		  foreach($_POST['ppit1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['ppit2'])) {
		  foreach($_POST['ppit2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['ppit3'])) {
		  foreach($_POST['ppit3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vpit3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vpit3="Tidak Baik";
		     }
		  }
		 }

     }


  if (strtoupper($vbarang) == "DIESEL PUMP")
     {
         
        if(!empty($_POST['pmesin1'])) {
		  foreach($_POST['pmesin1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin2'])) {
		  foreach($_POST['pmesin2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin3'])) {
		  foreach($_POST['pmesin3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin4'])) {
		  foreach($_POST['pmesin4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin5'])) {
		  foreach($_POST['pmesin5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin6'])) {
		  foreach($_POST['pmesin6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin7'])) {
		  foreach($_POST['pmesin7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin7="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin8'])) {
		  foreach($_POST['pmesin8'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin8="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin8="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin9'])) {
		  foreach($_POST['pmesin9'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin9="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin9="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin10'])) {
		  foreach($_POST['pmesin10'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin10="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin10="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway1'])) {
		  foreach($_POST['phoistway1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway2'])) {
		  foreach($_POST['phoistway2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway3'])) {
		  foreach($_POST['phoistway3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway4'])) {
		  foreach($_POST['phoistway4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway5'])) {
		  foreach($_POST['phoistway5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway6'])) {
		  foreach($_POST['phoistway6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway7'])) {
		  foreach($_POST['phoistway7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway7="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['pcar1'])) {
		  foreach($_POST['pcar1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['pcar2'])) {
		  foreach($_POST['pcar2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar2="Tidak Baik";
		     }
		  }
		 }

     }

  if (strtoupper($vbarang) == "POMPA BOSTER" or strtoupper($vbarang) == "POMPA TRANSFER" or strtoupper($vbarang) == "TOILET")
     {
         
        if(!empty($_POST['pmesin1'])) {
		  foreach($_POST['pmesin1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin2'])) {
		  foreach($_POST['pmesin2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin3'])) {
		  foreach($_POST['pmesin3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin4'])) {
		  foreach($_POST['pmesin4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin5'])) {
		  foreach($_POST['pmesin5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin6'])) {
		  foreach($_POST['pmesin6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin7'])) {
		  foreach($_POST['pmesin7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin7="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin8'])) {
		  foreach($_POST['pmesin8'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin8="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin8="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin9'])) {
		  foreach($_POST['pmesin9'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin9="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin9="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin10'])) {
		  foreach($_POST['pmesin10'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin10="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin10="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway1'])) {
		  foreach($_POST['phoistway1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway2'])) {
		  foreach($_POST['phoistway2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway2="Tidak Baik";
		     }
		  }
		 }

     }
     



  if ($vbarang == "Panel")
     {
         
        if(!empty($_POST['pmesin1'])) {
		  foreach($_POST['pmesin1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin2'])) {
		  foreach($_POST['pmesin2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin3'])) {
		  foreach($_POST['pmesin3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin4'])) {
		  foreach($_POST['pmesin4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin5'])) {
		  foreach($_POST['pmesin5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin6'])) {
		  foreach($_POST['pmesin6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin7'])) {
		  foreach($_POST['pmesin7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin7="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin8'])) {
		  foreach($_POST['pmesin8'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin8="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin8="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin9'])) {
		  foreach($_POST['pmesin9'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin9="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin9="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin10'])) {
		  foreach($_POST['pmesin10'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin10="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin10="Tidak Baik";
		     }
		  }
		 }

     }



if (strtoupper($vbarang) == "KELAS")
     {
         
        if(!empty($_POST['pmesin1'])) {
		  foreach($_POST['pmesin1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin1="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin2'])) {
		  foreach($_POST['pmesin2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin3'])) {
		  foreach($_POST['pmesin3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin4'])) {
		  foreach($_POST['pmesin4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin5'])) {
		  foreach($_POST['pmesin5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin6'])) {
		  foreach($_POST['pmesin6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin7'])) {
		  foreach($_POST['pmesin7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin7="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin8'])) {
		  foreach($_POST['pmesin8'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin8="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin8="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin9'])) {
		  foreach($_POST['pmesin9'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin9="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin9="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pmesin10'])) {
		  foreach($_POST['pmesin10'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vmesin10="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vmesin10="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway1'])) {
		  foreach($_POST['phoistway1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['phoistway2'])) {
		  foreach($_POST['phoistway2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway3'])) {
		  foreach($_POST['phoistway3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway3="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway4'])) {
		  foreach($_POST['phoistway4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway4="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway5'])) {
		  foreach($_POST['phoistway5'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway5="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway5="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway6'])) {
		  foreach($_POST['phoistway6'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway6="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway6="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['phoistway7'])) {
		  foreach($_POST['phoistway7'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vhoistway7="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vhoistway7="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['pcar1'])) {
		  foreach($_POST['pcar1'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar1="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar1="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['pcar2'])) {
		  foreach($_POST['pcar2'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar2="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar2="Tidak Baik";
		     }
		  }
		 }

        if(!empty($_POST['pcar3'])) {
		  foreach($_POST['pcar3'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar3="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar3="Tidak Baik";
		     }
		  }
		 }


        if(!empty($_POST['pcar4'])) {
		  foreach($_POST['pcar4'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vcar4="Baik";
		     }
		    if ($selected=="B")
		     {	
				$vcar4="Tidak Baik";
		     }
		  }
		 }

     }



		if (!$mainlib->rowexists("SELECT * FROM jadwal_prev1_ac WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn))
		{
			$mainlib->closedb();
			$mainlib->redirect("msg.php?msg=".urlencode("DATA TIDAK ADA")."&url=");
		}


if ($vusrlevel == "4")
{
		 
    $mainlib->dbquery("UPDATE jadwal_prev1_ac set tglapv = '".$vtglapv."',userapv = '".$vusrnama."', apv = 'Y' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);

		 
} else {
    

     $mainlib->dbquery("UPDATE jadwal_prev1_ac set tglselesai = '".$vtglselesai."', status = '".$vstatus."', keterangan ='".$vketerangan."', apv = 'N' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);

  if (strtoupper($vbarang) == "AC")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set indoor1 = '".$vindoor1."', indoor2 = '".$vindoor2."', indoor3 = '".$vindoor3."', indoor4 = '".$vindoor4."', indoor5 = '".$vindoor5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pindoor1 = '".$vpindoor1."', pindoor2 = '".$vpindoor2."', pindoor3 = '".$vpindoor3."', pindoor4 = '".$vpindoor4."', pindoor5 = '".$vpindoor5."', tegangan = '".$vtegangan."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set outdoor1 = '".$voutdoor1."', outdoor2 = '".$voutdoor2."', poutdoor1 = '".$vpoutdoor1."', poutdoor2 = '".$vpoutdoor2."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set tekanan = '".$vtekanan."', statusprogress = '".$vstatusprogress."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."', ampere = '".$vampere."', amperecomp = '".$vamperecomp."', r = '".$vr."', rs = '".$vrs."', st = '".$vst."', tr = '".$vtr."', freon = '".$vfreon."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan1 = '".$vketerangan1."', keterangan2 = '".$vketerangan2."', keterangan3 = '".$vketerangan3."', keterangan4 = '".$vketerangan4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan5 = '".$vketerangan5."', keterangan6 = '".$vketerangan6."', keterangan7 = '".$vketerangan7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set tglperbaikan = '".$vtglperbaikan."', ketperbaikan ='".$vketperbaikan."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }
   
  if (strtoupper($vbarang) == "DISPENSER")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set dispenser1 = '".$vdispenser1."', dispenser2 = '".$vdispenser2."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pdispenser1 = '".$vpdispenser1."', pdispenser2 = '".$vpdispenser2."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set tds = '".$vtds."', ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan1 = '".$vketerangan1."', keterangan2 = '".$vketerangan2."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }

  if (strtoupper($vbarang) == "APAR")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set apar = '".$vapar."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }
   

  if (strtoupper($vbarang) == "PANEL")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin1 = '".$vmesin1."', mesin2 = '".$vmesin2."', mesin3 = '".$vmesin3."', mesin4 = '".$vmesin4."', mesin5 = '".$vmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin6 = '".$vmesin6."', mesin7 = '".$vmesin7."', mesin8 = '".$vmesin8."', mesin9 = '".$vmesin9."', mesin10 = '".$vmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin1 = '".$vpmesin1."', pmesin2 = '".$vpmesin2."', pmesin3 = '".$vpmesin3."', pmesin4 = '".$vpmesin4."', pmesin5 = '".$vpmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin6 = '".$vpmesin6."', pmesin7 = '".$vpmesin7."', pmesin8 = '".$vpmesin8."', pmesin9 = '".$vpmesin9."', pmesin10 = '".$vpmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set teganganpanel1 = '".$vteganganpanel1."', teganganpanel2 = '".$vteganganpanel2."', mcbpanel = '".$vmcbpanel."', mcbamppanel = '".$vmcbamppanel."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mcbamppanel2 = '".$vmcbamppanel2."', mcbamppanel3 = '".$vmcbamppanel3."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set teganganpanel1b = '".$vteganganpanel1b."', teganganpanel1c = '".$vteganganpanel1c."', teganganpanel2b = '".$vteganganpanel2b."', teganganpanel2c = '".$vteganganpanel2c."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }
   

  if (strtoupper($vbarang) == "LIFT")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin1 = '".$vmesin1."', mesin2 = '".$vmesin2."', mesin3 = '".$vmesin3."', mesin4 = '".$vmesin4."', mesin5 = '".$vmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin6 = '".$vmesin6."', mesin7 = '".$vmesin7."', mesin8 = '".$vmesin8."', mesin9 = '".$vmesin9."', mesin10 = '".$vmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin1 = '".$vpmesin1."', pmesin2 = '".$vpmesin2."', pmesin3 = '".$vpmesin3."', pmesin4 = '".$vpmesin4."', pmesin5 = '".$vpmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin6 = '".$vpmesin6."', pmesin7 = '".$vpmesin7."', pmesin8 = '".$vpmesin8."', pmesin9 = '".$vpmesin9."', pmesin10 = '".$vpmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set hoistway1 = '".$vhoistway1."', hoistway2 = '".$vhoistway2."', hoistway3 = '".$vhoistway3."', hoistway4 = '".$vhoistway4."', hoistway5 = '".$vhoistway5."', hoistway6 = '".$vhoistway6."', hoistway7 = '".$vhoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set phoistway1 = '".$vphoistway1."', phoistway2 = '".$vphoistway2."', phoistway3 = '".$vphoistway3."', phoistway4 = '".$vphoistway4."', phoistway5 = '".$vphoistway5."', phoistway6 = '".$vphoistway6."', phoistway7 = '".$vphoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set car1 = '".$vcar1."', car2 = '".$vcar2."', car3 = '".$vcar3."', car4 = '".$vcar4."', car5 = '".$vcar5."', car6 = '".$vcar6."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pcar1 = '".$vpcar1."', pcar2 = '".$vpcar2."', pcar3 = '".$vpcar3."', pcar4 = '".$vpcar4."', pcar5 = '".$vpcar5."', pcar6 = '".$vpcar6."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pit1 = '".$vpit1."', pit2 = '".$vpit2."', pit3 = '".$vpit3."', pit4 = '".$vpit4."', pit5 = '".$vpit5."', pit6 = '".$vpit6."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ppit1 = '".$vppit1."', ppit2 = '".$vppit2."', ppit3 = '".$vppit3."', ppit4 = '".$vppit4."', ppit5 = '".$vppit5."', ppit6 = '".$vppit6."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan1 = '".$vketerangan1."', keterangan2 = '".$vketerangan2."', keterangan3 = '".$vketerangan3."', keterangan4 = '".$vketerangan4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan5 = '".$vketerangan5."', keterangan6 = '".$vketerangan6."', keterangan7 = '".$vketerangan7."', keterangan8 = '".$vketerangan8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan9 = '".$vketerangan9."', keterangan10 = '".$vketerangan10."', keterangan11 = '".$vketerangan11."', keterangan12 = '".$vketerangan12."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan13 = '".$vketerangan13."', keterangan14 = '".$vketerangan14."', keterangan15 = '".$vketerangan15."', keterangan16 = '".$vketerangan16."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan17 = '".$vketerangan17."', keterangan18 = '".$vketerangan18."', keterangan19 = '".$vketerangan19."', keterangan20 = '".$vketerangan20."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan21 = '".$vketerangan21."', keterangan22 = '".$vketerangan22."', keterangan23 = '".$vketerangan23."', keterangan24 = '".$vketerangan24."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan25 = '".$vketerangan25."', keterangan26 = '".$vketerangan26."', keterangan27 = '".$vketerangan27."', keterangan28 = '".$vketerangan28."', keterangan29 = '".$vketerangan29."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }

  if (strtoupper($vbarang) == "GENSET")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin1 = '".$vmesin1."', mesin2 = '".$vmesin2."', mesin3 = '".$vmesin3."', mesin4 = '".$vmesin4."', mesin5 = '".$vmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin6 = '".$vmesin6."', mesin7 = '".$vmesin7."', mesin8 = '".$vmesin8."', mesin9 = '".$vmesin9."', mesin10 = '".$vmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin1 = '".$vpmesin1."', pmesin2 = '".$vpmesin2."', pmesin3 = '".$vpmesin3."', pmesin4 = '".$vpmesin4."', pmesin5 = '".$vpmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin6 = '".$vpmesin6."', pmesin7 = '".$vpmesin7."', pmesin8 = '".$vpmesin8."', pmesin9 = '".$vpmesin9."', pmesin10 = '".$vpmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set hoistway1 = '".$vhoistway1."', hoistway2 = '".$vhoistway2."', hoistway3 = '".$vhoistway3."', hoistway4 = '".$vhoistway4."', hoistway5 = '".$vhoistway5."', hoistway6 = '".$vhoistway6."', hoistway7 = '".$vhoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set phoistway1 = '".$vphoistway1."', phoistway2 = '".$vphoistway2."', phoistway3 = '".$vphoistway3."', phoistway4 = '".$vphoistway4."', phoistway5 = '".$vphoistway5."', phoistway6 = '".$vphoistway6."', phoistway7 = '".$vphoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set car1 = '".$vcar1."', car2 = '".$vcar2."', car3 = '".$vcar3."', car4 = '".$vcar4."', car5 = '".$vcar5."', car6 = '".$vcar6."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pcar1 = '".$vpcar1."', pcar2 = '".$vpcar2."', pcar3 = '".$vpcar3."', pcar4 = '".$vpcar4."', pcar5 = '".$vpcar5."', pcar6 = '".$vpcar6."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pit1 = '".$vpit1."', pit2 = '".$vpit2."', pit3 = '".$vpit3."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ppit1 = '".$vppit1."', ppit2 = '".$vppit2."', ppit3 = '".$vppit3."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan1 = '".$vketerangan1."', keterangan2 = '".$vketerangan2."', keterangan3 = '".$vketerangan3."', keterangan4 = '".$vketerangan4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis." and substr(tglkerja,1,10)='".$vtglkerja2."''", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan5 = '".$vketerangan5."', keterangan6 = '".$vketerangan6."', keterangan7 = '".$vketerangan7."', keterangan8 = '".$vketerangan8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan9 = '".$vketerangan9."', keterangan10 = '".$vketerangan10."', keterangan11 = '".$vketerangan11."', keterangan12 = '".$vketerangan12."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan13 = '".$vketerangan13."', keterangan14 = '".$vketerangan14."', keterangan15 = '".$vketerangan15."', keterangan16 = '".$vketerangan16."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan17 = '".$vketerangan17."', keterangan18 = '".$vketerangan18."', keterangan19 = '".$vketerangan19."', keterangan20 = '".$vketerangan20."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan21 = '".$vketerangan21."', keterangan22 = '".$vketerangan22."', keterangan23 = '".$vketerangan23."', keterangan24 = '".$vketerangan24."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan25 = '".$vketerangan25."', keterangan26 = '".$vketerangan26."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
   }

  if (strtoupper($vbarang) == "DIESEL PUMP")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin1 = '".$vmesin1."', mesin2 = '".$vmesin2."', mesin3 = '".$vmesin3."', mesin4 = '".$vmesin4."', mesin5 = '".$vmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin6 = '".$vmesin6."', mesin7 = '".$vmesin7."', mesin8 = '".$vmesin8."', mesin9 = '".$vmesin9."', mesin10 = '".$vmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin1 = '".$vpmesin1."', pmesin2 = '".$vpmesin2."', pmesin3 = '".$vpmesin3."', pmesin4 = '".$vpmesin4."', pmesin5 = '".$vpmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin6 = '".$vpmesin6."', pmesin7 = '".$vpmesin7."', pmesin8 = '".$vpmesin8."', pmesin9 = '".$vpmesin9."', pmesin10 = '".$vpmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set hoistway1 = '".$vhoistway1."', hoistway2 = '".$vhoistway2."', hoistway3 = '".$vhoistway3."', hoistway4 = '".$vhoistway4."', hoistway5 = '".$vhoistway5."', hoistway6 = '".$vhoistway6."', hoistway7 = '".$vhoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set phoistway1 = '".$vphoistway1."', phoistway2 = '".$vphoistway2."', phoistway3 = '".$vphoistway3."', phoistway4 = '".$vphoistway4."', phoistway5 = '".$vphoistway5."', phoistway6 = '".$vphoistway6."', phoistway7 = '".$vphoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set car1 = '".$vcar1."', car2 = '".$vcar2."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pcar1 = '".$vpcar1."', pcar2 = '".$vpcar2."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan1 = '".$vketerangan1."', keterangan2 = '".$vketerangan2."', keterangan3 = '".$vketerangan3."', keterangan4 = '".$vketerangan4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan5 = '".$vketerangan5."', keterangan6 = '".$vketerangan6."', keterangan7 = '".$vketerangan7."', keterangan8 = '".$vketerangan8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan9 = '".$vketerangan9."', keterangan10 = '".$vketerangan10."', keterangan11 = '".$vketerangan11."', keterangan12 = '".$vketerangan12."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis." and substr(tglkerja,1,10)='".$vtglkerja2."''", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan13 = '".$vketerangan13."', keterangan14 = '".$vketerangan14."', keterangan15 = '".$vketerangan15."', keterangan16 = '".$vketerangan16."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan17 = '".$vketerangan17."', keterangan18 = '".$vketerangan18."', keterangan19 = '".$vketerangan19."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }


  if (strtoupper($vbarang) == "KELAS")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin1 = '".$vmesin1."', mesin2 = '".$vmesin2."', mesin3 = '".$vmesin3."', mesin4 = '".$vmesin4."', mesin5 = '".$vmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin6 = '".$vmesin6."', mesin7 = '".$vmesin7."', mesin8 = '".$vmesin8."', mesin9 = '".$vmesin9."', mesin10 = '".$vmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin1 = '".$vpmesin1."', pmesin2 = '".$vpmesin2."', pmesin3 = '".$vpmesin3."', pmesin4 = '".$vpmesin4."', pmesin5 = '".$vpmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin6 = '".$vpmesin6."', pmesin7 = '".$vpmesin7."', pmesin8 = '".$vpmesin8."', pmesin9 = '".$vpmesin9."', pmesin10 = '".$vpmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set hoistway1 = '".$vhoistway1."', hoistway2 = '".$vhoistway2."', hoistway3 = '".$vhoistway3."', hoistway4 = '".$vhoistway4."', hoistway5 = '".$vhoistway5."', hoistway6 = '".$vhoistway6."', hoistway7 = '".$vhoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set phoistway1 = '".$vphoistway1."', phoistway2 = '".$vphoistway2."', phoistway3 = '".$vphoistway3."', phoistway4 = '".$vphoistway4."', phoistway5 = '".$vphoistway5."', phoistway6 = '".$vphoistway6."', phoistway7 = '".$vphoistway7."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set car1 = '".$vcar1."', car2 = '".$vcar2."', car3 = '".$vcar3."', car4 = '".$vcar4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pcar1 = '".$vpcar1."', pcar2 = '".$vpcar2."', pcar3 = '".$vpcar3."', pcar4 = '".$vpcar4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan1 = '".$vketerangan1."', keterangan2 = '".$vketerangan2."', keterangan3 = '".$vketerangan3."', keterangan4 = '".$vketerangan4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan5 = '".$vketerangan5."', keterangan6 = '".$vketerangan6."', keterangan7 = '".$vketerangan7."', keterangan8 = '".$vketerangan8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan9 = '".$vketerangan9."', keterangan10 = '".$vketerangan10."', keterangan11 = '".$vketerangan11."', keterangan12 = '".$vketerangan12."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan13 = '".$vketerangan13."', keterangan14 = '".$vketerangan14."', keterangan15 = '".$vketerangan15."', keterangan16 = '".$vketerangan16."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan17 = '".$vketerangan17."', keterangan18 = '".$vketerangan18."', keterangan19 = '".$vketerangan19."', keterangan20 = '".$vketerangan20."', keterangan21 = '".$vketerangan21."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }


  if (strtoupper($vbarang) == "POMPA BOSTER" or strtoupper($vbarang) == "POMPA TRANSFER" or strtoupper($vbarang) == "TOILET")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin1 = '".$vmesin1."', mesin2 = '".$vmesin2."', mesin3 = '".$vmesin3."', mesin4 = '".$vmesin4."', mesin5 = '".$vmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set mesin6 = '".$vmesin6."', mesin7 = '".$vmesin7."', mesin8 = '".$vmesin8."', mesin9 = '".$vmesin9."', mesin10 = '".$vmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin1 = '".$vpmesin1."', pmesin2 = '".$vpmesin2."', pmesin3 = '".$vpmesin3."', pmesin4 = '".$vpmesin4."', pmesin5 = '".$vpmesin5."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set pmesin6 = '".$vpmesin6."', pmesin7 = '".$vpmesin7."', pmesin8 = '".$vpmesin8."', pmesin9 = '".$vpmesin9."', pmesin10 = '".$vpmesin10."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set hoistway1 = '".$vhoistway1."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set phoistway1 = '".$vphoistway1."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set ketunit = '".$vketunit."', statusunit = '".$vstatusunit."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan1 = '".$vketerangan1."', keterangan2 = '".$vketerangan2."', keterangan3 = '".$vketerangan3."', keterangan4 = '".$vketerangan4."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan5 = '".$vketerangan5."', keterangan6 = '".$vketerangan6."', keterangan7 = '".$vketerangan7."', keterangan8 = '".$vketerangan8."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set keterangan9 = '".$vketerangan9."', keterangan10 = '".$vketerangan10."', keterangan11 = '".$vketerangan11."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
    }


  if (strtoupper($vbarang) == "INFOCUS")
   {
     $mainlib->dbquery("UPDATE jadwal_prev1_ac set lamphourse = '".$vlampu."', tgllamp = '".$vtgllampu."', teknisilamp = '".$vteknisilampu."' WHERE gedung = '".$vgedung."' and lantai = '".$vlantai."' and lokasi = '".$vlokasi."' and jenis = '".$vjenis."' and substr(tglkerja,1,10)='".$vtglkerja2."'", $mainlib->ocn);
   }


}

		break;
		case "del":
	  
		break;
}

 $mainlib->closedb();
 $mainlib->redirect("prog_prev1_teknisi_list.php?pgret=1");
?>
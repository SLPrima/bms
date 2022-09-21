<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$mainlib->opendb();
// $tgl1    =date("Y-m-d");
// $tgl     =$tgl1." 23:59:00";

 	$vuser = $_SESSION["userid"];
 	$rs = $mainlib->dbquery("SELECT * FROM Tbluser WHERE userid = '".$vuser."'", $mainlib->ocn);
 	
	if ($row = $mainlib->dbfetcharray($rs))
 	{
	 $vusrlevel = $row["level"];
	 $vusrnama = $row["usernama"];
 	}

    $vtgl = $mainlib->changedateformat("01/01/2000", DATE_FORMAT, "Y-m-d");

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
	
    $vtgl1 = $mainlib->changedateformat($_POST["txtTgl1"], DATE_FORMAT, "Y-m-d")." 00:00:01";
    $vtgl2 = $mainlib->changedateformat($_POST["txtTgl2"], DATE_FORMAT, "Y-m-d")." 23:59:00";
    $vxtgl1 = $mainlib->changedateformat($_POST["txtTgl1"], DATE_FORMAT, "d-m-Y");
    $vxtgl2 = $mainlib->changedateformat($_POST["txtTgl2"], DATE_FORMAT, "d-m-Y");

    $vgedung = isset($_GET['gedung']) ?  $_GET['gedung'] : $_POST['txtGedung']; 

    if(!empty($_POST['status'])) {
		  foreach($_POST['status'] as $selected) {
		    if ($selected=="1")
		     {	
        		$vstatus="all";
		     }
		    if ($selected=="2")
		     {	
        		$vstatus="progress";
		     }
		    if ($selected=="3")
		     {	
				$vstatus="pending";
		     }
		    if ($selected=="4")
		     {	
				$vstatus="done";
		     }
		    if ($selected=="5")
		     {	
				$vstatus="tidak baik";
		     }
		  }
		 }

    if(!empty($_POST['barang'])) {
		  foreach($_POST['barang'] as $selected) {
		    if ($selected=="A")
		     {	
        		$vbarang="AC";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (AC)  Ooo-";
		     }
		    if ($selected=="B")
		     {	
        		$vbarang="Dispenser";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (DISPENSER)  Ooo-";
		     }
		    if ($selected=="C")
		     {	
				$vbarang="Apar";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (APAR)  Ooo-";
		     }
		    if ($selected=="D")
		     {	
				$vbarang="Lift";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (LIFT ELEVATOR)  Ooo-";
		     }
		    if ($selected=="E")
		     {	
				$vbarang="Genset";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (GENSET)  Ooo-";
		     }	
		    if ($selected=="F")
		     {	
				$vbarang="Diesel Pump";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (DIESEL PUMP)  Ooo-";
		     }
		    if ($selected=="G")
		     {	
				$vbarang="Pompa Boster";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (POMPA BOSTER)  Ooo-";
		     }
		    if ($selected=="H")
		     {	
				$vbarang="Pompa Transfer";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (POMPA TRANSFER)  Ooo-";
		     }
		    if ($selected=="I")
		     {	
				$vbarang="Toilet";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (TOILET)  Ooo-";
		     }
		    if ($selected=="J")
		     {	
				$vbarang="Kelas";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (KELAS)  Ooo-";
		     }
		    if ($selected=="K")
		     {	
				$vbarang="Panel";
        		$vjudul="-ooO  INQUIRY PROGRESS ENGINEERING (PANEL)  Ooo-";
		     }
		  }
		 }
		 
    if(!empty($_POST['type'])) {
		  foreach($_POST['type'] as $selected) {
		    if ($selected=="1")
		     {	
        		$vtipe="Complete";
		     }
		    if ($selected=="2")
		     {	
        		$vtipe="Simple";
		     }
 	    }
    }  

if ($vbarang == "AC")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and statusunit ='Tidak Baik' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and statusunit ='Tidak Baik' and barang = 'AC' order by gedung,lantai,lokasi,jenis";
    } 
 }
    
}

if ($vbarang == "Dispenser")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } 
 }
 
 if ($vstatus == "tidak baik")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Dispenser' order by gedung,lantai,lokasi,jenis";
    } 
 } 
}

if ($vbarang == "Apar")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } 
 }
 
 if ($vstatus == "tidak baik")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Apar' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Tidak Baik' order by gedung,lantai,lokasi,jenis";
    } 
 } 
}


if ($vbarang == "Class")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } 
 }
 
 if ($vstatus == "tidak baik")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Class' order by gedung,lantai,lokasi,jenis";
    } 
 } 
}


if ($vbarang == "Lift")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Lift' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}

if ($vbarang == "Genset")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vlokasi) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where lokasi = '$vlokasi'.'%' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Genset' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}

if ($vbarang == "Diesel Pump")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vlokasi) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where lokasi = '$vlokasi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Diesel Pump' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}

if ($vbarang == "Pompa Boster")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vlokasi) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where lokasi = '$vlokasi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Pompa Boster' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}

if ($vbarang == "Pompa Transfer")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vlokasi) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where lokasi = '$vlokasi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Pompa Transfer' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}


if ($vbarang == "Toilet")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
    
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vlokasi) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where lokasi = '$vlokasi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Toilet' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}


if ($vbarang == "Kelas")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vlokasi) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where lokasi = '$vlokasi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Kelas' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}


if ($vbarang == "Panel")
{
 if ($vstatus == "all")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "progress")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Progress' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }


 if ($vstatus == "pending")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status = 'Pending' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "done")
 {
    if (strlen($vgedung) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where gedung like '".$vgedung.'%'."' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Done' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }

 if ($vstatus == "tidak baik")
 {
    if (strlen($vlokasi) > 0)
    {
      $sql = "SELECT * from jadwal_prev1_ac where lokasi = '$vlokasi' and tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } else {  
      $sql = "SELECT * from jadwal_prev1_ac where tglkerja >= '$vtgl1' and tglkerja <= '$vtgl2' and status ='Tidak Baik' and barang = 'Panel' and statusunit <> '' order by gedung,lantai,lokasi,jenis";
    } 
 }
}

    if(!empty($_POST['cetak'])) {
		foreach($_POST['cetak'] as $selected) {
		  if ($selected=="2")
		   {	
             header("Content-type: application/vnd-ms-excel");
             header("Content-Disposition: attachment; filename=hasil.xls");
		   }
	  }
	 }


$hasil = $mainlib->dbquery($sql, $mainlib->ocn);

if (!$hasil)
 return FALSE;

$no = 0;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>

 <style type="text/css">
	
		/* Table Body */
		.data-table tbody td {
			color: #252525;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(5),
		.data-table tbody td:last-child {
			text-align: left;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: cornsilk;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}
	</style>
</head>

 <tbody>
<table  width="1100" border="0" cellspacing="1" cellpadding="2">
   
  <tr>
	<td style = "color:darkblue">&nbsp;&nbsp;&nbsp;<?php echo $vjudul; ?></td>
  </tr>
  
</table>

<br />

<?php
echo "Tgl. Dikerjakan dari : ",$vxtgl1." s/d ".$vxtgl2."<br>";
echo "Status : ".strtoupper($vstatus)."<br>";
echo "User   : ".$vusrnama."<br><br>";
if ($vstatus == "progress" )
{
?>

 <table class="data-table" width="1500" border="0" cellspacing="1" cellpadding="2"  height="30px">
      
<tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Dikerjakan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>

<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
 if ($baris["tglkerja"]>$vtgl)
  {
   $vtgl1 = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  } else {
   $vtgl1 = "";         
  } 

  $vlokasi = $baris["lokasi"];
  $vlantai = $baris["lantai"];
  $vgedung = $baris["gedung"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vstatus = $baris["status"];
  $no += 1;

 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtgl1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatus; ?> </td>
  </tr>
  
  <?php  
  }
  ?>
  
  <tr>
    <td width="30" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

<?php
}

if ($vstatus == "all" and $vbarang == "AC" or $vstatus == "done" and $vbarang == "AC" or $vstatus == "pending" and $vbarang == "AC" or $vstatus == "tidak baik" and $vbarang == "AC")
{
    
  if ($vtipe == "Complete")
   {
?>

 <table class="data-table" width="3700" border="0" cellspacing="1" cellpadding="2" height="30px">
      
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Filter Udara</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Modul Control</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Remote Control</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Kisi-Kisi Evapurator & Kipas Blower</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Kondisi Tidak Ada Noise</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tegangan Indoor Unit</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Motor Fan</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Bearing Kipas Fan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>R-N/RS(V/A)</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>ST(V/A)</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>TR(V/A)</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tekanan Refrigran</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Progress</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>
 
 <tbody>
 
<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket='';
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];
  $vket11 = $baris["keterangan11"];
  $vket12 = $baris["keterangan12"];
  $vket13 = $baris["keterangan13"];
  $vket14 = $baris["keterangan14"];
  $vket15 = $baris["keterangan15"];
  $vket16 = $baris["keterangan16"];
  $vket17 = $baris["keterangan17"];
  $vket18 = $baris["keterangan18"];
  $vket19 = $baris["keterangan19"];
  $vket20 = $baris["keterangan20"];
  $vket21 = $baris["keterangan21"];
  $vket22 = $baris["keterangan22"];
  $vket23 = $baris["keterangan23"];
  $vket24 = $baris["keterangan24"];
  $vket25 = $baris["keterangan25"];
  $vket26 = $baris["keterangan26"];
  $vket27 = $baris["keterangan27"];
  $vket28 = $baris["keterangan28"];
  $vket29 = $baris["keterangan29"];
  $vket30 = $baris["keterangan30"];
  
  if ($vket1 <> '')
   {
       $vket = $vket.$vket1;
   }
  if ($vket2 <> '')
   {
       $vket = $vket.",".$vket2;
   }
  if ($vket3 <> '')
   {
       $vket = $vket.",".$vket3;
   }
  if ($vket4 <> '')
   {
       $vket = $vket.",".$vket4;
   }
  if ($vket5 <> '')
   {
       $vket = $vket.",".$vket5;
   }
  if ($vket6 <> '')
   {
       $vket = $vket.",".$vket6;
   }
  if ($vket7 <> '')
   {
       $vket = $vket.",".$vket7;
   }
  if ($vket8 <> '')
   {
       $vket = $vket.",".$vket8;
   }
  if ($vket9 <> '')
   {
       $vket = $vket.",".$vket9;
   }
  if ($vket10 <> '')
   {
       $vket = $vket.",".$vket10;
   }
  if ($vket11 <> '')
   {
       $vket = $vket.",".$vket11;
   }
  if ($vket12 <> '')
   {
       $vket = $vket.",".$vket12;
   }
  if ($vket13 <> '')
   {
       $vket = $vket.",".$vket13;
   }
  if ($vket14 <> '')
   {
       $vket = $vket.",".$vket14;
   }
  if ($vket15 <> '')
   {
       $vket = $vket.",".$vket15;
   }
  if ($vket16 <> '')
   {
       $vket = $vket.",".$vket16;
   }
  if ($vket17 <> '')
   {
       $vket = $vket.",".$vket17;
   }
  if ($vket18 <> '')
   {
       $vket = $vket.",".$vket18;
   }
  if ($vket19 <> '')
   {
       $vket = $vket.",".$vket19;
   }
  if ($vket20 <> '')
   {
       $vket = $vket.",".$vket20;
   }
  if ($vket21 <> '')
   {
       $vket = $vket.",".$vket21;
   }
  if ($vket22 <> '')
   {
       $vket = $vket.",".$vket22;
   }
  if ($vket23 <> '')
   {
       $vket = $vket.",".$vket23;
   }
  if ($vket24 <> '')
   {
       $vket = $vket.",".$vket24;
   }
  if ($vket25 <> '')
   {
       $vket = $vket.",".$vket25;
   }
  if ($vket26 <> '')
   {
       $vket = $vket.",".$vket26;
   }
  if ($vket27 <> '')
   {
       $vket = $vket.",".$vket27;
   }
  if ($vket28 <> '')
   {
       $vket = $vket.",".$vket28;
   }
  if ($vket29 <> '')
   {
       $vket = $vket.",".$vket29;
   }

  $vlokasi = $baris["lokasi"];
  if ($baris["tglselesai"]>$vtgl)
  {
   $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  } else {
   $vtglselesai = "";         
  } 
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vfreon = $baris["freon"];
  $vkapasitas = $baris["kapasitas"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vindoor1 = $baris["indoor1"];
  $vindoor2 = $baris["indoor2"];
  $vindoor3 = $baris["indoor3"];
  $vindoor4 = $baris["indoor4"];
  $vindoor5 = $baris["indoor5"];
  $vtegangan = $baris["tegangan"];
  $voutdoor1 = $baris["outdoor1"];
  $voutdoor2 = $baris["outdoor2"];
  $vrs = $baris["rs"];
  $vst = $baris["st"];
  $vtr = $baris["tr"];
  $vr = $baris["r"];
  $vampere = $baris["ampere"];
  $vampcomp = $baris["amperecomp"];
  $vampphase = $baris["amperephase"];
  $vtekanan = $baris["tekanan"];
  $vketerangan = $vket;
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketunit"];
  $vstatus = $baris["status"];
  $vstatusprogress = $baris["statusprogress"];
  $no += 1;

	$rs1 = $mainlib->dbquery("SELECT * FROM setac WHERE pk = '".$vkapasitas."'", $mainlib->ocn);
	if ($row1 = $mainlib->dbfetcharray($rs1))
	{
	 $vampac = $row1["amp"];
     $vgol = $row1["gol"];
	}    

 ?>
  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
<?php
 if ($vindoor1 == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $vindoor1; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $vindoor1; ?> </td>
<?php
 } 

 if ($vindoor2 == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $vindoor2; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $vindoor2; ?> </td>
<?php
 } 

 if ($vindoor3 == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $vindoor3; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $vindoor3; ?> </td>
<?php
 } 

 if ($vindoor4 == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $vindoor4; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $vindoor4; ?> </td>
<?php
 } 

 if ($vindoor5 == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $vindoor5; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $vindoor5; ?> </td>
<?php
 } 
?>
    <td style="text-align:center ; font-size:12px"><?php echo $vtegangan; ?> </td>
<?php
 if ($voutdoor1 == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $voutdoor1; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $voutdoor1; ?> </td>
<?php
 } 

 if ($voutdoor2 == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $voutdoor2; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $voutdoor2; ?> </td>
<?php
 } 

   if ($vgol == "1")
   {

    if ($vr >= $vr1 and $vr <= $vr2)
     {
  ?>
      <td style="text-align:center ; font-size:12px"><?php echo $vr; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:center; color:red ; font-size:12px"><?php echo $vr." / ".$vampere; ?> </td>
  <?php
     }
  ?>

      <td style="text-align:center; color:red ; font-size:12px">.</td>
      <td style="text-align:center; color:red ; font-size:12px">.</td>

  <?php

   } else {
       
      if ($vrs >= $vrst1 and $vrs <= $vrst2)
     {
  ?>
    <td style="text-align:center ; font-size:12px"><?php echo $vrs." / ".$vampere; ?> </td>
  <?php
     } else {
  ?>
    <td style="text-align:center ; color:red ; font-size:12px"><?php echo $vrs." / ".$vampere; ?> </td>
  <?php
     }

    if ($vst >= $vrst1 and $vt <= $vrst2)
     {
  ?>
    <td style="text-align:center ; font-size:12px"><?php echo $vst." / ".$vampcomp; ?> </td>
  <?php
     } else {
  ?>
    <td style="text-align:center ; color:red ; font-size:12px"><?php echo $vst." / ".$vampcomp; ?> </td>
  <?php
     }

    if ($vtr >= $vrst1 and $tr <= $vrst2)
     {
  ?>
    <td style="text-align:center ; font-size:12px"><?php echo $vtr." / ".$vampphase; ?> </td>
  <?php
     } else {
  ?>
    <td style="text-align:center ; color:red ; font-size:12px"><?php echo $vtr." / ".$vampphase; ?> </td>
  <?php
     }
   }
    
 if ($vfreon == "R 410")
 {
   
  if ($vtekanan >= $vtekanan1 and $vtekanan <= $vtekanan2)
     {
  ?>
    <td style="text-align:center ; font-size:12px"><?php echo $vtekanan; ?> </td>
  <?php
     } else {
  ?>
    <td style="text-align:center ; color:red ; font-size:12px"><?php echo $vtekanan; ?> </td>
  <?php
     } 
 }   
 
 if ($vfreon == "R 407")
 {
   
  if ($vtekanan >= $vtekanan3 and $vtekanan <= $vtekanan4)
     {
  ?>

    <td style="text-align:center ; font-size:12px"><?php echo $vtekanan; ?> </td>
  <?php
     } else {
  ?>
    <td style="text-align:center ; color:red ; font-size:12px"><?php echo $vtekanan; ?> </td>
  <?php
     } 
  }   
 ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
<?php
 if ($vstatusunit == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
<?php
 } 
?>    
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusprogress; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatus; ?> </td>

  </tr>
  
  <?php  
  }
  ?>
  
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />


<?php
} else {
?>    
 <table class="data-table" width="1800" border="0" cellspacing="1" cellpadding="2" height="30px">
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Progress</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>
 
 <tbody>

<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  if ($baris["tglselesai"]>$vtgl)
  {
   $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  } else {
   $vtglselesai = "";         
  } 
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vfreon = $baris["freon"];
  $vkapasitas = $baris["kapasitas"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketunit"];
  $vstatus = $baris["status"];
  $vstatusprogress = $baris["statusprogress"];
  $no += 1;
 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
<?php
 if ($vstatusunit == "Baik")
 {
?>     
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
<?php
 } else {
?>     
   <td style="text-align:center; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
<?php
 } 
?>    
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusprogress; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatus; ?> </td>
  </tr>
  
  <?php  
  }
  ?>
  
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

<?php    
  }
}

if ($vstatus == "all" and $vbarang == "Dispenser" or $vstatus == "done" and $vbarang == "Dispenser" or $vstatus == "pending" and $vbarang == "Dispenser" or $vstatus == "tidak baik" and $vbarang == "Dispenser" )
{
?>
 <table class="data-table" width="2200" border="0" cellspacing="1" cellpadding="2" height="30px">
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Kejernihan Air</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Cleaning Filter</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>TDS</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>
 <tbody>
<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  if ($baris["tglselesai"]>$vtgl)
  {
   $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  } else {
   $vtglselesai = "";         
  } 
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $baris["ketunit"];
  $vstatusunit = $baris["statusunit"];
  $vdispenser1 = $baris["dispenser1"];
  $vdispenser2 = $baris["dispenser2"];
  $vtds = $baris["tds"];
  $vstatus = $baris["status"];
  $no += 1;

 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vdispenser1; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vdispenser2; ?> </td>

  <?php
    if ($vtds >= $vtds1 and $vtds <= $vtds2)
     {
  ?>
      <td style="text-align:center ; font-size:12px"><?php echo $vtds; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:center; color:red ; font-size:12px"><?php echo $vtds; ?> </td>
  <?php
     }

    if ($vstatusunit == "Baik")
     {
  ?>
        <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:center; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     }
  ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatus; ?> </td>


  </tr>
  
  <?php  
  }
  ?>
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
  </tr>
</table>
<br />

<?php
}

if ($vstatus == "all" and $vbarang == "Apar" or $vstatus == "done" and $vbarang == "Apar" or $vstatus == "pending" and $vbarang == "Apar" or $vstatus == "tidak baik" and $vbarang == "Apar")
{
?>
 <table class="data-table" width="1700" border="0" cellspacing="1" cellpadding="2" height="30px">
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Presure Bar</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>
 <tbody>

<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  
  $vlokasi = $baris["lokasi"];
  if ($baris["tglselesai"]>$vtgl)
  {
   $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  } else {
   $vtglselesai = "";         
  } 
//  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $baris["keterangan"];
  $vapar = $baris["apar"];
  $vketunit = $baris["ketunit"];
  $vstatusunit = $baris["statusunit"];
  $vstatus = $baris["status"];
  $no += 1;
 ?>
  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>

  <?php
    if ($vapar >= $vapar1 and $vapar <= $vapar2)
     {
  ?>
      <td style="text-align:center ; font-size:12px"><?php echo $vapar; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:center; color:red ; font-size:12px"><?php echo $vapar; ?> </td>
  <?php
     }
    if ($vstatusunit == "Baik")
     {
  ?>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:center; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     }
  ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vketunit; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatus; ?> </td>
  </tr>
  
  <?php  
  }
  ?>
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
  </tr>
</table>
<br />

<?php
}
if ($vstatus == "all" and $vbarang == "Class" or $vstatus == "done" and $vbarang == "Class" or $vstatus == "pending" and $vbarang == "Class" or $vstatus == "tidak baik" and $vbarang == "Class")
{
?>

 <table class="data-table" width="1700" border="0" cellspacing="1" cellpadding="2">
<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi Pelaksana</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
  </tr>
 <tbody>

<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $baris["keterangan"];
  $vteknisikelas = $baris["teknisilamp"];
  $no += 1;
 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisikelas; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
  </tr>
  
  <?php  
  }
  ?>
  </tbody>
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
  </tr>
</table>
<br />
<br />
<br />

<?php
}
if ($vstatus == "all" and $vbarang == "Lift" or $vstatus == "done" and $vbarang == "Lift" or $vstatus == "pending" and $vbarang == "Lift" or $vstatus == "tidak baik" and $vbarang == "Lift")
{
?>

 <table class="data-table" width="1800" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>


<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>


<?php
 }
?>

 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>
  
</table>
<br />



 <table class="data-table" width="850" border="0" cellspacing="1" cellpadding="2">
 <tbody>
<?php
$hasil = $mainlib->dbquery($sql, $mainlib->ocn);
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];
  $vket11 = $baris["keterangan11"];
  $vket12 = $baris["keterangan12"];
  $vket13 = $baris["keterangan13"];
  $vket14 = $baris["keterangan14"];
  $vket15 = $baris["keterangan15"];
  $vket16 = $baris["keterangan16"];
  $vket17 = $baris["keterangan17"];
  $vket18 = $baris["keterangan18"];
  $vket19 = $baris["keterangan19"];
  $vket20 = $baris["keterangan20"];
  $vket21 = $baris["keterangan21"];
  $vket22 = $baris["keterangan22"];
  $vket23 = $baris["keterangan23"];
  $vket24 = $baris["keterangan24"];
  $vket25 = $baris["keterangan25"];
  $vket26 = $baris["keterangan26"];
  $vket27 = $baris["keterangan27"];
  $vket28 = $baris["keterangan28"];
  $vket29 = $baris["keterangan29"];
  $vket30 = $baris["keterangan30"];
  
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vteknisikelas = $baris["teknisilamp"];
  $vmesin1 = $baris["mesin1"];
  $vmesin2 = $baris["mesin2"];
  $vmesin3 = $baris["mesin3"];
  $vmesin4 = $baris["mesin4"];
  $vmesin5 = $baris["mesin5"];
  $vmesin6 = $baris["mesin6"];
  $vmesin7 = $baris["mesin7"];
  $vmesin8 = $baris["mesin8"];
  $vmesin9 = $baris["mesin9"];
  $vmesin10 = $baris["mesin10"];
  $vhoistway1 = $baris["hoistway1"];
  $vhoistway2 = $baris["hoistway2"];
  $vhoistway3 = $baris["hoistway3"];
  $vhoistway4 = $baris["hoistway4"];
  $vhoistway5 = $baris["hoistway5"];
  $vhoistway6 = $baris["hoistway6"];
  $vhoistway7 = $baris["hoistway7"];
  $vcar1 = $baris["car1"];
  $vcar2 = $baris["car2"];
  $vcar3 = $baris["car3"];
  $vcar4 = $baris["car4"];
  $vcar5 = $baris["car5"];
  $vcar6 = $baris["car6"];
  $vpit1 = $baris["pit1"];
  $vpit2 = $baris["pit2"];
  $vpit3 = $baris["pit3"];
  $vpit4 = $baris["pit4"];
  $vpit5 = $baris["pit5"];
  $vpit6 = $baris["pit6"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
    <td></td>
    <td><b>Tower  : </b><?php echo $vgedung; ?></td> 
  </tr>
  <tr>
    <td></td>
    <td><b>Lokasi : </b><?php echo $vlokasi; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Tgl.Dikerjakan / Tgl.Selesai  : </b><?php echo $vtglkerja; ?>&nbsp;/&nbsp;<?php echo $vtglselesai; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Teknisi-1 / Teknisi2 / Teknisi-3  : </b><?php echo $vteknisi; ?>&nbsp;/&nbsp;<?php echo $vteknisi2; ?>&nbsp;/&nbsp;<?php echo $vteknisi3; ?></td> 
  </tr>
  <tr>
     <td> </td> 
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Uraian</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Standard</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Hasil Pengecekan & Maintenance</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><b>A.</b></td>
    <td style="text-align:left ; font-size:12px"><b>MESIN ROOM</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Suhu Ruangan Mesin dan Kebersihan"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "< 28°C"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket1; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Penerangan Ruangan Mesin"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Visual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket2; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Tegangan Supply utama (R, S dan T)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "< 28°C"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket3; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Jarak kontak brake dan switch"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "min < 3 mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket4; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Ketebalan lapisan kanvas brake"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "min 5 mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket5; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kondisi dan batas level oil gear box"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Visual Level"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket6; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "7."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Motor traksi"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket7; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "8."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Tegangan dan arus aki untuk ARD / UPSL"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "12 VDC"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin8; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket8; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "9."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Operasional ARD / UPSL"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin9; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket9; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "10."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kontrol panel (kontaktor, relay, timer, sekring, etc)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin10; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket10; ?> </td>
  </tr>

 <tr>
     <td>.</td> 
  </tr>
  
  <tr>
    <td style="text-align:left ; font-size:12px"><b>B.</b></td>
    <td style="text-align:left ; font-size:12px"><b>HOISTWAY & TOP CAR</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kondisi di atas sangkar, E stop &  Exit switch"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket11; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Jarak interlock switch, pengait terhadap penyangga"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "3x1 mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket12; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Tombol luar indikator, Hall lantern"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket13; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kondisi box oil pada rail sangkar dan rail CWT"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Visual / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket14; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Keterangan main wire rope"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Visual / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket15; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kondisi battery ESD dan PC Board"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "12 VDC"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket16; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "7."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kondisi LCD + bendera sensor"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket17; ?> </td>
  </tr>

 <tr>
     <td>.</td> 
  </tr>
  
  <tr>
    <td style="text-align:left ; font-size:12px"><b>C.</b></td>
    <td style="text-align:left ; font-size:12px"><b>CAR STATION</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Car operation panel / OPB"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket18; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Fungsi lampu emergency, interphone"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket19; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Sensor safetty ray, muntibeam, saf T-edge"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket20; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Fan sangkar / Air Conditioning"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket21; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Lampu penerangan sangkar (komplit set)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket22; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Sangkar dan material pendukung"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket23; ?> </td>
  </tr>

 <tr>
     <td>. </td> 
  </tr>
  
  <tr>
    <td style="text-align:left ; font-size:12px"><b>D.</b></td>
    <td style="text-align:left ; font-size:12px"><b>PIT</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kondisi PIT (PIT switch, lampu PIT & bersih)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Visual/Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket24; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Jarak compensating sheave"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "250 ± 50 mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket25; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Fungsi buffer / compens / GOV"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket26; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kondisi dumping Roller"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Visual/Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket27; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Ketegangan governoor yang diizinkan"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "250 - 300 mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket28; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Jarak CWT terhadap buffer (sangkar di top floor)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "600-900mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket29; ?> </td>
  </tr>

  <tr>
      <td>.</td>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo "Status Unit : "; ?> </td>
  <?php
    if ($vstatusunit == "Baik")
     {
  ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:left; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     }
  ?>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo "Keterangan Status : "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>


  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>


<?php
 }
?>

</table>
<br />


<?php
}
if ($vstatus == "all" and $vbarang == "Genset" or $vstatus == "done" and $vbarang == "Genset" or $vstatus == "pending" and $vbarang == "Genset" or $vstatus == "tidak baik" and $vbarang == "Genset")
{
?>

 <table class="data-table" width="1800" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>


<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>


<?php
 }
?>

 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>
  
</table>
<br />


 <table class="data-table" width="850" border="0" cellspacing="1" cellpadding="2">
 <tbody>
<?php
$hasil = $mainlib->dbquery($sql, $mainlib->ocn);
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];
  $vket11 = $baris["keterangan11"];
  $vket12 = $baris["keterangan12"];
  $vket13 = $baris["keterangan13"];
  $vket14 = $baris["keterangan14"];
  $vket15 = $baris["keterangan15"];
  $vket16 = $baris["keterangan16"];
  $vket17 = $baris["keterangan17"];
  $vket18 = $baris["keterangan18"];
  $vket19 = $baris["keterangan19"];
  $vket20 = $baris["keterangan20"];
  $vket21 = $baris["keterangan21"];
  $vket22 = $baris["keterangan22"];
  $vket23 = $baris["keterangan23"];
  $vket24 = $baris["keterangan24"];
  $vket25 = $baris["keterangan25"];
  $vket26 = $baris["keterangan26"];

  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $baris["keterangan"];
  $vteknisikelas = $baris["teknisilamp"];
  $vmesin1 = $baris["mesin1"];
  $vmesin2 = $baris["mesin2"];
  $vmesin3 = $baris["mesin3"];
  $vmesin4 = $baris["mesin4"];
  $vmesin5 = $baris["mesin5"];
  $vmesin6 = $baris["mesin6"];
  $vmesin7 = $baris["mesin7"];
  $vmesin8 = $baris["mesin8"];
  $vmesin9 = $baris["mesin9"];
  $vmesin10 = $baris["mesin10"];
  $vhoistway1 = $baris["hoistway1"];
  $vhoistway2 = $baris["hoistway2"];
  $vhoistway3 = $baris["hoistway3"];
  $vhoistway4 = $baris["hoistway4"];
  $vhoistway5 = $baris["hoistway5"];
  $vhoistway6 = $baris["hoistway6"];
  $vhoistway7 = $baris["hoistway7"];
  $vcar1 = $baris["car1"];
  $vcar2 = $baris["car2"];
  $vcar3 = $baris["car3"];
  $vcar4 = $baris["car4"];
  $vcar5 = $baris["car5"];
  $vcar6 = $baris["car6"];
  $vpit1 = $baris["pit1"];
  $vpit2 = $baris["pit2"];
  $vpit3 = $baris["pit3"];
  $vpit4 = $baris["pit4"];
  $vpit5 = $baris["pit5"];
  $vpit6 = $baris["pit6"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
     <td></td> 
     <td><b>Lokasi    : </b><?php echo $vlokasi; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Jenis     : </b><?php echo $vjenis; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Kapasitas : </b><?php echo $vkapasitas; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Tgl.Dikerjakan / Tgl.Selesai  : </b><?php echo $vtglkerja; ?>&nbsp;/&nbsp;<?php echo $vtglselesai; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Teknisi-1 / Teknisi2 / Teknisi-3  : </b><?php echo $vteknisi; ?>&nbsp;/&nbsp;<?php echo $vteknisi2; ?>&nbsp;/&nbsp;<?php echo $vteknisi3; ?></td> 
  </tr>
  <tr>
     <td> </td> 
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Item Pengecekan</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Standard</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kondisi</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><b>A.</b></td>
    <td style="text-align:left ; font-size:12px"><b>SEBELUM PEMANASAN</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan air AKI "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket1; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan Amper AKI "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "25-27 A"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket2; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan OLI"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket3; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan air radiator"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket4; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan Solar Sebelum Pemanasan "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Liter"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket5; ?> </td>
  </tr>

 <tr>
     <td>.</td> 
  </tr>
  
  <tr>
    <td style="text-align:left ; font-size:12px"><b>B.</b></td>
    <td style="text-align:left ; font-size:12px"><b>SAAT PEMANASAN</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "STANDARD VOLTAGE 3 PHASE R-S, S-T, R-T"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "380-410"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket6; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "KVA"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket7; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "% KW"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin8; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket8; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "PF COS"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin9; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket9; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "OIL PRESS (PSI)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin10; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket10; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "KWH"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket11; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "7."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "TEMP Oil ( C )"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "3x1 mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket12; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "8."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "TIME COOLANT (C)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "100 Max"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket13; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "9."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "TEMP Exhaust (C)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket14; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "10."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "FREQ (Hz)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "50"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket15; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "11."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "SPEED RPM"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket16; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "12."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "BATT. VOLT (DC)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "25-27 V"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket17; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "13."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "DAILY TANK (%)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket18; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "14."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "STORAGE TANK (%)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket19; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "15."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "TOTAL FUEL"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket20; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "16."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "ENGINE HOURS"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket21; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "17."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "BREAKER POSITION"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket22; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "18."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "GST STATUS"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Function / Manual"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket23; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "19."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "SWITCH POSITION"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket24; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "20."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "PARALEL MODE"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket25; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "21."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan Solar Setelah Pemanasan "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Liter"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vpit3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket26; ?> </td>
  </tr>

  <tr>
      <td>.</td>
  </tr>

  <tr>
    <td></td> 
    <td style="text-align:left ; font-size:12px"><?php echo "Status Unit : "; ?> </td>
  <?php
    if ($vstatusunit == "Baik")
     {
  ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:left; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     }
  ?>
  </tr>

  <tr>
    <td></td> 
    <td style="text-align:left ; font-size:12px"><?php echo "Keterangan Status : "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>


  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>


  <?php  
  }
  ?>
</table>
<br />

<?php
}
if ($vstatus == "all" and $vbarang == "Diesel Pump" or $vstatus == "done" and $vbarang == "Diesel Pump" or $vstatus == "pending" and $vbarang == "Diesel Pump" or $vstatus == "tidak baik" and $vbarang == "Diesel Pump")
{
?>

 <table class="data-table" width="1800" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>


<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>


<?php
 }
?>

 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>
  
</table>
<br />



 <table class="data-table" width="850" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<?php
$hasil = $mainlib->dbquery($sql, $mainlib->ocn);
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];
  $vket11 = $baris["keterangan11"];
  $vket12 = $baris["keterangan12"];
  $vket13 = $baris["keterangan13"];
  $vket14 = $baris["keterangan14"];
  $vket15 = $baris["keterangan15"];
  $vket16 = $baris["keterangan16"];
  $vket17 = $baris["keterangan17"];
  $vket18 = $baris["keterangan18"];
  $vket19 = $baris["keterangan19"];

  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $baris["keterangan"];
  $vteknisikelas = $baris["teknisilamp"];
  $vmesin1 = $baris["mesin1"];
  $vmesin2 = $baris["mesin2"];
  $vmesin3 = $baris["mesin3"];
  $vmesin4 = $baris["mesin4"];
  $vmesin5 = $baris["mesin5"];
  $vmesin6 = $baris["mesin6"];
  $vmesin7 = $baris["mesin7"];
  $vmesin8 = $baris["mesin8"];
  $vmesin9 = $baris["mesin9"];
  $vmesin10 = $baris["mesin10"];
  $vhoistway1 = $baris["hoistway1"];
  $vhoistway2 = $baris["hoistway2"];
  $vhoistway3 = $baris["hoistway3"];
  $vhoistway4 = $baris["hoistway4"];
  $vhoistway5 = $baris["hoistway5"];
  $vhoistway6 = $baris["hoistway6"];
  $vhoistway7 = $baris["hoistway7"];
  $vcar1 = $baris["car1"];
  $vcar2 = $baris["car2"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
     <td></td> 
     <td><b>Lokasi    : </b><?php echo $vlokasi; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Jenis     : </b><?php echo $vjenis; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Kapasitas : </b><?php echo $vkapasitas; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Tgl.Dikerjakan / Tgl.Selesai  : </b><?php echo $vtglkerja; ?>&nbsp;/&nbsp;<?php echo $vtglselesai; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Teknisi-1 / Teknisi2 / Teknisi-3  : </b><?php echo $vteknisi; ?>&nbsp;/&nbsp;<?php echo $vteknisi2; ?>&nbsp;/&nbsp;<?php echo $vteknisi3; ?></td> 
  </tr>
  <tr>
     <td> </td> 
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Item Pengecekan</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Standard</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kondisi</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><b>A.</b></td>
    <td style="text-align:left ; font-size:12px"><b>SEBELUM PEMANASAN</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan air AKI "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket1; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan Amper AKI "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "25-27 A"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket2; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan OLI"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket3; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan air radiator"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket4; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pengecekan Solar Sebelum Pemanasan "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Liter"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket5; ?> </td>
  </tr>

 <tr>
     <td>.</td> 
  </tr>
  
  <tr>
    <td style="text-align:left ; font-size:12px"><b>B.</b></td>
    <td style="text-align:left ; font-size:12px"><b>SAAT PEMANASAN</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "STAND BY"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "39"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket6; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "PSI"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "0"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket7; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Crank 1"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "13"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin8; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket8; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "CRANK 2"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "13"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin9; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket9; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Engine Coolant"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "80"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin10; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket10; ?> </td>
  </tr>


  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "RPM"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "0"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket11; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "7."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "STATUS RUNNING"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket12; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "8."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Hours"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "34-39"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket13; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "9."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "PSI"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "50"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket14; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "10."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Crank 1"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "13.5"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket15; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "11."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Crank 2"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "13.5"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket16; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "12."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Engine Coolant"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "50"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket17; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "13."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "RPM"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "2200"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket18; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "14."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "STORAGE TANK (%)"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket19; ?> </td>
  </tr>

  <tr>
      <td>.</td>
  </tr>

  <tr>
    <td></td> 
    <td style="text-align:left ; font-size:12px"><?php echo "Status Unit : "; ?> </td>
  <?php
    if ($vstatusunit == "Baik")
     {
  ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:left; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     }
  ?>
  </tr>

  <tr>
    <td></td> 
    <td style="text-align:left ; font-size:12px"><?php echo "Keterangan Status : "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>


  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  
  <?php  
  }
  ?>

</table>
<br />

<?php
}
if ($vstatus == "all" and ($vbarang == "Pompa Boster" or $vbarang == "Pompa Transfer") or $vstatus == "done" and ($vbarang == "Pompa Boster" or $vbarang == "Pompa Transfer") or $vstatus == "pending" and ($vbarang == "Pompa Boster" or $vbarang == "Pompa Transfer") or $vstatus == "tidak baik" and ($vbarang == "Pompa Boster" or $vbarang == "Pompa Transfer"))
{
?>

 <table class="data-table" width="1800" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>


<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>


<?php
 }
?>

 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>
  
</table>
<br />


 <table class="data-table" width="850" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<?php
$hasil = $mainlib->dbquery($sql, $mainlib->ocn);
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];
  $vket11 = $baris["keterangan11"];

  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $baris["keterangan"];
  $vteknisikelas = $baris["teknisilamp"];
  $vmesin1 = $baris["mesin1"];
  $vmesin2 = $baris["mesin2"];
  $vmesin3 = $baris["mesin3"];
  $vmesin4 = $baris["mesin4"];
  $vmesin5 = $baris["mesin5"];
  $vmesin6 = $baris["mesin6"];
  $vmesin7 = $baris["mesin7"];
  $vmesin8 = $baris["mesin8"];
  $vmesin9 = $baris["mesin9"];
  $vmesin10 = $baris["mesin10"];
  $vhoistway1 = $baris["hoistway1"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>

<?php
 if ($vbarang == "Pompa Boster")
 {
?>

 <tr>
     <td></td> 
     <td><b>Tower / Lantai  : </b><?php echo $vgedung; ?>&nbsp;/&nbsp;<?php echo $vlantai; ?></td> 
  </tr>

<?php
 }
?>

  <tr>
     <td></td> 
     <td><b>Lokasi    : </b><?php echo $vlokasi; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Jenis     : </b><?php echo $vjenis; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Kapasitas : </b><?php echo $vkapasitas; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Tgl.Dikerjakan / Tgl.Selesai  : </b><?php echo $vtglkerja; ?>&nbsp;/&nbsp;<?php echo $vtglselesai; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Teknisi-1 / Teknisi2 / Teknisi-3  : </b><?php echo $vteknisi; ?>&nbsp;/&nbsp;<?php echo $vteknisi2; ?>&nbsp;/&nbsp;<?php echo $vteknisi3; ?></td> 
  </tr>
  <tr>
     <td> </td> 
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Item Pengecekan</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Standard</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kondisi</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><b>A.</b></td>
    <td style="text-align:left ; font-size:12px"><b>MOTOR & POMPA BOSTER</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Cek mounting pondasi pada pompa dan motor"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket1; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Cek kipas motor fan pendingin pastikan berfungsi dengan baik"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket2; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Cek keadaan suara noise bering pada motor dan pompa "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket3; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pastikan kelurusan poros pompa dan Motor"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket4; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Periksa kebocoran pada impeler"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket5; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Cek Tegangan Beban :  ( R - S ) , ( S - T ) , ( T - R )  "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket6; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "7."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Cek Arus Beban : A ( R ) :      A  ( S ) :         A  ( T ) "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket7; ?> </td>
  </tr>

 <tr>
     <td>.</td> 
  </tr>
  
  <tr>
    <td style="text-align:left ; font-size:12px"><b>B.</b></td>
    <td style="text-align:left ; font-size:12px"><b>INSTALASI PIPA & VALVE POMPA BOSTER</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pastikan Tekanan Pressure Gauge berfungsi dengan baik "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin8; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket8; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Bersihkan Instalasi Pipa Pompa Transfer dan Pipa Pompa transfer "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin9; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket9; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Cek keadaan fleksible join pastikan berfungsi baik"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin10; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket10; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pastikan Geat valve keadaan yang benar open/close"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket11; ?> </td>
  </tr>

  <tr>
      <td>.</td>
  </tr>

  <tr>
    <td></td> 
    <td style="text-align:left ; font-size:12px"><?php echo "Status Unit : "; ?> </td>
  <?php
    if ($vstatusunit == "Baik")
     {
  ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:left; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     }
  ?>
  </tr>

  <tr>
    <td></td> 
    <td style="text-align:left ; font-size:12px"><?php echo "Keterangan Status : "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>


  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  
  <?php  
  }
 ?>

</table>
<br />

<?php
}
if ($vstatus == "all" and $vbarang == "Toilet" or $vstatus == "done" and $vbarang == "Toilet" or $vstatus == "pending" and $vbarang == "Toilet" or $vstatus == "tidak baik" and $vbarang == "Toilet")
{
 if ($tipe == "Complete")    
  {
?>

 <table class="data-table" width="4000" border="0" cellspacing="1" cellpadding="2">
 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Periksa engsel engsel pintu</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Periksa slot pintu</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Pastikan tidak ada suara bising pada gesekan engsel</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Cek door closer yg terpasang pada pintu</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Periksa baut dan cashing pintu serta handle</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Pengecekan Closet</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Periksa Jet Shower</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Periksa Wastafel</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Periksa kondisi pintu kubikel</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Pengecekan Urinoir</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Lampu Toilet</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>

 <tbody>

<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket='';
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];
  $vket11 = $baris["keterangan11"];

  if ($vket1 <> '')
   {
       $vket = $vket.$vket1;
   }
  if ($vket2 <> '')
   {
       $vket = $vket.",".$vket2;
   }
  if ($vket3 <> '')
   {
       $vket = $vket.",".$vket3;
   }
  if ($vket4 <> '')
   {
       $vket = $vket.",".$vket4;
   }
  if ($vket5 <> '')
   {
       $vket = $vket.",".$vket5;
   }
  if ($vket6 <> '')
   {
       $vket = $vket.",".$vket6;
   }
  if ($vket7 <> '')
   {
       $vket = $vket.",".$vket7;
   }
  if ($vket8 <> '')
   {
       $vket = $vket.",".$vket8;
   }
  if ($vket9 <> '')
   {
       $vket = $vket.",".$vket9;
   }
  if ($vket10 <> '')
   {
       $vket = $vket.",".$vket10;
   }
  if ($vket11 <> '')
   {
       $vket = $vket.",".$vket11;
   }

  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vteknisikelas = $baris["teknisilamp"];
  $vmesin1 = $baris["mesin1"];
  $vmesin2 = $baris["mesin2"];
  $vmesin3 = $baris["mesin3"];
  $vmesin4 = $baris["mesin4"];
  $vmesin5 = $baris["mesin5"];
  $vmesin6 = $baris["mesin6"];
  $vmesin7 = $baris["mesin7"];
  $vmesin8 = $baris["mesin8"];
  $vmesin9 = $baris["mesin9"];
  $vmesin10 = $baris["mesin10"];
  $vhoistway1 = $baris["hoistway1"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $vstatus = $baris["status"];
  $no += 1;
 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin1; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin2; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin4; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin5; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin6; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin7; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin8; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin9; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin10; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatus; ?> </td>
  </tr>

  <?php  
  }
  ?>
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="150" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

<?php
} else {
?>

 <table class="data-table" width="1700" border="0" cellspacing="1" cellpadding="2">
 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>

 <tbody>

<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $vstatus = $baris["status"];
  $no += 1;
 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatus; ?> </td>
  </tr>

  <?php  
  }
  ?>
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
  </tr>

</table>
<br />

<?php
 }
}
if ($vstatus == "all" and $vbarang == "Panel" or $vstatus == "done" and $vbarang == "Panel" or $vstatus == "pending" and $vbarang == "Panel" or $vstatus == "tidak baik" and $vbarang == "Panel")
{
?>

 <table class="data-table" width="1800" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>


<?php
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>


<?php
 }
?>

 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>
  
</table>
<br />


 <table class="data-table" width="850" border="0" cellspacing="1" cellpadding="2">
 <tbody>

<?php
$hasil = $mainlib->dbquery($sql, $mainlib->ocn);
while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];

  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vmesin1 = $baris["mesin1"];
  $vmesin2 = $baris["mesin2"];
  $vmesin3 = $baris["mesin3"];
  $vmesin4 = $baris["mesin4"];
  $vmesin5 = $baris["mesin5"];
  $vmesin6 = $baris["mesin6"];
  $vmesin7 = $baris["mesin7"];
  $vmesin8 = $baris["mesin8"];
  $vmesin9 = $baris["mesin9"];
  $vmesin10 = $baris["mesin10"];
  $vteganganpanel1 = $baris["teganganpanel1"];
  $vteganganpanel2 = $baris["teganganpanel2"];
  $vmcbpanel = $baris["mcbpanel"];
  $vmcbamppanel = $baris["mcbamppanel"];
  $vmcbamppanel2 = $baris["mcbamppanel2"];
  $vmcbamppanel3 = $baris["mcbamppanel3"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $no += 1;
 ?>
  
  <tr>
    <td></td>
    <td><b>Tower  : </b><?php echo $vgedung; ?></td> 
  </tr>
  <tr>
    <td></td>
    <td><b>Lokasi : </b><?php echo $vlokasi; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Tgl.Dikerjakan / Tgl.Selesai  : </b><?php echo $vtglkerja; ?>&nbsp;/&nbsp;<?php echo $vtglselesai; ?></td> 
  </tr>
  <tr>
     <td></td> 
     <td><b>Teknisi-1 / Teknisi2 / Teknisi-3  : </b><?php echo $vteknisi; ?>&nbsp;/&nbsp;<?php echo $vteknisi2; ?>&nbsp;/&nbsp;<?php echo $vteknisi3; ?></td> 
  </tr>
  <tr>
     <td> </td> 
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Uraian</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Hasil Pemeriksaan & Pengukuran</b></td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><b>I.</b></td>
    <td style="text-align:left ; font-size:12px"><b></b>URAIAN PENGERJAAN PEPEMERIKSAAN</td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Periksa & Pastikan ruangan dan panel dalam kondisi bersih"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin1; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket1; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Bersihkan debu/kotoran yang ada pada semua jaringan di dalam panel"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket2; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pastikan exhaust fan ruangan kerja"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin3; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket3; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Periksa dan pastikan MCB / MCCB tidak panas / rusak"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket4; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "5."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Periksa dan pastikan contactor tidak panas dan berisik"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin5; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket5; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "6."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Periksa dan pastikan Indikator kontrol semua berfungsi baik"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin6; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket6; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "7."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Periksa dan pastikan Instalasi kabel tidak panas dan tersusun rapi"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin7; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket7; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "8."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kencangkan terminasi kabel yang ada di dalam panel"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin8; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket8; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "9."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pastikan semua fuse tidak putus"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin9; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket9; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "10."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Pastikan setingan Timer sesuai waktu On / Off dan berfungsi baik"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin10; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket10; ?> </td>
  </tr>

 <tr>
     <td>.</td> 
  </tr>
  
  <tr>
    <td style="text-align:left ; font-size:12px"><b>II.</b></td>
    <td style="text-align:left ; font-size:12px"><b>URAIAN PEKERJAAN PENGUKURAN</b></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "1."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Tegangan 1 Phase"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vteganganpanel1; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo " / ".$vteganganpanel1b; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo " / ".$vteganganpanel1c; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket11; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "2."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Tegangan 3 Phase"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "3x1 mm"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vteganganpanel2; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo " / ".$vteganganpanel2b; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo " / ".$vteganganpanel2c; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket12; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "3."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Kapasitas MCCB / MCB yang terpasang "; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmcbpanel; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket13; ?> </td>
  </tr>

  <tr>
    <td style="text-align:left ; font-size:12px"><?php echo "4."; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo "Ampere R - S - T"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmcbamppanel." A"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo " - ".$vmcbamppanel2." A"; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo " - ".$vmcbamppanel3." A"; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vket14; ?> </td>
  </tr>

  <tr>
      <td>.</td>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo "Status Unit : "; ?> </td>
  <?php
    if ($vstatusunit == "Baik")
     {
  ?>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     } else {
  ?>
      <td style="text-align:left; color:red ; font-size:12px"><?php echo $vstatusunit; ?> </td>
  <?php
     }
  ?>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo "Keterangan Status : "; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
  </tr>

  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>
  
  <tr>
    <td style="width:30 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px">.</td>
    <td style="width:300 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px">.</td>
  </tr>


  <tr>
    <td></td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo ""; ?> </td>
  </tr>

<?php
 }
?>

</table>
<br />

<?php
}
if ($vstatus == "all" and $vbarang == "Kelas" or $vstatus == "done" and $vbarang == "Kelas" or $vstatus == "pending" and $vbarang == "Kelas" or $vstatus == "tidak baik" and $vbarang == "Kelas")
{
    if ($vtipe == "Complete")
    {
?>

 <table class="data-table" width="3000" border="0" cellspacing="1" cellpadding="2">
 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Meja</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Kursi</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Meja Podium</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Kursi Podium</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Pintu</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Engsel Pintu</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Handel Pintu</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Kunci Pintu</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Dinding</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Vertikal Blind</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Plafon / Akustik</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Lantai / Karpet</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Lampu</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Saklar</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Stop Kontak</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Glass Board</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Cradenza</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Plint Lantai</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Kap Lampu</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>E-Podium</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Projector</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>

 <tbody>

<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vket='';
  $vket1 = $baris["keterangan1"];
  $vket2 = $baris["keterangan2"];
  $vket3 = $baris["keterangan3"];
  $vket4 = $baris["keterangan4"];
  $vket5 = $baris["keterangan5"];
  $vket6 = $baris["keterangan6"];
  $vket7 = $baris["keterangan7"];
  $vket8 = $baris["keterangan8"];
  $vket9 = $baris["keterangan9"];
  $vket10 = $baris["keterangan10"];
  $vket11 = $baris["keterangan11"];
  $vket12 = $baris["keterangan12"];
  $vket13 = $baris["keterangan13"];
  $vket14 = $baris["keterangan14"];
  $vket15 = $baris["keterangan15"];
  $vket16 = $baris["keterangan16"];
  $vket17 = $baris["keterangan17"];
  $vket18 = $baris["keterangan18"];
  $vket19 = $baris["keterangan19"];
  $vket20 = $baris["keterangan20"];
  $vket21 = $baris["keterangan21"];

  if ($vket1 <> '')
   {
       $vket = $vket.$vket1;
   }
  if ($vket2 <> '')
   {
       $vket = $vket.",".$vket2;
   }
  if ($vket3 <> '')
   {
       $vket = $vket.",".$vket3;
   }
  if ($vket4 <> '')
   {
       $vket = $vket.",".$vket4;
   }
  if ($vket5 <> '')
   {
       $vket = $vket.",".$vket5;
   }
  if ($vket6 <> '')
   {
       $vket = $vket.",".$vket6;
   }
  if ($vket7 <> '')
   {
       $vket = $vket.",".$vket7;
   }
  if ($vket8 <> '')
   {
       $vket = $vket.",".$vket8;
   }
  if ($vket9 <> '')
   {
       $vket = $vket.",".$vket9;
   }
  if ($vket10 <> '')
   {
       $vket = $vket.",".$vket10;
   }
  if ($vket11 <> '')
   {
       $vket = $vket.",".$vket11;
   }
  if ($vket12 <> '')
   {
       $vket = $vket.",".$vket12;
   }
  if ($vket13 <> '')
   {
       $vket = $vket.",".$vket13;
   }
  if ($vket14 <> '')
   {
       $vket = $vket.",".$vket14;
   }
  if ($vket15 <> '')
   {
       $vket = $vket.",".$vket15;
   }
  if ($vket16 <> '')
   {
       $vket = $vket.",".$vket16;
   }
  if ($vket17 <> '')
   {
       $vket = $vket.",".$vket17;
   }
  if ($vket18 <> '')
   {
       $vket = $vket.",".$vket18;
   }
  if ($vket19 <> '')
   {
       $vket = $vket.",".$vket19;
   }
  if ($vket20 <> '')
   {
       $vket = $vket.",".$vket20;
   }
  if ($vket21 <> '')
   {
       $vket = $vket.",".$vket21;
   }

  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vketerangan = $vket;
  $vteknisikelas = $baris["teknisilamp"];
  $vmesin1 = $baris["mesin1"];
  $vmesin2 = $baris["mesin2"];
  $vmesin3 = $baris["mesin3"];
  $vmesin4 = $baris["mesin4"];
  $vmesin5 = $baris["mesin5"];
  $vmesin6 = $baris["mesin6"];
  $vmesin7 = $baris["mesin7"];
  $vmesin8 = $baris["mesin8"];
  $vmesin9 = $baris["mesin9"];
  $vmesin10 = $baris["mesin10"];
  $vhoistway1 = $baris["hoistway1"];
  $vhoistway2 = $baris["hoistway2"];
  $vhoistway3 = $baris["hoistway3"];
  $vhoistway4 = $baris["hoistway4"];
  $vhoistway5 = $baris["hoistway5"];
  $vhoistway6 = $baris["hoistway6"];
  $vhoistway7 = $baris["hoistway7"];
  $vcar1 = $baris["car1"];
  $vcar2 = $baris["car2"];
  $vcar3 = $baris["car3"];
  $vcar4 = $baris["car4"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $vstatus = $baris["status"];
  $no += 1;
 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin1; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin2; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin4; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin5; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin6; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin7; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin8; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin9; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vmesin10; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway1; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway2; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway4; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway5; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway6; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vhoistway7; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar1; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar2; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vcar4; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketerangan; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatus; ?> </td>
  </tr>

  <?php  
  }
  ?>
  
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>

  </tr>

</table>
<br />

<?php
} else {
?>

 <table class="data-table" width="1700" border="0" cellspacing="1" cellpadding="2">
 <tr>
    <td style="width:20 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>No</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Tower</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lantai</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Lokasi</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Barang</b></td>
    <td style="width:150 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Jenis</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white ; font-size:12px"><b>Kapasitas</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Kerja</b></td>
    <td style="width:120 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Tgl.Selesai</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-2</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Teknisi-3</b></td>
    <td style="width:100 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status Unit</b></td>
    <td style="width:200 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Keterangan Unit</b></td>
    <td style="width:70 ; text-align:center; background-color:darkblue ;color:white; ; font-size:12px"><b>Status</b></td>
  </tr>

 <tbody>

<?php

while ($baris = $mainlib->dbfetcharray($hasil))
{
  $vlokasi = $baris["lokasi"];
  $vtglselesai = date("d-m-Y H:i:s", strtotime($baris["tglselesai"]));
  $vtglkerja = date("d-m-Y H:i:s", strtotime($baris["tglkerja"]));
  $vgedung = $baris["gedung"];
  $vlantai = $baris["lantai"];
  $vbarang = $baris["barang"];
  $vjenis = $baris["jenis"];
  $vkapasitas = $baris["kapasitas"];
  $vgol = $baris["gol"];
  $vteknisi = $baris["teknisi"];
  $vteknisi2 = $baris["teknisi2"];
  $vteknisi3 = $baris["teknisi3"];
  $vstatusunit = $baris["statusunit"];
  $vketstatus = $baris["ketstatus"];
  $vstatus = $baris["status"];
  $no += 1;
 ?>

  <tr>
    <td style="text-align:center ; font-size:12px"><?php echo $no; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vgedung; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vlantai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vlokasi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vbarang; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vjenis; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vkapasitas; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglkerja; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vtglselesai; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi2; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vteknisi3; ?> </td>
    <td style="text-align:center ; font-size:12px"><?php echo $vstatusunit; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vketstatus; ?> </td>
    <td style="text-align:left ; font-size:12px"><?php echo $vstatus; ?> </td>
  </tr>

  <?php  
  }
  ?>
  
   <tr>
    <td width="20" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="150" align="left" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="120" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="100" align="center" bgcolor="lightblue">.</td>
    <td width="200" align="center" bgcolor="lightblue">.</td>
    <td width="70" align="center" bgcolor="lightblue">.</td>
  </tr>

</table>
<br />

<?php
  }
}
?>

</tbody>

<tr>
	<td class="tablecoltitle" colspan="2" style="color:white">

  	&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='lap_prev_ac_frame.php?pgret=1';">
<!-- 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Print  " class="button" onClick="window.location='lappending_prev_cetak.php?gedung=<?php echo $vgedung; ?>'">
-->
   </td>
</tr>
</table>
</html>

 <?php
 $mainlib->closedb();
 ?>
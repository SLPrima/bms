<?php
include("inc/class.mainlib.inc.php");
include("FPDI/fpdf.php");
include("FPDI/fpdi.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];


$vtgl11 = isset($_GET['tgl1']) ?  $_GET['tgl1'] : $_POST['txtTgl1']; 
$vtgl22 = isset($_GET['tgl2']) ?  $_GET['tgl2'] : $_POST['txtTgl2'];
$vdivisi = isset($_GET['divisi']) ?  $_GET['divisi'] : $_POST['txtDivisi'];
$vtgl1 = $mainlib->changedateformat($vtgl11, "d-m-y","y-m-d");
$vtgl2 = $mainlib->changedateformat($vtgl22, "d-m-y","y-m-d");

if (strlen($vdivisi) > 2)
{

  $sql = "SELECT * from register where tglreg between '".$vtgl1."' and '".$vtgl2."' and divisi = '".$vdivisi."' and status = 'B'  order by noreg";
  
} else {  

  $sql = "SELECT * from register where tglreg between '".$vtgl1."' and '".$vtgl2."' and status = 'B'  order by noreg";
  
}  

$rs = $mainlib->dbquery($sql, $mainlib->ocn);

if (!$rs)
 return FALSE;

 $pdf = new FPDF();
 $pdf->AddPage();
 $pdf->SetFont('Arial','B',11);
 
 $pdf->Image('images/logobca.jpg',10,6,30);
 $pdf->Cell(0,7,'' ,0,1);
 $pdf->SetFillColor(224, 235, 255);
 $pdf->SetTextColor(0);
 $pdf->SetDrawColor(110, 120, 140);
 $pdf->SetLineWidth(0.3);
 $pdf->SetFont('', 'B', 12);
 

 $pdf->Cell(0,5,'                                                               JOB PENDING',0,1);
 $pdf->Cell(0,5,'                                                               ____________',0,1);
 $pdf->SetTextColor(0);
 $pdf->Cell(0,5,'' ,0,1);
 $pdf->SetFont('Times','',12);
 $pdf->Cell(0,4,'' ,0,1); 
 $pdf->Cell(0,5,'Tgl.Register dari     : '.$vtgl11.' s/d '.$vtgl22,0,1);
 $pdf->Cell(0,5,'Divisi / Biro         : '.$vdivisi,0,1);
 $pdf->Cell(0,5,' ',0,2);
 $pdf->Cell(0,5,' ',0,2);
 $pdf->Cell(0,5,' ',0,2);
 $vno = 0;
 $vttl = 0;

      $pdf->SetFillColor(224, 235, 255);
      $pdf->SetTextColor(0);
      $pdf->Cell(10,6,'No.',1,0,'C');
      $pdf->Cell(20,6,'No.Register',1,0,'C');
      $pdf->Cell(25,6,'Tgl.Register',1,0,'C');
      $pdf->Cell(70,6,'Nama Pelapor',1,0,'C');
      $pdf->Cell(20,6,'Divisi/Biro',1,0,'C');
      $pdf->Cell(120,6,'Permintaan',1,0,'C');
      $pdf->Cell(10,6,'',0,1);
 
 	while ($row = $mainlib->dbfetcharray($rs))
	 {
       
	  $vno++;   
      $vtglreg = date("d-m-Y", strtotime($baris["tglreg"]));

      $pdf->Cell(10,6,$vno,1,0,'C');
      $pdf->Cell(20,6,$row['noreg'],1,0);
      $pdf->Cell(25,6,$vtglreg,1,0,'C');
      $pdf->Cell(70,6,$row['pelapor'],1,0,'C');
      $pdf->Cell(20,6,$row['divisi'],1,0,'C');
      $pdf->Cell(120,6,$row['permintaan'],1,0,'R');
      $pdf->Cell(10,6,'',0,1);
	 }

 $pdf->SetFont('Times','B',12);
 $pdf->Cell(0,5,' ',0,1);
 $pdf->Cell(0,5,'                                                                                                                                       Total Rp.           '.number_format($vttl,0),0,1);
 $pdf->SetFont('Times','',12);
 
 $pdf->Cell(0,5,' ',0,2);
 $pdf->Cell(0,5,' ',0,2);
 $pdf->Cell(0,5,' ',0,2);
 $pdf->Cell(0,5,' ',0,2);
 $pdf->Cell(0,5,' ',0,2);
 $pdf->Cell(0,5,' ',0,2);

 $vfile = "memo/jobpending.pdf";
 $pdf->Output($vfile,'F');

    $mainlib->closedb();
    $mainlib->redirect("lappendingview.php");


?>
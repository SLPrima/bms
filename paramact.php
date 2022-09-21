<?php
include("inc/class.mainlib.inc.php");

sessions();
$mainlib = new mainlib();
$mainlib->opendb();
date_default_timezone_set('Asia/Jakarta');
$userid = $_SESSION["userid"];
$vtglapv = date("y-m-d");
$vtahun = substr($vtgl_hrini,6,5);

if (isset($_POST['Simpan'])) 
 {
    $vnoreg = $_POST["txtNo"];
    $mainlib->dbquery("update Tblnomor set noreg = '".$vnoreg."' WHERE 1", $mainlib->ocn);

 }


    $mainlib->closedb();
    $mainlib->redirect("main.php?pgret=1");


?>
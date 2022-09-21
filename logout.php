<?php
include("inc/class.mainlib.inc.php");
sessions();
$mainlib = new mainlib();
$_SESSION["userid"] = '';
session_destroy();
header("Location: index.php");
?>
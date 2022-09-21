<?php
include("inc/class.mainlib.inc.php");
sessions();
sessionchk();
$username = (string) $_SESSION["username"];

include("toppanel.php");
?>


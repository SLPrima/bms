<?php
include("inc/class.mainlib.inc.php");
$backurl = trim($_REQUEST["url"]);
$msg = trim($_REQUEST["msg"]);
$textcolor = "red";
if(isset($_REQUEST["txclr"]))
{
	$textcolor = trim($_REQUEST["txclr"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?=APP_TITLE?></title>
</head>
<LINK rel="stylesheet" type="text/css" href="css/main.css">
<script language=JavaScript>
function backToPrevPage()
{
	<?php
	if($backurl==''){
	?>
	history.back();
	<?php
	}else{
	?>
	window.location='<?=$backurl?>';
	<?php
	}
	?>
	setTimeout('backToPrevPage()',10000);
}
</script>
<body>
<table width="100%" height="100%" cellpadding=0 cellspacing=0>
<tr>
	<td width="50%" align=center valign=middle>
		<table width="50%" class="tableborder" cellspacing="0">
		<tr>
			<td class="tablecoltitle">
				Message
			</td>
		</tr>
		<tr>
			<td class="tablecoldetail">
				<font size=2 color="<?=$textcolor?>">
					<b><?=$msg?></b>
				</font>
			</td>
		</tr>
		<tr>
			<td class="tablecoltitle" align="center">
				<input type="Button" class="button" value="Back" onClick="backToPrevPage();">
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</body>
</html>
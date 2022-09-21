<?php
include("phpqrcode/qrlib.php");

        $vkodetest = $_POST["txtLink"];         
		$vfilename = "memo/QR.png";
		$errorCorrectionLevel = 'L';
		$matrixPointSize = 2;
		QRcode::png($vkodetest, $vfilename, $errorCorrectionLevel, $matrixPointSize, 4); 
    
    // START TO DRAW THE IMAGE ON THE QR CODE
		$QR = imagecreatefrompng($vfilename);
		$logo1 = "logobca.png";
		$logo = imagecreatefromstring(file_get_contents($logo1));
		$QR_width = imagesx($QR);
		$QR_height = imagesy($QR);

		$logo_width = imagesx($logo);
		$logo_height = imagesy($logo);

		// Scale logo to fit in the QR Code
		$logo_qr_width = $QR_width/4;
		$scale = $logo_width/$logo_qr_width;
		$logo_qr_height = $logo_height/$scale;

		imagecopyresampled($QR, $logo, $QR_width/4, $QR_height/4, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

		imagepng($QR, $vfilename);
		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=Building_Management_System?></title>
</head>
<body onLoad="bodyOnload();" class="bodymargin">

<form name="frm" method="post" action="QRcode_capture_act.php" enctype="multipart/form-data" onSubmit="return validateForm();">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style = "background:darkblue; color:white">QR Code</td>
</tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0">

<tr>
    <td>.</td>
    <td>.</td>
</tr>   

<tr>
	<td class="tablecolcaption" width="15%"><?=$vkodetest; ?></td>
	<td class="tablecoldetail" height="23">
		<embed src="<?=$vfilename?>" width="200" height="200"> </embed>
	</td>
</tr>

</table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class="tablecoltitle" colspan="2" style="background:darkblue; color:white">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" value="  Back  " class="button" onClick="window.location='main.php?pgret=1';">
   </td>
</tr>
</table>
</form>
</body>
</html>

    
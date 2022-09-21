<?php
include("inc/class.mainlib.inc.php");
$mainlib = new mainlib();
$mainlib->opendb();
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=APP_TITLE?></title>
</head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<body onLoad="document.frm.txtUsername.focus();" LEFTMARGIN="0" RIGHTMARGIN="0" TOPMARGIN="50" BOTTOMMARGIN="0">
<form name="frm" method="post" action="loginact.php">
<input type="hidden" name="hidCompany" value="<?=$company_id?>" />
<table class="tableborder" cellpadding="0" cellspacing="0" border="0" width="200"  align="center">
<tr>
	<td>
		<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tr align="center">
			<td valign="top" background="blue"><img src="images/building_system.jpg" border="1"></td>
		</tr>
		</table>
		<table cellpadding="2" cellspacing="0" background="red" border="0" width="100%" class="login_controls">
		<tr><td height="10"></td></tr>
		<tr>
			<td width="100"></td>
			<td>User Id</td>
			<td><input type="text" style="padding-left:5px; font-weight:bold; width:100px" name="txtUserid"></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td></td>
			<td>Password</td>
			<td><input type="password" style="padding-left:5px; font-weight:bold; width:100px" name="txtPassword"></td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr><td height="5"></td></tr>
		<tr>
			<td colspan="4" align="center">
				<input type="submit" class="button" value="  Log in  " style="cursor:hand">&nbsp;
			</td>
		</tr>
		<tr><td height="6"></td></tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		</table>
	</td>
</tr>
</table>
</form>
</body>
</html>
<?php
$mainlib->closedb();
?>
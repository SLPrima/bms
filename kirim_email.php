<?php

	$headers = "From: Admin@slp.com (No-Reply)";

	$to = "kristian_tulus@yahoo.com";
	$subject = "Sending Emails From Admin";
	$message = "Sending emails from a Admin home server!";
	$message = $message."\n";
	$message = $message."\n";
	$message = $message."\n";
	$message = $message."\n";
	$message = $message."\n";
	$message = $message." Regards,";
	$message = $message."\n";
	$message = $message."\n";
	$message = $message." ( Administrator )";
	

	if ( mail($to, $subject, $message, $headers) )
		echo 'Success....';
	else
		echo 'UNSUCCESSFUL...';

?>
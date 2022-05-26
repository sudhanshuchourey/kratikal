<?php



$to=$row['EmailAddress'];

	$email_layout = "<div>" .$row['LoginID']. ",<br><br><p>Click this link to recover your password<br><a href='" . $rowsettings['url'] . "reset_password.php?name=" .$row['LoginID']. "'>" . $rowsettings['url'] . "reset_password.php?name=" .$row['LoginID']. "</a><br><br></p>Regards,<br> ".$rowsettings['ScriptName'].".</div>";

	$subject="Forgot Password Recovery for ".$rowsettings['ScriptName']." ";

	$description=$email_layout;

	$headers  = "MIME-Version: 1.0\r\n";

	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";



	$res=@mail($to,$subject,$description,$headers);

	$success_message = 'Please check your email to reset password!';

	





?>


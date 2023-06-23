<?php  
	$header = "Content-type: text/html; charset=utf-8";
	$subject = "the subject";
 
	$msg 	= "Form Contents: \n\n";
	foreach ($_POST as $key=>$val)
	{
		$msg .= "$key :  $val \n";
	}
 
	$from = "redviter69@gmail.com"; // Кому
	mail($from,$subject,$msg,$header);
	header("Location: $_SERVER[HTTP_REFERER]");
?>
<?php


function sms ($sender,$message)
{

		// Authorisation details.
		$uname = "YOUR TEXT LOCAL EMAIL ADDRESS";
		$hash = "YOUR TEXT LOCAL API HASH";

		// Configuration variables. Consult http://www.txtlocal.co.uk/developers/ for more info.
		$info = "1";
		$test = "0";

		// Data for text message. This is the text message data.
		$from = "SERVER"; // This is who the message appears to be from.
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data =
		"uname=".$uname."&hash=".$hash."&message=".$message."&from=".$from."&selectednums=".$sender."&info=".$info."&test=".$test;
		$ch = curl_init('http://www.txtlocal.com/sendsmspost.php');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);

}

function debug ($message)
{
			$fp = fopen("error.txt","a");
			fwrite($fp,$message);
			fclose($fp);
			}
	
			?>
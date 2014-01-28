<?php
// SMS Server Commands
// By Robert Wiggins
// For use with textlocal.com API
// Donate something via paypal txt3rob@gmail.com

// functions Include
include ('functions.php');

// Post Data
$sender2 = $_REQUEST["sender"];
$content2 = $_REQUEST["content"];

// configuration
$dbtype		= "mysql";
$dbhost 	= "localhost";
$dbname		= "commands";
$dbuser		= "MYUSERNAME";
$dbpass		= "MYPASS";
$smskey = "YOUR KEYWORD";  // NOTE YOU MUST ADD A SPACE FOR THIS TO WORK
$number = array ("Auth Number");  // ENTER THE MOBILE NUMBERS THAT YOU WISH TO ALLOW TO CONTROL TO PUT A COMMOR BETWEEN THE NUMBERS

// Errors
$notauth = "Sorry you are not authorised to do anything on this server.";
$notfound = "Command not found sorry try again.";

// database connection
$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// Convert 44 sender to 0
$ptn = "/^44/";  
$rpltxt = "0";
$sender = preg_replace($ptn, $rpltxt, $sender2);

// Remove keyword 
$content = str_replace($smskey, "", $content2);

// Not Authorised
if (in_array($sender, $number)) {
//Continue
} else {
sms ($sender,$notauth);
exit();
}

//DB look up for command
$check = $dbh->prepare('SELECT * FROM `commands` WHERE `keyword` = :content');
$check->bindParam(':content', $content);
$check->execute();
$count = $check->rowCount();

if ($count == "0"){
// Comment debut out if you have all commands working
debug ($content);
sms ($sender,$notfound);
} else {
// execute command
$result = $check->fetch(PDO::FETCH_ASSOC);

$message = "Your Command ".$result['keyword']." has been completed";
passthru ("".$result['command']."");

sms ($sender,$message);
}



?>

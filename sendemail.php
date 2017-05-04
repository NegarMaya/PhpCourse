<?php
if (isset($_POST["emailAddress"])) 
{
$email=(isset($_POST["emailAddress"])) ? $_POST["emailAddress"] : ""; 
$to = $email;
$subject = "Message from www.Negar.es Website";

$message = "$email Congragulation. You Subscribed successfully!";
$from = "info@negar.es";
$headers = "From: " .  $from;

mail($to,$subject,$message,$headers);
echo "You Subscribed successfully! :)";
}
else
{
echo "Please try again :("
}
?>
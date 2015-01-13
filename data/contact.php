<?php

 //Edited by Samar Dhwoj Acharya

// Process
$action = isset($_POST["action"]) ? $_POST["action"] : "";
if (empty($action)) {
	// Send back the contact form HTML
	$output = "<div style='display:none'>
	<div class='contact-top'></div>
	<div class='contact-content'>
		<h1 class='contact-title'>Leave a comment:</h1>
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		<form action='#' style='display:none'>
			<label for='contact-name'>*Name:</label>
			<input type='text' id='contact-name' class='contact-input' name='name' tabindex='1001' />
			<label for='contact-email'>*Email:</label>
			<input type='text' id='contact-email' class='contact-input' name='email' tabindex='1002' />";

	$output .= "
			<label for='contact-message'>*Message:</label>
			<textarea id='contact-message' class='contact-input' name='message' cols='40' rows='4' tabindex='1004'></textarea>
			<br/>";

	$output .= "
			<label>&nbsp;</label>
			<button type='submit' class='contact-send contact-button' tabindex='1006'>Send</button>
			<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>Cancel</button>
			<br/>
		</form>
	</div>
	<div class='contact-bottom'>Leaving a comment</div>
</div>";

	echo $output;
}
else if ($action == "send") {
	// Send the email
	$name = isset($_POST["name"]) ? $_POST["name"] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$message = isset($_POST["message"]) ? $_POST["message"] : "";

	// make sure the token matches
	smcf_send($name, $email, $message);
}

// Validate and send email
function smcf_send($name, $email, $message) {
	global $extra;

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "phpeis";
	if (!smcf_validate_email($email)) {
		echo "Invalid email";
		return;
	}
	
	$con = mysql_connect($host, $user, $pass) or die("Could not connect to db server");
	mysql_select_db($db, $con) or die("Could not select database");
	
	$name = mysql_real_escape_string($name, $con);
	$email = mysql_real_escape_string($email, $con);
	$message = mysql_real_escape_string($message, $con);
	$ip = mysql_real_escape_string($_SERVER["REMOTE_ADDR"], $con);

	$query = "INSERT INTO comment SET name = '$name', email = '$email', message = '$message', ip = '$ip'";
	$res = mysql_query($query, $con);
	if (mysql_affected_rows($con) == 1)
	{
		echo "Comment added";
	}
	else
	{
		echo "Unspecified error occurred";
	}
	mysql_close($con);
}

// Remove any un-safe values to prevent email injection
function smcf_filter($value) {
	return $value;
}

// Validate email address format in case client-side validation "fails"
function smcf_validate_email($email) {
	$at = strrpos($email, "@");

	// Make sure the at (@) sybmol exists and  
	// it is not the first or last character
	if ($at && ($at < 1 || ($at + 1) == strlen($email)))
		return false;

	// Make sure there aren't multiple periods together
	if (preg_match("/(\.{2,})/", $email))
		return false;

	// Break up the local and domain portions
	$local = substr($email, 0, $at);
	$domain = substr($email, $at + 1);


	// Check lengths
	$locLen = strlen($local);
	$domLen = strlen($domain);
	if ($locLen < 1 || $locLen > 64 || $domLen < 4 || $domLen > 255)
		return false;

	// Make sure local and domain don't start with or end with a period
	if (preg_match("/(^\.|\.$)/", $local) || preg_match("/(^\.|\.$)/", $domain))
		return false;

	// Check for quoted-string addresses
	// Since almost anything is allowed in a quoted-string address,
	// we're just going to let them go through
	if (!preg_match('/^"(.+)"$/', $local)) {
		// It's a dot-string address...check for valid characters
		if (!preg_match('/^[-a-zA-Z0-9!#$%*\/?|^{}`~&\'+=_\.]*$/', $local))
			return false;
	}

	// Make sure domain contains only valid characters and at least one period
	if (!preg_match("/^[-a-zA-Z0-9\.]*$/", $domain) || !strpos($domain, "."))
		return false;	

	return true;
}

exit;

?>

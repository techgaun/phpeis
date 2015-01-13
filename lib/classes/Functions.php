<?php

class Functions 
{
	public static function createActivateString($uname, $time)
	{
		//to do
		return md5($uname.$time.uniqid(rand()));
	}
	
	public static function checkEmail($email) 
	{
	  	if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
	  	{
	    	list($username,$domain)=split('@',$email);
	    	/*if(!checkdnsrr($domain,'MX')) 
	    	{
	      		return false;
	    	}*/
	    	return true;
	  	}
	  	return false;
	}
	
	public static function generatePassword($length = 8)
	{
		
    	$password = "";
    	$possible = "~`@!#$%^&_+-123456789abcdfghjkmnpqrtvwxyzABCDFGHJKLMNPQRTVWXYZ";
    	$maxlength = strlen($possible);
	    if ($length > $maxlength) 
	    {
	    	$length = $maxlength;
	    }
    	$i = 0; 
    
    	while ($i < $length) { 

      	// pick a random character from the possible ones
      	$char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      	// have we already used this character in $password?
      	if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        //and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;
	}
	
	public static function badword_censor($string)
	{
		$string = strtolower($string);
		$badwords = array("fuck","bitch","cunt","faggot", "dick","pussy", "lado", "puti", "randi", "motherfucker", "bhalu");
			// add as per your requirement
		foreach ($badwords as $word)
		{
			$string = str_replace($word,"*censored*",$string);
		}
		
		return $string;
	}
	
	function send_mail($to, $subject, $message, $reply_to_email = '', $reply_to_name = '')
	{	
		// Default sender/return address
		$from_name = $site_name;
		$from_email = $webmaster_email;
	
		// Do a little spring cleaning
		$to = preg_replace('#[\n\r]+#s', '', $to);
		$subject = preg_replace('#[\n\r]+#s', '', $subject);
		$from_email = preg_replace('#[\n\r:]+#s', '', $from_email);
		$from_name = preg_replace('#[\n\r:]+#s', '', str_replace('"', '', $from_name));
		$reply_to_email = preg_replace('#[\n\r:]+#s', '', $reply_to_email);
		$reply_to_name = preg_replace('#[\n\r:]+#s', '', str_replace('"', '', $reply_to_name));
	
		// Set up some headers to take advantage of UTF-8
		$from = "=?UTF-8?B?".base64_encode($from_name)."?=".' <'.$from_email.'>';
		$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
	
		$headers = 'From: '.$from."\r\n".'Date: '.gmdate('r')."\r\n".'MIME-Version: 1.0'."\r\n".'Content-transfer-encoding: 8bit'."\r\n".'Content-type: text/plain; charset=utf-8'."\r\n".'X-Mailer: FluxBB Mailer';
	
		// If we specified a reply-to email, we deal with it here
		if (!empty($reply_to_email))
		{
			$reply_to = "=?UTF-8?B?".base64_encode($reply_to_name)."?=".' <'.$reply_to_email.'>';
	
			$headers .= "\r\n".'Reply-To: '.$reply_to;
		}
	
		// Make sure all linebreaks are CRLF in message (and strip out any NULL bytes)
		$message = str_replace(array("\n", "\0"), array("\r\n", ''), pun_linebreaks($message));
	
		
		// Change the linebreaks used in the headers according to OS
		if (strtoupper(substr(PHP_OS, 0, 3)) == 'MAC')
			$headers = str_replace("\r\n", "\r", $headers);
		else if (strtoupper(substr(PHP_OS, 0, 3)) != 'WIN')
			$headers = str_replace("\r\n", "\n", $headers);

		mail($to, $subject, $message, $headers);
		
	}
	
	function upload_file($file)
	{
		/*//to be done later
		$uploaddir = '../downloads/'; # Outside of web root
		$uploadfile = tempnam($uploaddir, "upload_");
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
			$res = $db->query("INSERT INTO uploads SET name=?, original_name=?, mime_type=?",
		array(basename($uploadfile,	basename($_FILES['userfile']['name']), $_FILES['userfile']['type']));
		if(PEAR::isError($res))
		{
			unlink($uploadfile);
			die "Error saving data to the database. The file was not uploaded";
		}
		$id = $db->getOne('SELECT LAST_INSERT_ID() FROM uploads'); # MySQL specific
		echo "File is valid, and was successfully uploaded. You can view it <a
		href="view6.php?id=$id">here</a>n";
		} else {
		echo "File uploading failed.n";
		}
		*/
	}
	
	public static function getTableCounts($table, $where)
	{
		$con = new DBConnection();
		$query = "SELECT count(*) AS total FROM $table $where";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		$arr = $con->fetch_array();
		$val = $arr[0]['total'];
		return $val;
	}
}

?>
<?php

/** 
 * @author samar
 * 
 * 
 */
class Validator {
	//TODO - Insert your code here
	

	function __construct() {
	
		//TODO - Insert your code here
	}
	
	/**
	 * 
	 */
	function __destruct() {
	
		//TODO - Insert your code here
	}
	
	public static function cleanString($string, $type = 'string')
	{
		$string = trim($string);
		if ($type == 'int')
		{
			$string = (int) $string;
			return $string;
		}
		else if ($type == 'string')
		{
			$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
			$string = addslashes($string);
			$string = mysql_real_escape_string($string);
			return $string;
		}
	}
}

?>
<?php

/** 
 * @author samar
 * 
 * 
 */

@include_once($_SERVER['DOCUMENT_ROOT']."/config/includes.php");

class HeaderMenu {
	//TODO - Insert your code here
	

	function __construct()
	{
		//empty for now
	}
	
	function createMenu()
	{
		$dbcon = new DBConnection();
		$query = "SELECT * FROM categories ORDER BY disp_post ASC";
		$dbcon->setQuery($query);
		$res = $dbcon->fetch_array();
		
	}
}

?>

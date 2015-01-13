<?php

	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/User.class.php");
	@include_once("./lib/classes/Functions.php");
	
	if (isset($_GET['action']) && $_GET['action'] == "login" && isset($_POST['sbtLogin']))
	{
		$user = new User();
		$uname = $_POST['txtUname'];
		$pass = $_POST['txtPass'];
		if ($uname == "" || $pass == "")
		{
			return "Username and/or password field empty";
		}
		$status = $user->checkLogin($uname, $pass);
		if (is_bool($status))
		{
			echo "Invalid Login Details. Please check the username and password";
		}
	}
	
	if (isset($_GET['action']) && $_GET['action'] == "updateprofile" && isset($_POST['sbtUpdateProfile']))
	{
		$user = new User();
		$uid = $_SESSION['user_id'];
		$info = array();
		
		//todo finish this code section
	}
?>
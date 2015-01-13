<?php
	@include_once("../../lib/classes/Validator.php");
	@include_once("../../lib/classes/DBConnection.php");
	@include_once("../../lib/classes/User.class.php");
	
	if (isset($_GET['userlookup']))
	{
		$uname = $_GET['userlookup'];
		$user = new User();
		$status = $user->checkUser($uname);
		echo $status;
	}
	
	else if (isset($_GET['emaillookup']))
	{
		$email = $_GET['emaillookup'];
		$user = new User();
		$status = $user->checkEmail($email);
		echo $status;
	}
?>
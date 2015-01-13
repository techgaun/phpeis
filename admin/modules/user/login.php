<?php
	@include_once("../../lib/classes/Validator.php");
	@include_once("../../lib/classes/DBConnection.php");
	@include_once("../../lib/classes/User.class.php");
	$uname = $_POST['txtUname'];
	$pwd = $_POST['txtPass'];
	$user = new User();
	$status = $user->checkLogin($uname, $pwd);
	if (is_bool($status) || empty($status))
	{
		echo 1;
	}
	else 
	{
		@session_start();
		//print_r($status);
		$_SESSION['user_name'] = $status[0]['user_name'];
		$_SESSION['user_id'] = $status[0]['user_id'];
		$_SESSION['token'] = md5(uniqid(rand(), TRUE));
		$_SESSION['group_id'] = $status[0]['group_id'];
		$_SESSION['user_email'] = $status[0]['user_email'];
		$url = "index.php?token=".$_SESSION['token'];
		echo $url;
	}

?>
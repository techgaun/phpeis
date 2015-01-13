<?php
	@include_once("../../lib/classes/Validator.php");
	@include_once("../../lib/classes/DBConnection.php");
	@include_once("../../lib/classes/Functions.php");
	@include_once("../../lib/classes/Comment.class.php");
	
	if ($_POST['txtCmtUname'] == "" || $_POST['txtCmtEmail'] == "" || $_POST['txtComment'] == "" || $_POST['tut_id'] == "")
	{
		echo 0;
		return;
	}
	
	$cmt = new Comment();
	$ip = $_SERVER['REMOTE_ADDR'];
	$stat = $cmt->addComment($_POST['txtCmtUname'], $_POST['txtCmtEmail'], $_POST['txtComment'], $ip, $_POST['tut_id']);
	if ($stat > 0)
	{
		echo "2";
	}
	else 
	{
		echo "1";
	}
?>
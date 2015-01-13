<?php
	session_start();
	if (!isset($_SESSION['user_id']))
	{
		echo "2";
		return;
	}
	@include_once("../../lib/classes/Validator.php");
	@include_once("../../lib/classes/DBConnection.php");
	@include_once("../../lib/classes/Functions.php");
	@include_once("../../lib/classes/Thread.class.php");
	
	$poster = $_SESSION['user_name'];
	$poster_id = $_SESSION['user_id'];
	$message = $_POST['message'];
	$poster_ip = strip_tags($_SERVER['REMOTE_ADDR']);
	$topic_id = $_POST['topic_id'];
	if ($message == "")
	{
		echo "3";
		return;
	}
	
	if (!is_numeric($topic_id))
	{
		echo "3";
		return;
	}
	$thread = new Thread();
	$rows = $thread->createPost($message, $poster, $poster_id, $poster_ip, $topic_id);
	if ($rows > 0)
	{
		echo 1;
	}
	else
	{
		echo "0";
	}
?>
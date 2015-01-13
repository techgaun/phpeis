<?php
	session_start();
	if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1)
	{
		header("location: ../../login.php");
	}
	@include_once '../../../lib/classes/DBConnection.php';
	@include_once '../../../lib/classes/Validator.php';
	@include_once '../../../lib/classes/News.class.php';
	
	
	if (isset($_GET['news_id']))
	{
		$news_id = $_GET['news_id'];
		//echo $tut_id;
		if (!is_numeric($news_id))
		{
			echo "0";
			return;
		}
		$tut = new News();
		$status = $tut->removeNews($news_id);
		if ($status == false)
		{
			echo "1"; //no success
		}
		else
		{
			echo "2"; //success
		}
	}
?>
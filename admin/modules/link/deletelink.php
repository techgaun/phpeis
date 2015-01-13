<?php
	session_start();
	if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1)
	{
		header("location: ../../login.php");
	}
	@include_once '../../../lib/classes/DBConnection.php';
	@include_once '../../../lib/classes/Validator.php';
	@include_once '../../../lib/classes/Link.class.php';
	
	
	if (isset($_GET['link_id']))
	{
		$link_id = $_GET['link_id'];
		//echo $tut_id;
		if (!is_numeric($link_id))
		{
			echo "0";
			return;
		}
		$link = new Link();
		$status = $link->removeLink($link_id);
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
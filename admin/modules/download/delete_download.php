<?php
	session_start();
	if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1)
	{
		header("location: ../../login.php");
	}
	@include_once '../../../lib/classes/DBConnection.php';
	@include_once '../../../lib/classes/Validator.php';
	@include_once '../../../lib/classes/Download.class.php';
	
	
	if (isset($_GET['dl_id']))
	{
		$del_id = $_GET['dl_id'];
		//echo $tut_id;
		if (!is_numeric($del_id))
		{
			echo "0";
			return;
		}
		$dl = new Download();
		$status = $dl->removeDownload($del_id);
		if ($status == false)
		{
			echo "1"; //no success
		}
		else
		{
			echo "2"; //success
		}
	}

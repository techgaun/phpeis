<?php
	session_start();
	if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1)
	{
		header("location: ../../login.php");
	}
	@include_once '../../../lib/classes/DBConnection.php';
	@include_once '../../../lib/classes/Validator.php';
	@include_once '../../../lib/classes/Tutorial.class.php';
	
	
	if (isset($_GET['tut_id']))
	{
		$tut_id = $_GET['tut_id'];
		//echo $tut_id;
		if (!is_numeric($tut_id))
		{
			echo "0";
			return;
		}
		$tut = new Tutorial();
		$status = $tut->removeTutorial($tut_id);
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
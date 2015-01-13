<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once '../../../lib/classes/DBConnection.php';
	@include_once '../../../lib/classes/Validator.php';
	@include_once '../../../lib/classes/Link.class.php';
	if (isset($_POST['sbtCreate']) && isset($_SESSION['user_name']))
		{
			$url = $_POST['txtUrl'];
			$title = $_POST['txtTitle'];
			$desc = $_POST['txtDesc'];
			
			$error = array();
			$valid = true;
			
			if ($url == "")
			{
				array_push($error, "URL of link is missing");
				$valid = false;
			}
			
			if ($title == "")
			{
				array_push($error, "Title of link is missing");
				$valid = false;
			}
			
			if ($desc == "")
			{
				array_push($error, "Description is missing");
				$valid = false;
			}
			if ($valid == true)
			{
				$link = new Link();
				$add = $link->addLink($url, $title, $desc);
				if ($add == false)
				{
					echo "Unknown error has occurred while posting link";
				}
				else
				{
					header("location: index.php?module=link&action=viewall");
				}
			}
			else 
			{
				echo "<div style=\"color: #f00\">";
				foreach ($error as $err)
				{
					echo $err."<br />";
				}
				echo "</div>";
			}
		}
?>
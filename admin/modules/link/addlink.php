<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once './../lib/classes/DBConnection.php';
	@include_once './../lib/classes/Validator.php';
	@include_once './../lib/classes/Link.class.php';
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
				$add = $link->addLink("http://".$url, $title, $desc);
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

<form method="post" action="">
	<div id="titlebox">
		Link URL: http://<input type="text" width="100px" name="txtUrl" id="txtUrl" style="margin-left: 20px; width: 422px;" />
	</div>
	
	<div id="tutdesc" style="margin-left: 3px;">
		Link Title: <input type="text" width="120px" name="txtTitle" id="txtTitle" style="margin-left: 20px;" />
	</div>
	
	<div id="titlebox">
		Link Desc: <input type="text" width="120px" name="txtDesc" id="txtDesc" style="margin-left: 20px;" />
		<div style="clear: both"></div>
	</div>
	
	<div id="createthread">
		<input type="submit" name="sbtCreate" id="sbtCreate" value="Add Link" class="button" />
	</div>
</form>

<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once './../lib/classes/DBConnection.php';
	@include_once './../lib/classes/Validator.php';
	@include_once './../lib/classes/Tutorial.class.php';
	if (isset($_POST['sbtCreate']) && isset($_SESSION['user_name']))
		{
			$title = $_POST['txtTitle'];
			$desc = $_POST['txtDesc'];
			$body = $_POST['txtBody'];
			$user = $_SESSION['user_name'];
			$error = array();
			$valid = true;
			
			if ($title == "")
			{
				array_push($error, "Title of tutorial is missing");
				$valid = false;
			}
			
			if ($body == "")
			{
				array_push($error, "Body of tutorial is missing");
				$valid = false;
			}
			if ($valid == true)
			{
				$tut = new Tutorial();
				$add = $tut->addTutorial($title, $desc, $body, $user);
				if ($add == false)
				{
					echo "Unknown error has occurred while adding tutorial";
				}
				else
				{
					header("location: index.php?module=tutorial&action=viewall");
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
		Title of tutorial: <input type="text" width="120px" name="txtTitle" id="txtTitle" style="margin-left: 20px;" />
	</div>
	<div id="tutdesc">
		Tut Description: <input type="text" width="120px" name="txtDesc" id="txtDesc" style="margin-left: 20px;" />
	</div>
	<div id="postbody">
		<div style="float: left; margin-left: 4px;">Tutorial content: </div><textarea rows="15" cols="70" name="txtBody" id="txtBody"></textarea>
		<div style="clear: both"></div>
	</div>
	
	<div id="createthread">
		<input type="submit" name="sbtCreate" id="sbtCreate" value="Add Tutorial" class="button" />
	</div>
</form>
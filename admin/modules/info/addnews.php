<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once './../lib/classes/DBConnection.php';
	@include_once './../lib/classes/Validator.php';
	@include_once './../lib/classes/News.class.php';
	if (isset($_POST['sbtCreate']))
		{
			$title = $_POST['txtTitle'];
			$body = $_POST['txtBody'];
			$user = $_SESSION['user_name'];
			$error = array();
			$valid = true;
			
			if ($title == "")
			{
				array_push($error, "Title of news is missing");
				$valid = false;
			}
			
			if ($body == "")
			{
				array_push($error, "Body of news is missing");
				$valid = false;
			}
			if ($valid == true)
			{
				$tut = new News();
				$add = $tut->addNews($title, $body);
				if ($add == false)
				{
					echo "Unknown error has occurred while posting news";
				}
				else
				{
					header("location: index.php?module=info&action=news");
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
		Title of News: <input type="text" width="120px" name="txtTitle" id="txtTitle" style="margin-left: 20px;" />
	</div>
	
	<div id="postbody">
		<div style="float: left; margin-left: 4px;">News Content: </div><textarea rows="15" cols="70" name="txtBody" id="txtBody" style="margin-right: 17px;"></textarea>
		<div style="clear: both"></div>
	</div>
	
	<div id="createthread">
		<input type="submit" name="sbtCreate" id="sbtCreate" value="Add News" class="button" />
	</div>
</form>
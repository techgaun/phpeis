<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once './../lib/classes/DBConnection.php';
	@include_once './../lib/classes/Validator.php';
	@include_once './../lib/classes/News.class.php';
	
	if (!isset($_GET['news_id']))
	{
		echo "Invalid News ID";
	}
	else 
	{
		if (isset($_POST['sbtEdit']))
		{
			$title = $_POST['txtTitle'];
			$body = $_POST['txtBody'];
			
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
				$news = new News();
				$add = $news->editNews($_GET['news_id'], $title, $body);
				if ($add == false)
				{
					echo "Unknown error has occurred while updating news";
				}
				else
				{
					header("location: index.php?module=info&action=editnews&news_id=".$_GET['news_id']."&update=success");
				}
			}
			else 
			{
				echo "<div style=\"color: #f00\">";
					if(isset($_GET['update']))
					{
						echo "News updated successfully";
					}
				foreach ($error as $err)
				{
					echo $err."<br />";
				}
				echo "</div>";
			}
		}
		
		$newsview = new News();
		$n = $newsview->viewNews($_GET['news_id']);
?>

<form method="post" action="">
	<div id="titlebox">
		Title of News: <input type="text" width="120px" name="txtTitle" id="txtTitle" value="<?php echo $n[0]['news_title']; ?>" style="margin-left: 20px;" />
	</div>
	
	<div id="postbody">
		<div style="float: left; margin-left: 4px;">News Content: </div><textarea rows="15" cols="70" name="txtBody" id="txtBody" style="margin-right: 17px;"><?php echo $n[0]['news_body']; ?></textarea>
		<div style="clear: both"></div>
	</div>
	
	<div id="createthread">
		<input type="submit" name="sbtCreate" id="sbtEdit" value="Update News" class="button" />
	</div>
</form>
<?php } ?>
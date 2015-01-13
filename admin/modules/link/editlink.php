<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once './../lib/classes/DBConnection.php';
	@include_once './../lib/classes/Validator.php';
	@include_once './../lib/classes/Link.class.php';
	if (!isset($_GET['link_id']))
	{
		echo "Invalid link ID";
	}
	else 
	{
		if (isset($_POST['sbtEdit']))
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
				$add = $link->editLink($_GET['link_id'], "http://".$url, $title, $desc);
				if ($add == false)
				{
					echo "Unknown error has occurred while updating link";
				}
				else
				{
					header("location: index.php?module=link&action=editlink&link_id=".$_GET['link_id']."&update=success");
				}
			}
			else 
			{
				echo "<div style=\"color: #f00\">";
				if(isset($_GET['update']))
					{
						echo "Link updated successfully";
					}
				foreach ($error as $err)
				{
					echo $err."<br />";
				}
				echo "</div>";
			}
		}
		$linkview = new Link();
		$l = $linkview->getLinkById($_GET['link_id']);
?>

<form method="post" action="">
	<div id="titlebox">
		Link URL: http://<input type="text" width="100px" name="txtUrl" id="txtUrl" value="<?php echo substr($l[0]['link_url'], 7); ?>" style="margin-left: 20px; width: 422px;" />
	</div>
	
	<div id="tutdesc" style="margin-left: 3px;">
		Link Title: <input type="text" width="120px" name="txtTitle" id="txtTitle" value="<?php echo $l[0]['link_title']; ?>" style="margin-left: 20px;" />
	</div>
	
	<div id="titlebox">
		Link Desc: <input type="text" width="120px" name="txtDesc" id="txtDesc" value="<?php echo $l[0]['link_desc']; ?>" style="margin-left: 20px;" />
		<div style="clear: both"></div>
	</div>
	
	<div id="createthread">
		<input type="submit" name="sbtEdit" id="sbtCreate" value="Update Link" class="button" />
	</div>
</form>
<?php 
	}
?>

<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once './../lib/classes/DBConnection.php';
	@include_once './../lib/classes/Validator.php';
	@include_once './../lib/classes/Download.class.php';
	if (isset($_POST['sbtCreate']))
		{
			$title = $_POST['txtTitle'];
			$desc = $_POST['txtDesc'];
			
			$error = array();
			$valid = true;
			
			
			if ($title == "")
			{
				array_push($error, "Title of Download is missing");
				$valid = false;
			}
			
			if ($desc == "")
			{
				array_push($error, "Description is missing");
				$valid = false;
			}
			
			if ($valid == true)
			{
				$uploaddir = '../downloads/';
				//$uploadfile = tempnam($uploaddir, "upload_");
				$fname = $_FILES['file']['name'];
				$ext_arr = explode(".",$fname); 
				//print_r($ext_arr);
				$ext = strtolower(array_pop($ext_arr));
				
				$filesize = $_FILES['file']['size'];
				
				if ($filesize > 0 && ($ext == "jpg" || $ext == "gif" || $ext == "zip" || $ext == "rar" || $ext == "tar"))
				{
					if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir."phpeis_".$fname))
					{
						$dl = new Download();
						$status = $dl->addDownload($title, $desc, $_SESSION['user_name'], "phpeis_".$fname);
						
						if ($status == false)
						{
							echo "Unknown error has occurred while uploading";
							unlink($uploaddir."phpeis_".$fname);
						}
						else
						{
							header("location: index.php?module=download&action=viewall");
						}
					}
					else 
					{
						array_push($error, "Write Permission issue while uploading.");
						$valid = false;
					}
				}
				
			}
			
			if (!empty($error))
			{
				echo "<div style=\"color: #f00; margin-bottom: 8px;\">";
				foreach ($error as $err)
				{
					echo $err."<br />";
				}
				echo "</div>";
			}
		}
?>

<form method="post" action="" enctype="multipart/form-data">
	<div id="titlebox" style="margin-bottom: 12px;">
		Download Title: <input type="text" width="120px" name="txtTitle" id="txtTitle" style="margin-left: 20px; width: 422px;" />
	</div>
	
	<div id="tutdesc" style="margin-left: 3px; margin-bottom: 12px;">
		Download Desc: <input type="text" width="120px" name="txtDesc" id="txtDesc" style="margin-left: 18px; width: 422px;" />
	</div>
	
	<div id="titlebox" style="margin-left: 3px; margin-bottom: 12px;">
		Upload File: <input type="file" width="120px" name="file" id="file" style="margin-left: 46px; width: 422px;" />
	</div>
	
	<div id="createthread">
		<input type="submit" name="sbtCreate" id="sbtCreate" value="Add Download" class="button" />
	</div>
</form>
<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("../lib/classes/Validator.php");
	@include_once("../lib/classes/DBConnection.php");
	@include_once("../lib/classes/Download.class.php");
	
	$dl = new Download();
	$arr = $dl->ListDownloads();
	if (is_bool($arr) || empty($arr))
	{
		echo "No downloads yet";
		return;
	}
	?>
	<div id="dlheader">
			All the downloads currently available in the system.
	</div>
	
	<a href="index.php?module=download&action=adddownload">
	<div class="button" style="clear: both; float: left; margin-bottom: 15px;">
		Add Download
	</div>
	</a>
	
	<div id="tutorial_list" style="clear: both; ">
	<div id="delete_file" style="display:none; color: #f00;"></div>
	<?php
	foreach ($arr as $dlfile)
	{
	
	?>
		
		<div class="tut_title">
			<?php
				echo "<a href=\"../index.php?module=download&action=view&download_id=$dlfile[download_id]\" title=\"$dlfile[download_desc]\">$dlfile[download_title]</a>(By $dlfile[uploaded_by])";
			?>
			<div class="deleteimage" style="float: right; magin-bottom: -10px;">
				<a href="#" onclick="ajaxHandler('download/delete_download.php?dl_id=<?php echo $dlfile['download_id']; ?>', 'delete_file');"><img alt="Delete" src="./images/cross.jpg" width="24" height="24" style="outline: none;" /></a>
			</div>
		</div>
		
		<div class="tut_desc">
			<?php
				echo stripslashes(substr($dlfile[download_desc], 0, 200));
			?>
		</div>
	<?php
	}
?>
</div>
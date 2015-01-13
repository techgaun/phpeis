<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/Download.class.php");
	
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
	<?php
	foreach ($arr as $dlfile)
	{
	
	?>
		
		<div class="tut_title">
			<?php
				echo "<a href=\"index.php?module=download&action=view&download_id=$dlfile[download_id]\" title=\"$dlfile[download_desc]\">$dlfile[download_title]</a>(By $dlfile[uploaded_by])";
			?>
		</div>
		
		<div class="tut_desc">
			<?php
				echo $dlfile[download_desc];
			?>
		</div>
	<?php
	}
?>
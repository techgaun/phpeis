<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/Tutorial.class.php");
	@include_once("./lib/classes/Comment.class.php");
	
	$tut = new Tutorial();
	$arr = $tut->ListRecentTutorials(10);
	if (is_bool($arr) || empty($arr))
	{
		echo "No tutorials yet";
		return;
	}
	foreach ($arr as $tut)
	{
	
	?>
		<div class="tut_title">
			<?php
				echo "<a href=\"index.php?module=tutorial&action=view&tut_id=$tut[tut_id]\" title=\"$tut[tut_desc]\">$tut[tut_title]</a>(By $tut[uploaded_by])";
			?>
		</div>
		
		<div class="tut_desc">
			<?php
				echo $tut[tut_desc];
			?>
		</div>
	<?php
	}
?>
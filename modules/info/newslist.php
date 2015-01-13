<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/News.class.php");
	
	$news = new News();
	$arr = $news->ListNews();
	if (is_bool($arr) || empty($arr))
	{
		echo "No news yet";
		return;
	}
	?>
	<div id="dlheader">
			Recent news and happenings are listed below:
	</div>
	<?php
	foreach ($arr as $news)
	{
	
	?>
		<div class="tut_title">
			<?php
				echo "<a href=\"index.php?module=info&action=newsdetail&news_id=$news[news_id]\" title=\"$news[news_title]\">$news[news_title]</a>";
			?>
		</div>
		
		<div class="tut_desc">
			<?php
				echo $news[news_body];
			?>
		</div>
	<?php
	}
?>
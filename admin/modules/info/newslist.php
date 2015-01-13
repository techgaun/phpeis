<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("../lib/classes/Validator.php");
	@include_once("../lib/classes/DBConnection.php");
	@include_once("../lib/classes/News.class.php");
	
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
	<a href="index.php?module=info&action=addnews">
	<div class="button" style="clear: both; float: left; margin-bottom: 15px;">
		Add News
	</div>
	</a>
	<div id="delete_news" style="display:none; color: #f00;"></div>
	<div id="tutorial_list" style="clear: both; ">
	<?php
	foreach ($arr as $news)
	{
	
	?>
		<div class="tut_title">
			<?php
				echo "<a href=\"index.php?module=info&action=editnews&news_id=$news[news_id]\" title=\"$news[news_title]\">$news[news_title]</a>";
			?>
		</div>
		
		<div class="deleteimage" style="float: right;">
				<a href="#" onclick="ajaxHandler('info/deletenews.php?news_id=<?php echo $news['news_id']; ?>', 'delete_news');"><img alt="Delete" src="./images/cross.jpg" width="24" height="24" style="outline: none;" /></a>
		</div>
		
		<div class="tut_desc" style="width: 560px;">
			<?php
				echo substr($news[news_body], 0, 200);
			?>
		</div>
	<?php
	}
?>
</div>
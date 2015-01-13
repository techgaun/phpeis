<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/News.class.php");

	$news = new News();
	$arr = $news->ListRecentNews(4);
	if (is_bool($arr) || empty($arr))
	{
		echo "We do not have any news or announcements right now. Be sure to regularly check us";
		return;
	}
	//print_r($arr);
	foreach ($arr as $news)
	{
?>
			<div class="newstitle">
				<span class="title"><?php echo $news['news_title']; ?></span>
				<span class="author">Date - <?php echo $news['date'];?></span>
			</div>
			
			<div class="newsbody">
				<div style=""><?php echo substr($news['news_body'], 0, 200); ?>
				</div>
				<div style="float: right">
					<a href="index.php?module=info&action=newsdetail&news_id=<?php echo $news['news_id']; ?>">Read more...</a>
				</div>
				<br />
			</div>
<?php
	}
?>
<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/News.class.php");
	
	if (isset($_GET['news_id']))
	{
		$news = new News();
		$news_id = is_numeric($_GET['news_id'])?$_GET['news_id']:1;
		$arr = $news->viewNews($news_id);
		if (is_bool($arr) || empty($arr))
		{
			echo "Invalid news ID selected";
			return;
		}
		//print_r($arr);
	?>
		<div id="tutbox">
			<div id="tut_title">
				<span class="title"><?php echo $arr[0]['news_title']; ?></span>
				<span class="author">Date - <?php echo $arr[0]['date'];?></span>
			</div>
			
			<div id="tut_body">
				<div style=""><?php echo $arr[0]['news_body']; ?></div>
				<br />
			</div>
		</div>	
	<?php
	}
?>
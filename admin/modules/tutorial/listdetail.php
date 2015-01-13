<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("../lib/classes/Validator.php");
	@include_once("../lib/classes/DBConnection.php");
	@include_once("../lib/classes/Tutorial.class.php");
	@include_once("../lib/classes/Comment.class.php");
?>
<a href="index.php?module=tutorial&action=addtut">
<div class="button" style="clear: both; float: left; margin-bottom: 15px;">
	Add Tutorial
</div>
</a>
<div id="tutorial_list" style="clear: both; ">	
<?php	
	
	$tut = new Tutorial();
	$arr = $tut->ListRecentTutorials(10);
	if (is_bool($arr) || empty($arr))
	{
		echo "No tutorials yet";
		return;
	}
?>
	<div id="delete" style="display:none; color: #f00;"></div>
<?php
	foreach ($arr as $tut)
	{
	
	?>
		<div class="tut_title">
			<div style="float: left">
				<?php
					echo "<a href=\"index.php?module=tutorial&action=edittut&tut_id=$tut[tut_id]\" title=\"$tut[tut_desc]\">$tut[tut_title]</a>(By $tut[uploaded_by])";
				?>
			</div>
			<div class="deleteimage" style="float: right;">
				<a href="#" onclick="ajaxHandler('tutorial/deletetutorial.php?tut_id=<?php echo $tut['tut_id']; ?>', 'delete');"><img alt="Delete" src="./images/cross.jpg" width="24" height="24" style="outline: none;" /></a>
			</div>
			<div style="clear: both"></div>
		</div>
		
		<div class="tut_desc">
			<?php
				echo $tut['tut_desc'];
			?>
		</div>
	<?php
	}
?>
</div>
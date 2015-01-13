<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("../lib/classes/Validator.php");
	@include_once("../lib/classes/DBConnection.php");
	@include_once("../lib/classes/Link.class.php");
	
	$link = new Link();
	$arr = $link->getAllLinks();
	if (is_bool($arr) || empty($arr))
	{
		echo "No useful links yet";
		return;
	}
	?>
	<div id="dlheader">
			Following links are available in the system.
	</div>
	<a href="index.php?module=link&action=addlink">
	<div class="button" style="clear: both; float: left; margin-bottom: 15px;">
		Add Link
	</div>
	</a>
	<div id="tutorial_list" style="clear: both; ">
	<div id="delete_link" style="display:none; color: #f00;"></div>
	<?php
	foreach ($arr as $lnk)
	{
	
	?>
		<div class="tut_title">
			<?php
				echo "<a href=\"index.php?module=link&action=editlink&link_id=$lnk[link_id]\" title=\"$lnk[link_desc]\">$lnk[link_title]</a>";
			?>
			<div class="deleteimage" style="float: right; magin-bottom: -10px;">
				<a href="#" onclick="ajaxHandler('link/deletelink.php?link_id=<?php echo $lnk['link_id']; ?>', 'delete_link');"><img alt="Delete" src="./images/cross.jpg" width="24" height="24" style="outline: none;" /></a>
			</div>
		</div>
		
		
		
		<div class="tut_desc">
			<?php
				echo $lnk[link_desc];
			?>
		</div>
	<?php
	}
?>
</div>
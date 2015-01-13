<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/Link.class.php");
	
	$link = new Link();
	$arr = $link->getAllLinks();
	if (is_bool($arr) || empty($arr))
	{
		echo "No useful links yet";
		return;
	}
	?>
	<div id="dlheader">
			Following links might be helpful for the students.
	</div>
	<?php
	foreach ($arr as $lnk)
	{
	
	?>
		<div class="tut_title">
			<?php
				echo "<a href=\"$lnk[link_url]\" title=\"$lnk[link_desc]\" target=\"_blank\">$lnk[link_title]</a>";
			?>
		</div>
		
		<div class="tut_desc">
			<?php
				echo $lnk[link_desc];
			?>
		</div>
	<?php
	}
?>
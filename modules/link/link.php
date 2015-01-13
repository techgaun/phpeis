<?php
	if (!isset($_GET['link_id']))
	{
		@include_once("./lib/classes/DBConnection.php");
		@include_once("./lib/classes/Link.class.php");
		$link = new Link();
		$arr = $link->getAllLinks();
		if (is_bool($arr) || empty($arr))
		{
			echo "No links yet";
			return;
		}
		foreach ($arr as $link)
		{
			echo "<li><a href=\"$link[link_url]\" title=\"$link[link_desc]\" target=\"_blank\">$link[link_title]</a></li>";
		}
	}
	
	else
	{
		@include("../../lib/classes/DBConnection.php");
		@include("../../lib/classes/Link.class.php");
	}
?>
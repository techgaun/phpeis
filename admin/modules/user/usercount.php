<?php
	@include_once("../lib/classes/User.class.php");
	$user = new User();
	$cnt = $user->getTotalCount();
	//print_r($cnt);
	echo $cnt[0]['total'];
?>
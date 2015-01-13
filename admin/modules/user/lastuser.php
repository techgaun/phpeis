<?php
	//gives username of the last registered user
	@include_once("../lib/classes/User.class.php");
	$user = new User();
	$cnt = $user->getLastUser();

	echo $cnt[0]['user_name'];
?>
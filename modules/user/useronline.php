<?php
	@include_once './lib/classes/UsersOnline.class.php';
	$online = new UsersOnline();
	$uid = 0;
	$users = 0;
	if (isset($_SESSION['user_id']))
	{
		$uid = $_SESSION['user_id'];
	}
	
	$users = $online->userOnline($uid);
	if ($users == 0)
	{
		echo "No Users Online";
	}
	else 
	{
		echo "Users online: ";
		foreach ($users as $user)
		{
?>
	<a href="#" onclick="startChat(<?php echo $user['user_id']; ?>)"><?php echo $user['user_name']; ?></a>
<?php
		}
	}
?>
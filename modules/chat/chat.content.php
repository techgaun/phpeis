<?php
	session_start();
	if (!isset($_SESSION['user_name']))
	{
		echo "You do not seem to be logged in. Please login to use this feature.";
		return;
	}
	@include '../../lib/classes/Chat.class.php';
	
	$obj = new Chat();
	if(isset($_GET['message']))
	{
	  	if(trim($_GET['message']) != "")
	  	{
		    $message = trim($_GET['message']);  
		    $user    = trim($_SESSION['user_name']);  
			$obj->addMessage($user, $message);
	  	}
	}
	$arr_n = $obj->selectChat();
	$arr = array();
	if ($arr_n == false)
	{
		array_push($arr, "No chat logs yet");
	}
	else 
	{
		$arr = $arr_n;
	}
//print_r($arr);	
?>
<?php
	foreach ($arr as $chat)
	{ 
		if($chat['username'] == $_SESSION['user_name'])
		{
			$user_bg = '#2C50A2';
		}
	  	else
	  	{
	  		$user_bg = '#FF3333'; 
	  	}
?>
    <div style="color:<?php echo $user_bg; ?>"><?php echo "<strong>" . $chat['username'] . " says:</strong> " . date('g:i:s a', strtotime($chat['posted'])); ?></div>
    <div style="padding-left:5px; padding-bottom:15px;"><?php echo $chat['message']; ?></div>
<?php
	}
?>

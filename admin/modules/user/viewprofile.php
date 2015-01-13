<?php
	if (!isset($_SESSION['user_name']))
	{
		header("location: index.php");
	}
	@include_once("./lib/classes/User.class.php");
	if (isset($_GET['action']) && $_GET['action'] == "viewprofile")
	{
		$user = new User();
		$uid = $_SESSION['user_id'];
		$arr = $user->selectUserById($uid);
		//print_r($arr);
	}
?>

<div id="dlheader">
	You are currently viewing your profile. To edit the profile, <a href="index.php?module=user&action=editprofile" title="Edit your profile">click here</a>.
</div>

<div class="tut_title">
	You're registered your account with the email address <?php echo $arr[0]['user_email']; ?>
</div>
		
<div id="dlheader" style="margin-top: 10px;">
	Information regarding your account:
</div>
<div class="tut_desc" style="line-height: 20px;">
	MSN: <?php echo (strlen($arr[0]['user_msn']) > 1)?$arr[0]['user_msn']:"Not provided"; ?>
	<br />
	Yahoo: <?php echo (strlen($arr[0]['user_yahoo']) > 1)?$arr[0]['user_yahoo']:"Not provided"; ?>
	<br />
	Gtalk!: <?php echo (strlen($arr[0]['user_gtalk']) > 1)?$arr[0]['user_gtalk']:"Not provided"; ?>
	<br />
	Country: <?php echo (strlen($arr[0]['user_country']) > 1)?$arr[0]['user_country']:"Not provided"; ?>
	<br />
	Yahoo: <?php echo (strlen($arr[0]['user_phone']) > 1)?$arr[0]['user_phone']:"Not provided"; ?>
	
	<br />
	<?php echo (($arr[0]['group_id']) == 3)?"You'are normal  member of the site.":"Not provided"; ?>
	<br />
	Your signature: <?php echo (strlen($arr[0]['sig']) > 1)?$arr[0]['sig']:"Not provided"; ?>
</div>
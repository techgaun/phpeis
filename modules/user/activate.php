<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include("./lib/classes/User.class.php");
?>

<div id="lostpassform">
	<?php
		if (isset($_GET['code']))
		{
			$input = $_POST['code'];
			$user = new User();
			$column = "";
			$valid = false;
			
			if ($user->checkUser($input) == 1)
			{
				$column = "user_name";
				$valid = true;
			}
			else if ($user->checkEmail($input) == 1)
			{
				$column = "user_email";
				$valid = true;
			}
			if ($valid == true)
			{
				$status = $user->resetPassword($column, $input);
			}
		}
	?>
	<?php
		if (isset($status) && $status == 1)
		{
	?>
		An e-mail has been dispatched to your email address. Please check your e-mail inbox to find your newly generated password. We recommend you to change the password as soon as you login to the system.
	<?php		
		}
		else
		{
	?>
	<div id="forgotinfo">
		If you have forgot your username or password, you can use the form below to reset your password. Please enter your username or email address and check your email inbox with which you registered to the site.
		<?php
			if (isset($valid) && $valid == false)
			{
				echo "<div style='margin-top: 5px; color: #f00'>Username or email address does not exist in the database.</div>";
			}
		?>
	</div>
	<?php
		}
	?>
</div>
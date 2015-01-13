<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/User.class.php");
	@include_once("./lib/classes/Functions.php");
	if (isset($_POST['sbtRegister']) && ($_POST['sbtRegister'] == "Register"))
	{
		$user = new User();
		$uname = $_POST['txtRegUname'];
		$pwd = $_POST['txtRegPwd'];
		$pwd2 = $_POST['txtRegPwd2'];
		$email = $_POST['txtEmail'];
		$phone = $_POST['txtPhone'];
		$msn = $_POST['txtMsn'];
		$yahoo = $_POST['txtYahoo'];
		$gtalk = $_POST['txtGtalk'];
		$country = $_POST['selCountry'];
		$style = $_POST['selStyle'];
		$error = array();
		$valid = true;
		if (!isset($uname) || $uname == "")
		{
			array_push($error, "Username can not be empty or contains invalid characters");
			$valid = false;
		}
		
		if (!isset($pwd) || $pwd == "")
		{
			array_push($error, "Password is empty");
			$valid = false;
		}
		
		if (!isset($pwd2) || ($pwd != $pwd2))
		{
			array_push($error, "Passwords do not match");
			$valid = false;
		}
		
		if (!isset($email) || $email == "")
		{
			array_push($error, "Please specify the email address");
			$valid = false;
		}
		
		else if (Functions::checkEmail($email) == false)
		{
			array_push($error, "Invalid email address. Check if the domain exists.");
			$valid = false;
		}
		
		if ($valid == false)
		{
			echo "<span id='regerror'>Following errors were encountered while registering. Please correct them.</span>";
			foreach ($error as $err)
			{
				echo "<br /><span class='regerror'>".$err."</span>";
			}
		}
		else
		{
			$phone = isset($phone)?$phone:NULL;
			$msn = isset($msn)?$msn:NULL;
			$yahoo = isset($yahoo)?$yahoo:NULL;
			$gtalk = isset($gtalk)?$gtalk:NULL;
			$country = isset($country)?$country:NULL;
			$style = isset($style)?$style:"default";
			
			$ret = $user->addUser($uname, $pwd, $email, $phone, $msn, $yahoo, $gtalk, $country, $style);
			if (is_bool($ret))
			{
				echo "<span id='regerror'>The requested username or email already exists in the system. If you think this is an error, please notify the webmaster.</span>";
				$valid = false;
			}
			else 
			{
				echo "You'll soon receive a confirmation e-mail with the instruction on how to activate your username in the website. Please check your e-mail inbox and spam as well.";
			}
		}
	}
	
	if ((!isset($valid) || (isset($valid) && $valid == false)))
	{
		if (isset($_POST['sbtRegister']))
		{
			$preserve = true;
		}
?>
<div id="registerform">
	<?php
		if (isset($_SESSION['user_name']))
		{
			echo "You are already logged in to the system. So registration is unnecessary for you. Sorry for inconvinience if you arrived here.";
			@include("gohome.php");
		}
		else
		{
	?>
	<div id="reginfo">
		Fields marked as * are mandatory.
	</div>
	
	<script type="text/javascript" src="./js/register.js"></script>
	<form method="post" action="" onsubmit="return validateAll();">
		<label for="txtRegUname" class="compulsory">Username: </label> <input type="text" name="txtRegUname" id="txtRegUname" value="<?php if (isset($preserve)) {echo $uname;}  ?>" onchange="checkUsername(this.value);" onblur="checkUsername(this.value);" /> <span class="reginfo" id="lblUname"></span><div style="clear:left"></div>
		<label for="txtRegPwd" class="compulsory">Password: </label> <input type="password" name="txtRegPwd" id="txtRegPwd" onblur="checkPassword(this.value);" /> <span class="reginfo" id="lblPass1"></span>
		<label for="txtRegPwd2" class="compulsory">Re-enter password: </label> <input type="password" name="txtRegPwd2" id="txtRegPwd2" onblur="verifyPassword(this.value);" /> <span class="reginfo" id="lblPass2"></span>
		<label for="txtEmail" class="compulsory">E-mail address: </label> <input type="text" name="txtEmail" id="txtEmail" value="<?php if (isset($preserve)) {echo $email;}  ?>" onblur="checkEmail(this.value, 'lblEmail', false);" /> <span class="reginfo" id="lblEmail"></span>
		<label for="txtPhone">Phone Number: </label> <input type="text" name="txtPhone" id="txtPhone" value="<?php if (isset($preserve)) {echo $phone;}  ?>" onblur="checkPhone(this.value);" /> <span class="reginfo" id="lblPhone"></span>
		<label for="txtMsn">MSN: </label> <input type="text" name="txtMsn" id="txtMsn" value="<?php if (isset($preserve)) {echo $msn;}  ?>" onblur="checkEmail(this.value, 'lblMsn', true);" /> <span class="reginfo" id="lblMsn"></span>
		<label for="txtYahoo">Yahoo: </label> <input type="text" name="txtYahoo" id="txtYahoo" value="<?php if (isset($preserve)) {echo $yahoo;}  ?>" onblur="checkEmail(this.value, 'lblYahoo', true);" /> <span class="reginfo" id="lblYahoo"></span>
		<label for="txtGtalk">GTalk: </label> <input type="text" name="txtGtalk" id="txtGtalk" value="<?php if (isset($preserve)) {echo $gtalk;}  ?>" onblur="checkEmail(this.value, 'lblGtalk', true);" /> <span class="reginfo" id="lblGtalk"></span>
		<label for="selCountry">Country: </label> <input type="text" name="selCountry" id="selCountry" />
		<input type="submit" name="sbtRegister" id="sbtRegister" value="Register" />
		<!--<label for="txtPhone">Phone Number: </label> <input type="text" name="txtPhone" id="txtPhone" onblur="checkPhone(this.value);" />-->
	</form>
	<?php }?>
</div>
<?php }?>

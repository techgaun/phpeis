<?php
	if (!isset($_SESSION['user_name']))
	{
		header("location: index.php");
	}
	@include_once("./lib/classes/User.class.php");
?>

<div id="dlheader">
	You'are currently editing your profile. Be sure to save changes at the end.
	<?php
		$user = new User();
		if (isset($_POST['sbtChange']))
		{
			$uid = $_SESSION['user_id'];
			$pwd = $_POST['txtRegPwd'];
			$pwd2 = $_POST['txtRegPwd2'];
			$email = $_POST['txtEmail'];
			$phone = $_POST['txtPhone'];
			$msn = $_POST['txtMsn'];
			$yahoo = $_POST['txtYahoo'];
			$gtalk = $_POST['txtGtalk'];
			$country = $_POST['selCountry'];
			$sig = strip_tags($_POST['txtSig'], "<b>");
			$error = array();
			$valid = true;
			
			if ($pwd != "" && $pwd != $pwd2)
			{
				array_push($error, "Passwords do not match");
				$valid = false;
			}
			
			if ($valid == false)
			{
				echo "<br /><span id='regerror'>Following errors were encountered while updating profile. Please correct them.</span>";
				foreach ($error as $err)
				{
					echo "<br /><span class='regerror'>".$err."</span>";
				}
			}
			else
			{
				!empty($pwd)?$user->updateSingleInfo($uid, "user_password", md5(strrev(sha1($pwd)))):NULL;
				!empty($phone)?$user->updateSingleInfo($uid, "user_phone", $phone):NULL;
				!empty($msn)?$user->updateSingleInfo($uid, "user_msn", $msn):NULL;
				!empty($yahoo)?$user->updateSingleInfo($uid, "user_yahoo", $yahoo):NULL;
				!empty($gtalk)?$user->updateSingleInfo($uid, "user_gtalk", $gtalk):NULL;
				!empty($country)?$user->updateSingleInfo($uid, "user_country", $country):NULL;
				!empty($sig)?$user->updateSingleInfo($uid, "sig", $sig):NULL;
				//$style = isset($style)?$style:"default";
				echo "<br /><span style=\"color: #0f0\">Your information was updated.</span>";
			}
		}
		if (isset($_GET['action']) && $_GET['action'] == "editprofile")
		{
			$uid = $_SESSION['user_id'];
			$arr = $user->selectUserById($uid);
			//print_r($arr);
		}
	?>
</div>
<div id="editform">
	<form method="post" action="">
		<label for="txtRegPwd" class="compulsory">New Password: </label> <input type="password" name="txtRegPwd" id="txtRegPwd" onblur="checkPassword(this.value);" /> <span class="reginfo" id="lblPass1"></span>
		<label for="txtRegPwd2" class="compulsory">Re-enter password: </label> <input type="password" name="txtRegPwd2" id="txtRegPwd2" onblur="verifyPassword(this.value);" /> <span class="reginfo" id="lblPass2"></span>
		<label for="txtEmail" class="compulsory">E-mail address: </label> <input type="text" disabled="disabled" name="txtEmail" id="txtEmail" value="<?php echo $arr[0]['user_email']; ?>" onblur="checkEmail(this.value, 'lblEmail', false);" /> <span class="reginfo" id="lblEmail"></span>
		<label for="txtPhone">Phone Number: </label> <input type="text" name="txtPhone" id="txtPhone" value="<?php echo (strlen($arr[0]['user_phone']) > 1)?$arr[0]['user_phone']:""; ?>" onblur="checkPhone(this.value);" /> <span class="reginfo" id="lblPhone"></span>
		<label for="txtMsn">MSN: </label> <input type="text" name="txtMsn" id="txtMsn" value="<?php echo (strlen($arr[0]['user_msn']) > 1)?$arr[0]['user_msn']:""; ?>" onblur="checkEmail(this.value, 'lblMsn', true);" /> <span class="reginfo" id="lblMsn"></span>
		<label for="txtYahoo">Yahoo: </label> <input type="text" name="txtYahoo" id="txtYahoo" value="<?php echo (strlen($arr[0]['user_yahoo']) > 1)?$arr[0]['user_yahoo']:""; ?>" onblur="checkEmail(this.value, 'lblYahoo', true);" /> <span class="reginfo" id="lblYahoo"></span>
		<label for="txtGtalk">GTalk: </label> <input type="text" name="txtGtalk" id="txtGtalk" value="<?php echo (strlen($arr[0]['user_gtalk']) > 1)?$arr[0]['user_gtalk']:""; ?>" onblur="checkEmail(this.value, 'lblGtalk', true);" /> <span class="reginfo" id="lblGtalk"></span>
		<label for="selCountry">Country: </label> <input type="text" name="selCountry" id="selCountry" value="<?php echo (strlen($arr[0]['user_country']) > 1)?$arr[0]['user_country']:""; ?>" />
		<label for="txtSig">Signature</label>
		<textarea id="txtSig" name="txtSig" rows="6"><?php echo (strlen($arr[0]['sig']) > 1)?$arr[0]['sig']:""; ?></textarea>
		<label for="txtSig" style="margin-left: 165px;">*HTML Tags allowed: &lt;b&gt;, &lt;i&gt;</label>
		<input type="submit" name="sbtChange" id="sbtChange" value="Save Changes" />
		<!--<label for="txtPhone">Phone Number: </label> <input type="text" name="txtPhone" id="txtPhone" onblur="checkPhone(this.value);" />-->
	</form>
</div>
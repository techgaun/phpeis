<?php 
/*
 * User class with variour user related stuffs
 */

@include_once($_SERVER['DOCUMENT_ROOT']."/config/includes.php");

class User
{
	function __construct()
	{
		
	}
	
	function selectUserById($uid)
	{
		$con = new DBConnection();
		$uid = Validator::cleanString($uid, 'int');
		$query = "SELECT * FROM users WHERE user_id = '$uid'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() == 1)
		{
			$user = $con->fetch_array();
			return $user;
		}
		return false;
	}
	
	function getTotalCount()
	{
		$con = new DBConnection();		
		$query = "SELECT count(*) AS total FROM users";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$user = $con->fetch_array();
			return $user;
		}
		return false;
	}
	
	function checkLogin($uname, $pwd)
	{
		$con = new DBConnection();
		$uname = Validator::cleanString($uname);
		$pwd = md5(strrev(sha1(Validator::cleanString($pwd))));
		$query = "SELECT * FROM users WHERE user_name = '$uname' AND user_password = '$pwd'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() == 1)
		{
			$user = $con->fetch_array();
			return $user;
		}
		return false;
	}
	
	function checkUser($uname)
	{
		$con = new DBConnection();
		$uname = Validator::cleanString($uname);
		$query = "SELECT * FROM users WHERE user_name = '$uname'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() == 1)
		{
			return 1;
		}
		return 0;
	}
	
	function checkEmail($email)
	{
		$con = new DBConnection();
		$email = Validator::cleanString($email);
		$query = "SELECT * FROM users WHERE user_email = '$email'";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() == 1)
		{
			return 1;
		}
		return 0;
	}
	
	function resetPassword($column, $value)
	{
		$con = new DBConnection();
		$newpass = md5(strrev(sha1(Functions::generatePassword())));
		$query = "UPDATE users SET user_password = '$newpass' WHERE $column = '$value'";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_affected_rows() == 1)
		{
			return 1;
		}
		return 0;
	}
	
	function activateUser($activate_string)
	{
		
	}
	
	function addUser($uname, $pwd, $email, $phone, $msn, $yahoo, $gtalk, $country, $style, $group = 3)
	{
		$con = new DBConnection();
		$uname = Validator::cleanString($uname);
		$pwd = md5(strrev(sha1(Validator::cleanString($pwd))));
		$email = Validator::cleanString($email);
		$phone = Validator::cleanString($phone);
		$msn = Validator::cleanString($msn);
		$yahoo = Validator::cleanString($yahoo);
		$gtalk = Validator::cleanString($gtalk);
		$country = Validator::cleanString($country);
		$style = Validator::cleanString($style);
		$group = is_numeric($group)?$group:3;
		$query = "SELECT count(*) AS user_exists FROM users WHERE user_name = '$uname' OR user_email = '$email'";
		
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->fetch_array();
		
		if ($row[0]['user_exists'] > 0)
		{
			return false;
		}
		
		$activate_string = Functions::createActivateString($uname, microtime());
		$query = "INSERT INTO users (user_name, user_password, user_email, user_phone, user_msn, user_gtalk, user_yahoo, user_country, style, activate_string, is_confirmed, group_id) VALUES ('$uname', '$pwd', '$email', '$phone', '$msn', '$gtalk', '$yahoo', '$country', '$style', '$activate_string', 0, '$group')";

		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}

	function updateSig($uid, m$sig)
	{
		$con = new DBConnection();
		$sig = Validator::cleanString($sig);
		$uid = Validator::cleanString($uid, 'int');
		$query = "UPDATE users SET sig = '$sig' WHERE user_id = '$uid'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function updateSingleInfo($uid, $info, $value)
	{
		$con = new DBConnection();
		$uid = Validator::cleanString($uid, 'int');
		$info = Validator::cleanString($info);
		$value = Validator::cleanString($value);
		$query = "UPDATE users SET $info = '$value' WHERE user_id = '$uid'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function deleteUser($uid)
	{
		$con = new DBConnection();
		$uid = Validator::cleanString($uid, 'int');
		$query = "DELETE FROM users WHERE user_id = '$uid'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function banUser($uid, $ip, $ban_maker, $expires)
	{
		$con = new DBConnection();
		$uid = Validator::cleanString($uid, 'int');
		$ip = Validator::cleanString($ip);
		$ban_maker = Validator::cleanString($ban_maker);
		$expires = Validator::cleanString($expires);
		/*$query = "SELECT user_name FROM users WHERE user_id = '$uid'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() < 1)
		{
			return FALSE;
		}
		$row = $con->fetch_array();
		$user = $row[0]['user_name'];
		*/
		$query = "INSERT INTO bans (user_id, ipaddr, expires, ban_maker) VALUES ($uid, $ip, $ban_maker, $expires)";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function unbanUser($uid)
	{
		$con = new DBConnection();
		$uid = Validator::cleanString($uid);
		$query = "DELETE FROM bans WHERE user_id = '$uid'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function getLastUser()
	{
		$con = new DBConnection();
		$query = "SELECT user_name FROM users ORDER BY user_id DESC LIMIT 1";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() == 1)
		{
			$user = $con->fetch_array();
			return $user;
		}
		return false;
	}
}

?>
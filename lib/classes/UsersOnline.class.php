<?php

class UsersOnline 
{

	private $timeout = 600;
	//$count = 0;
	//$error = array();
	//$i = 0;
	
	function userOnline($uid = 0) 
	{
		$this->timestamp = time();
		$this->ip = $this->ipCheck();
		if ($uid != 0)
		{
			$this->new_user($uid);
		}
		$this->delete_user();
		$cnt = $this->count_users();
		return $cnt;
	}
	
	function ipCheck()
	{
		if (getenv('HTTP_CLIENT_IP'))
		{
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR'))
		{
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED'))
		{
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR'))
		{
			$ip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED'))
		{
			$ip = getenv('HTTP_FORWARDED');
		}
		else
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	function new_user($uid)
	{
		$con = new DBConnection();
		$query = "INSERT INTO online (user_id, timestamp, ip) VALUES ($uid, '$this->timestamp', '$this->ip')";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		//return $rows;
	}
	
	function delete_user()
	{
		$con = new DBConnection();
		$query = "DELETE FROM online WHERE timestamp < ($this->timestamp - $this->timeout)";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		//return $rows;
	}
	
	function count_users()
	{
		$con = new DBConnection();
		$query = "select user_id, user_name FROM users WHERE user_id IN (SELECT DISTINCT user_id FROM online WHERE user_id <>0)";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() >= 1)
		{
			$online = $con->fetch_array();
			return $online;
		}
		return 0;
	}
}

?>
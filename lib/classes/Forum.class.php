<?php

/** 
 * @author samar
 * 
 * 
 */
class Forum 
{
	//TODO - Insert your code here
	

	function __construct() 
	{
	
		//TODO - Insert your code here
	}
	
	function addForum($name, $desc, $redirect_url, $disp_pos, $cat_id)
	{
		$con = new DBConnection();
		$name = Validator::cleanString($name);
		$desc = Validator::cleanString($desc);
		$redirect_url = Validator::cleanString($redirect_url);
		$disp_pos = Validator::cleanString($disp_pos, 'int');
		$cat_id = Validator::cleanString($cat_id, 'int');
		
		$query = "INSERT INTO forums (forum_name, forum_desc, disp_position, cat_id) VALUES ('$name', '$desc', '$disp_pos', '$cat_id')";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function deleteForum($forum_id)
	{
		$con = new DBConnection();
		$forum_id = Validator::cleanString($forum_id, 'int');
		$query = "DELETE FROM forums WHERE forum_id = '$forum_id'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function  updateForumInfo($forum_id, $info, $value)
	{
		$con = new DBConnection();
		$forum_id = Validator::cleanString($forum_id, 'int');
		$query = "UPDATE forums SET $info = $value WHERE forum_id = '$forum_id'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function selectAllForums()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM forums";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$forums = $con->fetch_array();
			return $forums;
		}
		return false;
	}
	
	function selectForumsByCatId($cat_id)
	{
		$con = new DBConnection();
		$cat_id = Validator::cleanString($cat_id, 'int');
		$query = "SELECT * FROM forums WHERE cat_id = '$cat_id'";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		
		if ($con->get_num_of_rows() > 0)
		{
			$forums = $con->fetch_array();
			return $forums;
		}
		return false;
	}
	
	function selectForum($forum_id)
	{
		$con = new DBConnection();
		$forum_id = Validator::cleanString($forum_id, 'int');
		$query = "SELECT * FROM forums WHERE forum_id = '$forum_id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$forums = $con->fetch_array();
			return $forums;
		}
		return false;
	}
}

?>
<?php
/*
 * Handles uploading tasks
 * Task Remaining
 */
class Upload
{
	function addLink($link_url, $link_title, $link_desc)
	{
		$con = new DBConnection();
		$link_url = Validator::cleanString($link_url);
		$link_title = Validator::cleanString($link_title);
		$link_desc = Validator::cleanString($link_desc);
		
		$query = "INSERT INTO links (link_url, link_title, link_desc) VALUES ('$link_url', '$link_title', '$link_desc'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function getAllLinks()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM links ORDER BY link_id DESC";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() >= 1)
		{
			$links = $con->fetch_array();
			return $links;
		}
		return false;
	}
	
	function getLinkById($id)
	{
		$con = new DBConnection();
		$id = Validator::cleanString($id, 'int');
		$query = "SELECT * FROM links WHERE link_id = '$id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$link = $con->fetch_array();
			return $link;
		}
		return false;
	}
}

?>
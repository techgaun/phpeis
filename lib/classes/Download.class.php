<?php

class Download 
{
	
	function __construct() 
	{
	
	}
	
function ListDownloads()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM downloads";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function ListRecentDownloads($num)
	{
		$con = new DBConnection();
		$num = Validator::cleanString($num, 'int');
		$query = "SELECT * FROM downloads ORDER BY download_id DESC LIMIT $num";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function viewDownload($download_id)
	{
		$con = new DBConnection();
		$query = "SELECT * FROM downloads WHERE download_id = '$download_id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function addDownload($title, $desc, $uploaded_by, $fname)
	{
		$dbcon = new DBConnection();
		$title = Validator::cleanString($title);
		$desc = Validator::cleanString(nl2br($desc));
		$uploaded_by = Validator::cleanString($uploaded_by);
		$fname = Validator::cleanString($fname);
		$query = "INSERT INTO downloads (download_title, download_desc, uploaded_by, download_path) VALUES ('$title', '$desc', '$uploaded_by', '$fname')";
		echo $query;
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		if ($rows == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function removeDownload($download_id)
	{
		$dbcon = new DBConnection();
		$query = "DELETE FROM downloads WHERE download_id = '$download_id'";
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		if ($rows == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

?>
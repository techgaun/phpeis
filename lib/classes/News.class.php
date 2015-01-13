<?php

class News 
{
	function ListNews()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM news ORDER BY news_id DESC";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$news = $con->fetch_array();
			return $news;
		}
		return false;
	}
	
	function ListRecentNews($num)
	{
		$con = new DBConnection();
		$num = Validator::cleanString($num, 'int');
		$query = "SELECT * FROM news ORDER BY news_id DESC LIMIT $num";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$news = $con->fetch_array();
			return $news;
		}
		return false;
	}
	
	function viewNews($news_id)
	{
		$con = new DBConnection();
		$query = "SELECT * FROM news WHERE news_id = '$news_id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function addNews($title, $desc)
	{
		$dbcon = new DBConnection();
		$title = Validator::cleanString($title);
		$desc = Validator::cleanString($desc);
		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO news (news_title, news_body, date) VALUES ('$title', '$desc', '$date')";
		//echo $query;
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
	
	function editNews($news_id, $title, $desc)
	{
		$dbcon = new DBConnection();
		$news_id = Validator::cleanString($news_id, 'int');
		$title = Validator::cleanString($title);
		$desc = Validator::cleanString($desc);
		$query = "UPDATE news SET news_title = '$title', news_body = '$desc' WHERE news_id = '$news_id'";
		//echo $query;
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
	
	function removeNews($news_id)
	{
		$dbcon = new DBConnection();
		$news_id = Validator::cleanString($news_id, 'int');
		$query = "DELETE FROM news WHERE news_id = '$news_id'";
		//echo $query;
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
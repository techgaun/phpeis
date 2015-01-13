<?php

class Tutorial 
{
	function ListTutorials()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM tutorial";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function ListRecentTutorials($num)
	{
		$con = new DBConnection();
		$num = Validator::cleanString($num, 'int');
		$query = "SELECT * FROM tutorial ORDER BY tut_id DESC LIMIT $num";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function viewTutorial($tut_id)
	{
		$con = new DBConnection();
		$tut_id = Validator::cleanString($tut_id, 'int');
		$query = "SELECT * FROM tutorial WHERE tut_id = '$tut_id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function addTutorial($title, $desc, $body, $uploaded_by)
	{
		$dbcon = new DBConnection();
		$title = Validator::cleanString($title);
		$desc = Validator::cleanString($desc);
		$body = Validator::cleanString($body);
		$uploaded_by = Validator::cleanString($uploaded_by);
		$query = "INSERT INTO tutorial (tut_title, tut_desc, tut_body, uploaded_by) VALUES ('$title', '$desc', '$body', '$uploaded_by')";
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
	
	function editTutorial($tut_id, $title, $desc, $body, $uploaded_by)
	{
		$dbcon = new DBConnection();
		$tut_id = Validator::cleanString($tut_id, 'int');
		$title = Validator::cleanString($title);
		$desc = Validator::cleanString($desc);
		$body = Validator::cleanString($body);
		$uploaded_by = Validator::cleanString($uploaded_by);
		$query = "UPDATE tutorial SET tut_title = '$title', tut_desc = '$desc', tut_body = '$body', uploaded_by = '$uploaded_by' WHERE tut_id = '$tut_id'";
		echo $query;
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		echo $rows;
		if ($rows >= 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function removeTutorial($tut_id)
	{
		$dbcon = new DBConnection();
		$tut_id = Validator::cleanString($tut_id, 'int');
		$query = "DELETE FROM tutorial WHERE tut_id = '$tut_id'";
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
	
	function rateTutorial($tut_id, $rating)
	{
		if ($rating < 0 || $rating > 5)
		{
			return FALSE;
		}
		$dbcon = new DBConnection();
		$query = "SELECT tut_rating FROM tutorial WHERE tut_id = '$tut_id'";
		$dbcon->setQuery($query);
		$res = $dbcon->execute_query();
		$old_rating = mysql_fetch_array($res);
		$rating = round(($rating+$old_rating)/2);
		$query = "UPDATE tutorial SET tut_rating = '$rating' WHERE tut_id = '$tut_id'";
	}
}

?>
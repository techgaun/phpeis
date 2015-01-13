<?php

class Comment 
{
	function selectAllComments($tut_id, $page)
	{
		$con = new DBConnection();
		$tut_id = Validator::cleanString($tut_id, 'int');
		$num = (is_numeric($page))?$page:0;
		$num = $num * 8;
		$query = "SELECT * FROM comment WHERE tut_id = '$tut_id' ORDER BY cmt_id DESC LIMIT $num, 8";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function addComment($name, $email, $message, $ip, $tut_id)
	{
		$con = new DBConnection();
		$name = Validator::cleanString($name);
		$email = Validator::cleanString($email);
		$message = Validator::cleanString(nl2br(Functions::badword_censor($message)));
		$ip = Validator::cleanString($ip);
		$tut_id = Validator::cleanString($tut_id, 'int');
		$query = "INSERT INTO comment (name, email, message, ip, tut_id) VALUES ('$name', '$email', '$message', '$ip', '$tut_id')";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function deleteComment($cmt_id)
	{
		$con = new DBConnection();
		$tut_id = Validator::cleanString($tut_id, 'int');
		$query = "DELETE FROM comment WHERE cmt_id = '$cmt_id'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function deleteAllCommentsOfTutorial($tut_id)
	{
		$con = new DBConnection();
		$tut_id = Validator::cleanString($tut_id, 'int');
		$query = "DELETE FROM comment WHERE tut_id = '$tut_id'";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
}

?>
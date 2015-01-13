<?php
/*
 * Chat Class
 * Coded By Samar
 * Samar@TechGaun.com
 */

@include '../../lib/classes/DBConnection.php';
@include '../../lib/classes/Validator.php';
@include '../../lib/classes/Functions.php';
class Chat
{
	function addMessage($username, $message)
	{
		$con = new DBConnection();
		$username = Validator::cleanString($username);
		$message = Validator::cleanString(nl2br(Functions::badword_censor($message)));
		$query = "INSERT INTO chat_message(username,message,posted) VALUES ('$username', '$message',NOW())";
		$con->setQuery($query);
		$con->execute_query();
		$row = $con->get_affected_rows();
		return $row;
	}
	
	function selectChat()
	{
		$con = new DBConnection();
		$query = "SELECT username,message,posted FROM chat_message WHERE (DAY(posted) = DAY(CURDATE()) AND MONTH(posted) = MONTH(CURDATE()) AND YEAR(posted) = YEAR(CURDATE())) ORDER BY posted DESC LIMIT 0, 30";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() >= 1)
		{
			$chats = $con->fetch_array();
			return $chats;
		}
		return 0;
	}
}

?>
<?php

/** 
 * @author samar
 * 
 * 
 */
class Thread 
{
	//TODO - Insert your code here

	function createThread($forum_id, $thread_subject, $thread_body, $thread_poster, $poster_id, $poster_ip, $type)
	{
		$con = new DBConnection();
		$forum_id = Validator::cleanString($forum_id, 'int');
		$thread_body = Validator::cleanString(nl2br(Functions::badword_censor($thread_body)));
		$thread_poster = Validator::cleanString($thread_poster);
		$poster_id = Validator::cleanString($poster_id, 'int');
		$topic_id = Validator::cleanString($topic_id, 'int');
		$poster_ip = Validator::cleanString($poster_ip);
		$type = Validator::cleanString($type);
		$date = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO topics (forum_id, topic_creator, subject, body, sticky) VALUES ('$forum_id', '$thread_poster', '$thread_subject', '$thread_body', '$type')";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		if ($rows < 1)
		{
			return false;
		}
		
		$query = "SELECT topic_id FROM topics ORDER BY topic_id DESC LIMIT 1";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->fetch_array();
		$topic_id = $rows[0]['topic_id'];
		$query = "INSERT INTO posts (poster, poster_id, poster_ip, message, posted, topic_id) VALUES ('$thread_poster', '$poster_id', '$poster_ip', '$thread_body', '$date', '$topic_id')";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		if ($rows < 1)
		{
			return false;
		}
		
		$query = "UPDATE forums SET num_topics = (num_topics + 1), num_posts = (num_posts + 1), last_poster = '$thread_poster' WHERE forum_id = (SELECT DISTINCT forum_id FROM topics WHERE topic_id = '$topic_id')";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		if ($rows < 1)
		{
			return false;
		}
		
		$query = "SELECT topic_id FROM topics ORDER BY topic_id DESC LIMIT 1";
		echo $query;
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->fetch_array();
		return $rows[0]['topic_id'];
	}
	
	function createPost($message, $poster, $poster_id, $poster_ip, $topic_id)
	{
		$con = new DBConnection();
		$message = Validator::cleanString(nl2br(Functions::badword_censor($message)));
		$poster = Validator::cleanString($poster);
		$poster_id = Validator::cleanString($poster_id, 'int');
		$poster_ip = Validator::cleanString($poster_ip);
		$topic_id = Validator::cleanString($topic_id, 'int');
		$date = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO posts (poster, poster_id, poster_ip, message, posted, topic_id) VALUES ('$poster', '$poster_id', '$poster_ip', '$message', '$date', '$topic_id')";
		//echo $query;
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		
		$query = "UPDATE topics SET last_poster = '$poster'";
		$con->setQuery($query);
		$con->execute_query();
		
		$query = "UPDATE forums SET last_poster = '$poster', num_posts = num_posts + 1 WHERE forum_id = (SELECT forum_id FROM topics WHERE topic_id = '$topic_id')";
		$con->setQuery($query);
		$con->execute_query();
		
		return $rows;
	}
	
	function editThread($thread_id, $subject, $message)
	{
		
	}
	
	function editPost($post_id, $message, $edited_by)
	{
		//editPost also works as post deleter coz $message field would be set as post deleted
		$con = new DBConnection();
		$post_id = Validator::cleanString($post_id, 'int');
		$message = Validator::cleanString($message);
		$edited_by = Validator::cleanString($edited_by);
		
		$query = "UPDATE posts SET message = '$message', edited_by = '$edited_by' WHERE post_id = '$post_id'";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		return $rows;
	}

	function deleteThread($thread_id)
	{
		$con = new DBConnection();
		$thread_id = Validator::cleanString($thread_id, 'int');
		
		$query = "DELETE FROM posts WHERE topic_id = '$thread_id'";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		if ($rows < 0)
		{
			return false;
		}
		
		$query = "DELETE FROM topics WHERE topic_id = '$topic_id'";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		if ($rows < 0)
		{
			return false;
		}
		return $rows;
	}
	
	function setSticky($topic_id)
	{
		$con = new DBConnection();
		$topic_id = Validator::cleanString($topic_id, 'int');
		$query = "UPDATE topics SET sticky = 1 WHERE topic_id = '$topic_id'";
		$con->setQuery($query);
		$con->execute_query();
		$rows = $con->get_affected_rows();
		if ($rows < 0)
		{
			return false;
		}
		return $rows;
	}
	
	function selectAllTopics()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM topics ORDER BY topic_id DESC";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$topics = $con->fetch_array();
			return $topics;
		}
		return false;
	}
	
	function selectAllTopicsByForum($forum_id)
	{
		$con = new DBConnection();
		$forum_id = Validator::cleanString($forum_id, 'int');
		$query = "SELECT * FROM topics WHERE forum_id = '$forum_id' ORDER BY topic_id DESC";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$topics = $con->fetch_array();
			return $topics;
		}
		return false;
	}
	
	function selectTopicById($topic_id)
	{
		$con = new DBConnection();
		$topic_id = Validator::cleanString($topic_id, 'int');
		$query = "SELECT * FROM topics WHERE topic_id = '$topic_id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() == 1)
		{
			$topics = $con->fetch_array();
			return $topics;
		}
		return false;
	}
	
	function selectPostsByTopic($topic_id)
	{
		$con = new DBConnection();
		$topic_id = Validator::cleanString($topic_id);
		$query = "SELECT * FROM posts WHERE topic_id = '$topic_id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$posts = $con->fetch_array();
			return $posts;
		}
		return false;
	}

}

?>
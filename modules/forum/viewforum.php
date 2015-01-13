<?php
	if (!isset($_SESSION['user_name']))
	{
		echo "<div id='dlheader'>You are not allowed to access the forums because you are not logged in. Please login or register to view the forum.</div>";
	}
	else 
	{
		if (!isset($_GET['forum_id']) || !is_numeric($_GET['forum_id']))
		{
			header("location: index.php?module=forum&action=listall");
		}
		@include_once("./lib/classes/Thread.class.php");
		@include_once("./lib/classes/Forum.class.php");
		
		$forum = new Forum();
		$for = $forum->selectForum($_GET['forum_id']);
		//print_r($for);
?>
<div id="forumbody">
<div id="viewforumheader">
	<div id="forum_name"><?php echo stripslashes($for[0]['forum_name']); ?></div>
	<a href="index.php?module=forum&action=createnew&forum_id=<?php echo $_GET['forum_id']; ?>">
	<div id="postthread" class="button">
		Post Thread
	</div>
	</a>
	<div style="content='';clear: both;"></div>
</div>
<?php
	$thread = new Thread();
	$topics = $thread->selectAllTopicsByForum($_GET['forum_id']);
	if (is_bool($topics))
	{
		echo "<br />No Topics has been created yet";
	}
	
	else
	{
		
?>
	<div class="topics">
	<?php
		foreach ($topics as $topic)
		{ 
	?>
	<div class="topicshort">
		<div class="topic_title">
			
			<a href="index.php?module=forum&action=viewthread&thread_id=<?php echo $topic['topic_id']; ?>"><?php echo stripslashes(substr($topic['subject'], 0, 80)); ?></a>
		</div>
		<div class="topic_desc"><?php echo "Started By: ".stripslashes(substr($topic['topic_creator'], 0, 120)); ?></div>
		<div style="content='';clear: both;"></div>
	</div>	
		<?php 
		}
		?>
	</div>
<?php
	}
?>
</div>
<?php
	}
?>
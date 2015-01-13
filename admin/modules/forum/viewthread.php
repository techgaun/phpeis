<?php
	if (!isset($_SESSION['user_name']))
	{
		echo "<div id='dlheader'>You are not allowed to access the forums because you are not logged in. Please login or register to view the forum.</div>";
	}
	else 
	{
		if (!isset($_GET['thread_id']) || !is_numeric($_GET['thread_id']))
		{
			header("location: index.php?module=forum&action=listall");
		}
		@include_once("./lib/classes/Thread.class.php");
		//@include_once("./lib/classes/Forum.class.php");
		
		$thread = new Thread();
		$topics = $thread->selectTopicById($_GET['thread_id']);
		//print_r($for);
?>
<div id="forumbody">
<div id="viewforumheader">
	
	<div id="forum_name">
		<a href="index.php?module=forum&action=viewforum&forum_id=<?php echo $topics[0]['forum_id']; ?>">Back To Forum</a> ::
	<?php echo $topics[0]['subject']; ?>
	
	</div>
	<a href="#" onclick="document.getElementById('post_text').focus();">
	<div id="postthread" class="button">
		Post Reply
	</div>
	</a>
	<div style="content='';clear: both;"></div>
</div>
<?php
	$posts = $thread->selectPostsByTopic($_GET['thread_id']);
	if (is_bool($posts))
	{
		echo "<br />No posts has been made on this topic. Maybe administrator has removed it.";
	}
	
	else
	{
		
?>
	<div class="topics">
		<?php
			foreach ($posts as $post)
			{ 
		?>
		<div class="topicshort">
			<div class="poster">
				<span style="font-style: italic">Posted By</span><br /> <span style="font-weight: bold;"><?php echo $post['poster']; ?></span>
			</div>
			<div class="post_message">
			<?php echo stripslashes(($post['message'])); ?>
			<br />
			<div style="margin-top: 5px;">Posted on <?php echo stripslashes(($post['posted'])); ?></div>
			</div>
			<div style="content='';clear: both;"></div>
		</div>
			<?php 
			}
			?>
	</div>
	<div id="postbox">
		<textarea rows="10" cols="70" id="post_text"></textarea>
		<br />
		<div id="lblPostInfo" style=""></div>
		<input type="hidden" name="topic_id" id="topic_id" value="<?php echo $_GET['thread_id']; ?>" />
		<br />
		<input type="button" name="sbtReply" id="sbtReply" class="button" value="Post Reply" onclick="ajaxHandler('forum/postreply.php', 'lblPostInfo');" />
	</div>
<?php
	}
?>
</div>
<?php
	}
?>
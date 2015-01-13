<?php 
	if (!isset($_SESSION['user_id']))
	{
		echo "<div id='dlheader'>You are not allowed to access the forums because you are not logged in. Please login or register to view the forum.</div>";
	}
	else 
	{
		if (!isset($_GET['forum_id']) || (isset($_GET['forum_id']) && !is_numeric($_GET['forum_id'])))
		{
			header("location: index.php?module=forum");
		}
?>
	<div id="forumbody">
		<?php
			@include_once("./lib/classes/Thread.class.php"); 
			if (isset($_POST['sbtCreate']))
			{
				$title = $_POST['txtTitle'];
				$body = $_POST['txtBody'];
				$user = $_SESSION['user_name'];
				$user_id = $_SESSION['user_id'];
				$forum_id = $_GET['forum_id'];
				$user_ip = $_SERVER['REMOTE_ADDR'];
				$error = array();
				$valid = true;
				if ($title == "")
				{
					array_push($error, "Title of thread is missing");
					$valid = false;
				}
				
				if ($body == "")
				{
					array_push($error, "Body of thread is missing");
					$valid = false;
				}
				if ($valid == true)
				{
					$thread = new Thread();
					$add = $thread->createThread($forum_id, $title, $body, $user, $user_id, $user_ip, 0);
					if (is_bool($add))
					{
						echo "Unknown error has occurred while posting your thread";
					}
					else
					{
						header("location: index.php?module=forum&action=viewthread&thread_id=".$add);
					}
				}
				else 
				{
					echo "<div style=\"color: #f00\">";
					foreach ($error as $err)
					{
						echo $err."<br />";
					}
					echo "</div>";
				}
			}
		?>
		<div id="viewforumheader">
			Create new thread
		</div>
		<form method="post" action="">
		<div id="titlebox">
			Title of thread: <input type="text" width="120px" name="txtTitle" id="txtTitle" style="margin-left: 20px;" />
		</div>
		<div id="postbody">
			<div style="float: left; margin-left: 4px;">Thread body: </div><textarea rows="15" cols="70" name="txtBody" id="txtBody"></textarea>
			<div style="clear: both"></div>
		</div>
		
		<div id="createthread">
			<input type="submit" name="sbtCreate" id="sbtCreate" value="Post Thread" class="button" />
		</div>
		</form>
	</div>
<?php 
	}
?>
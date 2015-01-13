<?php
	if (!isset($_SESSION['user_name']))
	{
		echo "<div id='dlheader'>You are not allowed to access the forums because you are not logged in. Please login or register to view the forum.</div>";
	}
	else 
	{
?>
<div id="forumbody">
<div id="forumheader">
	Discussion Forum
</div>
<?php
	@include_once("./lib/classes/Categories.class.php");
	@include_once("./lib/classes/Forum.class.php");
	$cat = new Categories();
	$cats = $cat->ListCategories();
	if (is_bool($cats))
	{
		echo "No categories added yet";
	}
	
	else
	{
		//print_r($cats);
		$forum = new Forum();
		foreach ($cats as $category)
		{
?>
	<div class="category">
		<div class="cat_title"><?php echo $category['cat_name']; ?></div>
		<div class="cat_desc"><?php echo $category['cat_desc']; ?></div>
		<div class="listforums">
			<?php							
				$forums = $forum->selectForumsByCatId($category['cat_id']);
				//echo $category['cat_id'];
				if (is_bool($forums))
				{
					echo "No forums added under this category";
				}
				else 
				{
					//print_r($forums);
					foreach ($forums as $for)
					{
			?>
					<div class="forum_title">
						<div class="forum_name">
							<a href="index.php?module=forum&action=viewforum&forum_id=<?php echo $for['forum_id']; ?>">
								<?php
									echo stripslashes($for['forum_name']);
								?>							
							</a>
						</div>
						<div class="forum_lastpost">
							<?php
								if ($for['num_posts'] == 0) echo "No posts yet"; else echo "Last posted by ".stripslashes($for['last_poster']);
							?>
						</div>
					</div>
					<div class="forum_desc" style="margin-bottom: 30px;">
						<div class="forum_desctext">
							<?php echo stripslashes($for['forum_desc']); ?>
						</div>
						<div class="forum_numtopics">
							<?php echo stripslashes($for['num_topics']); ?> Topics, <?php echo stripslashes($for['num_posts']); ?> Posts.
						</div>
					</div>
					<div style="content='';clear: both;"></div>
			<?php			
					}
				}
			?>
		</div>
	</div>
<?php
		}
	}
?>
</div>
<?php
	}
?>
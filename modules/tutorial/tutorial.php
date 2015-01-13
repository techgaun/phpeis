<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/Tutorial.class.php");
	@include_once("./lib/classes/Comment.class.php");
	
	if (isset($_GET['tut_id']))
	{
		$tut = new Tutorial();
		$tut_id = is_numeric($_GET['tut_id'])?$_GET['tut_id']:1;
		$arr = $tut->viewTutorial($tut_id);
		if (is_bool($arr) || empty($arr))
		{
			echo "Invalid tutorial ID selected";
			return;
		}
	?>
		<div id="tutbox">
			<div id="tut_title">
				<span class="title"><?php echo $arr[0]['tut_title']; ?></span>
				<span class="author">Uploaded by - <?php echo $arr[0]['uploaded_by'];?></span>
			</div>
			
			<div id="tut_body">
				<?php echo $arr[0]['tut_body']; ?>
			</div>
			
			<div id="comments">
				<div id="newcomment">
					<form method="post" action="">
					<label for="txtCmtUname">Name:</label>
					<input type="text" name="txtCmtUname" id="txtCmtUname" value="<?php echo (isset($_SESSION['user_name']))?$_SESSION['user_name']:""; ?>" />
					
					<label for="txtCmtEmail">Email:</label>
					<input type="text" name="txtCmtEmail" id="txtCmtEmail" value="<?php echo (isset($_SESSION['user_email']))?$_SESSION['user_email']:""; ?>" />
					
					<label for="txtComment">Your comment:</label>
					<textarea name="txtComment" id="txtComment" rows="8" cols="50"></textarea>
					<input type="submit" style="float: left; margin-left: 116px;" value="Post Comment" class="button" name="sbtComment" onclick="ajaxHandler('tutorial/comment.php', 'commentedinfo'); return false;" />
					<input type="hidden" id="tutId" style="display:none" value="<?php echo $arr[0]['tut_id']; ?>">
					</form>
					<span id="commentedinfo">
						
					</span>
					<div style="clear: both;"></div>
				</div>
				
					<?php
						$page = (isset($_GET['page']))?$_GET['page']:0;
						//echo $page;
						$cmt = new Comment();
						$arrs = $cmt->selectAllComments($tut_id, $page);
						if (is_bool($arrs) || empty($arrs))
						{
							echo "No comments yet!!!";
							//return;
						}
						else 
						{
							foreach ($arrs as $arr)
							{
					?>
						<div class="commentbox">
							<div class="commenter">By <?php echo $arr['name']; ?></div>
							<div class="commentbody"><?php echo $arr['message']; ?></div>
						</div>
					<?php
								
							}							
					?>
						<div class="paging">
							<?php 
								$cnt = Functions::getTableCounts("comment", "where tut_id = ".$tut_id);
								$num_of_page = $cnt/8;
								for ($i=0; $i<=$num_of_page;$i++)
								{
									$pg = $i + 1;
									echo "<a href='index.php?module=tutorial&action=view&tut_id=$tut_id&page=$i'>Page $pg</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
								}
							?>
						</div>
					<?php
						}
					?>
				
			</div>
		</div>	
	<?php
	}
?>
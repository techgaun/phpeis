<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP EIS System</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/contact.css" media="screen" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript" src="js/jquery.simplemodal.js"></script>

</head>

<body>
<div id="main">
	<div id="header">
        	
    </div>
    
    <div class="container">
        <div id="body">
        	<div id="left">
            	
				<div class="tributeinfo">
					You can leave your comment from here.
					<a href="#" onclick="" class="contact">
					<span class="button" style="margin-left: 302px; margin-top: 10px; cursor: hand;">
						Leave a comment
					</span>
					<div style='display:none'>
						<img src='img/contact/loading.gif' alt='' />
					</div>
					</a>
				</div>
				
				<?php
					$host = "localhost";
					$user = "root";
					$pass = "";
					$db = "phpeis";
					$con = mysql_connect($host, $user, $pass) or die("Could not connect to db server");
					mysql_select_db($db, $con) or die("Could not select database");
					$query = "SELECT count(*) FROM comment";
					//$rows = mysql_num_rows(mysql_query($query, $con));
					$res = mysql_query($query, $con);
					$arr = mysql_fetch_row($res);
					$rows = $arr[0];
					//echo $rows;
					$start = 0;
					$limit = 25;
					if (isset($_GET['page']))
					{
						$page = (is_numeric($_GET['page']))?$_GET['page']:1;
						$start = 10 * ($page - 1);
					}
					
					$query = "SELECT * FROM comment ORDER BY cmt_id DESC LIMIT $start, $limit";
					//echo $query;
					$res = mysql_query($query, $con);
					
					if (@mysql_num_rows($res) <= 0)
					{
						echo "<br />No comments yet.";
					}
					else
					{
						header('Content-Type: text/html; charset=UTF-8');
						while ($tribute = mysql_fetch_array($res))
						{
							
							
				?>
				<div class="commentbox roundbox">
					<div class="name">
						 By <?php echo nl2br(htmlspecialchars(stripslashes($tribute["name"]), ENT_QUOTES, 'UTF-8')); ?>
					</div>
					<br />
					<blockquote>
					<div class="comment">
						<?php echo "<span class='bqstart'>&#8220;</span><span class='bqbody'>".nl2br(htmlspecialchars(stripslashes($tribute["message"]), ENT_QUOTES, 'UTF-8'))."</span><span class='bqend'>&#8221;</span>"; ?>
					</div>
					</blockquote>
				</div>
				<?php			
						}
					}
					mysql_close($con);
					//echo $pages->display_pages();
					echo "<div style='float: left;'>Page ";
					//echo $rows;
					for ($i = 0; $i < ceil($rows/10); $i++)
					{
						echo "<a href='$_SERVER[PHP_SELF]?page=".($i+1)."' title=''>".($i+1)."</a> ";
					}
					echo "</div>";
				?>
				
            </div>
            <div id="right">
            	
            </div>
            <br style="clear: both;" />
        </div>
        <hr size="3" width="940px" color="#cccccc" />
        <div id="footer">
        	phpEIS System
        </div>
    </div>
</div>
</body>
</html>

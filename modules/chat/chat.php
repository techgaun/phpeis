<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	if (!isset($_SESSION['user_id']))
	{
		echo "<div class='lblError'>You are not logged in to the system. Please login to be able to use this feature.";
		echo "To register an account, <a href='index.php?module=chat' target=\"Chat with other people\">click here.</a></div>";
	}
	else
	{
?>
<script type="text/javascript">
	process = setInterval("getMessage()", 1000);
</script>
<div id="panel"> 
  <div id="title">
    <span>Username:&nbsp;</span>
    <span><input type="text" value="<?php echo $_SESSION['user_name']; ?>" name="user" id="user" maxlength="60"></span>
  </div>
  <div id="screen"></div>
  <div>
    <div id="input">
      <textarea name="message" id="message"></textarea>
    </div>
    <div id="send">
      <input type="button" name="post" id="post" maxlength="500" value="Post" onClick="javascript:chat();" />
    </div>
  </div> 
</div>
<?php
	}
?>
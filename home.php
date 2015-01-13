<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['token'] != $_GET['id'])
{
	session_destroy();
	header("location:index.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'logout')
{
	session_destroy();
	header("location:index.php");
}
@include_once dirname(__FILE__)."/lib/classes/Validator.php";
@include_once dirname(__FILE__)."/lib/classes/DBConnection.php";	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome Nepal</title>
</head>
<body>
<?php
if (isset($_POST['sbtUpdate']))
{
	foreach ($_POST as $content)
	{
		$content = Validator::cleanString($content);
	}
	$valid = true;
	if ($_POST['txtPass'] != $_POST['txtNewpass'])
	{
		$valid = false;
	}
	if ($valid == true)
	{
		$sql = "UPDATE user SET username = '$_POST[txtUname]', password = '$_POST[txtPass]' WHERE username = '$_SESSION[username]'";
		echo $sql;
		$dbcon = new DBConnection();
		$dbcon->query = $sql;
		$dbcon->execute_query();
		$num = $dbcon->get_affected_rows();
		if ($num == 1)
		{
			echo "Update successful";
			$_SESSION['username'] = $_POST['txtUname'];
		}
		else
		{
			echo "Update failed";
		}
	}
}
?>
<a href="home.php?action=logout">
Logout
</a>
<form method="post" action="">
New Username : <input type="text" name="txtUname" value="" />
<br />
New Password : <input type="password" name="txtPass" value="" />
<br />
Retype New Password : <input type="password" name="txtNewpass" value="" />
<br />
<input type="submit" name="sbtUpdate" value="Update" />
</form>
</body>
</html>

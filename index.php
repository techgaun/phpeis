<?php
	session_start();
	if (isset($_SESSION['user_name']))
	{
		if ((!isset($_GET['module'])) && (isset($_GET['token']) && ($_SESSION['token'] != $_GET['token'])))
		{
			header("location: ./modules/user/logout.php");
		}
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/Functions.php");
	@include_once './config/config.php';
	define('EIS', 'Samar');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Welcome to the Educational Interaction System</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Samar's editor" />
	<link rel="stylesheet" href="./css/styles_main.css" type="text/css" />
	<script type="text/javascript" src="./js/validator.js">
	</script>
	<script type="text/javascript" src="./js/ajaxhandler.js">
	</script>
	<?php
		if (isset($_GET['module']) && $_GET['module'] == 'chat')
		{
			echo "<script type=\"text/javascript\" src=\"./js/chat.js\"></script>";
		}
	?>
	
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headertext">
				Educational Interaction System
			</div>
			<div id="headermenu">
				<ul id="navlist">
					<li><a href="index.php" title="Homepage" id="current" class="firstmenu" style="background: none;">Home</a></li>
					<span class="separator"><img src="images/menuseparator.gif" height="35px" width="2" /></span>
					<li><a href="index.php?module=forum&action=listall" title="Discussion forum">Forum</a></li>
					<span class="separator"><img src="images/menuseparator.gif" height="35px" width="2" /></span>
					<li><a href="index.php?module=tutorial&action=viewall" title="Tutorials">Tutorials</a></li>
					<span class="separator"><img src="images/menuseparator.gif" height="35px" width="2" /></span>
					<li><a href="index.php?module=chat" title="Chat">Chat</a></li>
					<span class="separator"><img src="images/menuseparator.gif" height="35px" width="2" /></span>
					<li><a href="index.php?module=info&action=about" title="About Us">About Us</a></li>
					<?php
						if (isset($_SESSION['group_id']) && ($_SESSION['group_id'] == 1))
						{
					?>
						<span class="separator"><img src="images/menuseparator.gif" height="35px" width="2" /></span>
						<li><a href="./admin/" title="Admin Panel for site admins">Admin Panel</a></li>
					<?php } ?>
				</ul>
				
			</div>
		</div>
		
		<div id="mainbody">
			<div id="leftbody">
				<div class="bodymenu">
					<div class="bodymenutitle">
						Navigation menu
					</div>
					<div class="bodymenucontent">
						<ul class="navleft">
							<li><a href="index.php?module=forum&action=listall" title="Forum">Forum</a></li>
							<li><a href="index.php?module=tutorial&action=viewall" title="Tutorials">Tutorials</a></li>
							<li><a href="index.php?module=chat" title="Chat">Chat</a></li>
							<li><a href="index.php?module=download&action=viewall" title="Downloads">Downloads</a></li>
							<li><a href="index.php?module=link&action=viewall" title="Links">Links</a></li>
							<li><a href="index.php?module=tool" title="Various useful tools">Online Tools</a></li>
							<li><a href="index.php?module=info&action=news" title="News">News</a></li>
							<li><a href="index.php?module=tutorial&action=addtut" title="Add Tutorial">Submit Tutorial</a></li>
						</ul>
					</div>
				</div>
				
				<div class="bodymenu" style="margin-top: 10px;">
					<div class="bodymenutitle">
						Useful Links
					</div>
					<div class="bodymenucontent">
						<ul class="navleft">
							<?php @include("./modules/link/link.php"); ?>
						</ul>
					</div>
				</div>
				
				
			</div>
			
			<div id="centerbody">
			<?php 
				if (!isset($_GET['module']))
				{
			?>
				<div id="centertextbox">
					<div id="centertexttitle">
						Post #1
					</div>
					<div id="centertextbody">
						We are the group of IT students pursuing Bachelor in Computer Engineering in Kathmandu University, Dhulikhel Kabhre. This website portal is made for easy access to the educational materials of our university.
					</div>
				</div>
				
				<div class="newsbox">
					<?php
						@include_once './modules/info/newsfront.php';
					?>
				</div>
				
			<?php
				}
				else
				{
					$module = htmlspecialchars(trim($_GET['module']), ENT_QUOTES, 'utf-8');
					$action = isset($_GET['action'])?htmlspecialchars(trim($_GET['action']), ENT_QUOTES, 'utf-8'):"none";
					
					switch ($module) 
					{
						
						case "user":
							switch ($action) 
							{
								case "register":
									
									@include_once './modules/user/register.php';
								break;
								
								case "lostpwd":
									@include_once './modules/user/lostpwd.php';
									break;
								case "viewprofile":
									@include_once './modules/user/viewprofile.php';
									break;
								
								case "editprofile":
									@include_once './modules/user/editprofile.php';
									break;
									
								case "logout":
									header("location: ./modules/user/logout.php");
									break;
								
								default:
									@include_once '404.php';
								break;
							}
						;
						break;
						
						case "forum":
							switch ($action)
							{
								case "createnew":
									@include_once './modules/forum/postthread.php';
								break;
								
								case "viewforum":
									@include_once './modules/forum/viewforum.php';
									break;
								
								case "viewthread":
									@include_once './modules/forum/viewthread.php';
									break;
								
								default:
									@include_once './modules/forum/listforum.php';
									break;
							}
							break;
							
						case "tutorial":
							switch ($action) {
								case 'view':
									@include_once './modules/tutorial/tutorial.php';								
									break;
									
								case 'addtut':
									@include_once './modules/tutorial/addtut.php';								
									break;
								
								default:
									@include_once './modules/tutorial/listdetail.php';
								break;
							}
							
							break;
							
						case "chat":
							@include './modules/chat/chat.php';
							break;
							
						case "info":
							switch ($action) {
								case "contact":
									echo $contact;
								break;
								
								case "about":
									@include_once './modules/info/about.php';
									break;
								case "news":
									@include './modules/info/newslist.php';
									break;
									
								case "newsdetail":
									@include './modules/info/newsdetail.php';
									break;
								case "privacy":
									echo $pp;
									break;
								
								case "tos":
									echo $tos;
									break;
								default:
									@include_once '404.php';
								break;
							}
							break;
							
						case "download":
							switch ($action) 
							{
								case "view":
									@include_once './modules/download/downloaddetail.php';									
									break;
								default:
									@include_once './modules/download/listdownloads.php';
									break;
							}
							break;
							
						case "link":
							@include_once './modules/link/listlinks.php';
							break;
						
						case "tool":
							switch ($action) 
							{
								case 'scribd':
									@include_once './modules/tool/scribd.php';
									break;
								
								default:
									@include_once './modules/tool/list.php';;
								break;
							}
							break;
						default:
							@include_once '404.php';
						break;
					}
				}
			?>
			
			</div>
			
			<div id="rightbody">
				<div class="bodymenu" id="loginbox">
					<div class="bodymenutitle">
						User Panel
					</div>
					<div class="bodymenucontent">
						
							<?php 
								if (isset($_SESSION['user_id']))
								{
									echo "<div id=\"loggedinfo\">";
									echo "You are currently<br />";
									echo "logged in as <a href='index.php?module=user&action=viewprofile' style='font-style: italic; font-weight: bold;'>".$_SESSION['user_name']."</a>";
									echo "<br /><a href='index.php?module=user&action=logout'>Logout</a></div>";
									echo "<a href='index.php?module=user&action=editprofile'>Edit your profile</a>";
								}
								else
								{
							?>
						
						<form method="post" action="index.php?module=user&action=dologin">
							Username<br /> <input type="text" id="txtUname" name="txtUname" value="Username" class="textbox" onFocus="if (this.value == 'Username') this.value=''" onblur="validateUsername(this.value);" /><span id="lblUserError" style="display: none;"><img src="./images/alert.png" alt="Alert image" height="18px" width="18px" /></span>
							<br />
							Password<br /> <input type="password" id="txtPass" name="txtPass" value="password" class="textbox" onFocus="if (this.value == 'password') this.value=''" onblur="validatePassword(this.value);" /><span id="lblPassError" style="display: none;"><img src="./images/alert.png" alt="Alert image" height="18px" width="18px" /></span>
							<br />
							<!--  <input type="checkbox" name="chkRemember" style=" margin-top: 5px;"  /> Remember Me
							<br />-->
							<input type="submit" name="sbtLogin" value="Login" id="loginButton" onclick="ajaxHandler('user/login.php', 'loginErr'); return false;" />
							<span id="loginErr" style="display: none; color: #f00">Username/password incorrect</span>
						</form>
						<a href="index.php?module=user&action=lostpwd" title="Forgot your Password" style="">Forgot your password?</a>
						<br />
						<a href="index.php?module=user&action=register" title="Register new Account">Register new Account</a>
						<?php
							}
						?>
					</div>
				</div>
				
				<div class="bodymenu" id="onlineusersbox">
					<div class="bodymenutitle">
						Site Statistics
					</div>
					<div class="bodymenucontent">
						<?php @include_once './modules/user/useronline.php'; ?>
						
						<br />
						Total Members : <?php @include_once './modules/user/usercount.php'; ?>
						<br />
						Newest Member : <?php @include_once './modules/user/lastuser.php'; ?>
					</div>
				</div>
				
				<div class="bodymenu" id="recenttutbox">
					<div class="bodymenutitle">
						Recent Tutorials
					</div>
					<div class="bodymenucontent">
						<ul class="navleft" style="font: 11px calibri;">
							<?php @include("./modules/tutorial/list.php"); ?>
						</ul>
					</div>
				</div>
			</div>
			
			
		</div>
		
		<div id="footer">
			<div id="footerlinks">
				<span class="footerlink"><a href="index.php?module=info&action=tos">Terms of Use</a></span>
				|
				<span class="footerlink"><a href="index.php?module=info&action=privacy">Privacy Policy</a></span>
				|
				<span class="footerlink"><a href="index.php?module=info&action=about">About Us</a></span>
				|
				<span class="footerlink"><a href="index.php?module=info&action=contact">Contact Us</a></span>
			</div>
			<div id="poweredby">powered by <a href="http://www.nepalihackers.com.np" title="phpEIS">phpEIS</a></div>
		</div>
		
	</div>
</body>

</html>

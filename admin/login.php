<?php 
	session_start();
	if (isset($_SESSION['group_id']) && $_SESSION['group_id'] == 1)
	{
		//admin is logged in already
		header("location: index.php");
	}
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Welcome To Administration Panel Of phpEIS</title>
<link href="css/base.css" rel="stylesheet" type="text/css"></head>
<body style="margin: 0px;" bgcolor="#ffffff">
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
<tbody><tr> 
<td><!--<img src="images/logo.jpg">--></td>
<td><div align="right"><img src="images/contrexx_header.jpg"></div></td>
<td width="8%" align="right" background="images/contrexx_header2.jpg">&nbsp;</td>
</tr>
</tbody></table>
<div style="border-bottom: 1px solid rgb(10, 80, 161);"></div>
<table width="100%" border="0" cellpadding="3" cellspacing="0">
<tbody><tr> 
<td height="0" nowrap="nowrap"> 
<div align="left">&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
</tr>
</tbody>
</table>
<br>
<br>
<table width="600" align="center" border="0" cellpadding="4" cellspacing="0">
<tbody><tr> 
<td valign="top">
<div align="center">
<script language="JavaScript" type="text/javascript">
form_submitted=false;
function ValidateForm(theform)
{
	if(theform.username.value=='')
	{
		if(theform.username.focus)
			theform.username.focus();
		alert('Please Specify Username.');
		form_submitted=false;
		return false;
	}	
	if(theform.userpw.value=='')
	{
		if(theform.userpw.focus)
			theform.userpw.focus();
		alert('Please Specify Password.');
		form_submitted=false;
		return false;
	}
	return true;
}
</script> 

<form method="Post" action="index.php" onsubmit="return ValidateForm(this)">
<table style="border-left: 1px solid; border-right: 1px solid; border-width: 1px; border-style: solid; border-color: -moz-use-text-color;" width="90%" border="0" cellpadding="5" cellspacing="0">
<tbody>
<tr>
<td colspan="2" nowrap="nowrap">Please Enter Your Login Username and Password to gain the access.</td>
<td rowspan="5" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/login_key.gif" alt="login key" align="middle"></td>
</tr>
<tr>
<td width="30%" nowrap="nowrap">&nbsp;</td>
<td width="40%">&nbsp;</td>
</tr>
<tr>
<td width="30%" nowrap="nowrap">Username:</td>
<td width="40%"><input class="inputs-focus" name="username" style="width: 90%; font-family: arial; font-size: 12px;" onfocus="this.className='inputs-focus';" onblur="this.className='inputs';" size="35"></td>
</tr>
<tr>
<td rowspan="4" style="vertical-align: top;" width="30%" nowrap="nowrap">Pasword :</td>
<td width="40%"><input class="inputs" name="userpw" id="userpw" style="width: 90%; font-family: arial; font-size: 12px;" onfocus="this.className='inputs-focus';" onblur="this.className='inputs';" size="40" type="password">
</td>
</tr>
<tr>
<td width="40%"><input style="width: 100px;" name="submit_button" value="Login" class="bttn" type="Submit"></td>
</tr>
<tr>
<td colspan="2" style="color: rgb(255, 0, 0); font-weight: bold;"><br>
</td>
</tr>
</tbody>
</table>
</form>
<br>
</div>
</td>
</tr>
</tbody></table>
<br>
<br>
<br>
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
<tbody><tr> 
<td width="100%" bgcolor="#0a50a1"><img src="images/pixel.gif" alt="" width="1" height="1"></td>
</tr>
<tr> 
<td width="100%">
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr> 
<td width="29%">&nbsp;</td>
<td width="65%"><div align="right"><img src="images/contrexx_footer.jpg" alt="" border="0"></div></td>
<td width="6%" align="right"><img src="images/contrexx_footer2.jpg" alt="" border="0"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div id="footer"><br>
  Powered by <a href="http://www.techgaun.com" target="_blank">phpEIS</a> </div>
<br><br><br>

</body></html>

/**
 * registration stuffs :D
 * Coded By Samar@TechGaun.Com
 */

function validateAll()
{
	stat = true;
	if (checkUsername(document.getElementById('txtRegUname').value) == false) {stat = false;}
	if (checkPassword(document.getElementById('txtRegPwd').value) == false) {stat = false;}
	if (verifyPassword(document.getElementById('txtRegPwd2').value) == false) {stat = false;}
	if (checkEmail(document.getElementById('txtEmail').value, 'txtEmail', false) == false) {stat = false;}
	if (stat == false)
	{
		return false;
	}
}

function checkUsername(val)
{
	if (val == "")
	{
		document.getElementById('lblUname').style.display = "inline";
		document.getElementById('lblUname').style.color = "#f00";
		document.getElementById('lblUname').innerHTML = "Please specify desired username";
		return false;
	}
	
	else if (val.length < 4)
	{
		document.getElementById('lblUname').style.display = "inline";
		document.getElementById('lblUname').style.color = "#f00";
		document.getElementById('lblUname').innerHTML = "Username must be 4-60 characters";
		return false;
	}
	else
	{
		ajaxHandler("user/checkregister.php?userlookup="+document.getElementById('txtRegUname').value, 'lblUname');
	}
}

function checkPassword(val)
{
	if (val == "")
	{
		document.getElementById('lblPass1').style.display = "inline";
		document.getElementById('lblPass1').style.color = "#f00";
		document.getElementById('lblPass1').innerHTML = "Please enter the password";
		return false;
	}
	
	else if (val.length < 4)
	{
		document.getElementById('lblPass1').style.display = "inline";
		document.getElementById('lblPass1').style.color = "#f00";
		document.getElementById('lblPass1').innerHTML = "Password must be at least 6 characters";
		return false;
	}
	else
	{
		//alert(1);
		document.getElementById('lblPass1').style.display = "inline";
		document.getElementById('lblPass1').style.color = "#0f0";
		document.getElementById('lblPass1').innerHTML = "Password is valid";
	}
}

function verifyPassword(val)
{
	pass1 = document.getElementById('txtRegPwd').value;
	if (val == "")
	{
		document.getElementById('lblPass2').style.display = "inline";
		document.getElementById('lblPass2').style.color = "#f00";
		document.getElementById('lblPass2').innerHTML = "Please verify the password";
		return false;
	}
	else if (val != pass1)
	{
		document.getElementById('lblPass2').style.display = "inline";
		document.getElementById('lblPass2').style.color = "#f00";
		document.getElementById('lblPass2').innerHTML = "Passwords do not match";
		return false;
	}
	else
	{
		document.getElementById('lblPass2').style.display = "inline";
		document.getElementById('lblPass2').style.color = "#0f0";
		document.getElementById('lblPass2').innerHTML = "Passwords match";
	}
		
}

function checkEmail(emailStr, infoId, optional)
{
	if (optional == true && emailStr == "")
	{
		return true;
	}
	
	var emailPat=/^(.+)@(.+)$/;
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	var matchArray=emailStr.match(emailPat)
	valid = false;
	if (matchArray==null) 
	{
		document.getElementById(infoId).style.display = "inline";
		document.getElementById(infoId).style.color = "#f00";
		document.getElementById(infoId).innerHTML = "Email address seems incorrect (check @ and .'s)";
		return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];

	if (user.match(userPat)==null) 
	{
		document.getElementById(infoId).style.display = "inline";
		document.getElementById(infoId).style.color = "#f00";
		document.getElementById(infoId).innerHTML = "Value before the '@' doesn't seem to be valid";
	    return false;
	}

	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) 
	{
		for (var i=1;i<=4;i++) 
		{
		    if (IPArray[i]>255) 
		    {
		    	document.getElementById(infoId).style.display = "inline";
				document.getElementById(infoId).style.color = "#f00";
				document.getElementById(infoId).innerHTML = "Destination IP address is invalid!";
		        return false;
		    }
		}
	    valid = true;
	}
	// Domain is symbolic name
	var domainArray=domain.match(domainPat)
	if (domainArray==null) 
	{
		document.getElementById(infoId).style.display = "inline";
		document.getElementById(infoId).style.color = "#f00";
		document.getElementById(infoId).innerHTML = "Value after the '@' doesn't seem to be valid!";
		return false;
	}

	var atomPat=new RegExp(atom,"g");
	var domArr=domain.match(atomPat);
	var len=domArr.length;
	if (domArr[domArr.length-1].length<2 || domArr[domArr.length-1].length>6) 
	{
	   // the address must end in a two letter or other TLD including museum
		document.getElementById(infoId).style.display = "inline";
		document.getElementById(infoId).style.color = "#f00";
		document.getElementById(infoId).innerHTML = "The address must end in a top level domain (e.g. .com), or two letter country."
	    return false;
	}

	if (len<2) 
	{
		document.getElementById(infoId).style.display = "inline";
		document.getElementById(infoId).style.color = "#f00";
		document.getElementById(infoId).innerHTML = "This address is missing a hostname!";
		return false;
	}
	valid = true;
	if (valid == true)
	{
		if (infoId == 'lblEmail')
		{
			ajaxHandler("user/checkregister.php?emaillookup="+document.getElementById('txtEmail').value, 'lblEmail');
		}
		else
		{
			return true;
		}
	}
}

function checkPhone(val)
{
	if (val == "")
	{
		document.getElementById('lblPhone').style.display = "none";
		return true;
	}
	if (val.length > 7 && val.length < 18 && /^[0-9 ()]*$/.test(val) == true)
	{
		document.getElementById('lblPhone').style.display = "inline";
		document.getElementById('lblPhone').style.color = "#0f0";
		document.getElementById('lblPhone').innerHTML = "Phone number is valid!";
		return true;
	}
	else
	{
		document.getElementById('lblPhone').style.display = "inline";
		document.getElementById('lblPhone').style.color = "#f00";
		document.getElementById('lblPhone').innerHTML = "Phone number is invalid!";
		return false;
	}
}

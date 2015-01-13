function ajaxHandler(file, id)
{
    ajaxGateway(file, id);
}

function ajaxGateway(file, id)
{
    var xmlhttp;
    var isGet = 1;
    var postData;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject(Microsoft.XMLHTTP);
    }
    
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	
            if (id == "loginErr")
            {
                if (xmlhttp.responseText == "1")
                {
                	//document.getElementById(id).innerHTML = "Username/password incorrect";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                else
                {
                    document.location = xmlhttp.responseText;
                }
            }
            
            
            else if (id == "lblUname")
            {
                if (xmlhttp.responseText == "1")
                {
                	document.getElementById('lblUname').style.display = "inline";
            		document.getElementById('lblUname').style.color = "#f00";
                	document.getElementById('lblUname').innerHTML = "Username is already in use.";
                	return false;
                }
                else
                {
                	document.getElementById('lblUname').style.display = "inline";
            		document.getElementById('lblUname').style.color = "#0f0";
                	document.getElementById('lblUname').innerHTML = "Username is available";
                }
            }
            
            else if (id == "lblEmail")
            {
                if (xmlhttp.responseText == "1")
                {
                	document.getElementById('lblEmail').style.display = "inline";
            		document.getElementById('lblEmail').style.color = "#f00";
                	document.getElementById('lblEmail').innerHTML = "Email is already in use.";
                	return false;
                }
                else
                {
                	document.getElementById('lblEmail').style.display = "inline";
            		document.getElementById('lblEmail').style.color = "#0f0";
                	document.getElementById('lblEmail').innerHTML = "Email address is available";
                }
            }
            
            else if (id == "commentedinfo")
            {
            	if (xmlhttp.responseText == "0")
                {
                	document.getElementById(id).style.display = "inline";
            		document.getElementById(id).style.color = "#f00";
                	document.getElementById(id).innerHTML = "One or more necessary fields is/are empty.";
                	return false;
                }
            	else if (xmlhttp.responseText == "1")
                {
                	document.getElementById(id).style.display = "inline";
            		document.getElementById(id).style.color = "#f00";
                	document.getElementById(id).innerHTML = "Some unspecified error occurred while posting your comment. Please try again.";
                	return false;
                }
                else
                {	
                	document.getElementById(id).style.display = "inline";
            		document.getElementById(id).style.color = "#0f0";
                	document.getElementById(id).innerHTML = "Thanks for your comment. We'll reply you back ASAP.";
                	
                }
            }
            
            else if (id == "lblPostInfo")
            {
            	//alert(xmlhttp.responseText);
                if (xmlhttp.responseText == "1")
                {
                	document.getElementById(id).style.display = "inline";
            		document.getElementById(id).style.color = "#0f0";
                	document.getElementById(id).innerHTML = "Your reply has been posted.";
                }
                else if (xmlhttp.responseText == "2")
            	{
                	document.getElementById(id).style.display = "inline";
            		document.getElementById(id).style.color = "#f00";
                	document.getElementById(id).innerHTML = "You are not logged in. Please login to reply.";
                	
            	}
                
                else if (xmlhttp.responseText == "3")
            	{
                	document.getElementById(id).style.display = "inline";
            		document.getElementById(id).style.color = "#f00";
                	document.getElementById(id).innerHTML = "Either message or topic not specified.";
                	
            	}
                else
                {
                	document.getElementById(id).style.display = "inline";
            		document.getElementById(id).style.color = "#f00";
                	document.getElementById(id).innerHTML = "Your reply could not be posted due to unspecified error.";
                }
            }
        }
    }
    if (id == "loginErr")
    {
        isGet = 0;
        postData = "txtUname="+document.getElementById('txtUname').value+"&&txtPass="+document.getElementById('txtPass').value;
    }
    
    if (id == "commentedinfo")
    {
        isGet = 0;
        postData = "txtCmtUname="+document.getElementById('txtCmtUname').value+"&&txtCmtEmail="+document.getElementById('txtCmtEmail').value+"&&txtComment="+document.getElementById('txtComment').value+"&&tut_id="+document.getElementById('tutId').value;
        //alert(postData);
    }
    
    if (id == "lblPostInfo")
    {
    	isGet = 0;
    	postData = "message="+document.getElementById('post_text').value+"&&topic_id="+document.getElementById('topic_id').value;
    }
    
    if (isGet == 0)
    {
        xmlhttp.open("POST", "./modules/"+file, true);        
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(postData);
    }
    else
    {
        xmlhttp.open("GET", "./modules/"+file, true);
        xmlhttp.send();
    }
}
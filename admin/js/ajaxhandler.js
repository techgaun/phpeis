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
        	
            if (id == "delete")
            {
            	
                if (xmlhttp.responseText == "0")
                {
                	document.getElementById(id).innerHTML = "Invalid tutorial ID";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else if (xmlhttp.responseText == "1")
                {
                	document.getElementById(id).innerHTML = "Error occurred while deleting tutorial";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else
                {
                	
                    document.location = "index.php?module=tutorial&action=viewall";
                }
            }
            
            else if (id == "delete_news")
            {
                if (xmlhttp.responseText == "0")
                {
                	document.getElementById(id).innerHTML = "Invalid news ID";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else if (xmlhttp.responseText == "1")
                {
                	document.getElementById(id).innerHTML = "Error occurred while deleting news";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else
                {
                    document.location = "index.php?module=info&action=news";
                }
            }
            
            else if (id == "delete_link")
            {
                if (xmlhttp.responseText == "0")
                {
                	document.getElementById(id).innerHTML = "Invalid link ID";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else if (xmlhttp.responseText == "1")
                {
                	document.getElementById(id).innerHTML = "Error occurred while deleting link";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else
                {
                    document.location = "index.php?module=link&action=viewall";
                }
            }
            
            else if (id == "delete_download")
            {
                if (xmlhttp.responseText == "0")
                {
                	document.getElementById(id).innerHTML = "Invalid download ID";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else if (xmlhttp.responseText == "1")
                {
                	document.getElementById(id).innerHTML = "Error occurred while deleting download";
                    document.getElementById(id).style.display = "block";
                    return false;
                }
                
                else
                {
                	///alert(1);
                    document.location = "index.php?module=download&action=viewall";
                }
            }
            
            else if (id == "forumsel")
            {
            	//to do
            }
        }
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
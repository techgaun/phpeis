/**
 * Chat Script
 * Samar@TechGaun
 * www.techgaun.com
 */

function getPage(page, id)
{
    var xmlhttp=false; //Clear our fetching variable
    try 
    {
      //Try the first kind of active x object	
      xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); 
    }
    catch (e)
    {    
		try
		{
		//Try the second kind of active x object
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); 
		}
		catch (E)
		{
		xmlhttp = false;
		}
    }
   
    if (!xmlhttp && typeof XMLHttpRequest!='undefined')
    {
      xmlhttp = new XMLHttpRequest();
    }
    var file = page; 
    xmlhttp.open('GET', file, true);   
    xmlhttp.onreadystatechange=function()
    {
	      if (xmlhttp.readyState==4)
	      { 
		        var content = xmlhttp.responseText;
		        if(content)
		        { 
		          document.getElementById(id).innerHTML = content; 
		        }
	      }
    }
    xmlhttp.send(null) //Nullify the XMLHttpRequest
    return;
  }

function chat()
{  
    var user     = document.getElementById('user').value;
    var message  = document.getElementById('message').value;
  
    getPage("./modules/chat/chat.content.php?user=" + user + "&message=" + message,"screen");
	document.getElementById('message').value = "";
  
}
  
function getMessage()
{
  	getPage("./modules/chat/chat.content.php","screen");
}
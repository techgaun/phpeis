/***************************************
 *  @author Samar Anuj Nigesh Saroj
 **************************************/

function validateUsername(uname)
{
    pattern = "[a-zA-Z0-9]{3,40}";
    if ((uname == "") && (!uname.match(pattern)))
    {
        document.getElementById('lblUserError').style.display = "inline";
        return false;
    }
    else
    {
        document.getElementById('lblUserError').style.display = "none";
        return true;
    }
}

function validatePassword(pass)
{
    if (pass == "")
    {
        document.getElementById('lblPassError').style.display = "inline";
        document.getElementById('txtPass').style.borderStyle = "curved";
        return false;
    }
    else
    {
        document.getElementById('lblPassError').style.display = "none";
        return true;
    }
}
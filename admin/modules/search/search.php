
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>SEARCH
  <META NAME="Generator" CONTENT="">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
 </HEAD>
 
 <BODY>
 		
 <h2>Search</h2> 
			 <form name="search" method="post" action="">
			 Seach for: <input type="text" name="find" /> in 
			 <Select NAME="field">
			 <Option VALUE="email">Email</option>
			 <Option VALUE="comment">Comment</option>
			 <Option VALUE="name">Name</option>
			 </Select>
			
			 <input type="submit" name="search" value="Search" />
			 </form>



 <?php
		if (isset($_POST['search']))
		{
			//$searching = $_POST['searching'];
			$find = $_POST['find'];
			$field = $_POST['field'];
							//This is only displayed if they have submitted the form 
			//	 if ($searching =="yes") 
				// { 
				 echo "<h2>Results</h2><p>"; 
				 
				 //If they did not enter a search term we give them an error 
				 if ($find == "") 
				 { 
				 echo "<p>You forgot to enter a search term"; 
				 exit; 
				 } 

			
			
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "amit";
			
			$con = mysql_connect($host, $user, $pass) or die("Database server is down. Please check back soon.");
			mysql_select_db($db, $con) or die("Could not select the database.");
			
		//	$sql = "SELECT * FROM comment WHERE name LIKE '%word1%' AND status = 'live'";
		//	$res = mysql_query($sql, $con);
		//	mysql_query($sql, $con);
									// We preform a bit of filtering 
						 $find = strtoupper($find); 
						 $find = strip_tags($find); 
						 $find = trim ($find); 
						 
						 //Now we search for our search term, in the field the user specified 
						 $data = mysql_query("SELECT * FROM comment WHERE upper($field) LIKE'%$find%'"); 
						 
						 //And we remind them what they searched for 
						 echo "<b>Searched For:</b> " .$find; 
						 
						 //And we display the results 
						 while($result = mysql_fetch_array( $data )) 
						 { 
							 echo "<hr><b>";
							 echo $result['name']; 
							 echo "</b><br><i>[ "; 
							 echo $result['email']; 
							 echo " ]</i><br>"; 
							 echo "<u><i>wrote</i></u>:<br><t>";
							 echo $result['comment']; 
							 echo "<br></t>"; 
							 echo "<br>"; 
						 } 
						 
						 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
						 $anymatches=mysql_num_rows($data); 
						 if ($anymatches == 0) 
						 { 
						 echo "Sorry, but we can not find an entry to match your search<br><br>"; 
						 } 
						 
						 
				//		 } 

			
		}
		?>
				
			 
</body>
</html>

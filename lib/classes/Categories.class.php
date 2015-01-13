<?php

/** 
 * @author samar
 * 
 * 
 */
class Categories 
{
function ListCategories()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM categories ORDER BY disp_pos ASC";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$cats = $con->fetch_array();
			return $cats;
		}
		return false;
	}
	
	/*function ListRecentTutorials($num)
	{
		$con = new DBConnection();
		$num = Validator::cleanString($num, 'int');
		$query = "SELECT * FROM tutorial ORDER BY tut_id DESC LIMIT $num";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}*/
	
	function viewCategory($cat_id)
	{
		$con = new DBConnection();
		$cat_id = Validator::cleanString($cat_id);
		$query = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function addCategory($name, $desc, $disp_pos)
	{
		$dbcon = new DBConnection();
		$title = Validator::cleanString($title);
		$desc = Validator::cleanString($desc);
		$disp_pos = (is_numeric($disp_pos))?$disp_pos:1;
		
		$query = "INSERT INTO categories (cat_name, cat_desc, disp_pos) VALUES ('$name', '$desc', '$disp_pos')";
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		if ($rows == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function removeCategory($cat_id)
	{
		$dbcon = new DBConnection();
		$cat_id = Validator::cleanString($cat_id);
		$query = "DELETE FROM category WHERE cat_id = '$tut_id'";
		$dbcon->setQuery($query);
		$rows = $dbcon->get_affected_rows();
		if ($rows == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

?>
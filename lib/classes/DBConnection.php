<?php

/** 
 * @author samar
 * 
 * 
 */
class DBConnection {
	//TODO - Insert your code here
	
	private $host;
	private $username;
	private $password;
	private $db;
	private $con;
	private $query;
	private $resource;

	/**
	 * @return the $query
	 */
	public function getQuery() {
		return $this->query;
	}

	/**
	 * @param field_type $query
	 */
	public function setQuery($query) {
		$this->query = $query;
	}

	function __construct() {
		$this->host = "mysql1.000webhost.com";
		$this->username = "a1768716_phpeis";
		$this->password = "testing123";
		$this->db = "a1768716_phpeis";
		$this->con = mysql_connect($this->host, $this->username, $this->password) or die("The database server is down for a while. Please check back soon.");
		mysql_select_db($this->db, $this->con) or die("Could not select the database");
		//return $con;
		//TODO - Insert your code here
	}
	
	/**
	 * 
	 */
	function __destruct() {
		mysql_close($this->con);
		//TODO - Insert your code here
	}
	
	public function execute_query()
	{
		$res = mysql_query($this->query, $this->con);
		$this->resource = $res;
		return $res;
	}
	
	public function fetch_array()
	{
		$array = array();
		while ($result = (mysql_fetch_assoc($this->resource)))
		{
			array_push($array, $result);
		}
		return $array;
	}
	
	public function get_num_of_rows()
	{
		return mysql_num_rows($this->resource);
	}
	
	public function get_affected_rows()
	{
		return mysql_affected_rows($this->con);
	}
}

?>
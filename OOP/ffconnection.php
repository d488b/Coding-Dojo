<?php
class Connection
{
	private $DBHOST = "localhost";
	private $DBUSER = "root";
	private $DBPASS = "root";
	private $dbname;
	private $connection;
	private $db_selected;

	function __construct($dbname)
	{
		$this->dbname = $dbname;
		$this->connection =  mysql_connect($this->DBHOST, $this->DBUSER, $this->DBPASS) or die("Error in connection");
		$this->db_selected = mysql_select_db($this->dbname, $this->connection) or die("Could not connect");
	}

	public function fetch_all($query)
	{
		$data = array();

		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result))
		{
			$data[] = $row;
		}

		return $data;
	}

	public function fetch_record($query)
	{
		$result = mysql_query($query);

		return mysql_fetch_assoc($result);
	}
}
?>
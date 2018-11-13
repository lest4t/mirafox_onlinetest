<?php
/**
 * Date: 11/13/18
 * Time: 5:21 PM
 * Author: lest4t
 */

class DB
{
	protected $connection;

	public function __construct($host, $user, $pass, $dbname) {
		$this->connection = new mysqli($host, $user, $pass, $dbname);

		if (mysqli_connect_error()) {
			throw new Exception('Could not connect to DB');
		}
	}

	public function escape($str) {
		return mysqli_escape_string($this->connection, $str);
	}
}

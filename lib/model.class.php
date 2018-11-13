<?php
/**
 * Date: 11/13/18
 * Time: 5:29 PM
 * Author: lest4t
 */

class Model
{
	/**
	 * @var DB
	 */
	protected $db;

	public static $table = '';

	public function __construct() {
		$this->db = App::$db;
	}

	public function add(array $data) {
		$fields = implode(", ", array_keys($data));
		$values = implode("', '", array_values($data));
		$table  = static::$table;

		$sql = "INSERT INTO {$table} ({$fields}) VALUES ('{$values}')";

		return $this->db->query($sql, true);
	}

	public function update($id, array $data) {
		$table   = static::$table;
		$updates = [];

		foreach ($data as $key => $value) {
			$updates[] = "{$key} = '" . $this->db->escape($value) . "'";
		}
		$updates = implode(", ", $updates);
		$sql     = "UPDATE {$table} SET {$updates} WHERE id = {$id}";

		return $this->db->query($sql);
	}

	public function get(array $data = array()) {
		$table  = static::$table;
		$select = '*';
		if (isset($data['select']) && is_array($data['select'])) {
			$select = implode(", ", $data['select']);
		}
		$sql = "SELECT {$select} FROM {$table}";

		return $this->db->query($sql);
	}
}

<?php
/**
 * Date: 11/13/18
 * Time: 5:31 PM
 * Author: lest4t
 */

class Tests extends Model
{
	static $table = 'tests';

	public function add(array $data) {
		$fields = implode(", ", array_keys($data));
		$values = implode("', '", array_values($data));
		$table = static::$table;

		return $this->db->query(
			"INSERT INTO {$table} ({$fields}) VALUES ('{$values}')", true
		);
	}

	public function update($id, array $data) {
		$table = static::$table;
		$updates = [];

		foreach ($data as $key => $value) {
			$updates[] = "{$key} = '" . $this->db->escape($value) . "'";
		}
		$updates = implode(", ", $updates);

		return $this->db->query(
			"UPDATE {$table} SET {$updates} WHERE id = {$id}"
		);
	}

	public function get(array $data = array()) {
		$table = static::$table;
		$select = '*';
		if (isset($data['select']) && is_array($data['select'])) {
			$select = implode(", ", $data['select']);
		}

		return $this->db->query(
			"SELECT {$select} FROM {$table}"
		);
	}
}

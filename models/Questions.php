<?php
/**
 * Date: 11/13/18
 * Time: 8:34 PM
 * Author: lest4t
 */

class Questions extends Model
{
	static $table = 'questions';

	public function getRandomQuestions($s = array(), $avg, $limit) {
		$table  = static::$table;
		$select = '*';

		if (is_array($s) && count($s) > 0) {
			$select = implode(", ", $s);
		}

		$sql = "SELECT {$select}, 
			(RAND() * (CASE WHEN {$avg} = 0 OR used_count = 0 THEN {$avg} ELSE {$avg} / used_count END)) chance 
			FROM {$table} ORDER BY chance DESC LIMIT {$limit}";

		return $this->db->query($sql);
	}
}

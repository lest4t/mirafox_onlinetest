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

	public function __construct() {
		$this->db = App::$db;
	}
}

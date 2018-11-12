<?php
/**
 * Date: 11/12/18
 * Time: 7:13 PM
 * Author: lest4t
 */

class Config
{
	protected static $settings = array();

	public static function get($key) {
		return isset(self::$settings[$key]) ? self::$settings[$key] : '';
	}

	public static function set($key, $value) {
		self::$settings[$key] = $value;
	}
}
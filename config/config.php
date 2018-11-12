<?php
/**
 * Date: 11/12/18
 * Time: 7:25 PM
 * Author: lest4t
 */

// display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Config::set('site_name', 'Mirafox Test Online');
Config::set('routes', array(
	'default' => '',
));

Config::set('default_route', 'default');
Config::set('default_controller', 'index');
Config::set('default_action', 'index');

Config::set('db_host', 'localhost');
Config::set('db_user', 'mirafox');
Config::set('db_pass', 'mirafox');
Config::set('db_name', 'mirafox');

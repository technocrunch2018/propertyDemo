<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( BASEPATH .'database/DB.php' );

$route['default_controller'] = 'home';
// $route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

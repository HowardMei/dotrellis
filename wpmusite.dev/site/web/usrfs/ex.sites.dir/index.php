<?php
/**
* Plugin Name: Fake 404 Index
* Description: This index file is a placeholder for 404.
* Plugin URI: https://github.com/HowardMei/wpmubase
* Version: 1.0
* Author: Howard Mei
* Author URI: https://github.com/HowardMei
**/
/*
 Don't visit this file from url directly.
*/
!defined('ABSPATH') && header("HTTP/1.1 404 Not Found") && exit("404 Error: Path Not Found.");

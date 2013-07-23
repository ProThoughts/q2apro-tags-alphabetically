<?php
/*
	Plugin Name: List Tags Alphabetically
	Plugin URI: https://github.com/echteinfachtv/q2a-tags-alphabetically
	Plugin Description: Displays all tags in alphabetic order on separate page
	Plugin Version: 0.1
	Plugin Date: 2013-07-23
	Plugin Author: echteinfachtv
	Plugin Author URI: http://www.echteinfach.tv/
	Plugin License: GPLv3
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: https://raw.github.com/echteinfachtv/q2a-tags-alphabetically/master/qa-plugin.php

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.gnu.org/licenses/gpl.html
	
*/

if ( !defined('QA_VERSION') )
{
	header('Location: ../../');
	exit;
}

// page
qa_register_plugin_module('page', 'qa-tags-alphabetically-page.php', 'qa_tags_alphabetically', 'Tags Alphabetically');



/*
	Omit PHP closing tag to help avoid accidental output
*/
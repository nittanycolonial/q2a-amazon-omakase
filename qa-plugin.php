<?php

/*
	2014 (c) Dennis Salguero

	http://www.buriedinfo.com/

	
	File: qa-plugin/amazon-omakase/qa-plugin.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Initiates Amazon Omakase widget plugin

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

*/

/*
	Plugin Name: Amazon Omakase
	Plugin URI: 
	Plugin Description: Provides a display for Amazon Omakase contextual Associate ads
	Plugin Version: 1.0
	Plugin Date: 2014-02-21
	Plugin Author: Dennis Salguero
	Plugin Author URI: http://www.buriedinfo.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.4
	Plugin Update Check URI: 
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}


	qa_register_plugin_module('widget', 'qa-amazon-omakase.php', 'qa_amazon_omakase', 'Amazon Omakase');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/

<?php
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );

	define('DBHOST', 'localhost');
	define('DBUSER', 'database');
	define('DBPASS', 'hello');
	define('DBNAME', 'kcpu-finalize');

	$connect = mysql_connect(DBHOST, DBUSER, DBPASS);
	$db_connect = mysql_select_db(DBNAME);

	if(!$connect) {
		die("<p class='error'>Connection Failed. ".mysql_error()."!</p>");
	}

	if(!$db_connect) {
		die("<p class='error'>Database Connection Failed. ".mysql_error()."!</p>");
	}
?>
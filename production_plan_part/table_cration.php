<?php
	require 'database_connect.php';

	if(!$connect) {
		die('<p>Could not Connect to database'.mysqli_connect_error($connect).'</p>');
	} else {
		$sql = "CREATE TABLE pd_plan(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            manager_name VARCHAR(30) NOT NULL,
            style_name VARCHAR(100) NOT NULL,
            order_no VARCHAR(100) NOT NULL,
            body_color VARCHAR(100) NOT NULL,
            print_quality VARCHAR(100) NOT NULL,
            parts_name VARCHAR(100) NOT NULL,
            color_qty INT(8) UNSIGNED NOT NULL,
            order_qty FLOAT(10, 2) UNSIGNED NOT NULL,
            extra FLOAT(30, 2) UNSIGNED NOT NULL,
            total_qty FLOAT(30, 2) UNSIGNED NOT NULL,
            t_perday FLOAT(30, 2) UNSIGNED NOT NULL,
            t_day FLOAT(30, 2) UNSIGNED NOT NULL,
            p_start VARCHAR(30) NOT NULL,
            p_finish VARCHAR(30) NOT NULL,
            shipment VARCHAR(30) NOT NULL,
            1_time_del VARCHAR(30) NOT NULL,
            dataentry_date timestamp
        )";

        if(mysqli_query($connect, $sql)) {
        	echo('<p>Table Created Successfully</p>');
        } else {
        	die('Could not create table'.mysqli_error($connect).'</p>');
        }
	}

	mysqli_close($connect);
?>
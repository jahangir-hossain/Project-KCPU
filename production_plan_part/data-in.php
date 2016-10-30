<?php
	require 'form-data.php';
	require 'database_connect.php';

	if(!$connect) {
		die('<p class="error">Could not connect to database'.mysqli_connect($connect).'</p>');
	} else {
		$manager_name = mysqli_real_escape_string($connect, $manager);
        $style_name = mysqli_real_escape_string($connect, $style);
        $order_no = mysqli_real_escape_string($connect, $order);
        $body_color = mysqli_real_escape_string($connect, $body);
        $print_quality = mysqli_real_escape_string($connect, $print);
        $parts_name = mysqli_real_escape_string($connect, $parts);
        $color_qty = mysqli_real_escape_string($connect, $color);
        $t_perday = mysqli_real_escape_string($connect, $tpd);
        $p_start = mysqli_real_escape_string($connect, $p_s);
        $p_finish = mysqli_real_escape_string($connect, $p_f);
        $shipment = mysqli_real_escape_string($connect, $s_d);
        
        $sql = "INSERT INTO pd_plan(
            manager_name,
            style_name,
            order_no,
            body_color,
            print_quality,
            parts_name,
            color_qty,
            t_perday,
            p_start,
            p_finish,
            shipment
        ) VALUES (
            '$manager_name',
            '$style_name',
            '$order_no',
            '$body_color',
            '$print_quality',
            '$parts_name',
            '$color_qty',
            '$t_perday',
            '$p_start',
            '$p_finish',
            '$shipment'
        )";

        if(mysqli_query($connect, $sql)) {
        	echo('
                <div style="width: 50%; height: 180px; margin: 150px auto; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.5); text-align: center; padding-top: 60px; font-family: Sans-serif;">
                    <p style="font-size: 1.5em; font-weight: 300">All Data Inserted</p>
                    <a href="index.php" style="color: #2b77c5">Return to Home</a>
                </div>
                ');
        } else {
        	die('<p class="error">Error'.mysqli_error($connect).'</p>');
        }

	}

	mysqli_close($connect);

?>
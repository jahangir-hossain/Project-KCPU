<?php
    function input_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }    

    $manager = $order = $style = $body = $print = $parts = $color = $order_qty = $tpd = $p_s = $p_f = $s_d = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(empty($_GET['manager'])) {
            $manager = "";
        } else {
            $manager = input_data($_GET['manager']);
        }

        if(empty($_GET['order'])) {
            $order = "";
        } else {
            $order = input_data($_GET['order']);
        }

        if(empty($_GET['style'])) {
            $style = "";
        } else {
            $style = input_data($_GET['style']);
        }

        if(empty($_GET['body'])) {
            $body = "";
        } else {
            $body = input_data($_GET['body']);
        }

        if(empty($_GET['print'])) {
            $print = "";
        } else {
            $print = input_data($_GET['print']);
        }

        if(empty($_GET['parts'])) {
            $parts = "";
        } else {
            $parts = input_data($_GET['parts']);
        }

        if(empty($_GET['color'])) {
            $color = "";
        } else {
            $color = input_data($_GET['color']);
        }

        if(empty($_GET['tpd'])) {
            $tpd = "";
        } else {
            $tpd = input_data($_GET['tpd']);
        }

        if(empty($_GET['p_s'])) {
            $p_s = "";
        } else {
            $p_s = input_data($_GET['p_s']);
        }

        if(empty($_GET['p_f'])) {
            $p_f = "";
        } else {
            $p_f = input_data($_GET['p_f']);
        }

        if(empty($_GET['s_d'])) {
            $s_d = "";
        } else {
            $s_d = input_data($_GET['s_d']);
        }
    }
?>

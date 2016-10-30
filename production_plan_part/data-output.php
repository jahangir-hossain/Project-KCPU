<?php require 'header.php'; ?>

	<section id="main">
		
		<header class="page-header">
			<h4>Production Plan Data Table</h4>
		</header> <!--/ header.page-header -->

		<?php
			require 'database_connect.php';
			if(!$connect) {
				die('<p class="error">Could not connect to database'.mysqli_connect_error($connect).'</p>');
			} else {
				$sql_query = "SELECT * FROM pd_plan";
				$result = mysqli_query($connect, $sql_query);

				if(mysqli_num_rows($result) > 0) {
					$start_table = ("
						<table class='production-table'>
							<tr>
								<th>Style Name</th>
								<th>Order No</th>
								<th>Body Color</th>
								<th>Print Quality</th>
								<th>Parts Name</th>
								<th>Color Qty</th>
								<th>Order Qty</th>
								<th>Extra 5%</th>
								<th>Total Qty</th>
								<th>T-PerDay</th>
								<th>Total Day</th>
								<th>P-Start</th>
								<th>P-Finish</th>
								<th>Shipment</th>
								<th>1-Time De.</th>
							</tr>
					");
					echo $start_table;
					// start of while
					while($row = mysqli_fetch_assoc($result)) {
						$mn = $row['manager_name'];
	                    $sn = $row['style_name'];
	                    $on = $row['order_no'];
	                    $bc = $row['body_color'];
	                    $pqua = $row['print_quality'];
	                    $pn = $row['parts_name'];
	                    $cqty = $row['color_qty'];
	                    $odqty = $cqty;
	                    $ext = ($odqty / 20); // calculating the extra fabric
	                    $toqty = ($cqty + $ext); // calculating total quantity
	                    $tpd = $row['t_perday'];
	                    $tod = round(($toqty / $tpd), 3); // calculating total day
	                    $pst = $row['p_start'];
	                    $pfn = $row['p_finish'];
	                    $sh = $row['shipment'];
	                    $onetide = round($tpd / 3);

	                    // making the output result table
	                    $output_table = ("
							<tr class='data-row'>
								<td>$sn</td>
								<td>$on</td>
								<td>$bc</td>
								<td>$pqua</td>
								<td>$pn</td>
								<td>$cqty</td>
								<td>$odqty</td>
								<td>$ext</td>
								<td>$toqty</td>
								<td>$tpd</td>
								<td>$tod</td>
								<td>$pst</td>
								<td>$pfn</td>
								<td>$sh</td>
								<td>$onetide</td>
							</tr>
	                    ");
	                    echo $output_table;
					} // endwhile;
					echo('</table>');
				} else {
					echo('No Result Found!');
				}
			}

			mysqli_close($connect);
		?>

	</section> <!--/ section#main -->

	<?php require 'home_button.php'; ?>

<?php require 'footer.php'; ?>
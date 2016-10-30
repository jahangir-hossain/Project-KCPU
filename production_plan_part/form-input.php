<?php require 'header.php'; ?>

	<section id="main">
		<div class="container">
			<form action="data-in.php" class="data-entry" method="get">
				<input type="text" name="manager" class="entry-box" placeholder="Manager Name">
				<input type="text" name="order" class="entry-box" placeholder="Order No.">
				<input type="text" name="style" class="entry-box" placeholder="Style Name">
				<input type="text" name="body" class="entry-box" placeholder="Body Color">
				<input type="text" name="print" class="entry-box" placeholder="Print Quality">
				<input type="text" name="parts" class="entry-box" placeholder="Parts Name">
				<input type="number" name="color" class="entry-box" placeholder="Color Quantity">
				<input type="number" name="tpd" class="entry-box" placeholder="Target (Perday)">
				<input type="text" name="p_s" class="entry-box" placeholder="Production Start">
				<input type="text" name="p_f" class="entry-box" placeholder="Production Finish">
				<input type="text" name="s_d" class="entry-box" placeholder="Shipment Date">
				<input type="submit" value="Submit" name="submit" class="form-submit">
			</form> <!--/ data-entry form -->
		</div> <!--/ .container -->
	</section> <!--/ section#main -->

<?php require 'home_button.php'; ?>

<?php require 'footer.php'; ?>
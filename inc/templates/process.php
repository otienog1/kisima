<?php require_once '../security.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Process Payment</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}

		.section{
			padding: 3rem 0;
		}
	</style>
</head>
<body>
	<section class="section">
		<div class="container">
			<form id="payment_confirmation" action="https://secureacceptance.cybersource.com/pay" method="post"/> 
				<?php
					foreach($_REQUEST as $name => $value) {
							$params[$name] = $value;
					}
			?>
			<!--
				<fieldset id="confirmation">
					<legend>Payment confirmation</legend>-->
					<div>
						Click the 'Process' button below to proceed to our secure payment platform.
						</div>
					<?php
							foreach($params as $name => $value) {
									echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
							}
							echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
					?>

				<a href="/" class="btn bet-default">&larr; Back to Kisima</a>
				<input type="submit" id="submit" value="Process" class="btn btn-default" />          
				<!--</fieldset>-->
				</form>
		</div>
	</section>
</body>
</html>

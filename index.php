<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hackney API Tester</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
</head>
<body>
	
	<?php
		// TODO security
		if ($_POST['postcode']) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, false);	
			// TODO fix		
			$url = 'http://localhost/hackneytest/hackney.api/?postcode='.urlencode($_POST['postcode']);
			curl_setopt($ch, CURLOPT_URL,$url);

			/* query */
			$result = curl_exec($ch);
			// TODO pretty output results, and handle pagination
			print_r($result);
		}
	?>
	
	<form action="index.php" method="post">
		<input type="text" name="postcode"/>
		<input type="submit"/>
	</form>
	
</body>
</html>

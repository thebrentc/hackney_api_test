<?php
/**
 * Test API
 * 
 * @Note Requires .env with apikey
 */

$apikey = file_get_contents('.env');

/* Handle GET request */
$postcode = $_GET['postcode'];

/* validation */

if (!$postcode || preg_match ( '/^[A-Za-z][1-9]\s[1-9][A-Za-z]{2}$/', $postcode) !== 1) {
	die('Error in postcode');
}
$postcode = urldecode($postcode);

/* setup curl */
$ch = curl_init();
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array($apikey));
$url = 'https://ndws9fa08d.execute-api.eu-west-2.amazonaws.com/development/api/v1/addresses/?postcode='.urlencode($postcode);

curl_setopt($ch, CURLOPT_URL,$url);

/* query */
$result = curl_exec($ch);

/* output */

print_r($result);
?>

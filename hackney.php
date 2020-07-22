<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hackney API Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
</head>
<body>
<?php
/**
 * Test API
 * 
 * @Note Requires .env with apikey
 */

echo '<h1>'.'API Test'.'</h1>';
echo '<hr/>';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$apikey = file_get_contents('.env');

/* Handle GET request */
$postcode = $_GET['postcode'];

/* validation */

if (!$postcode || preg_match ( '/^[A-Za-z][1-9]\s[1-9][A-Za-z]{2}$/', $postcode) !== 1) {
	die('Error in postcode');
}
$postcode = urldecode($postcode);

echo "Postcode: ".'<pre>'.$postcode.'</pre>';


/* setup curl */
$ch = curl_init();
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array($apikey));
$url = 'https://ndws9fa08d.execute-api.eu-west-2.amazonaws.com/development/api/v1/addresses/?postcode='.urlencode($postcode);

curl_setopt($ch, CURLOPT_URL,$url);

/* query */
$result = curl_exec($ch);

var_dump($result);

/* output */
echo '<p>'.$url.'</p>';

print_r($result);
?>
</body>
</html>

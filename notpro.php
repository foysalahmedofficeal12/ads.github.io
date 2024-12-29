<?php

// Get the 'url' parameter from the query string
$url = $_GET['url'];

// Construct the full URL to fetch the response from
$full_url = 'http://103.174.153.203/~apisheba/logs.php?url=' . urlencode($url);

// Get the response from the external URL
$response = file_get_contents($full_url);

// Decode the response into an associative array
$data = json_decode($response, true);

// Check if the necessary keys exist before trying to remove them
if (isset($data['Error code']) && isset($data['Status']) && isset($data['price'])) {
    // Unset the unwanted parts of the response
    unset($data['Error code']);
    unset($data['Status']);
    unset($data['price']);
}

// Re-encode the data back into JSON format
$new_response = json_encode($data);

// Output the new response
echo $new_response;

?>

<?php
// 1. Initialize cURL session
$ch = curl_init();

// 2. Set API URL
curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/24.48.0.1");

// 3. Return the transfer as a string instead of outputting it directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

// 4. Execute the cURL request and store the result
$response = curl_exec($ch);

// 5. Close the cURL session
curl_close($ch);

// 6. Decode the JSON response into a PHP object
$result = json_decode($response);

// 7. Check if API request was successful
if ($result->status == 'success') {
    // 8. Display the location info
    echo "<h2>📍 IP লোকেশন তথ্য</h2>";
    echo "<ul>";
    echo "<li><strong>IP:</strong> " . $result->query . "</li>";
    echo "<li><strong>Country:</strong> " . $result->country . "</li>";
    echo "<li><strong>Region:</strong> " . $result->regionName . "</li>";
    echo "<li><strong>City:</strong> " . $result->city . "</li>";
    echo "<li><strong>ZIP:</strong> " . $result->zip . "</li>";
    echo "<li><strong>Timezone:</strong> " . $result->timezone . "</li>";
    echo "<li><strong>ISP:</strong> " . $result->isp . "</li>";
    echo "<li><strong>Latitude:</strong> " . $result->lat . "</li>";
    echo "<li><strong>Longitude:</strong> " . $result->lon . "</li>";
    echo "</ul>";
} else {
    echo "<p>❌ লোকেশন তথ্য পাওয়া যায়নি।</p>";
}
?>

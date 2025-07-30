<?php

// SQL এর সাথে কানেক্ট করা 
$mysqli = new mysqli('localhost', 'root', '', 'course_enroll');

// Error handling
if ($mysqli->connect_error) {
    die("Connection Failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM students");

// সব row তুলতে while লুপ ব্যবহার করি
while ($row = $result->fetch_assoc()) {
    echo "Name: " . $row['first_name'] . "<br>";
    echo "Email: " . $row['email'] . "<br><br>";
}

?>

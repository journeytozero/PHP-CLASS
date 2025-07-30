<?php

// SQL এর সাথে কানেক্ট করা 
$mysqli = new mysqli('localhost', 'root', '', 'course_enroll');

// Error handling
if ($mysqli->connect_error) {
    die("Connection Failed: " . $mysqli->connect_error);
}

// SQL Query
$sql = 'SELECT * FROM students';

$result = $mysqli->query($sql);

// Result check and output
if ($result) {
    // Check if any rows returned
    if ($result->num_rows > 0) {
        echo "<h3>Students List:</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

        // Loop through each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No students found.";
    }
} else {
    echo "Query Failed: " . $mysqli->error;
}

// Close the connection
$mysqli->close();

?>

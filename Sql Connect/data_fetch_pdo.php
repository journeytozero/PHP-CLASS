<?php
$host = 'localhost';
$db = 'my_first_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // PDO object create
    $pdo = new PDO($dsn, $user, $pass);

    // Error Mode set (যাতে exception দেখায়)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query চালানো
    $stmt = $pdo->query("SELECT * FROM students");
    echo "<style>
    table{
         border-collapse: collapse;
    }
    
    </style>";
    // HTML table তৈরি
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Name</th><th>Email</th><th>Gender</th><th>Phone</th></tr>"; // Table header

    // Data fetch করে table এ show করা
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['mobile_number'] . "</td>";

        echo "</tr>";
    }

    echo "</table>"; // Table শেষ

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

<?php
$host = 'localhost';
$db = 'course_enroll';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);

    // Error mode set
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database connected successfully!<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM students');
$stmt->execute();

// Better way to count rows:
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "Number of rows in this table are: " . count($rows);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values safely
    $username     = htmlspecialchars(trim($_POST["username"]));
    $email        = htmlspecialchars(trim($_POST["email"]));
    $books        = $_POST['book']; // this will be an array
    $number       = (int) $_POST["number"];
    $receiveDate  = $_POST["receive_date"];
    $returnDate   = $_POST["return_date"];

    // Basic validation
    if (
        empty($username) || 
        empty($email) || 
        empty($books) || 
        $number <= 0 || 
        empty($receiveDate) || 
        empty($returnDate)
    ) {
        echo "<h3>❌ All fields are required and must be valid.</h3>";
    } else {
        // Output the result
        echo "<h2>✅ Submission Summary</h2>";
        echo "👤 Username: $username<br>";
        echo "📧 Email: $email<br>";
        echo "📚 Books:<ul>";
        foreach ($books as $book) {
            echo "<li>" . htmlspecialchars($book) . "</li>";
        }
        echo "</ul>";
        echo "🔢 Copies: $number<br>";
        echo "📅 Receive Date: $receiveDate<br>";
        echo "📅 Return Date: $returnDate<br>";
    }
} else {
    echo "<h3>Invalid request</h3>";
}
?>

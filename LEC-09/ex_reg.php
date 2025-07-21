<form method="POST">
    <input type="text" name="mobile" placeholder="Enter mobile number">
    <button type="submit">Check</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['mobile'];

    if (preg_match("/^(?:\+8801|01)[3-9]\d{8}$/", $number)) {
        echo "✅ Valid BD Mobile Number";
    } else {
        echo "❌ Invalid";
    }
}
?>

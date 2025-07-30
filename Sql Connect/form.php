<?php
// error_reporting(E_ALL); // Enable error reporting during development
ini_set('display_errors', 1); // Show errors

// 1. Database Connection
try {
    $handle = new PDO("mysql:host=localhost; dbname=form_data", 'root', '');
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$success_message = "";
$error_message = "";

// 2. Check if the form is submitted
if (isset($_POST['submit'])) {
    
    // Get data from form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $twitter = $_POST['twitter'];
    $web = $_POST['web'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $sex = $_POST['sex'] ?? ''; // Default to empty if not selected

    // Handle hobbies array
    $chk = "";
    if (!empty($_POST['hobbies']) && is_array($_POST['hobbies'])) {
        $checkbox = $_POST['hobbies'];
        $chk = implode(", ", $checkbox); // Convert hobbies array to a comma-separated string
    }

    // 4. Validation: Check if required fields are empty
    if (empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($sex)) {
        $error_message = "First Name, Last Name, Username, Email, and Gender are required.";
    } else {
        // 5. Use prepared statement for inserting data into the database (PDO approach)
        $sql = "INSERT INTO authors (first_name, last_name, user_name, email, twitter, url, city, country, hobbies, sex) 
                VALUES (:fname, :lname, :uname, :email, :twitter, :web, :city, :country, :chk, :sex)";

        // Prepare the SQL statement
        $stmt = $handle->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':twitter', $twitter);
        $stmt->bindParam(':web', $web);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':chk', $chk);
        $stmt->bindParam(':sex', $sex);

        // Execute the statement
        if ($stmt->execute()) {
            $success_message = "Author Registered Successfully!";
        } else {
            $error_message = "Failed to Register. Try Again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author Registration Form</title>
    <style type="text/css">
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 40px; }
        form { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        h2 { text-align: center; color: #333; }
        p { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type='text'], input[type='email'], input[type='url'] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"], input[type="reset"] { background-color: #007BFF; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="reset"] { background-color: #6c757d; }
        .message { padding: 15px; margin-bottom: 20px; border-radius: 5px; text-align: center; color: white; }
        .success { background-color: #28a745; }
        .error { background-color: #dc3545; }
    </style>
</head>
<body>

    <h2>Register as an Author</h2>
    
    <?php if (!empty($success_message)): ?>
        <div class="message success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <?php if (!empty($error_message)): ?>
        <div class="message error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <p>
            <label>First Name:</label>
            <input type="text" name="fname" required>
        </p>
        <p>
            <label>Last Name</label>
            <input type="text" name="lname" required>
        </p>
        <p>
            <label>Username:</label>
            <input type="text" name="uname" required>
        </p>
        <p>
            <label>Email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Twitter Address:</label>
            <input type="text" name="twitter">
        </p>
        <p>
            <label>Web Address:</label>
            <input type="url" name="web">
        </p>
        <p>
            <label>Country:</label>
            <input type="text" name="country">
        </p>
        <p>
            <label>City:</label>
            <input type="text" name="city">
        </p>
        <p>
            <label>Select Your Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="surfing"> Net Browsing
            <input type="checkbox" name="hobbies[]" value="reading"> Reading Books
            <input type="checkbox" name="hobbies[]" value="blogging"> Blogging
            <input type="checkbox" name="hobbies[]" value="movies"> Watch Movies
        </p>
        <p>
            <label>Gender:</label><br>
            <input type="radio" name="sex" value="Male" required> Male
            <input type="radio" name="sex" value="Female"> Female
        </p>
        <p>
            <input type="submit" name="submit" value="Save">
            <input type="reset" name="cancel" value="Cancel">
        </p>
    </form>

</body>
</html>

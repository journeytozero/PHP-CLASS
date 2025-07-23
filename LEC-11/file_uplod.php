<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

<h2>Upload an Image</h2>
<!-- HTML Form to upload a file -->
<form action="" method="POST" enctype="multipart/form-data">
    <label for="fupload">Choose an image (JPG, PNG, GIF, JPEG):</label>
    <input type="file" name="fupload" id="fupload" required>
    <input type="submit" value="Upload Image">
</form>

<?php
// Define the upload directory
$upload_dir = 'upload';

// Check if the 'upload' directory exists, if not, create it
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true); // Make the directory with proper permissions
}

// Check if the form is submitted and the file is uploaded
if (isset($_FILES['fupload'])) {
    // Retrieve file info
    $fileName = $_FILES['fupload']['name'];
    $fileTmpName = $_FILES['fupload']['tmp_name'];
    $fileType = $_FILES['fupload']['type'];
    $fileSize = $_FILES['fupload']['size'];
    $fileError = $_FILES['fupload']['error'];

    // Allowed file types
    $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

    // Check if the file type is valid
    if (in_array($fileType, $allowedTypes)) {
        // Check if there are any errors with the uploaded file
        if ($fileError === UPLOAD_ERR_OK) {
            // Generate a unique name for the file to prevent conflicts
            $fileNewName = uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            
            // Define the path where the file will be stored
            $targetFilePath = $upload_dir . '/' . $fileNewName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                echo "<p>File uploaded successfully!</p>";

                // Display the uploaded image
                echo "<img src='$targetFilePath' width='200' height='150'><br>";

                // Display the file path
                echo "File Path: " . $targetFilePath;
            } else {
                echo "<p>Error: There was an issue moving the file to the upload directory.</p>";
            }
        } else {
            echo "<p>Error: There was an issue with the file upload. Error code: $fileError</p>";
        }
    } else {
        echo "<p>Sorry, only JPG, JPEG, PNG, and GIF files are allowed.</p>";
    }
}
?>

</body>
</html>

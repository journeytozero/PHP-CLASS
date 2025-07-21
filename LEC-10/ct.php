<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['name'];

    if(!empty($name))
    {
        echo $name;
    }
    else
    {
        echo "Enter Your Name.";
    }
}
else
{
    echo "There is no data posted";
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
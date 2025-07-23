<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        Enter Numbers: <input type="text" name="numbers">
        <input type="submit" name="submit" value="Show Largest">
    </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $numbers = $_POST['numbers'];

    $numArray = array_map('trim', explode(",", $numbers));

    $numArray = array_filter($numArray, 'is_numeric');

    if (!empty($numArray)) {
        $largestNum = $numArray[0];

        foreach ($numArray as $num) {
            if ($num > $largestNum) {
                $largestNum = $num;
            }
        }

        echo "The Largest Number is : " . $largestNum;
    } else {
        echo "Please input your number!";
    }
}







?>
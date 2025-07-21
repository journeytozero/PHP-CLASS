<?php

$taskFile = "tasks.txt";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task'])){
    $task = trim($_POST['task']);

    if($task !== "")
    {
        file_put_contents($taskFile, $task . PHP_EOL, FILE_APPEND);
    }
}


if(isset($_GET['delete']))
{
    $tasks = file($taskFile, FILE_IGNORE_NEW_LINES);
    unset($tasks[$_GET['delete']]);
    file_put_contents($taskFile, implode(PHP_EOL, $tasks)); 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
</head>
<body>
    <h2>📝 My To-Do List</h2>

    <form method="POST" action="">
        <input type="text" name="task" placeholder="Enter a new task">
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php
        if(file_exists(($taskFile)))
        {
            $tasks = file($taskFile, FILE_IGNORE_NEW_LINES);

            foreach($tasks as $index => $task)
            {
                echo "<li>". htmlspecialchars($task) . "<a href ='?delete=$index'>❌</a></li>";
            }
        }
        
        
        
        
        
        ?>
    </ul>
</body>
</html>
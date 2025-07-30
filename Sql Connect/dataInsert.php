<?php
$handle = new PDO("mysql:host=localhost; db = course_enroll",'root','');

try{
    $handle = new PDO("mysql:host=localhost; db = course_enroll",'root','');
    $handle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Data insert Success";
}
catch(PDOException $e)
{
    echo $e->getMessage();
}






?>
<?php
function employees($value, $key, $p)
{
    echo "<pre>";
    echo "$key $p $value";
    echo "</pre>";
}

$emp = ['Jamal','Kamal','Rahim','Hadia'];

array_walk($emp, "employees","has the name");



?>

<?php
$ages = [1 => 10, 2 => 20, 3 => 300 , 4 => 40];

//asort($ages);  Ascending by Value, Keep Keys
arsort($ages);  // change with index and value

//rsort($ages); // Index not change but value change;
//krsort($ages);
echo "<pre>";
print_r($ages);
echo "</pre>"
?>


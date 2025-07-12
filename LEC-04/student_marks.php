<?php
$students =[
    ['id'=> 101,'name'=> 'Samir', 'marks' => [80,60,80,79,45]],
    ['id'=> 102,'name'=> 'Sahil', 'marks' => [90,80,45,82,75]]
];

foreach($students as $student)
{
    $average = array_sum($student['marks'])/count($student['marks']);

    echo "{$student['name']} - Average: $average <br>";
}




?>
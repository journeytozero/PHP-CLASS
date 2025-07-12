<?php

/* $a = 1;
$b = 2;

function sum()
{
    global $a,$b;
    $b = 20;
    $c = $a+$b;
    echo "Total Sum is: ".$c;
}
sum();*/

$noOfCalls = 0;
function countCall()
{
    static $noOfCalls = 0;
    $noOfCalls++;
    echo "The Function is called $noOfCalls Times <br>";
}
countCall();
countCall();
countCall();
?>
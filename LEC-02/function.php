<?php
function withDate()
{
    return "Today is: "." ".date("F,D,Y");
}
echo withDate();

echo "<br>";

function add()
{
    $a = 10;
    $b = 20;
    $c = $a + $b;
    echo $c;
}
add();

?>
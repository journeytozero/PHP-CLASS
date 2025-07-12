<?php

function addFive(&$num)
{
    $num += 5;
}

function addSix(&$num)
{
    $num += 6;
}

$orginNum = 10;

addFive($orginNum);

echo "Orginal Number is $orginNum <br>";

addSix($orginNum);
echo "Orginal Number is $orginNum <br>"



?>
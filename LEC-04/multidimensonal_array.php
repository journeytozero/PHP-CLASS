<?php
$result = [
    ['country'=> 'Bangladesh','capital' => 'Dhaka'],
    ['country'=> 'Pakistan','capital' => 'Karachi'],
    ['country'=> 'Afganistan','capital' => 'Kabul']
];


$capital = [];

foreach($result as $key => $value)
{
    $capital[$key] = $value['country'];
}

array_multisort($capital,SORT_DESC,$result);
print_r("Modified array are : <br>");

echo "<pre>";
print_r($result);
echo "</pre>";




?>


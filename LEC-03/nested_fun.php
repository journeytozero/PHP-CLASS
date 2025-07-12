<?php

function salesTax($price, $tax)
{
    // Nested function inside outer function
    function convertBdt($dollar, $convertRate = 120)
    {
        return $dollar * $convertRate;
    }

    $total = $price + ($price * $tax / 100); // Fix tax calculation
    echo "Total Cost in Dollar: $total<br>";
    echo "Total Cost in BDT: " . convertBdt($total) . "<br>";
}

salesTax(120, 5);
?>

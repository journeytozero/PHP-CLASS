<?php
$colors = ["Motherbord", "Mouse", "Keybord", "Ram", "Mouse", "Keybord","Ram"];
$uniqueColors = array_unique($colors);
echo "<pre>";
print_r($uniqueColors);
echo "</pre>";
?>

<?php
$fruits = ["apple", "banana", "cherry", "date", "elderberry"];

// Start from index 2 ("cherry") and take all remaining elements
$slice1 = array_slice($fruits, 2);
echo "<pre>";
print_r($slice1);
echo "</pre>";
?>
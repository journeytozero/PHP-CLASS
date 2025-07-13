<?php
$date = DateTime::createFromFormat('d/m/Y', '13/07/2025');
echo $date->format('Y-m-d'); // Outputs: 2025-07-13

$date1 = new DateTime("2025-07-01");
$date2 = new DateTime("2020-04-01");

$dff = $date1->diff($date2);

echo "<br> Time Difference is: " . $dff->format('%y Years, %m Months, %d Days');
?>

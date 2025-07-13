<?php
// 1. Convert custom format date to standard format
$date = DateTime::createFromFormat('d/m/Y', '13/07/2025');
echo $date->format('Y-m-d'); // Outputs: 2025-07-13

// 2. Date difference between two specific dates
$date1 = new DateTime("2025-07-01");
$date2 = new DateTime("2020-04-01");

$dff = $date1->diff($date2);
echo "<br>Time Difference is: " . $dff->format('%y Years, %m Months, %d Days');

// 3. Difference from job start date to now
echo "<br>";
$now = new DateTime();
$oldDate = new DateTime("2020-01-22");

$diff = $oldDate->diff($now);
echo "Your Job Life is: " . $diff->format("%y Years, %m Months, %d Days");

// 4. Total days between two times
echo "<br>";
$time1 = new DateTime("2000-07-13 10:30:00");
$time2 = new DateTime("2025-02-10 14:45:30");

$diff = $time1->diff($time2);
echo "Total Days: " . $diff->days;

// 5. Year comparison using DateInterval
echo "<br>";
$olddate = new DateTime("2024-06-05");
$now = new DateTime();

$diff = $olddate->diff($now);

// Correct comparison: check if full year difference is >= 1
if ($diff->y >= 1) {
    echo "Yes, the difference is more than or equal to 1 year";
} else {
    echo "No, the difference is less than 1 year";
}
?>

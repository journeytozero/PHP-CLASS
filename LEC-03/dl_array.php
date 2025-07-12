<?php
$students = array(
    array(
        'name' => 'Sahil',
        'id' => 10,
        'subject' => 'PWAD'
    ),
    array(
        'name' => 'Sakira',
        'id' => 20,
        'subject' => 'JEEE'
    ),
    array(
        'name' => 'Samira',
        'id' => 23,
        'subject' => 'NET'
    )
);

foreach ($students as $index => $student) {
    foreach ($student as $key => $val) {
        print "$key: $val<br>";
    }
    print "<br>";
}
?>

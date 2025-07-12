<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <style>
        table {
            border-collapse: collapse; /* Better for borders */
            width: 100%; /* Or adjust as needed */
        }
        th, td {
            border: 1px solid black; /* Modern way to add borders */
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Multiplication Table (1 to 12)</h1>

    <?php

    print "<table>";
    // Optional: Add a header row
    print "<thead><tr><th>X</th>";
    for ($j = 1; $j <= 12; $j++) {
        print "<th>" . $j . "</th>";
    }
    print "</tr></thead>";

    print "<tbody>";
    for ($i = 1; $i <= 12; $i++) {
        print "<tr>";
        // Optional: Add a header column for rows
        print "<th>" . $i . "</th>";
        for ($j = 1; $j <= 12; $j++) {
            print "<td>";
            print ($i * $j);
            print "</td>";
        }
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";

    ?>

</body>
</html>
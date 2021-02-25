<?php
include "funcs_first_task.php";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Firms&Phones</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <h2>First Task</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
        </tr>
        <?php
        $list = getUniquePhone();
        foreach ($list as $firm) {
            echo '<tr><td>' . $firm['Firms'] . '</td><td> ' . $firm['Phone'] . '</td></tr>';
        }

        ?>
    </table>
    </body>
    </html>

<?php
$numb_of_phones = countPhones();
$tmp = [];
foreach ($numb_of_phones as $firm_name => $numb_phone) {
    if ($numb_phone == 0) echo "<h3>No numbers has $firm_name </h3>";
    elseif ($numb_phone >= 2) echo "<h3>More then 2 numbers has $firm_name </h3>";
    elseif ($numb_phone < 2) echo "<h3>Less then 2 numbers has $firm_name</h3>";
    $tmp[] = $numb_phone;
}
$max = max($tmp);
foreach ($numb_of_phones as $firm_name => $numb_phone) {
    if ($numb_phone == $max) echo "<h3>Max numbers has $firm_name </h3>";
}
?>

<h3><a href="guest_book.php">View the Second task</a></h3>
<h3><a href="timer.php">View the Third task</a></h3>

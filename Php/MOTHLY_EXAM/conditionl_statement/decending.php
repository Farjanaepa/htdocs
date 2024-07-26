<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sort_number</title>
</head>
<body>

<form method="post" action="">
    <label for="number1">Enter the first number:</label>
    <input type="number" name="number1" id="number1" required><br>
    <br>

    <label for="number2">Enter the second number:</label>
    <input type="number" name="number2" id="number2" required><br>
    <br>

    <label for="number3">Enter the third number:</label>
    <input type="number" name="number3" id="number3" required><br>
    <br>

    <label for="number4">Enter the fourth number:</label>
    <input type="number" name="number4" id="number4" required><br>
    <br>

    <button type="submit">Submit</button>
    <hr>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input for four numbers
    $number1 = isset($_POST['number1']) ? (float)$_POST['number1'] : 0;
    $number2 = isset($_POST['number2']) ? (float)$_POST['number2'] : 0;
    $number3 = isset($_POST['number3']) ? (float)$_POST['number3'] : 0;
    $number4 = isset($_POST['number4']) ? (float)$_POST['number4'] : 0;

    // Put the numbers in an array
    $numbers = [$number1, $number2, $number3, $number4];

    // Sort the array in descending order
    rsort($numbers);

    // Display the sorted numbers
    echo '<strong>Sorted numbers in descending order:</strong> ' . implode(', ', $numbers);
}
?>
</body>
</html>

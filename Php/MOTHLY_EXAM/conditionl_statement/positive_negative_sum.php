<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// Initialize variables to store user input and result
$userInput = '';
$data = [];
$resultPrinted = false;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the form
    $userInput = isset($_POST['userInput']) ? $_POST['userInput'] : '';
    
    // Convert the input string into an array of numbers
    $data = array_map('intval', explode(',', $userInput));

    // Display the result
    countAndSumArrayElements($data);
    $resultPrinted = true;
}
?>

<?php
// Display the form only if the result has not been printed
if (!$resultPrinted) {
    ?>
    <form method="post" action="">
        <label for="userInput">Enter comma-separated numbers:</label>
        <input type="text" name="userInput" id="userInput" value="<?php echo $userInput; ?>" required>
        <button type="submit">Submit</button>
    </form>
    <?php
}
?>

<?php
function countAndSumArrayElements($arr) {
    $positiveCount = 0;
    $negativeCount = 0;
    $zeroCount = 0;
    $sum = 0;

    foreach ($arr as $value) {
        $sum += $value;

        if ($value > 0) {
            $positiveCount++;
        } elseif ($value < 0) {
            $negativeCount++;
        } else {
            $zeroCount++;
        }
    }

    echo "Number of positive elements: $positiveCount<br>";
    echo "Number of negative elements: $negativeCount<br>";
    echo "Number of zero elements: $zeroCount<br>";
    echo "Sum of array elements: $sum<br>";
}
?>

</body>
</html>

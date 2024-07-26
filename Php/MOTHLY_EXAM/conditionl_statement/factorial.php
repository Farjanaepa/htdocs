<?php
function factorial($n) {
    if ($n == 0 || $n == 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $result = factorial($number);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 100px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input, button {
            margin: 10px;
            padding: 5px;
            font-size: 16px;
        }
    </style>
    <title>Factorial Calculator</title>
</head>
<body>
    <div class="container">
        <h2>Factorial Calculator</h2>
        <form method="post" action="">
            <label for="number">Enter a number:</label>
            <input type="number" name="number" required>
            <button type="submit" name="submit">Calculate Factorial</button>
        </form>
        <?php
        if (isset($result)) {
            echo "<p>The factorial of $number is: $result</p>";
        }
        ?>
    </div>
</body>
</html>

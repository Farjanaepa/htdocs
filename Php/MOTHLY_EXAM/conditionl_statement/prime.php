<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prime Number Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        form {
            background-color: teal;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<form method='post'>
    enter a number<input type="text" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
    <input type="submit" name="submit" value='submit'>
</form>


<?php
if(isset($_POST["submit"])) {
    $b = $_POST["fname"];
    $c = 0;

    if ($b < 0) {
        echo "Negative numbers cannot be prime or composite.";
        exit();
    }

    if($b==0 || $b==1) {
        echo "Not Prime or Composite";
        exit();
    }

    for($i=2; $i<$b; $i++) {
        if($b%$i == 0) {
            $c++;
        }
    }

    if($c == 0) {
        echo "<div class='result'>$b is a prime number</div>";
    } else {
        echo "<div class='result'>$b is not a prime number</div>";
    }
}
?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grade</title>
</head>
<body>
    <h2 style="background-color: gray;">Your GPA Score</h2>
    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $score = isset($_POST['score']) ? (int)$_POST['score'] : 0;

        switch (true) {
            case ($score >= 80 && $score <= 100):
                echo "Your Result: <h2>A+</h2>";
                break;

            case ($score >= 70 && $score <= 79):
                echo "Your Result: <h2>A</h2>";
                break;

            case ($score >= 60 && $score <= 69):
                echo "Your Result: <h2>B</h2>";
                break;

            case ($score > 100):
                echo '<script>alert("Do not enter above 100");</script>';
                break;

            default:
                echo "Your Result: <h2>Fail</h2>";
        }
    }
    ?>

    <form method="post" action="">
        <label for="score">Enter your score:</label>
        <input type="number" name="score" id="score" required>
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>


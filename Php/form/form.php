<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>
<?php
class FormHandler
{
    private $formData = [];

    function handleFormSubmission()
    {
        if (isset($_POST['submit'])) {
            $this->formData = json_decode(file_get_contents('form_data.txt'), true) ?: [];
            array_push($this->formData, $_POST);
            file_put_contents('form_data.txt', json_encode($this->formData) . PHP_EOL);
        }
    }
    function displayFormData()
    {
        if (!empty($this->formData)) {
            echo '<h2>Submitted Form Data:</h2><table border="1"><tr>';
            // Table headers dynamically generated based on the keys of the form submissions
            foreach (array_keys($this->formData[0] ?? []) as $header) {
                echo '<th>' . htmlspecialchars($header) . '</th>';
            }
            echo '</tr>';
            // Table data
            foreach ($this->formData as $submission) {
                echo '<tr>';
                foreach ($submission as $value) {
                    echo '<td>' . htmlspecialchars($value) . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
    }
}

// Instantiate the FormHandler
$formHandler = new FormHandler();

// Handle form submission
$formHandler->handleFormSubmission();


// Display submitted form data in a table
$formHandler->displayFormData();
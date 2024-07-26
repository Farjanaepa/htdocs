<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiple Image Upload and Display</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
        }

        form {
            display: inline-block;
            text-align: left;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            margin-bottom: 10px;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid black;
        }

        img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<form action="#" method="post" enctype="multipart/form-data">
    <div>
        Select Images:<br/>
        <input type="file" name="files[]" multiple required/>
    </div>

    <div>
        <input type="submit" name="btnSubmit" value="Upload"/>
    </div>
</form>

<?php
if (isset($_POST["btnSubmit"])) {
    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    echo "<table>
            <tr>
                <th>File Name</th>
                <th>File Type</th>
                <th>File Size</th>
                <th>Preview</th>
            </tr>";

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        $file_size = $_FILES['files']['size'][$key];

        $targetFilePath = $uploadDir . $file_name;
        move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath);

        echo "<tr>
                <td>$file_name</td>
                <td>$file_type</td>
                <td>$file_size</td>
                <td><img src='$targetFilePath' alt='Preview'></td>
              </tr>";
    }

    echo "</table>";
}
?>

</body>
</html>

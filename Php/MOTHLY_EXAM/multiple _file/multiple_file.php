<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiple File Upload and Display</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
            background-color: #f2f2f2;
        }

        form {
            display: inline-block;
            text-align: left;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 20px;
        }

        div {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiple File Upload and Display</title>
    <style>
        /* Your existing styles */
    </style>
</head>
<body>

<form action="#" method="post" enctype="multipart/form-data">
    <div>
        <label for="files">Select Files:</label><br/>
        <input type="file" id="files" name="files[]" multiple/>
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
                <th>Status</th>
            </tr>";

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $targetFilePath = $uploadDir . $file_name;

        // Check file size (600KB limit)
        $maxFileSize = 600 * 1024; // 600KB in bytes

        if ($file_size > $maxFileSize) {
            $status = "Size Limit Exceeded";
            @unlink($tmp_name); // Delete the temporary file
        } else {
            move_uploaded_file($tmp_name, $targetFilePath);
            $status = "Uploaded Successfully";
        }

        echo "<tr>
                <td>$file_name</td>
                <td>$file_type</td>
                <td>$file_size</td>
                <td>$status</td>
              </tr>";
    }

    echo "</table>";
}
?>

</body>
</html>

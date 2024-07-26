
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
            padding: 20px;
            background-color: #f3f3f3;
        }

        form {
            display: inline-block;
            text-align: left;
            background-color: lightblue;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 5);
        }

        input {
            margin-bottom: 10px;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 50%;
        }

        table, th, td {
            border: 1px solid black;
        }

        fieldset {
            background-color: #E9CACA;
            text-align: center;
            border: 2px solid teal;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            width: 30%;
            height: 450px;
        }
    </style>
    </style>
</head>
<body>

<fieldset>
<legend><h2>Student Information Form</h2></legend>
<form action="#" method="post" enctype="multipart/form-data">

    <div>
        ID:<br/>
        <input type="text" name="txtId"/>
    </div>

    <div>
        Name:<br/>
        <input type="text" name="txtName"/>
    </div>

    <div>
        Email:<br/>
        <input type="text" name="email"/>
    </div>

    <div>
        Phone:<br/>
        <input type="text" name="txtPhone"/>
    </div>

    <div>
        File Upload:<br/>
        <input type="file" name="myfile"/>
    </div>

    <div>
        <input type="submit" name="btnSubmit" value="Submit"/>
    </div>

    <div>
            <a href="logout.php">Logout</a>
    </div>

</form>
</fieldset>



<?php
// Include the Student class file
require_once("student_class.php");

// Check if the form is submitted
if (isset($_POST["btnSubmit"])) {
    $id = $_POST["txtId"];
    $name = $_POST["txtName"];
    $email = $_POST["email"];
    $phone = $_POST["txtPhone"];

    // Create a new Student object
    $student = new Student($id, $name, $email, $phone);

    // Save the student data
    $student->save();

    // Check if a file is uploaded
    if (!empty($_FILES['myfile']['name'])) {
        $filename = $_FILES['myfile']['name'];
        $tmpfile = $_FILES['myfile']['tmp_name'];
        $img = 'uploads/';

        move_uploaded_file($tmpfile, $img . $filename);
        echo "<img src='$img/$filename' width='400px' height='300px'>";
    } else {
        echo "Please select a file";
    }
}

// Logout logic
session_start();

if(!isset($_SESSION["sname"])){
    header("location:login.php");
 }

// Display students
Student::display_students();
?>

</body>
</html>


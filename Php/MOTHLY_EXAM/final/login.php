<?php
session_start();

if (isset($_POST["btnLogin"])) {
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];

    $file = file("auth.txt");

    foreach ($file as $line) {
        list($_username, $_password) = explode(",", $line);

        if (trim($_username) == $username && trim($_password) == $password) {
            $_SESSION["sname"] = $username;
            header("location: demo.php");
        } else {
            $msg = "Username or Password is incorrect!";
        }
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <style>
        body {
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        form {
            margin: 20px;
        }

        div {
            margin-bottom: 10px;
        }

        input {
            padding: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to my home page</h1>
    </header>

    <?php
    echo isset($msg) ? $msg : "";
    ?>

    <form action="#" method="post">
        <div>
            Username<br/>
            <input type="text" name="txtUsername" />
        </div>
        <div>
            Password<br/>
            <input type="password" name="txtPassword" />
        </div>
        <div>
            <input type="submit" value="Log In" name="btnLogin" />
        </div>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action ="getpostvariable.php" method= "get">
    Username: <input type="text" name= "username"><br><br>
    Password: <input type="password" name="pass"><br><br>
    <input type="submit" value="Log in">

</form>

<?php
    if(isset($_GET['username']) && isset($_GET['pass'])){
        $username= $_GET['username'];
        $password= $_GET['pass'];


        if($username=='mamun' &&$password=='12345' ){
            echo'Log in succesful';
        }else'error log in';
        
    }


?>

    
</body>
</html>
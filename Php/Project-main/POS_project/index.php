<?php
    session_start();

$conn = new mysqli('localhost','root','','pos_project');

if(isset($_POST["btnLogin"])){
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];
   

    $dataselect = "SELECT * FROM user Where username='$username' and password='$password'";
    $dataquery = mysqli_query($conn,$dataselect);
   
    
    $dataarray = mysqli_fetch_assoc($dataquery);
   
    if($dataarray){
        $_SESSION["sname"] = $username;
        header("location:dashboard.php");
    }else{
        $msg="User or password is not correct !";
    }
}
       
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: url("logo pic/img1.png");
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px;
        }

        .logo {
            margin-bottom: auto; /* Pushes the logo to the top-left corner */
        }

        .container {
            width: 100%;
            max-width: 450px; /* Limiting container width for better readability */
            margin-left: auto; /* Pushes the container to the right */
            background-color: #81cbe9a2;
            border-radius: 30px;
            padding: 20px;
           
            float: right;
            margin: 30px 70px 0px 30px;
        }

        .container h2 {
            margin-bottom: 20px;
            text-align: center; /* Centering the heading */
        }

        .container form {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .container form label {
            margin-bottom: 1px;
        }

        .container form input {
            outline: none;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid rgb(133, 129, 129);
            border-radius: 5px;
        }

        #button {
            border: none;
            color: #fff;
            font-size: 18px;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            float:right;
            width:10rem;
            background: linear-gradient(to right, rgb(76, 0, 255), rgb(0, 217, 255));
        }
        button a{
            color:white;
            text-decoration:none;
        }

        .newUser {
            margin-top: 20px;
            text-align: center;
        }

        .newUser span {
            color: rgb(252, 43, 6);
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <di v class="logo">
        <h1 class="text-danger">
            <img style="width: 200px;" src="logo pic/logopic.png" alt="">
        </h1>
    </div>

    <div class="container">


        <h2>Login Form</h2> 
       

           <p style=" color: red ";> 
                 <?php
                echo isset($msg)?$msg:"";
                  ?>
            </p>
        <form action="#" method="post" class="form">
       
            <label for="userId"><span>User name</span></label>
            <input type="text" name="txtUsername" id="userId">
            <label for="password"><span>Password</span></label>
            <input type="password" name="txtPassword" id="password">
            <div>
            <input type="submit" value="Login" name="btnLogin" id= "button" class= "btn btn-login bg-primary">
        </div>
        </form>
        <p class="newUser">
            Not a member? <span>Signup now</span>
        </p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

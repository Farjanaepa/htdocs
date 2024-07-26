
<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>
<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if (isset($_POST['submit'])){ 
    $name = $_POST['name'];
    $price = $_POST['price'];
     $manufac = $_POST['manufacturer_id'];

     $sql = "INSERT INTO product(name,price,manufacturer_id) VALUES ('$name','$price','$manufac')";
     if(mysqli_query($conn, $sql) == TRUE){ 
        echo "DATA INSERTED";
        header('location:view.php');
     }else{ 
        echo "not inserted";
     }
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


   <div class="container"> 

    <div class="row">

<h1 class="btn btn-dark">PRODUCT RETURN</h1>
<center>
    <div class="row"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-8 pt-2 mt-4 border border-success "> 
    
            <form action="insert.php" method="POST" class= "bg-dark text-white" >
            <br>  
                Product Name:<br>
                <input type ="text" name ="name"><br><br>
                Price:<br>
                <input type ="text" name ="price"><br><br>
                manufacturer id:<br>
                <input type ="text" name ="manufacturer_id"><br><br>
                <input type ="submit" name ="submit" value="insert" class="btn btn-info">
                <a href="view.php" class="btn btn-info">Viewresult</a>
                <br> <br>
            </form>
        </div>
        <div class="col-sm-2 "></div>
    </div>

    </center>

        </div>
   
    

   </div>

<?php 
    include("includes/footer.php");
?>
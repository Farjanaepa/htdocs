<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if ($_GET['id']){ 
    $getid = $_GET['id'];
   $sql = "SELECT * FROM suppliers WHERE id=$getid";
   $query = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($query);
   $id = $data['id'];
   $name = $data['name'];
   $email = $data['email'];
   $phone = $data['phone'];
   $address = $data['address'];
}
     if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
     $sql1 = "UPDATE suppliers SET name='$name',
                                email='$email',
                                phone='$phone',
                                address='$address' where id = '$id' ";
     if(mysqli_query($conn, $sql1) == TRUE){ 
        header('location:view_supplier.php');
        echo "DATA update";
     }else{ 
        echo $sqli1. "Data not update";
     }
    }
    


?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>


   <div class="container"> 
   <center>  
    <div class="row">
    
        <div class="col-sm-3"></div>
       
        <div class="col-sm-6 pt-4 mt-4 bg-dark text-white ">
            
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"> 
        Name:<br>
        <input type ="text" name ="name" value="<?php echo $name ?>"><br><br>
        Email:<br>
        <input type ="text" name ="email" value="<?php echo $email ?>"><br><br>
        Phone:<br>
        <input type ="text" name ="phone" value="<?php echo $phone ?>"><br><br>
        
        <input type ="text" name ="id" value =" <?php echo $id ?>" hidden><br>
        Address:<br>
        <textarea name="address" id="" value="<?php echo $address ?>"></textarea><br><br>
        <input type ="submit" name ="edit" value="Edit" class="btn btn-info"><br><br>
    </form>
   
    </div>
    
        <div class="col-sm-3"></div>
    </div>
    </center>
   </div>
   
<?php 
    include("includes/footer.php");

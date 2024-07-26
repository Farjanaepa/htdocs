<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if ($_GET['id']){ 
    $getid = $_GET['id'];
   $sql = "SELECT * FROM product WHERE id=$getid";
   $query = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($query);
   $id = $data['id'];
   $name = $data['pname'];
   $p_id = $data['cat_id'];
   $subcatname = $data['sub_category_id'];
   $price = $data['price'];
   $manufac = $data['manufacturer_id'];
}
     if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['pname'];
        $p_id = $_POST['cat_id'];
        $subcatname = $_POST['sub_category_id'];
        $price = $_POST['price'];
         $manufac = $_POST['manufacturer_id'];
     $sql1 = "UPDATE product SET pname='$name',
                                cat_id = '$p_id',
                                sub_category_id = '$subcatname',
                                price='$price',
                                manufacturer_id='$manufac' where id = '$id' ";
     if(mysqli_query($conn, $sql1) == TRUE){ 
        header('location:view.php');
        echo "DATA update";
     }else{ 
        echo $sqli. "Data not update";
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
       
        <div class="col-sm-6 pt-4 mt-4 border border-success bg-dark text-white ">
            
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" > 
        Name:<br>
        <input type ="text" name ="pname" value="<?php echo $name ?>"><br><br>
        Category Name:<br>
        <input type ="text" name ="catname" value="<?php echo $p_id ?>"><br><br>
        Subcategory Name:<br>
        <input type ="text" name ="subcatname" value="<?php echo $subcatname ?>"><br><br>
        Price:<br>
        <input type ="text" name ="price" value="<?php echo $price ?>"><br><br>
        manufacturer_id:<br>
        <input type ="text" name ="manufacturer_id" value="<?php echo $manufac ?>"><br><br>
        <input type ="text" name ="id" value =" <?php echo $id ?>" hidden><br>
        <input type ="submit" name ="edit" value="Edit" class="btn btn-info"><br><br>
    </form>
   
    </div>
    
        <div class="col-sm-3"></div>
    </div>
    </center>
   </div>
   
<?php 
    include("includes/footer.php");

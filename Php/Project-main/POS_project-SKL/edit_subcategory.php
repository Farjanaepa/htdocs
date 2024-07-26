<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if  (isset($_GET['id'])){ 
    $getid = $_GET['id'];
   $sql = "SELECT * FROM sub_category WHERE id=$getid";
   $query = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($query);
   $id = $data['id'];
   $subcatname = $data['subcatname'];
}



if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $subcatname = $_POST['subcatname'];
    
 $sql1 = "UPDATE sub_category SET subcatname='$subcatname' where id = '$id' ";
 if(mysqli_query($conn, $sql1) == TRUE){ 
    header('location:view_subcategory.php');
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
       
        <div class="col-sm-6 pt-4 mt-4 bg-dark text-white">
            
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"> 
        Subcategory Name:<br>
        <input type ="text" name ="subcatname" value="<?php echo $subcatname; ?>"><br><br>
        <input type ="text" name ="id" value =" <?php echo $id ?>" hidden><br><br>
        <input type ="submit" name ="edit" value="Edit" class="btn btn-info"><br><br>
    </form>
   
    </div>
    
        <div class="col-sm-3"></div>
    </div>
    </center>
   </div>
   
<?php 
    include("includes/footer.php");

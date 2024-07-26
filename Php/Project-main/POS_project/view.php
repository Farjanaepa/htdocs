<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if (isset($_GET['deleteid'])){ 
    $deleteid = $_GET['deleteid'];

     $sql = "DELETE FROM  product WHERE id = $deleteid";
     if(mysqli_query($conn, $sql) == TRUE){ 
        header('location:view.php');
     }
}


?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
   <div class="container"> 
    <div class="row"> 
    <p>
     
    
         

    <span class='btn btn-info'><a href='insert.php' class='text-white text-decoration-none'>Add New Product</a></span>
    
       
    </p>
        <div class="col-sm-1"></div>
        <div class="col-sm-10 pt-4 mt-4 border border-success bg-dark text-white"> 
           
            <h3 class="text-center p-2 m-2 bg-secondary text-white">Product Information</h3>
           
            <?php 
            $sql = 'SELECT * FROM product';
            
            $query = mysqli_query($conn, $sql);
            echo "<table class='table table-success'>
             <tr class='table-dark'>
                <th>ID</th>
                <th>PRODUCT NAME</th>
                <th>PRICE</th>
                <th>MANUFACTURER_ID</th>
                <th>ACTION</th>
             </tr>";
           while ($data = mysqli_fetch_assoc($query)){ 

            $id = $data['id'];
            $name = $data['name'];
            $price = $data['price'];
            $manufac = $data['manufacturer_id'];
            echo "<tr> 
                    <td>$id</td>
                    <td>$name</td>
                    <td>$price</td>
                    <td>$manufac</td>
                    <td>
                    <span class='btn btn-info'><a href='edit.php?id=$id' class='text-white text-decoration-none'>Edit</a></span>
                    <span class='btn btn-danger'><a href='view.php?deleteid=$id' class='text-white text-decoration-none'>Delete</a></span>
                    </td>
                </tr>";
           }
            ?>
        </div>
        <div class="col-sm-1"></div>
       
  
    </div>
   </div>
  
 
 
  
   <?php 
    include("includes/footer.php");
?>

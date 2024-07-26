<!-- <?php 
include'header.php'?> -->
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $conn = mysqli_connect("localhost","root","","pos") or die("Connection Failed");

    $sql = "SELECT * FROM product JOIN productclass WHERE product.category=productclass.pid";
    
   $result = mysqli_query($conn,$sql) or die ("Query Unsuccessful.");

   if(mysqli_num_rows($result) > 0){
    ?>
    <table cellpadding="7px">
        <thead>
            <th>ID</th>
            <th>ID</th>
            <th>ID</th>
            <th>ID</th>
            <th>ID</th>
            <th>ID</th>
            <th>ID</th>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){
          ?>

          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php  echo $row['productcode'] ?></td>
            <td><?php  echo $row['category'] ?></td>
            <td><?php  echo $row['cost price'] ?></td>
            <td><?php   echo $row['selling pricr']?></td>
            <td><?php  echo $row['quanity'] ?></td>
            <td><?php  echo $row['description'] ?></td>
          </tr>
        <tr>
            <td>
                <a href="edit.php">Edit</a>
                <a href="delete.php">Delete</a>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    <?php
}
?>
</div>


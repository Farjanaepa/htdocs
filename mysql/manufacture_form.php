<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$db = new mysqli('localhost','root','','company');
if (isset($post['btnSubmit'])){
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $paddress = $_POST['paddress'];
    $contact_no = $_POST['contact_no'];
    $db->query("call add_manufacturer('$pid,$pname','$paddress',$contact_no)");
}



?>

    <h3>Manufacture table</h3>

    <form action="#" method=post>
        <table>
        <tr>
                <td><label for="pid">ID</label></td>
                <td><input type="text" name="pid" /></td>
            </tr>
            <tr>
                <td><label for="mname">Name</label></td>
                <td><input type="text" name="mname" /></td>
            </tr>
            <tr>
                <td><label for="paddress">Address</label></td>
                <td><input type="text" name="paddress" /></td>
            </tr>

            <tr>
                <td><label for="contact_no">contact</label></td>
                <td><input type="text" name="contact_no" /></td>
            </tr>

            <td></td>
            <td><input type="submit" name="btnSubmit" value="submit"></td>
        </table>


    </form>

    <h3>product table</h3>

    <form action="#" method=post>
        <table>
            <tr>
                <td><label for="mname">Name</label></td>
                <td><input type="text" name="mname" /></td>
            </tr>

            <tr>
                <td><label for="price">price</label></td>
                <td><input type="text" name="price" /></td>
            </tr>
            <td><label for="manufac">manufacturer name</label></td>
            <td>
                <select name="manufac" id="">

                <?php
                $manufac = $db->query("select *from manufacturer");
                while(list($_pid,$_pname)=$manufac->fetch_row()){
                    echo"<option value='$_pid'>$_pname</option>";
                    
                }
                
                ?>
                </select>
            </td>
                 <tr>
            <td></td>
            </tr>        
        </table>


    </form>
</body>
</html>
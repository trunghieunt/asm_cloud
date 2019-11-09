<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<script src = "https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
	<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
	<title>HOME</title>
	<link rel="stylesheet" href="./CssCloud.css">
</head>

<body  style="background-color: #C1CDC1">
	<?php
	require_once ("./ConnectCloud.php");
	?>
	<?php
	require_once ("./HeaderCloud.php");
	?>
	<div class="header">
		<ul>
			<li><a href="AdminCategory.php">Category</a></li>
			<li><a href="AdminProduct.php">Product</a></li>
			<li><a href="AdminAccount.php">Account</a></li>
		</ul>
	</div>
	<br> 
</td>
</tr>
</table>	
    	<?php
require_once './ConnectCloud.php';
if(isset($_POST['toyid'], $_POST['toyname'], $_POST['image'], $_POST['price'], $_POST['catid']))
{
    $image = "";
    $extension = "";
    
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        $temp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $image = "$toyid.$extension";
        $destination = "./img/$image";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    
      
    // mysql query to insert data
    $sql = "INSERT INTO Toyproduct (toyid, toyname, image, price, catid ) 
                    values (:toyid, :toyname, :image, :price, :catid)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':toyid', $_POST['toyid'], PDO::PARAM_STR);
    $stmt->bindValue(':toyname', $_POST['toyname'], PDO::PARAM_STR);
    $stmt->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
    $stmt->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
    $stmt->bindValue(':catid', $_POST['catid'], PDO::PARAM_STR);
     
    $pdoExec = $stmt->execute();   
        // check if mysql insert query successful
    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
}
?> 
<table border =  "2" cellspacing="1"  width="800" height="500" style="margin-left: 15%">
    <tr>
        <th colspan="2"><center><h2>Add New Product</h2></center></th>
   	</tr>
   	<tr>
        <form action="AddProduct.php" method="post">

        <td>Toy ID</td>
        <td><input type="text" name="toyid" required placeholder="Toyid"></td>
    </tr>
    <tr>
        <td>Toy Name</td>   
        <td><input type="text" name="toyname" required placeholder="ToyName"></td>
    </tr>
    	<td>Image</td>  
        <td><input type="file" name="image" required placeholder="Image"></td>
    </tr>
    <tr>
    	<td>Price</td>
        <td><input type="number" name="price" required placeholder="Price"></td>
    </tr>
    <tr>
    	<td>Cat ID</td>
        <td><input type="number" name="catid" required placeholder="CatId"></td>
    </tr>
    <tr>
 
        <td colspan="2" ><center><input type="submit" value="Insert Data"></center></td>
    </tr>
    </form>
    </td>
    </tr>
    </table>   
   
          <h2><a style="color:#100D0D; font-size :20px; margin-left :15%;" href="./AdminProduct.php">Back to Admin</a></h2>

    </body>

</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<script src = "https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
	<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
	<title>SHOP CLOUD</title>
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
	
	
		<table border="2" cellspacing="1"  width="800" height="500" style="margin-left: 15%">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>CatId</th>
				 <th colspan="2">Action</th>
			</tr>
			
	
      
            <?php
                $sql = "SELECT * FROM Toyproduct";
                $stmt = $pdo->prepare($sql);        
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                    $Toyid = $row['toyid'];
                    $ToyName = $row['toyname'];
                    $Image = $row['image'];
                    $Price = $row['price'];
                    $CatId = $row['catid'];
                   
                    $link_image = "./img/$Image";             
                    echo "<tr>";
                    echo "<td>$Toyid</td>";                
            ?>
            <form action="AddProduct.php" method="post">

                  <input type="hidden" name="toyid" value="<?php echo $row['toyid'] ?>" />
                <td><input type="text" size="5" name="toyname" required value="<?php echo $row['toyname']; ?>"/></td>          
                
                
                <?php echo "<td><img src='$link_image' width='200px' height='200'></td>";?>
                
                <td><input type="text" size="5" name="price" required value="<?php echo $row['price']; ?>"/></td>
                
                <td><input type="text" size="5" name="catid" required value="<?php echo $row['catid']; ?>"/></td>
                
            
              

                <td><input type="submit" value="Edit" /></td>
            </form>    
                <td>
    <?php
		require_once ("./HeaderCloud.php");
	?>
                    <form class="frminline" action="DeleteCloud.php" method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="toyid" value="<?php echo $row['toyid'] ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                    
                </td>

                <?php
                echo "</tr>";
            }
            ?>
            <script>
                function confirmDelete() {
                    var r = confirm("Are you sure you would like to delete ?");
                    if (r) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
        </table>        
    </div> 
<h2><a style="color: black; font-size: 20px; margin-left: 15%;" href="./AddProduct.php">Add new product</a></h2>
</body>
</html>
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
	<table border="2" cellspacing="1"  width="1000" height="1000" style="margin-left: 15%">
			<tr>
				<th>username</th>
				<th>password</th>
				 <th colspan="2">Action</th>
			</tr>
      
            <?php
                $sql = "SELECT * FROM account";
                $stmt = $pdo->prepare($sql);        
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                    $username = $row['username'];
                    $password = $row['password'];
                   
                    $link_image = "./images/item/$iImage";             
                    echo "<tr>";
                    echo "<td>$username</td>";                
            ?>
            <form action="updateitem.php" method="post">

                  <input type="hidden" name="username" value="<?php echo $row['username'] ?>" />
                
                
                <td><input type="text" size="5" name="password" required value="<?php echo $row['password']; ?>"/></td>
                
                <td><input type="submit" value="Edit" /></td>
            </form>    
                <td>
                    <form class="frminline" action="DeleteCloud.php" method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="username" value="<?php echo $row['toyid'] ?>" />
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
<h2><a style="color: black; font-size: 20px; margin-left: 15%;" href="./AddAccount.php">Add new product</a></h2>

</body>
</html>
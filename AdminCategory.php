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
                <th>Cat ID</th>
                <th>Cat Name</th>
                <th>Image</th>
                 <th colspan="2">Action</th>
            </tr>
            
    
      
            <?php
                $sql = "SELECT * FROM category";
                $stmt = $pdo->prepare($sql);        
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                    $CatId = $row['catid'];
                    $CatName = $row['catname'];
                    $IMG = $row['img'];
                    $link_image = "./img/$IMG";             
                    echo "<tr>";
                    echo "<td>$CatId</td>";                
            ?>
            <form action="AddCategory.php" method="post">

                  <input type="hidden" name="catid" value="<?php echo $row['catid'] ?>" />
                <td><input type="text" size="5" name="catname" required value="<?php echo $row['catname']; ?>"/></td>          
                
                
                <?php echo "<td><img src='$link_image' width='200px' height='200'></td>";?>
                
        
                <td> <form class="frminline" action="Update.php" method="post" onsubmit="return confirmUpdate();">
                        <input type="hidden" name="catid" value="<?php echo $row['catid'] ?>" />
                        <input type="submit" value="Exit" />
                    </form>
                </td>
            </form>    
                <td>
    <?php
        require_once ("./HeaderCloud.php");
    ?>
                    <form class="frminline" action="DeleteCloud.php" method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="catid" value="<?php echo $row['catid'] ?>" />
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
<h2><a style="color: black; font-size: 20px; margin-left: 15%;" href="./AddCategory.php">Add new product</a></h2>
</body>
</html>
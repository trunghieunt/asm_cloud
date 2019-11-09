<?php 
   require_once("./ConnectCloud.php");
?>
<?php	
	if( isset($_POST['toyid']) ){
    
    $sql = "DELETE FROM Toyproduct WHERE toyid = :toyid";
    $stmt= $pdo->prepare($sql);
    $stmt->bindValue(':toyid', $_POST['toyid'], PDO::PARAM_INT);
    $stmt->execute();
    die(" Found '$toyid' <a href='AdminProduct.php'>Not found '$toyid'</a> to continue.");
}



				
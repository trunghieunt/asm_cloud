<?php
	require_once ("./ConnectCloud.php");
?>
<?php	
	if( isset($_POST['catid'], $_POST['catname'], $_POST['img']))
	{
	    
	    $sql = "UPDATE category SET catname = :catname WHERE catid = :catid";
	    $stmt= $pdo->prepare($sql);
	    $stmt->bindValue(':catid', $_POST['catid'], PDO::PARAM_INT);
	    $stmt->bindValue(':catname', $_POST['catname'], PDO::PARAM_STR);
	    $pdoExec = $stmt->execute();
	    
	        // check 
	    if($pdoExec)
	    {
	        die("You've updated the Catalogue '$cid' <a href='managecatalogue.php'>click here</a> to continue.");
	    }else{
	        echo 'Data Not updated';
	    }
	}    
?>
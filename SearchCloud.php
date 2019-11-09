<?php 
   require_once("./ConnectCloud.php");
?>
<?php       
// Connecting, selecting database
$dbconn = pg_connect('pgsql:host=ec2-174-129-241-14.compute-1.amazonaws.com;port=5432;dbname=dactdvvilpraas', 'vtxgsmmbwwvphq', 'be4521c7c9d016149f013a082acafa99f9ae520fc215a56d397c299b7deca5d1')
or die('Could not connect: ' . 'toyid');

//collect
if(isset($_POST['toyid'])) {
    $searchq = $_POST['toyid'];
 	$stmt= $pdo->prepare($sql);
    $stmt->bindValue(':toyid', $_POST['toyid'], PDO::PARAM_INT);
    $stmt->execute();
  if($pdoExec)
    {
        echo 'Found + :toyid ';
    }else{
        echo 'Not Found + :toyid';
    }
// Performing SQL query
$query = "SELECT toyid FROM Toyproduct WHERE toyid = :'toyid'";

}
?>
                                    
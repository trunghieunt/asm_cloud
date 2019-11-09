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
</table>
<center><div><h1 class="product"><b>All PRODUCTS</b></h1></div></center>
<div class="third">
	
<?php


//Refere to database
$db = parse_url(getenv("DATABASE_URL"));
$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

	//you sql query
	$sql = "SELECT * FROM Toyproduct";

	$stmt = $pdo->prepare($sql);
	//execute the query on the server and return the result set
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	//desplay the data
?> 


<div class="Allproduct">
	<div class="image">

		<?php
			foreach ($resultSet as $row)
			{
				echo"<li>" . $row["toyid"] .'--'. $row["toyname"]. $row["image"]. $row["price"] .'--'. $row["catid"]. "</li>";
			}
		?>
	</div>
</div></div>
</div>
</body>
</html>
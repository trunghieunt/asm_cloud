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
<div> <img src="./img/home.jpg" style="width: 100%; height:500px;"> </div>
</table>
<center><div><h1 class="product"><b>FEATURED PRODUCTS</b></h1></div></center>
<?php
echo "Show all products from PostgreSQL Database";

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
	$sql = "SELECT * FROM Category";

	$stmt = $pdo->prepare($sql);
	//execute the query on the server and return the result set
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	//desplay the data
?> 
<div>

<ul class="Allproduct">
	
	<?php
		foreach ($resultSet as $row) {

				echo"<li>" . $row["catid"] .'--'. $row["catname"] .'--'. $row["img"]. "</li>";
	
			}
	?>

</ul>

</div>		
</body>
</html>
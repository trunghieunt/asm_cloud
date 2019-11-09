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

<div class="third">
		 <form method="POST" action="AdminProduct.php" >
        <table style="margin-left: 37%;" height="300" >
        	<tr>
				<td align="center" colspan="2"><h1>LOGIN</h1></td>

			</tr>
            <tr>
		<td width="150"><b>Username:</b></td>
		<td width="250"><input type="name" name="username"><br></td>
	</tr>
	<tr>
		<td width="150"><b>Password:</b></td>
		<td width="250"><input type="password" name="password"><br></td>
	</tr>
	<tr>
    	<td align="center" colspan="2"><b><input type ="submit" value="Log In"></b>

		</td>
	</tr>
        </table>
    </form>
</div>
<?php
	require_once ("./ConnectCloud.php");
?>


</body>
</html>

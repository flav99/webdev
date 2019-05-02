<?php
	SESSION_START();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>my website</title>
		<link rel="sytlesheet" type="text/css" href="style.css" />
	</head> 
	<body>
		<header>
			<div class="topnav">
					<a id="header-logo" href="#">
						<img src="logo.png" alt="logo" style="float:left;width:200px;height:200px">
					</a>
					<tr>
						<td><a href="home.php">Home</a></td>
						<td><a href="add.php">add</a></td>
						<td><a href="delete.php">delete</a></td>
						<td><a href="contact.php">Contact</a></td>
						<td><a href="signup.php">Signup</a></td>
					</tr>
			</div>
		</header>
		<div>
			<div style="text-align:right;">
			<?php
				if(isset($_SESSION['userId'])){
					echo '<form action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit">logout</button>
					</form>';
				}
				else{
					echo '<form action="includes/login.inc.php" method="post">
					<input type="text" name="mailuid" placeholder="UserName/E-mail...">
					<input type="password" name="pws" placeholder="Password...">
					<button type="submit" name="login-submit">login</button>
					</form>';
				}
			?>				
			</div>
		</div>
	</body>
</html>
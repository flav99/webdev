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
		<div id="container">
			<div id="header">
				<h1>Flavagram</h1>
			</div>
			<div id="content">
				<div id="nav">
					<a id="header-logo" href="#">
						<img src="img/logo.png" alt="logo" class="logo">
					</a>
					<ul>
						<li>home</li>
						<li>contact</li>
						<li>about</li>
					</ul>
				</div>
				<div>
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
					<a href="signup.php">Signup</a>
				</div>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>UNICS</title>
		<link rel="stylesheet" type="text/css" href="Assets/css/main.css">
		<meta charset="UTF-8">
	</head>
	<body>
		<img src="Assets/img/lov.jpg">
		<div id="div_wrapper">
			<a id="banner">Welcome to University Crowdsourcing!</a>
		</div>
		<div id="main">
			<div id="div_userbox" class="bigbox">
			<img src="Assets/img/icon.png" id="logga">
				<nav class="full">
					<ul class="menu">
						<li><h1><a id="start" href="index.php">Start</a></h1> </li>
						<li><h1><a id="sign_up" href="sign_up.php" class="active">Sign up</a></h1></li>
						<!--<li><h1><a href="info.php">Info</a></h1></li>-->
						<li><h1><a href="donate.php">Donate</a></h1></li>
					</ul>
				</nav>
				<div id="div_regform">
					<form action="addUsers.php" name="registerForm" id="register" method="POST">
						<input id="Email" name="email" placeholder="Your email">
						<input id="pw" name="password" type="password" placeholder="The password">						
						<input id="fname" name="Fname" placeholder="First name">
						<input id="lname" name="Lname" placeholder="Last name">
						<input class="b_login" id="registerBtn" type='submit' name='Register' value='Register' />
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
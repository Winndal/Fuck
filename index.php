<!DOCTYPE html>
<html>
	<head>
		<title>UNICS</title>
		<link rel="stylesheet" type="text/css" href="Assets/css/main.css">
		<meta charset="UTF-8">
	</head>
	<body>
		<div id="div_wrapper">
			<a id="" >Welcome to University Crowdsourcing!</a>
		</div>
		<div id="main">
			<div id="div_userbox" class="smallbox">
			<img src="Assets/img/icon.png" id="logga">
				<nav class="full">
					<ul class="menu">
						<li><h1><a href="index.php" class="active">Start</a></h1></li>
						<li><h1><a href="sign_up.php">Sign up</a></h1></li>
					</ul>
				</nav>
				<div id="div_email_pw">
					<form action="addLogin.php" name="loginForm" id='Login' method='POST'>
						<input id="email" name="loginEmail" placeholder="Your email">
						<input id="pw" type="password" name="password" placeholder="The password">
						<input class="b_login" id="loginBtn" type='submit' name='Login' value='Login'>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
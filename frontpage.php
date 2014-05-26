<!DOCTYPE html>

<?php session_start();
if(!isset($_SESSION['loggedin'])){
		echo "<script>
           alert('Please login! :)');
           window.location.href='index.php';
          </script>";
}
	echo "Welcome, you are now logged in as: ". $_SESSION['email']; 

?>

<html>
	<head>
  		<title> Startsida </title>
		<link href="Assets/css/frontpage.css" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="main.js"></script> 
 	</head>
 	<body>
 		<div id="banner"><p>BANNER</p></div>
 		<div id="mainDiv">
 			<div id="profile_icon"><a href="logout.php" id="href_profile">Viktor Springe</a></div>
 			<div id="menyDiv">
 				<ul class="menu">
 					<li><a name="kurserimenyn" onclick="return loadmeny()">Kurser</a></li>
 					<li><h1><a href="/">Filer</a></h1></li>	
 					<li><h1><a href="/">Annat</a></h1></li>	
				</ul>
 			</div>
 		</div>
 		<div id="contentDiv" onclick="return loadmeny()"> 
 			<p>CONTENT</p>
 		</div>
 		<div id="reklamDiv">
 			<img id="reklam" src="Assets/img/unics_reklam.jpg">
 		</div>
 		<div id="barDiv">
 			<div id="searchDiv"><input type="text" placeholder="Sök..." class="Search"></div>
 		</div>
 	</body>
</html>
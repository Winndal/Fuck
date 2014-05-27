<!DOCTYPE html>

<?php session_start();
if(!isset($_SESSION['loggedin'])){
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }
?>

<html>
	<head>
  		<title> Startsida </title>
		<link href="Assets/css/frontpage.css" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="Assets/js/main.js"></script> 
 	</head>
 	<body>
 		<div id="banner"><button href="logout.php" id="btn_logout" value="Logut"></button></div>
 		<div id="mainDiv">
 			<div id="profile">
 				<img id="icon" src="Assets/img/icon.png">
 				<a href="/profile" id="href_profile">Pontus Sundberg</a>
 			</div>
 			<div id="menyDiv">
 				<ul class="menu">
 					<li><a name="mycourses" >My Courses</a></li>	
 					<li><a name="uploadbtn" onclick="return loadmeny()">Upload file</a></li>	
				</ul>
 			</div>
 		</div>
 		<div id="contentDiv" onclick="return loadmeny()"> 
 			<p>CONTENT</p>
 		</div>
 		<div id="reklamDiv">
 			<img id="reklam" src="Assets/img/unics_reklam.jpg">
 		</div>
 		<div id="searchDiv">
 			<input type="text" placeholder="Sök..." class="Search">
 		</div>
 	</body>
</html>
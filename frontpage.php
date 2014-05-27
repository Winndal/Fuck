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
 		<div id="banner">
 			<form action="logout.php" name="logoutform" id='form_logout'>
						<input id="logoutBtn" type='submit' name='Logout' value='Logout'>
			</form>
 		</div>
 		<div id="mainDiv">
 			<div id="searchDiv">
 				<input type="text" placeholder="Search..." class="Search">
 			</div>
 			<div id="profile">
 				<img id="icon" src="Assets/img/icon.png">
 				<a href="/profile" id="href_profile">Pontus Sundberg</a>
 				<div id="menyDiv">
 					<ul class="menu">
 						<li><a name="mycourses" >My Courses</a></li>	
 						<li><a name="uploadbtn" onclick="return loadmeny()">Upload file</a></li>
 						<li><a name="addCourse" onclick="return loadNewCourse()">Add course<a/></li>	
					</ul>
 			</div>
 			</div>
 			<div id="contentDiv"> 
 				<p>CONTENT</p>
 			</div>
 			<!--<div id="reklamDiv">
 				<img id="reklam" src="Assets/img/unics_reklam.jpg">
 			</div>-->
 		</div>
 	</body>
</html>
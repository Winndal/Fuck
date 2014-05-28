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
 		<img src="Assets/img/lov.jpg">
 		<div id="banner">
 			<a>"Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi"</a>
 			<form action="logout.php" name="logoutform" id='form_logout'>
				<input id="logoutBtn" type='submit' name='Logout' value='Log Out'>
			</form>
 		</div>
 		<div id="mainDiv">
 			<div id="searchDiv">
 				<form method="POST" name="searchForm">
 					<input type="text" name="search" placeholder="Search..." class="Search">
 				</form>
 			</div>
 			<div id="profile">
 				<img id="icon" src="Assets/img/icon.png">
 				<a href="/profile" id="href_profile"><?php echo $_SESSION['wholeName']; ?></a>
 				<div id="menyDiv">
 					<ul class="menu">
 						<li><a name="mycourses" >My Courses</a></li>
 						<li><a name="myprodjects" >My Prodjects</a></li>	
 						<li><a name="msg" >Send message</a></li>
 						<li><a name="addCourse" onclick="return loadNewCourse()">Create a course</a></li>	
 						<li><a name="addprodject" >Create a prodject</a></li>
 						<li><a name="uploadbtn" onclick="return loadmeny()">Upload file</a></li>
 						<li><a name="Q-A" >Q&A</a></li>
 						<li><a name="Report" >Report content</a></li>	
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
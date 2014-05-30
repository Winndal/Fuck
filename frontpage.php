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
 	<body onload="welcomepage();">
 		<div id="banner">
 			<a>"Feel free to search, share and download files. Thank you for using UNICS."</a>
 			<form action="logout.php" name="logoutform" id='form_logout'>
				<input id="logoutBtn" type='submit' name='Logout' value='Log Out'>
			</form>
 		</div>
 		<div id="mainDiv">
 			<div id="searchDiv">
 				<form method="POST" name="searchForm">
 					<input type="text" name="search" placeholder="Search..." class="Search" autocomplete="off">
 				</form>
 			</div>
 			<div id="cmenu">
 				<div id="lmenu">
 					<div id="profile">
 						<img id="icon" src="Assets/img/icon.png">
 						<a href="frontpage.php" id="href_profile"><?php echo $_SESSION['wholeName']; ?></a>
 					</div>
 					<div id="menyDiv">
 						<ul class="menu">
 							<li><a name="mycourses" onclick="return loadMyCourses()">My Courses</a></li>
 							<li><a name="myprojects" onclick="return buildinginprogress()">My Projects</a></li>
 							<li><a name="myuploads" onclick="loadMyUploads()">My Uploads</a></li>
 							<li><br></li>		
 							<li><a name="msg" onclick="return buildinginprogress()">Send message</a></li>
 							<li><br></li>	
 							<li><a name="addCourse" onclick="return loadNewCourse()">Create a course</a></li>	
 							<li><a name="addproject" onclick="return buildinginprogress()">Create a project</a></li>
 							<li><a name="uploadbtn" onclick="return loadUploadFile()">Upload file</a></li>
 							<li><br></li>	
 							<li><a name="Q-A" onclick="return buildinginprogress()">Q&A</a></li>
 							<li><a name="Report" onclick="return buildinginprogress()">Report content</a></li>
 							<li><br></li>
 							<li><a name="unicsTut" onclick="return buildinginprogress()">Unics Tutoring</a></li>			
						</ul>
 					</div>
 				</div>
				<div id="contentDiv"></div>
 			<div id="reklamDiv">
 				<a href="http://www.adlibris.se" id="reklam"><img src="Assets/img/unics_reklam.jpg"></a>
 			</div>
 			</div>
 		</div>
 	</body>
</html>
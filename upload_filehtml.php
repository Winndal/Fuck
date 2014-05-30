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
		<link href="Assets/css/kursvy.css" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="Assets/js/main.js"></script> 
 	</head>
 	<body>
		<div id="createcourse">
			<p id="bigtext">Upload file</p>
		</div>
 		<form action="upload_file.php" method="post" enctype="multipart/form-data">
			<div id="no">
				<p><input type="file" name="file" id="file"></p>
			</div>
			<div id="dName">
				<input type="text" name="filnamn" id="f1" placeholder="File name...">
				<input type="text" name="kurskod" id="f1" placeholder="Course code...">
			</div>
			<div id="eName">
				<input type="submit" name="submit" value="Upload" id="uploadfile">
			</div>
		</form>
 	</body>
</html>


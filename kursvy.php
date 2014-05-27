<!DOCTYPE html>

<html>
	<head>
  		<title> Startsida </title>
		<link href="Assets/css/kursvy.css" rel="stylesheet">
		<meta charset="UTF-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="main.js"></script> 
 	</head>
 	<body> 
 		<form action="upload_file.php" method="post" enctype="multipart/form-data">
			<label for="file">File name:</label>
			<input type="file" name="file" id="file"><br>
			<input type="text" name="filnamn" id="f1" placeholder="File name..."><br>
			<input type="text" name="kurskod" id="f1" placeholder="Course code..."><br>
			<input type="submit" name="submit" value="Upload">
		</form>	
 </body>
</html>


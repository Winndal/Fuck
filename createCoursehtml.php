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
		<meta charset="UTF-8">
 	</head>
 	<body>
 		<div id="createcourse">
 			<p>Create course</p>
 		</div>	
 		<form action="createCourse.php" method="POST" id="createForm">
 			<div id="cName">
 				<input type="text" name="kursnamn" id="Kursnamn" placeholder="Course name..." autocomplete="off">
 				<input type="text" name="kurskod" id="Kurskod" placeholder="Course code..." autocomplete="off"><br>
			</div>
			<div id="dName">
 				<p>Please note, you have to write the dates in the following format: YYYY-MM-DD</p>
 				<input type="text" name="startdatum" id="Startdatum" placeholder="Course start..." autocomplete="off">
 				<input type="text" name="slutdatum" id="Slutdatum" placeholder="Course end..." autocomplete="off">
 			</div>
 			<div id="eName">
 				<input type="submit" name="skapakurs" id="skapaKurs" value="Create">
 			</div>
		</form>	
 </body>
</html>

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
 				<input type="text" name="kursnamn" id="Kursnamn" placeholder="Course name...">
 				<input type="text" name="kurskod" id="Kurskod" placeholder="Course code..."><br>
			</div>
			<div id="dName">
 				<label>Please note that you have to write the dates in the following form: YYYY-MM-DD.</label><br>
 				<input type="text" name="startdatum" id="Startdatum" placeholder="Course start date...">
 				<input type="text" name="slutdatum" id="Slutdatum" placeholder="Course end date...">
 			</div>
 			<div id="eName">
 				<input type="submit" name="skapakurs" id="skapaKurs" value="Create">
 			</div>
		</form>	
 </body>
</html>

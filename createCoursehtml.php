<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
 	</head>
 	<body> 
 		<form action="createCourse.php" method="POST">
 			<input type="text" name="kursnamn" id="Kursnamn" placeholder="Course name..."><br>
 			<input type="text" name="kurskod" id="Kurskod" placeholder="Course code..."><br>
 			<label>Please note that you have to write the dates in the follow form: YYYY-MM-DD.</label><br>
 			<input type="text" name="startdatum" id="Startdatum" placeholder="Course start date..."><br>
 			<input type="text" name="slutdatum" id="Slutdatum" placeholder="Course end date..."><br>
 			<input type="submit" name="skapakurs" id="skapaKurs" value="Create">
		</form>	
 </body>
</html>

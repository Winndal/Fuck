<!DOCTYPE html>

<?php

		if(isset($_POST["data"]) && strlen($_POST["data"]) > 0)
	{

			$con = mysqli_connect('localhost','root','','unics');
	
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }


			$Search = mysqli_real_escape_string($con, $_POST["data"]);

			//KURSKOD
			$searchQuery = "SELECT kurskod FROM kurser WHERE kurskod = '$Search'";
			$searchResult = mysqli_query($con, $searchQuery);
			$arr1 = mysqli_fetch_assoc($searchResult);
			$courseCode = $arr1['kurskod'];

			//KURSNAMN
			$searchQuery = "SELECT kursnamn FROM kurser WHERE kursnamn = '$Search'";
			$searchResult = mysqli_query($con, $searchQuery);
			$arr1 = mysqli_fetch_assoc($searchResult);
			$courseName = $arr1['kursnamn'];

			if($Search == $courseCode || $Search == $courseName)
			{
				if($Search == $courseCode)
				{

					$searchQuery = "SELECT kurskod, kursnamn, startdatum, slutdatum FROM kurser WHERE kurskod = '$Search'";
					$searchResult = mysqli_query($con, $searchQuery);
					$arr1 = mysqli_fetch_assoc($searchResult);
					$courseCode = $arr1['kurskod'];
					$courseName = $arr1['kursnamn'];
					$courseSdate = $arr1['startdatum'];
					$courseEdate = $arr1['slutdatum'];

				}
				else
				{
					$searchQuery = "SELECT kurskod, kursnamn, startdatum, slutdatum FROM kurser WHERE kursnamn = '$Search'";
					$searchResult = mysqli_query($con, $searchQuery);
					$arr1 = mysqli_fetch_assoc($searchResult);
					$courseCode = $arr1['kurskod'];
					$courseName = $arr1['kursnamn'];
					$courseSdate = $arr1['startdatum'];
					$courseEdate = $arr1['slutdatum'];

				}

			}
			else
			{
				echo"Kursens kod/namn finns inte!";
			}

	 if (mysqli_error($con)) 
 		{
  			die (mysqli_error ($con));//die avbryter preocessen
 		}

 	mysqli_close($con); 
 		
	}
	else
	{
		echo "<script>
           alert('The searchfield cannot be empty!');
           window.location.href='frontpage.php';
          </script>";

          die();
	}

?>

<html>
<head>
	<link href="Assets/css/courseInfo.css" rel="stylesheet">
</head>
<body>
	<div id="courseInfoDiv">
		<p> <?php echo "Course code: ", $courseCode, ".";?> </p>
		<p> <?php echo "Course name: ", $courseName, ".";?> </p>
		<p> <?php echo "Course start date: ", $courseSdate, ".";?> </p>
		<p> <?php echo "Course end date: ",$courseEdate, ".";?> </p>
	</div>
</body>
</html>
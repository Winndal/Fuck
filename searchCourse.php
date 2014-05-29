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
				echo "<script>
           alert('The course name or code does not exist!');
           window.location.href='frontpage.php';
          </script>";
				die();
			}


		 	$fileQuery = "SELECT * FROM filer WHERE kurskod = '$courseCode'";
			$fileQueryResult = mysqli_query($con, $fileQuery);
			$num = 0;

			while ($row = mysqli_fetch_assoc($fileQueryResult)) 
			{	
    		${'fn'.($num)} = $row['filnamn'];
			${'sfn'.($num)} = $row['sparatfilnamn'];
			$num++;
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
		<meta charset="UTF-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="Assets/js/main.js"></script> 
	</head>
	<body>
		<div id="courseInfoDiv">
			<a id="kursnamn"> <?php echo "Name: " . $courseName;?> </a>
			<a id="kurskod"> <?php echo "Course code: " . $courseCode;?> </a>
			<p id="start-slut"> <?php echo "Course start date: ", $courseSdate;?> <?php echo "Course end date: ",$courseEdate;?> </p>
		</div>
		<div id="fileAreaDiv">
			<ul>
				<?php
					for($i = 0; $i < $num; $i++)
					{
						echo "<li>" . ${'fn'.($i)} . "<br>" .
						"<a href='Assets/upload/" . ${'sfn'.($i)} . "'>" . ${'sfn'.($i)} . "</a>" .

						"</li>";

						// echo "<li href='Assets/upload/" . ${'sfn'.($i)} . "'>" . ${'fn'.($i)} . "</a>" . "<br>";
					}
				?>
			</ul>
		</div>
</body>
</html>
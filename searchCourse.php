<?php

				if(isset($_POST["data"]))
	{
		

			$con = mysqli_connect('localhost','root','','unics');
	
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }


			$Search = mysqli_real_escape_string($con, $_POST["data"]);

			$searchQuery = "SELECT kurskod, kursnamn FROM kurser WHERE kurskod = '$Search'";
			$searchResult = mysqli_query($con, $searchQuery);
			$arr1 = mysqli_fetch_assoc($searchResult);
			$courseCode = $arr1['kurskod'];
			$courseName = $arr1['kursnamn'];

			if($Search == $courseCode || $Search == $courseName)
			{
				

				$searchQuery = "SELECT startdatum, slutdatum FROM kurser WHERE kurskod || kursnamn = '$Search'";
				$searchResult = mysqli_query($con, $searchQuery);
				$arr1 = mysqli_fetch_assoc($searchResult); 
				$courseCode = $arr1['kurskod'];
				$courseName = $arr1['kursnamn'];
				$courseSdate = $arr1['startdatum'];
				$courseEdate = $arr1['slutdatum'];

				echo $courseCode, $courseName, $courseSdate, $courseEdate;

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

?>
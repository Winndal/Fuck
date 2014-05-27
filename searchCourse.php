<?php
echo"MJES";
		if(isset($_POST["search"]))
	{

			$con = mysqli_connect('localhost','root','','unics');
	
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }


			$Search = mysqli_real_escape_string($con, $_POST["search"]);

			$searchQuery = "SELECT kurskod FROM kurser WHERE kurskod = '$search'";
			$searchResult = mysqli_query($con, $searchQuery);
			$arr1 = mysqli_fetch_assoc($searchResult);
			$courses = $arr1['kurskod'];

			if($Search == $courses)
			{
				echo"Kursens kod finns!";
			}
			else
			{
				echo"Kursens kod finns inte!"
			}


			$searchQuery = "SELECT kursnamn FROM kurser WHERE kursnamn = '$search'";
			$searchResult = mysqli_query($con, $searchQuery);
			$arr2 = mysqli_fetch_assoc($searchResult);
			$courses = $arr2['kursnamn'];

			if($Search == $courses)
			{
				echo"Kursens namn finns!";
			}
			else
			{
				echo"Kursens namn finns inte!";
			}

	 if (mysqli_error($con)) 
 		{
  			die (mysqli_error ($con));//die avbryter preocessen
 		}

 	mysqli_close($con); 
 	
	}
?>
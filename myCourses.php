<!DOCTYPE html>
<?php session_start();

if(!isset($_SESSION['loggedin'])){ //SÄKERHET
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }

      		$con = mysqli_connect('localhost','root','','unics');
	
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

   			$userEmail = $_SESSION['email'];	
   			$myCoursesQuery = "SELECT * FROM kurser_medlemmar WHERE email = '$userEmail'";
   			$myCoursesQueryResult = mysqli_query($con, $myCoursesQuery);

   			$num = 0;

			while ($row = mysqli_fetch_assoc($myCoursesQueryResult)) 
			{	
			${'fn'.($num)} = $row['kurskod'];
			${'id'.($num)} = $row['id'];

			$num++;
			}

			if (mysqli_error($con)) 
		 	{
		  		die (mysqli_error ($con));//die avbryter preocessen
		 	}
		 	
		 	mysqli_close($con);
	 

?>

<html>
	<head>
	</head>
	<body>
		<?php
		for($i = 0; $i < $num; $i++)
					{
						echo "<div style='border-bottom: 1px dotted; padding-top: 10px; padding-bottom: 2px; color: white;'>";
						echo "<form method='POST' action='deleteMyCourse.php'>";
						echo "<li style='color: black;'>" . ${'fn'.($i)};
						echo"<input type='hidden' name='id' value='" . ${'id'.($i)} . "'>";
						echo"<input type='submit' id='courseDelete' value='Delete'>";
						echo"</form>";
						echo "</div>";
					}
					?>
	</body>
</html>
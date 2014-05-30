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

      		$courseCode = $_POST['kurskod'];
		    $userEmail = $_SESSION['email'];

		    //Ordna if-sats för att inte kunna lägga till flera kurser i mycourses.

			$userCourseQuery="INSERT INTO kurser_medlemmar(email, kurskod) VALUES ('$userEmail', '$courseCode')";
			mysqli_query($con, $userCourseQuery);


			if (mysqli_error($con)) 
		 	{
		  		die (mysqli_error ($con));//die avbryter preocessen
		 	}
		 	
		 	mysqli_close($con);
	 

	 	   echo "<script>
           alert('Course has been added to your courses!');
           window.location.href='frontpage.php';
          </script>";
?>


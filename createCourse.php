<?php session_start();
	

if(!isset($_SESSION['loggedin'])){ //SÄKERHET
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }

	if(isset($_POST["kurskod"]))
	{

			$con = mysqli_connect('localhost','root','','unics');
	
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

				  $courseName = mysqli_real_escape_string($con, $_POST["kursnamn"]);
				  $courseCode = mysqli_real_escape_string($con, $_POST["kurskod"]);
				  $startDate = mysqli_real_escape_string($con, $_POST["startdatum"]);
				  $endDate = mysqli_real_escape_string($con, $_POST["slutdatum"]); 

				  if(isset($courseName) && isset($courseCode) && isset($startDate) && isset($endDate)){
				  		if(strlen($startDate) === 10 && strlen($endDate) === 10){
				  				  
				  				  	$courseQuery = "INSERT INTO kurser(kursnamn, kurskod, startdatum, slutdatum) VALUES ('$courseName', '$courseCode', '$startDate', '$endDate')";
				   					mysqli_query($con,$courseQuery);
				   					
				   					echo "<script>
           							alert('New course has been created!');
					           		window.location.href='frontpage.php';
					          		</script>";
				   }
				  else
				  {
				  	echo "<script>
           							alert('Create course failed! Please check that your date fields are correct.');
					           		window.location.href='frontpage.php';
					          		</script>";
				  }
				 
				  }
				  else
				  {
				  	echo "<script>
           							alert('Create course failed! Please check that all fields are filled.');
					           		window.location.href='frontpage.php';
					          		</script>";
				  }

	 if (mysqli_error($con)) 
 		{
  			die (mysqli_error ($con));//die avbryter preocessen
 		}

 	mysqli_close($con); 
 	
	}

?>
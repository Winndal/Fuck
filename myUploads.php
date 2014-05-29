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

				 

				  $userEmail = $_SESSION ['email'];

				$fileQuery = "SELECT * FROM filer WHERE email = '$userEmail'";
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

?>
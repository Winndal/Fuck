<?php
	session_start();
	

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


		$fileName = $_POST['Delete'];
		$Query =  "DELETE FROM filer WHERE filnamn = '$fileName'";
		mysqli_query($con, $Query);


		echo "<script>
           alert('The file has been deleted!');
           window.location.href='frontpage.php';
          </script>";
       
       


       if (mysqli_error($con)) 
 		{
  			die (mysqli_error ($con));//die avbryter preocessen
 		}

 	mysqli_close($con);

?>
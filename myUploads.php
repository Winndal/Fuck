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

				 

				  $userEmail = $_SESSION ['email'];

				$fileQuery = "SELECT * FROM filer WHERE email = '$userEmail'";
				$fileQueryResult = mysqli_query($con, $fileQuery);

				$num = 0;

				while ($row = mysqli_fetch_assoc($fileQueryResult)) 
				{	
	    		${'fn'.($num)} = $row['filnamn'];
				${'sfn'.($num)} = $row['sparatfilnamn'];
				${'fid'.($num)} = $row['filid'];
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
						echo "<form method='POST' action='deleteFile.php'>";
						echo "<li style='color: black;'>" . ${'fn'.($i)} . "<br>". "<a href='Assets/upload/" . ${'sfn'.($i)} . "'>" . ${'sfn'.($i)} . "</a>" . "</li>";
						echo "<li style='list-style-type: none; padding-bottom: 10px;'>" . "<a href='Assets/upload/" . ${'sfn'.($i)} . "' download='" . ${'sfn'.($i)} . "'>" . "Download</a>" . "</li>";
						echo "<input id='deleteBtn' type='image' src='Assets/img/delete.jpg' name='Delete' value='" .  ${'fn'.($i)} . "' alt='Submit Form'>";
						echo"</form>";
						echo "</div>";
					}
					?>
	</body>
</html>
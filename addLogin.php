<?php session_start();
	
	if(isset($_POST["loginEmail"]))
	{

			$con = mysqli_connect('localhost','root','','unics');
	
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }


			$loginEmail = mysqli_real_escape_string($con, $_POST["loginEmail"]); //emailen användaren ger vid login
			$inputPassword = mysqli_real_escape_string($con, $_POST["password"]); //Lösenordet användaren ger vid login
			
			$passwordQuery = "SELECT password FROM medlemmar WHERE email = '$loginEmail'"; //Query
			$passwordResult = mysqli_query($con, $passwordQuery); //Skickar query
			$arr1 = mysqli_fetch_assoc($passwordResult); //Hämtar tabellen
			$savedPassword = $arr1['password']; //Sätter saved till password i assoc arrayen.	


			$saltQuery = "SELECT salt FROM medlemmar WHERE email = '$loginEmail'"; //Saltet från databasen
			$result = mysqli_query($con, $saltQuery);
			$arr2 = mysqli_fetch_assoc($result);
			$dbsalt = $arr2['salt'];
			
			$inputPassword = sha1($inputPassword.=$dbsalt); //Krypterar lösenordet från användaren med saltet.

			if($inputPassword == $savedPassword) //Kontrollera om lösenorden matchar, isf skapa session, annars avbryt.
			  {
						$_SESSION ['email']=$loginEmail;
						$_SESSION ['loggedin'] = 'true';
						header("location: frontpage.php");
			  }
			  else
			  {
			  	echo "<script>
           		alert('You have entered wrong email or password, please try again!');
           		window.location.href='index.php';
          		</script>";
			  }


	 if (mysqli_error($con)) 
 		{
  			die (mysqli_error ($con));//die avbryter preocessen
 		}

 	mysqli_close($con); 
 	
	}

?>
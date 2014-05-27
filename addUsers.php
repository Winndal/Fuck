<?php
	
	if(!isset($_SESSION['loggedin'])){ //SÄKERHET
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }
    
	if(isset($_POST["Fname"]))
	{

			$con = mysqli_connect('localhost','root','','unics');
	
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

		$Fname = mysqli_real_escape_string($con, $_POST["Fname"]);
		$Lname = mysqli_real_escape_string($con, $_POST["Lname"]);
		$email = mysqli_real_escape_string($con,$_POST["email"]);
		$password = mysqli_real_escape_string($con,$_POST["password"]);

	

		$atpos=strpos($email,"@"); 
     	$dotpos=strpos($email, "."); 

         	if ($atpos<1 || $dotpos<$atpos+2 || $dotpos+2>=strlen($email)||strlen($Fname) == 0) 
         		{
        			 die ("Du har fel syntax, var noga och skriv formen'erik svensson' och 'example@yahoo.com'");
         			 header("location: sign_up.php"); 
       			}

    		$emailQuery = "SELECT email FROM medlemmar WHERE email = '$email'";
       		$emailQueryResult = mysqli_query($con,$emailQuery);
       		$arr1 = mysqli_fetch_assoc($emailQueryResult);
			$savedEmail = $arr1['email'];	

			if(strlen($savedEmail) > 0)
			{
				echo "<script>
          		alert('Emailen redan registrerad');
           		window.location.href='sign_up.php';
          		</script>";
			}

			$salt = substr(sha1(mt_rand()),0,22);
			$password = sha1($password.=$salt);


			$query = "INSERT INTO medlemmar(email, fnamn, enamn, password, salt, kursid) VALUES ('$email', '$Fname', '$Lname', '$password', '$salt', '')";
			
	mysqli_query($con,$query); //läser in lägger till till databasen

	 if (mysqli_error($con)) 
 		{
  			die (mysqli_error ($con));//die avbryter processen
 		}

 	mysqli_close($con); 

 	if($query)
      {
          echo "<script>
           alert('Registration Successful! Please login.');
           window.location.href='index.php';
          </script>";
      }
    }
?>
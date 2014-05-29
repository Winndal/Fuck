<?php 													
												
session_start();
if(!isset($_SESSION['loggedin'])){
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }
      


if(isset($_POST["filnamn"]) && ($_POST["kurskod"]))
	{
		$con = mysqli_connect('localhost','root','','unics');
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }



				  //Query och if som kontrollerar om en specificerad kurskod finns för uppladdning av fil.
		$postCourseCode = $_POST["kurskod"];		  
		$ifQuery = "SELECT kurskod FROM kurser WHERE kurskod = '$postCourseCode'";
					$ifResult = mysqli_query($con, $ifQuery);
					$arr1 = mysqli_fetch_assoc($ifResult);
					$courseCode =  $arr1['kurskod'];
					
					if(strlen($courseCode) === 0)
						{ 
							echo "<script>
           					alert('The specified course code does not exist!');
          					window.location.href='frontpage.php';
         				 	</script>";
						} 

		$filnamn = mysqli_real_escape_string($con, $_POST["filnamn"]);
		$kurskod = mysqli_real_escape_string($con,$_POST["kurskod"]);
		$email = $_SESSION['email'];

		if ($_FILES["file"]["error"] > 0) {                     
			//echo "Error: " . $_FILES["file"]["error"] . "<br>";
			echo "<script>
           alert('Please choose a file!');
           window.location.href='frontpage.php';
          </script>";
          die(); 
			} 

			$allowedExts = array("gif", "jpeg", "jpg", "png", "pdf"); // accepterade filer för stunden 
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "application/pdf")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 8388608)
			&& in_array($extension, $allowedExts))
			{
			  	if ($_FILES["file"]["error"] > 0) 
			  	{
			    	//echo "Error: " . $_FILES["file"]["error"] . "<br>";
			    	echo "<script>
			           alert('File upload failed! Check the file format and file size.');
			           window.location.href='frontpage.php';
			          </script>"; 
			          die();
			  	} 
			} 
			else 
			{
			  		echo "<script>
			           alert('File upload failed! Check the file format and file size.');
			           window.location.href='frontpage.php';
			          </script>"; 
			          die();
			}
			
			$allowedExts = array("gif", "jpeg", "jpg", "png", "pdf");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "application/pdf")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 8388608)
			&& in_array($extension, $allowedExts)) 
			{
			if ($_FILES["file"]["error"] > 0) 
			{
			    //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			    	echo "<script>
			           alert('File upload failed! Check the file format and file size.');
			           window.location.href='frontpage.php';
			          </script>"; 
			          die();
			} 
			
			    if (file_exists("Assets/upload/" . $_FILES["file"]["type"])) 
			    {
			      echo $_FILES["file"]["name"] . " already exists. ";
			    } 
			    else 
			    {
			    	move_uploaded_file($_FILES["file"]["tmp_name"],
			    	"Assets/upload/" . $_FILES["file"]["name"]);
			    	$sparatfilnamn = $_FILES["file"]["name"];
			    	$query = "INSERT INTO filer (filnamn, email, kurskod, sparatfilnamn) VALUES ('$filnamn', '$email', '$kurskod', '$sparatfilnamn')"; 
			    	mysqli_query($con,$query); //läser in lägger till till databasen
					if (mysqli_error($con)) 
 					{
  						die (mysqli_error ($con));//die avbryter processen
 					}
 					mysqli_close($con); 
 					if($query)
      				{
          				echo "<script>
           				alert('Success!');
           				window.location.href='frontpage.php';
          				</script>";
      				}
    			}
			}
		} 
		else 
		{
		  	echo "<script>
		           alert('File upload failed! Check the file format and file size.');
		           window.location.href='frontpage.php';
		          </script>"; 
		          die();
		}
																		
			
?>

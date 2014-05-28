<?php 													// ((felhantering )) // hela phpn är direkt lånad från w3Schools //
														// den globala php arrayen $_Files möjliggör en uppladnning från client till server
session_start();
if(!isset($_SESSION['loggedin'])){
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }
      //var_dump($_POST["filnamn"]);
      //var_dump($_POST["kurskod"]);
      //die();

if(isset($_POST["filnamn"]) && ($_POST["kurskod"]))
	{
		$con = mysqli_connect('localhost','root','','unics');
		     if (mysqli_connect_errno()) 
				  {
 				   echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

		$filnamn = mysqli_real_escape_string($con, $_POST["filnamn"]);
		$kurskod = mysqli_real_escape_string($con,$_POST["kurskod"]);
		$email = $_SESSION['email'];

		if ($_FILES["file"]["error"] > 0) {                     
			echo "Error: " . $_FILES["file"]["error"] . "<br>"; 
			} 
			else
			{
			  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			  echo "Type: " . $_FILES["file"]["type"] . "<br>";
			  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			  echo "Stored in: " . $_FILES["file"]["tmp_name"];
			}
			
			$allowedExts = array("gif", "jpeg", "jpg", "png", "doc", "odt", "pdf", "txt"); // accepterade filer för stunden 
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "application/pdf")
			|| ($_FILES["file"]["type"] == "application/txt")
			|| ($_FILES["file"]["type"] == "application/doc")
			|| ($_FILES["file"]["type"] == "application/odt")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 8388608)
			&& in_array($extension, $allowedExts))
			{
			  	if ($_FILES["file"]["error"] > 0) 
			  	{
			    	echo "Error: " . $_FILES["file"]["error"] . "<br>";
			  	} 
			  	else 
			  	{
			    	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			    	echo "Type: " . $_FILES["file"]["type"] . "<br>";
			    	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			    	echo "Stored in: " . $_FILES["file"]["tmp_name"];
			  	}
			} 
			else 
			{
			  	echo "Invalid file";
			}
			
			$allowedExts = array("gif", "jpeg", "jpg", "png", "doc", "odt", "pdf", "txt");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "application/pdf")
			|| ($_FILES["file"]["type"] == "application/txt")
			|| ($_FILES["file"]["type"] == "application/doc")
			|| ($_FILES["file"]["type"] == "application/odt")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 8388608)
			&& in_array($extension, $allowedExts)) 
			{
			if ($_FILES["file"]["error"] > 0) 
			{
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			} 
			else 
			{
			    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			    echo "Type: " . $_FILES["file"]["type"] . "<br>";
			    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
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
           				alert('Sucsess!');
           				window.location.href='frontpage.php';
          				</script>";
      				}
    			}
			}} 
			else 
			{
			  echo "Invalid file";
			}
		}
else
{
	echo "<script>
	alert('Correct form example File name (statistics 7,5 hp exam) Course code (UU-74638)');
	window.location.href='frontpage.php';
	</script>";
}																		//lägga till filnamnet i datavasen
			
?>

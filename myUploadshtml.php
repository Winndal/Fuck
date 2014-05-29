<!DOCTYPE html>

<?php session_start();
if(!isset($_SESSION['loggedin'])){
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }

?>
<html>
	<head>
		<meta charset="UTF-8">
 	</head>
 	<body> 
 		<form action="myUploads.php"></form>	
 </body>
</html>

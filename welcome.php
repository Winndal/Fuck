<!DOCTYPE HTML>

<?php 													
												
session_start();
if(!isset($_SESSION['loggedin'])){
		echo "<script>
           alert('Please login or sign up!'	);
           window.location.href='index.php';
          </script>";
      }
?>


<html>
	<head>
	</head>

	<body>
		<div style="color: white; text-align:center;">
			<p style="font-size:250%; ">Welcome to UNICS!</p>
			<p>Please note that this site is under construction and not all functionability has been implemented.</p>
			<p>At the moment you can search for courses and course codes, create a course and add files to that or already existing courses.</p>
				<p>Or simply search for a course and download already existing files.</p>
			</p>
		</div>
	</body>
</html>
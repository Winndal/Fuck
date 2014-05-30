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
		<div id="welcome">
			<div id="createcourse">
				<p id="bigtext">Welcome to UNICS!</p>
			</div>
			<div id="cName">
				<p>Please note that this site is under construction and not all functionability has been implemented.</p>
				<p>At the moment you can search for courses and course codes, create a course and add files to that or already existing courses.</p>
			</div>	
			<img src="Assets/img/codemonkey_welcome.png" id="codemonkey_welcome">
		</div>
	</body>
</html>
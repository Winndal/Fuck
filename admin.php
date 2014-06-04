<?php session_start();

if(!isset($_SESSION['admin'])){ //SÄKERHET
	echo "<script>
	alert('YOU SHALL NOT PASS!');
	window.location.href='login.php';
	</script>";
	}

$con = mysqli_connect('localhost','root','','unics');
$fileQuery = "SELECT * FROM filer";
$fileQueryResult = mysqli_query($con, $fileQuery);
$num = 0;

while ($row = mysqli_fetch_assoc($fileQueryResult)){	
   	${'fn'.($num)} = $row['filnamn'];
	${'sfn'.($num)} = $row['sparatfilnamn'];
	$num++;
}

for($i = 0; $i < $num; $i++){
	echo "<div style='border-bottom: 1px dotted; padding-top: 10px; padding-bottom: 2px; color: white;'>";
	echo "<li style='color: black;'>" . ${'fn'.($i)} . "<br>". "<a href='Assets/upload/" . ${'sfn'.($i)} . "'>" . ${'sfn'.($i)} . "</a>" . "</li>";
	echo "<li style='list-style-type: none; padding-bottom: 10px;'>" . "<a href='Assets/upload/" . ${'sfn'.($i)} . "' download='" . ${'sfn'.($i)} . "'>" . "Download</a>" . "</li>";
	echo "</div>";
}

$searchQuery = "SELECT * FROM kurser";
$fileQueryResult = mysqli_query($con, $fileQuery);
$num = 0;

while ($row = mysqli_fetch_assoc($fileQueryResult)){	
   	${'fn'.($num)} = $row['kursnamn'];
	${'sfn'.($num)} = $row['kurskod'];
	$num++;
}

for($i = 0; $i < $num; $i++){
	echo "<div style='border-bottom: 1px dotted; padding-top: 10px; padding-bottom: 2px; color: white;'>";
	echo "<li style='color: black;'>" . ${'fn'.($i)} . "<br>". "<a href='Assets/upload/" . ${'sfn'.($i)} . "'>" . ${'sfn'.($i)} . "</a>" . "</li>";
	echo "<li style='list-style-type: none; padding-bottom: 10px;'>" . "<a href='Assets/upload/" . ${'sfn'.($i)} . "' download='" . ${'sfn'.($i)} . "'>" . "Download</a>" . "</li>";
	echo "</div>";
}


if (mysqli_error($con)){
  	die (mysqli_error ($con));//die avbryter preocessen
}

mysqli_close($con); 
?>
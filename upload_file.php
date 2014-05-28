<?php 													 // ((felhantering )) // hela phpn är direkt lånad från w3Schools // 
if ($_FILES["file"]["error"] > 0) {                     // den globala php arrayen $_Files möjliggör en uppladnning från client till server
  echo "Error: " . $_FILES["file"]["error"] . "<br>"; 
} else {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
}
?>

<?php                                                  // phpn sätter restriktioner
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "file/pdf"))
&& ($_FILES["file"]["size"] < 8388608)  		// byt till övre gräns på 8 mb
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
} else {
  echo "Invalid file";
}
?>

<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "file/pdf") && ($_FILES["file"]["size"] < 8388608) && in_array($extension, $allowedExts)))
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
    	if (file_exists("upload/" . $_FILES["file"]["name"]))
    	{
      		echo $_FILES["file"]["name"] . " already exists. ";
    	}
    		else 
    		{
      			move_uploaded_file($_FILES["file"]["tmp_name"],
      			"Assets/upload/" . $_FILES["file"]["name"]);				// så den når mappen upload som jag creatat i C/wamp/www/assets/upload 
      			echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    		}
  	}
		} 
		else 
		{
  			echo "Invalid file";
		}
?>




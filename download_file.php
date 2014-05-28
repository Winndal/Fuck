   <?php

//This is the directory where images will be saved ????????????????????????????????????
$target = "your directory";
$target = $target . basename( $_FILES["file"]["type"]);

//This gets all the other information from the form
$name=$_POST['nameMember'];
$bandMember=$_POST['bandMember'];
$pic=($_FILES['photo']['name']);
$about=$_POST['aboutMember'];
$bands=$_POST['otherBands'];


// Connects to your Database
mysql_connect("yourhost", "username", "password") or die(mysql_error()) ;
mysql_select_db("dbName") or die(mysql_error()) ;

//Writes the information to the database
mysql_query("INSERT INTO tableName (nameMember,bandMember,photo,aboutMember,otherBands)
VALUES ('$name', '$bandMember', '$pic', '$about', '$bands')") ;

//Writes the photo to the server
if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory";
}
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
?>
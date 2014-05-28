<?php
    
    $con = mysqli_connect('localhost','root','','unics');

    $query = "SELECT filnamn FROM filer WHERE filnamn = '$con'";
    $result = mysqli_query($query) or die('Error, query failed');

    if(mysqli_num_rows($result)==0){
        echo "Database is empty <br>";
    }
    else{
        while(list($id, $name) = mysqli_fetch_array($result)){
            echo "<a href=\"download.php?id=\$id\">$name</a><br>";
        }
    }

    if(isset($_GET['id'])){
        $id    = $_GET['id'];   
        $query = "SELECT name, type, size, content FROM upload WHERE id = '$id'";       
        $result = mysqli_query($query) or die('Error, query failed');
        list($name, $type, $size, $content) =  mysqli_fetch_row($result);
        header("Content-Disposition: attachment; filename=\"$name\"");
        header("Content-type: $type");
        header("Content-length: $size");
        print $content;
    }
?>
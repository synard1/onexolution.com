<?php
//Database
$host = "localhost";
$username = "onexolution";
$password = "root";
$databasename = "phpupload";

$connection =mysql_connect($host,$username,$password) or Die ("failed");
mysql_select_db($databasename,$connection) or die ("wrong db");



 //This function separates the extension from the rest of the file name and returns it 
 function findexts ($filename) 
 { 
 $filename = strtolower($filename) ; 
 $exts = split("[/\\.]", $filename) ; 
 $n = count($exts)-1; 
 $exts = $exts[$n]; 
 return $exts; 
 } 
 
 //This applies the function to our file  
 $ext = findexts ($_FILES['uploaded']['name']) ; 
 
 //This line assigns a random number to a variable. You could also use a timestamp here if you prefer. 
 $ran = rand () ;

 //This takes the random number (or timestamp) you generated and adds a . on the end, so it is ready for the file extension to be appended.
 $ran2 = $ran.".";

 //This assigns the subdirectory you want to save into... make sure it exists!
 $target = "uploads/";

//This combines the directory, the random file name and the extension $target = $target . $ran2.$ext;
$target = $target . $ran2.$ext;
$name = $ran2.$ext;
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
	mysql_query("INSERT INTO images(id,name) VALUES('','$name')");

 echo "The file has been uploaded as ".$name;
 } 
 else
 {
 echo "Sorry, there was a problem uploading your file.";
 }
 ?> 

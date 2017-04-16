<?php
 //This applies the function to our file  
 $target_file = basename($_FILES["uploaded"]["name"]);
 
 //This line assigns a random number to a variable. You could also use a timestamp here if you prefer. 
 $ran = rand () ;

 //This assigns the subdirectory you want to save into... make sure it exists!
 $target = "uploads/";

//This combines the directory, the random file name and the extension $target = $target .  $target_file;
$target = $target . $target_file;
$name = $target_file;
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "The file has been uploaded as ".$name;
 } 
 else
 {
 echo "Sorry, there was a problem uploading your file.";
 }
 ?> 

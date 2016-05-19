<?php 

$fbId = $_GET['fbId'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];

 echo $fbId.$fname.$lname.$email;
 echo "adding to database...";

 $con=mysqli_connect("localhost","bagjnsinth_movie","Cpe333","bagjnsinth_movieEiEi");
 if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
 else{echo "connect success";}

 $sql = "INSERT INTO `user` (name,lastName,userName,email) VALUES 
 ('".$fname."', '".$lname."','".$fbId."', '".$email."')";
 echo $sql;
 if (!mysqli_query($con,$sql)) 
 {
 die('Error: ' . mysqli_error($con));
 }
echo "The data has been added into the database.";
mysqli_close($con);

?>
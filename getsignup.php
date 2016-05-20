

<?php

$host = "localhost"; 
$user = "bagjnsinth_movie";
$password = "Cpe333";
$dbase = "bagjnsinth_movieEiEi";
$table = "user"; 

$name = $_GET['name'];
$lastName = $_GET['lastName'];
$userName = $_GET['userName'];
$email = $_GET['email'];
$userPassword = $_GET['password'];
$confirm = $_GET['confirm'];

/* Create connection */
$connection= mysql_connect ("localhost", "bagjnsinth_movie", "Cpe333","bagjnsinth_movieEiEi");
/* Check connection */
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db("bagjnsinth_movieEiEi",$connection);
 
/* insert information of user in database (user table) */
mysql_query ("INSERT INTO `user` (`idUser`,`name`,`lastName`,`userName`,`email`,`password`) 
	VALUES ('', '".$name."', '".$lastName."', '".$userName."', '".$email."', '".$userPassword."')");

/* Add in database already */
echo 'You have been added.';

mysql_close($connection);

?>
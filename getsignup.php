<html>
<body>

ADD
<br><br>
name: <?php echo $_GET["name"];?> <br><br>
idUser: <?php echo $_GET["idUser"]; ?> <br><br>
lastName: <?php echo $_GET["lastName"]; ?> <br><br>
userName: <?php echo $_GET["userName"]; ?> <br><br>
email: <?php echo $_GET["email"]; ?> <br><br>
password: <?php echo $_GET["password"]; ?> <br><br>

</body>
</html>

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
//$connection= mysql_connect ("bagjnsinth", "bagjnsinth_movie", "Cpe333");
$connection= mysql_connect ("localhost", "bagjnsinth_movie", "Cpe333","bagjnsinth_movieEiEi");

if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db("bagjnsinth_movieEiEi",$connection);
 

mysql_query ("INSERT INTO `user` (`idUser`,`name`,`lastName`,`userName`,`email`,`password`) 
	VALUES ('', '".$name."', '".$lastName."', '".$userName."', '".$email."', '".$userPassword."')");

echo 'You have been added.';

//Block 7
mysql_close($connection);

?>
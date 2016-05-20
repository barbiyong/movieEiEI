<html>
<body>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>MovieEiEi &mdash; Movie Review Application</title>
<meta name="description" content="Page description goes here">

<!-- ******************************************************************************************
Set the type and color theme here - the Pro version contains additional themes -->
<link href="css/hawthorne_type2_color3.css" rel="stylesheet">
<!--  ************************************************************************************* -->

<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/vendor/modernizr.js"></script>
<script>
</script>
</head>
<body>

<br><br>


<?php
$host = "localhost";
$user = "bagjnsinth_movie";
$password = "Cpe333";
$dbase = "bagjnsinth_movieEiEi";
$table = "user"; 

$name = $_GET["name"];
$pw= $_GET["pw"];

$connection= mysqli_connect ("localhost", "bagjnsinth_movie", "Cpe333","bagjnsinth_movieEiEi");
if(mysqli_connect_errno())
	{
	echo "Failed to connect MySQL". mysqli_connect_error();
	}
$sql = "SELECT userName,password FROM user WHERE userName='$name' AND password= '$pw' " ;
$result =$connection->query($sql);
if($result->num_rows>0)
 	{
	while($row = $result->fetch_assoc())
  		{	
  			echo "Login success";
  		}
  	}
 else
 	{
 	echo "sorry the username and password doesnt exist in the database";
 	//header("location=loginEmail.html");

 	}

mysqli_close($connection);
?>



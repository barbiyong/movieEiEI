<html>	
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>MovieEiEi &mdash; Search Reviews</title>
<meta name="description" content="Page description goes here">

<!-- ******************************************************************************************
Set the type and color theme here - the Pro version contains additional themes -->
<link href="css/hawthorne_type2_color3.css" rel="stylesheet">
<!--  ************************************************************************************* -->

<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/vendor/modernizr.js"></script>

</head>
	<body>					
	<?php
	$MovieName = $_POST["Name"];	
	?><br>		
	
	<?php
	$conn=mysqli_connect("localhost","bagjnsinth_movie","Cpe333","bagjnsinth_movieEiEi");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " .
		mysqli_connect_error();
		}

$sql = "SELECT m.movieName,r.rate,r.reviewDate,r.detail,u.name,u.lastName,m.coverImage,m.trailer
FROM movie m,review r, user u, reviewmovieuser re
WHERE m.idMovie= re.idMovie AND re.idUser=u.idUser AND re.idReview=r.idReview AND m.movieName='$MovieName'";

	
	if (!mysqli_query($conn,$sql)) 
		{
		die('Error: ' . mysqli_error($conn));
		}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
    	// output data of each row
    	while($row = $result->fetch_assoc()) 
    		{ 
    		echo '<img src=" ' . $row["coverImage"]. '" height="250px" weight="200px">';
        	echo "<br><br>Movie Name: " . $row["movieName"];
        	echo "<br><br>Rate: " . $row["rate"];
        	echo "<br><br>Reviews: " . $row["detail"];
        	echo "<br><br>Date of Reviews: " . $row["reviewDate"];
        	echo "<br><br>Reviewed by: " . $row["name"]. $row["lastName"];
        	echo "<br><br>Trailer: <br><br>" . $row["trailer"];
        	

    		}
		} 
	else 
		{
    	echo "Sorry, there's no reviews of movie you entered in the database.";
		}	

mysqli_close($conn);
	
?>


	</body>
</html>






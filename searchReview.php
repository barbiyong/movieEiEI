<html>	
	<body>		
	MovieName<?php echo $_POST["Name"]; ?><br>
			
	<?php
	$MovieName = $_POST["Name"];	
	?><br>		
	
	</body>
	
	<?php
	$conn=mysqli_connect("localhost","bagjnsinth_movie","Cpe333","bagjnsinth_movieEiEi");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " .
		mysqli_connect_error();
		}

	$sql = "SELECT m.movieName,r.detail FROM movie m, reviewmovieuser rmu, review r WHERE m.idMovie=rmu.idMovie AND r.idReview=rmu idReview;";	
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
        	echo "MovieName: " . $row["m.movieName"];
        	echo "Details: " . $row["r.detail"];
    		}
		} 
	else 
		{
    	echo "Sorry, there's no reviews in the $MovieName";
		}	

mysqli_close($conn);
	
?>



</html>



<!DOCTYPE html>
<html>
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
<script src="js/fblogin.js"></script>
<script>
	#search-box {
position: relative;
width: 100%;
margin: 0;
}

#search-form 
{
height: 40px;
border: 1px solid #999;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
background-color: #fff;
overflow: hidden;
}

#search-text 
{
font-size: 14px;
color: #ddd;
border-width: 0;
background: transparent;
}

#search-box input[type="text"]
{
width: 90%;
padding: 11px 0 12px 1em;
color: #333;
outline: none;
}

#search-button {
position: absolute;
top: 0;
right: 0;
height: 42px;
width: 80px;
font-size: 14px;
color: #fff;
text-align: center;
line-height: 42px;
border-width: 0;
background-color:#ColourCode;
-webkit-border-radius: 0px 5px 5px 0px;
-moz-border-radius: 0px 5px 5px 0px;
border-radius: 0px 5px 5px 0px;
cursor: pointer;
}
</script>
</head>
<body>

<div class="top-border"></div>

<div class="row">
          <div align="right">
            <img id="status" src="">
            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" data-auto-logout-link="true"></fb:login-button>
            <!--<div class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div>-->
            <button onclick="window.location.href='register.html'">SIGN UP</button>
          </div>  
</div>

<div class="row">
  <div class="small-12 medium-12 large-12 small-centered columns">
    <header>
      <h1><a href="index.html">Movie EiEi</a></h1>
      <h2><a href="index.html">NO Spoil .. Just Review </a></h2>
      <!--
      <div class="logo">
        <a href="index.html"><img src="img/logo.png" alt="Your Name Here" /></a>
      </div>
      -->
    </header>
  </div>
  <div class="small-12 medium-12 large-12 small-centered columns">
    <nav>
     <ul class="inline-list-custom">
        <li><a href="index.html">HOME</a></li>
        <!-- Lock the about when user is in page about-->
       
				<li><a href="categories.html">CATEGORIES</a></li>
 				<li><a href="new.html" >NEW MOVIE</a></li>
				<li><a href="topmovie.html">TOP MOVIE</a></li>
				<li><a href="ticket.html" >TICKET</a></li>
 				<li><a href="theater.html" >THEATER</a></li>
 				<li><a href="about.html" >ABOUT</a></li>          
      </ul>
    </nav>
  </div>
	<div id='search-box'>
		<form action='searchReview.php' id='search-form' method='post'>
				<input id='search-text' name='Name' placeholder='SEARCH BY TYPE MOVIE NAME' type='text'/>
				<button id='search-button' type='submit'>                     
					<span>Search</span>
				</button>
		</form>
	</div>
</div>
<div class="row">
  <div class="small-12 medium-12 large-12 columns">
    <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3 inline-list-custom">

<?php
$MovieName = $_POST["Name"];

$conn=mysqli_connect("localhost","bagjnsinth_movie","Cpe333","bagjnsinth_movieEiEi");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
}

$sql = "SELECT m.movieName,r.rate,r.reviewDate,r.detail,u.name,u.lastName,m.coverImage,m.trailer
FROM movie m,review r, user u, reviewmovieuser re
WHERE m.idMovie= re.idMovie  AND re.idUser=u.idUser AND re.idReview=r.idReview AND m.movieName LIKE '%".$MovieName."%' ";
//echo $sql;
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
		//echo '<div class="row">';
		//echo '<center> <img src=" ' . $row["coverImage"]. '" "></center>';
		//echo "<br><br>Movie Name: " . $row["movieName"];
		//echo "<br><br>Rate: " . $row["rate"];
		//echo "<br><br>Reviews: " . $row["detail"];
		//echo "<br><br>Date of Reviews: " . $row["reviewDate"];
		//echo "<br><br>Reviewed by: " . $row["name"]. $row["lastName"];
		//echo "<br><br>Trailer <br><br>" . $row["trailer"];
		//echo "</div>";


	    echo '<li><div class="thumbnail"><div class="thumbnail-img">';
	    echo '<a href="showmovie.php?id='.$row["movieName"].'"><img src="';
	    echo $row["coverImage"];
	    echo '" height="250px" width="250px" alt="Project 01" /></a> </div>';
        echo '<div class="thumbnail-caption"><a class="caption-link" href="showmovie.php?id='.$row["movieName"].'">'.$row["movieName"].'</a></div></div></li></a>';

	}
} 
else 
{
	echo "Sorry, there's no reviews of movie you entered; $movieName; in the database.";
}	

mysqli_close($conn);

?>
    </ul>
  </div>
</div>
</div>
</body>
</html>






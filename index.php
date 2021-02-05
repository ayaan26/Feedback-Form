<!DOCTYPE html>
<html>
<head>
<title>Lab 6</title>

<style>
body { 
  background: rgb(198, 168, 168); 
	font: 75% georgia, sans-serif;
	color: black; 
	margin: 0; 
	padding: 0;
  }
  
  h1 { 
	font: italic normal georgia, sans-serif;
	letter-spacing: 1px; 
	margin-bottom: 0; 
	color: #7D775C;
  }

  p { 
  color: rgb(85, 61, 16);
	margin-top: 0; 
	text-align: justify;
	font-family: 'Actor';font-size: 15px;
	}
</style>
  <head>
  <body>
  <h1> Lab 6 Photos</h1>


<?php


$server="localhost";
$username="id15352701_user";
$password="yoWvkfJ*}Lw3hqI1";
$database="id15352701_name";

$pairing= mysqli_connect($server, $username, $password, $database);


if (!$pairing){
  die("Failed to connect to MySQL: " . mysqli_connect_error() . "<br>");
}


$sql = "CREATE TABLE photography(
  id int, 
  subject VARCHAR(256),
  location VARCHAR(256),
  date VARCHAR(256),
  url VARCHAR(256)
)";

if (mysqli_query($pairing, $sql)){

}
else{
  echo "";
}

$sql ="INSERT INTO photography(subject,location,date,url)
VALUES ('buildings','miami','2018-04-09','https://upload.wikimedia.org/wikipedia/commons/d/d3/Miami_Skyline_2020.jpg'),
('island', 'ontario', '2014-03-28', 'https://media.blogto.com/articles/20180623-torontoislands-12.jpg?w=2048&cmd=resize_then_crop&height=1365&quality=70'),
('big ben','london','2018-09-26', 'https://lp-cms-production.imgix.net/news/2017/08/London.jpg'),
('homes','morocco','2015-06-22', 'https://www.heartmybackpack.com/wp-content/uploads/2017/03/IMG_3560.jpg')";

$sql = "SELECT * FROM photography ORDER BY date";
$ans = mysqli_query($pairing, $sql);
$rows = mysqli_num_rows($ans);

echo "<h1>Image Details:</h1>";
if ($rows > 0) {
  echo '<table cellpadding="4" border="0" align="center">
  <tr>
  <td><b>Date</b></td>
  <td><b>Subject</b></td>
  <td><b>Location</b></td>
  
  </tr>';
  while($row = mysqli_fetch_assoc($ans)) {
$id = $row["id"];
$subject = $row["subject"];
$location = $row["location"];
$date = $row["date"];
$url = $row["url"];
echo '<tr>
<td>'.$date.'</td>
<td>'.$subject.'</td>
<td>'.$location.'</td>
</tr>';
  }
  echo '</table>';
} 
else {
  echo "Nothing in table.<br>";
}


$sql = "SELECT * FROM photography WHERE location='ontario'";


$ans = mysqli_query($pairing, $sql);


$rows = mysqli_num_rows($ans);

echo "<h1>Ontario Photography:</h1>";
if ($rows > 0) {
	while($row = mysqli_fetch_assoc($ans)) {
		$url = $row["url"];
		$subject = $row["subject"];
		$location = $row["location"];
		echo "<img src='$url' height='250'>";
		echo "<p><b>Subject:</b> $subject<br><b>Location:</b> $location</p";		
}
} 

else {
    echo "Nothing there.<br>";
}




mysqli_close($pairing);



?>

</body>
</html>
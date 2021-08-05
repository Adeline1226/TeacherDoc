<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
	.header {
		background: #003366;
	}
	button[name=reg_user] {
		background: #003366;
	}
	th {
  margin-left}
th {
  padding: 5px;
  text-align: left;
}
a {
color:white;
text-decoration: none;

}
.navbar{
overflow: hidden;
  background-color: rgb(7, 0, 31);
  position: fixed;
  top: 0;
  width: 100%;
	</style>
</head>
<body>
<div class="navbar">
<table style="width:100%;font-size: 25px;"> 
<tr style="color:white;">
    <th><a href="form.php"><i class="fa fa-fw fa-book"></i>AddFile</a></th>
	<th><a href="admin.php"><i class="fa fa-fw fa-comment"></i>UserComments</a></th>
	<th><a href="create_user.php"><i class="fa fa-fw fa-plus"></i>CreateUser</a></th>
	<th><a href="home.php?logout='1'" style="color: red";>Logout</a></th>
  </tr>
</table>
</div>
	<div class="header">
		<h2>Users - Comments</h2>
	</div>
	<div class="content">
		
		<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacherdocdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["fname"]. " " . $row["lname"]." - who teaches " . $row["course"]."  At " . $row["school"]." - Commented: " . $row["comment"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>


			
	
	</div>
</body>
</html>
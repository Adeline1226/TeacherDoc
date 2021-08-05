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
<?php
session_start();

// initializing variables
$fname = "";
$lname = "";
$school = "";
$course = "";
$comment= "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root','','TeacherDocDB');

// Give Comments
if (isset($_POST['comm'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $school = mysqli_real_escape_string($db, $_POST['school']);
  $course = mysqli_real_escape_string($db, $_POST['course']);
  $comment = mysqli_real_escape_string($db, $_POST['comment']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "FirstName is required"); }
  if (empty($lname)) { array_push($errors, "LastName is required"); }
  if (empty($school)) { array_push($errors, "School is required"); }
  if (empty($course)) { array_push($errors, "Course You Teach is required");} 
  if (empty($comment)) { array_push($errors, "Your Comment is required");} 

// Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO comments (fname, lname, school, course, comment) 
  			  VALUES('$fname', '$lname', '$school', '$course', '$comment')";
  	mysqli_query($db, $query);
  	$_SESSION['fname'] = $fname;
  	$_SESSION['success'] = "Your Comments were successfully received";
  	header('location: help.php');
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {background-image: url('background.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
  background-size: cover;
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
}
.input{
width:550px;
height:35px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
  font-size:24px;
}
.input-group input {
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
  font-size:24px;

}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}

</style>
<title>TeacherDoc</title>
</head>
<body>
<div class="navbar">
<table style="width:100%;font-size: 25px;"> 
<tr style="color:white;">
<th><img src="logodark.PNG" style="width:190px;height:97px;"></th>
    <th><a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a></th>
    <th><a href="Courses.php"><i class="fa fa-fw fa-book"></i>Courses</a></th>
	<th><a href="help.php"><i class="fa fa-fw fa-comment"></i>Comments</a></th>
	<th><a href="index.php?logout='1'" style="color: red;">logout</a> </th>
  </tr>
</table>
</div>

<form method="post" action="help.php" style="width:100%; margin-top:200px; margin-left:200px; font-family:arial;font-size:16px; color:Yellow;">
      	<?php include('errors.php'); ?>
	<div class="header">
  	<h2>Comment</h2>
  </div>
	<div class="input-group">
  <label for="fname">First name:</label><br>
  <input class="input" type="text" name="fname"id="fname" placeholder="Your FirstName"><br><br>
   </div> 	
	<div class="input-group">
  <label for="lname">Last Name:</label><br>
  <input class="input" type="text" name="lname" id="lname" placeholder="Your LastName"><br><br>
  </div>
    <div class="input-group">
  <label for="scl">School:</label><br>
  <input class="input" type="text" name="school"id="scl" placeholder="Your School"><br><br>
   </div> 
	<div class="input-group">
  <label for="scl">Course You teach:</label><br>
  <input class="input" type="text" name="course"id="scl" placeholder="Your Course"><br><br>
  </div>
   <div class="input-group">
  <label for="scl">Comments:</label><br>
  <textarea rows="10" cols="80" name="comment"></textarea>
<br><br></div>
<div class="input-group">
  		<button type="submit" class="btn" name="comm">Submit</button>
  </div>
</form> 

<div style="background-color:rgb(0, 0, 0);width:100%;height:200px;margin-top:100px;">
<table>
<tr><th><img src="logoblack.PNG" style="width:190px;height:128px;float:left"></th>
<th><p style="color:white;font-size: 18px; margin-left:300px;">
<a href="index.php"><a class="active" href="#">Home</a><br><br>
<a href="Courses.php">Courses</a> <br><br>
<a href="help.php">Help</a> </p></th>

<th><p style="color:white;font-size: 18px;float:right; margin-left:300px;">
Case study : Rwanda <br>
Developer : Adeline Umutoni <br>
Developed in 2021 <br>  
Aiming at Improving teaching/Learning process <br>
vision: Improving Quality Education in Rwanda.<br>
mission: Making teaching process easy through using this website.
</p></th></tr>
</table>
</div>
</body>
</html>
</html>
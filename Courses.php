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
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function (){
  var maxHeight = 0;
  for(i=0;i<$(".card").length;i++){
    if($(".card").eq(i)){
      var currentHeight = $(".card").eq(i).height();
      if(currentHeight>=maxHeight){
        maxHeight = currentHeight;
      }
    }
    else{
      break;
    }
  }
  $(".card").height(maxHeight);
});
</script>
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
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  height:100% !important;
  margin-top: 150px;
  float: left;
  padding: 0 10px;
  display: block;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 10px;
  background-color:white;
  color: black;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 300px) {
  .card {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
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

<table class="row" style="width:100%;">
<tr>
<th class="card"><a href="social.php" class="main">
  <img src="SS.jpg" alt="social" style="width:100%">
  <div class="container">
    <h2><b>Social Studies</b></h2> 
    <h3>Course</h3> 
  </div></a>
</th>
<th class="card"><a href="French.php" class="main">
  <img src="Fre.jpg" alt="social" style="width:100%">
  <div class="container">
     <h2><b>French</b></h2> 
    <h3>Course</h3> 
  </div></a>
</th>
</tr>
<tr>
<th class="card"><a href="Kiny.php" class="main">
  <img src="kiny.jpg" alt="social" style="width:100%">
  <div class="container">
     <h2><b>Isomo ry'Ikinyarwanda</b></h2> 
    <h3> </h3>
  </div></a>
</th>
<th class="card"><a href="English.php" class="main">
  <img src="eng.jpg" alt="social" style="width:100%">
  <div class="container">
     <h2><b>English</b></h2> 
    <h3>Course</h3>
  </div></a>
</th>
</tr>
<tr>
<th class="card"><a href="Math.php" class="main">
  <img src="math.jpg" alt="social" style="width:100%">
  <div class="container">
     <h2><b>Mathematics</b></h2> 
    <h3> </h3>
  </div></a>
</th>

<th class="card"><a href="Science.php" class="main">
  <img src="science.jpg" alt="social" style="width:100%">
  <div class="container">
     <h2><b>Elementary Science and Technology</b></h2> 
    <h3> </h3>
  </div></a>
</th>
</tr>
</table>

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